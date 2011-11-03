using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.SessionState;
using System.Data.OleDb;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls.WebParts;
using System.IO;
using System.Drawing.Imaging;
using System.Drawing;
using System.Net.Mail;
using System.Configuration;


/// <summary>
///logic 的摘要说明
/// </summary>
public class logic
{
	public logic()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}


    // 判断username用户是否今日是否登录，如果没有登录过，则更新登录时间
    // 今日登录过返回1，未登录过返回0，不存在此人返回-2，用户未登录-1
    public static int isFirstLogin(string userid) 
    {
        string uID = userid;
        DateTime curTime = DateTime.Now;
        string sql;
        

        if (uID != "")
        {
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();

            sql = "select lastlogindate from userinformation where userid=" + uID;
            OleDbCommand cmd = new OleDbCommand(sql, conn);
            OleDbDataReader r1 = cmd.ExecuteReader();
            if (r1.Read())
            {
                string lastTime = Convert.ToDateTime(r1["lastlogindate"]).ToString("yyyy-MM-dd");
                
                if (curTime.ToString("yyyy-MM-dd") == lastTime)
                {
                    r1.Close();
                    conn.Close();
                    return (1); //在同一天返回值1
                }

                else
                {
                    r1.Close();
                    sql = "update userinformation set lastlogindate=@lastlogindate where userid=" + uID;
                    cmd = new OleDbCommand(sql, conn);
                    cmd.Parameters.Add("@lastlogindate", OleDbType.Date);
                    cmd.Parameters["@lastlogindate"].Value = curTime; //更新登录时间为当前时间
                    cmd.ExecuteNonQuery();
                    conn.Close();
                    return (0); //今日未登录过，返回0
                }
            }

            else 
            {
                conn.Close();
                return (-2); 
            }  //没有此用户
        }

        else 
        {
            return (-1);
        }//用户未登录
    }

    public static int isGoldEnough(int _uid,int _gold) //判断金币是否足够
    {
        string sql;
        int uid = _uid,gold=_gold;

        
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            sql = "select gold from userinformation where userid=" + uid.ToString();

            OleDbCommand cmd1 = new OleDbCommand(sql, conn);       
            OleDbDataReader r1 = cmd1.ExecuteReader();
            r1.Read();
            if (Int32.Parse(r1["gold"].ToString()) < gold) //身上的gold 小于输入的 gold，则不够
            {
                r1.Close();
                conn.Close();
                return 0;

            }

            else
            {
                r1.Close();
                conn.Close();
                return 1;
            }


        }
    public static int isQuestionOpen(string pid)  //判断问题是否开放
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd = new OleDbCommand("select state from problems where id="+pid, conn);
        OleDbDataReader r1 = cmd.ExecuteReader();
        r1.Read();
        if (r1["state"].ToString() == "0")
        {
            r1.Close();
            conn.Close();
            return 1;                            //开放则返回1
        }
        else
        {
            r1.Close();
            conn.Close();  
            return 0;                           //不开放则返回0
        }
    }

    public static string isImgUplaod(FileUpload uploadFile)
    {
        FileUpload upFile = uploadFile;
        FileInfo upFileInfo=new FileInfo(upFile.FileName);
        string fileDirectory = HttpContext.Current.Server.MapPath("useruploads/");



        string[] validExFileName = new string[] { "image/bmp", "image/gif", "image/pjpeg", "image/png", "image/x-png", "image/jpeg" };
        int maxFileLen = 500 * 1024;            //最大文件大小
        int maxHeight = 450, maxWidth = 600;    //最大宽和高

        if (!validExFileName.Contains(upFile.PostedFile.ContentType.ToLower())) //文件类型不对
        {
            return "0.gif";
        }
        else if (upFile.PostedFile.ContentLength > maxFileLen) //文件大小超大
        {
            
            return "0.gif";
        }

        else
        {
            //以下生成文件名
            string filename = DateTime.Now.ToString("yyyyMMddHHmmssfff")+".gif";
            string filepath = fileDirectory + filename;
            string temfilename = filename.Substring(0,filename.Length-4-1)+"_001.gif";
            string temfilepath = fileDirectory + temfilename;
            
            string shuiyinpath = fileDirectory + "shuiyin.tif";
            
            upFile.SaveAs(temfilepath);
            
            System.Drawing.Image img = System.Drawing.Image.FromFile(temfilepath);
            FileInfo temFile = new FileInfo(temfilepath);
           
            //长宽没有超过设定大小，直接上传，并加上水印
            if (img.Height <= maxHeight && img.Width <= maxWidth)
            {
                System.Drawing.Image copyImage = System.Drawing.Image.FromFile(shuiyinpath);
                System.Drawing.Graphics g = System.Drawing.Graphics.FromImage(img);

                g.DrawImage(copyImage,
                new System.Drawing.Rectangle(img.Width - copyImage.Width, img.Height - copyImage.Height, copyImage.Width, copyImage.Height),
                0,
                0,
                copyImage.Width,
                copyImage.Height,
                System.Drawing.GraphicsUnit.Pixel);
                g.Dispose();
                copyImage.Dispose();

                img.Save(filepath);
                img.Dispose();
                temFile.Delete();
                return filename;

            }
            // 长宽超过设定大小，先缩放，再加水印
            else
            {
                System.Drawing.Image copyImage = System.Drawing.Image.FromFile(shuiyinpath);
                
                int newHeight=0, newWidth=0;
              
                //设定缩放大小
                if (img.Height * maxWidth > img.Width * maxHeight)
                {
                    newHeight = maxHeight;
                    newWidth = img.Width * maxHeight / img.Height;

                }
                else
                {
                    newHeight = img.Height * maxWidth / img.Width;
                    newWidth = maxWidth;
                }

                //新建一个bmp图片 
                System.Drawing.Image bitmap = new System.Drawing.Bitmap(newWidth, newHeight);

                //新建一个画板
                System.Drawing.Graphics tem_g = System.Drawing.Graphics.FromImage(bitmap);

                //设置高质量插值法
                tem_g.InterpolationMode = System.Drawing.Drawing2D.InterpolationMode.High;

                //设置高质量,低速度呈现平滑程度
                tem_g.SmoothingMode = System.Drawing.Drawing2D.SmoothingMode.HighQuality;

                //清空画布并以透明背景色填充
                tem_g.Clear(System.Drawing.Color.Transparent);
                
                tem_g.DrawImage(img,
                new System.Drawing.Rectangle(0, 0, newWidth, newHeight),
                new System.Drawing.Rectangle(0, 0, img.Width, img.Height),
                System.Drawing.GraphicsUnit.Pixel);



                tem_g.DrawImage(copyImage,
                new System.Drawing.Rectangle(bitmap.Width - copyImage.Width, bitmap.Height - copyImage.Height, copyImage.Width, copyImage.Height),
                0,
                0,
                copyImage.Width,
                copyImage.Height,
                System.Drawing.GraphicsUnit.Pixel);
                tem_g.Dispose();
                copyImage.Dispose();

                bitmap.Save(filepath);
                img.Dispose();
                bitmap.Dispose();
                temFile.Delete();
            
                return filename;  //返回生成的文件名
            }
            
            
        }
        
    
    }

    public static string isPasswordEmail(string username) //返回邮件名，若不存在返回"0"
    {
    int timeExpire=30 ; //过期时间，以分钟为单位 

    OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
    conn.Open();
    OleDbCommand cmd = new OleDbCommand("select id from users where username=@user", conn);
    cmd.Parameters.Add("@user", OleDbType.Char);
    cmd.Parameters["@user"].Value = username;
    OleDbDataReader r1 = cmd.ExecuteReader();
    if (r1.Read())
    {
        

        string userID = r1["id"].ToString();
       
        cmd = new OleDbCommand("select email from userinformation where userid=" + userID, conn);
        r1 = cmd.ExecuteReader();
        r1.Read();
        string email = r1["email"].ToString();
        r1.Close();

        //以上生成code
        string code = "";  //取密码的code
        char[] chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".ToCharArray();
        System.Random rand = new Random();

        for (int iCount = 0; iCount < 100; iCount++)  //100个字长的code
        {
            code=code+chars[rand.Next(chars.Length)];
        }

        //重存入数据
        cmd=new OleDbCommand("insert into renewpw(applyuser,code,timeexpire) values(@user,@code,@timeex)",conn);
        cmd.Parameters.Add("@user",OleDbType.Char,20);
        cmd.Parameters.Add("@code",OleDbType.Char,220);
        cmd.Parameters.Add("@timeex",OleDbType.Date);
        cmd.Parameters["@user"].Value=username;
        cmd.Parameters["@code"].Value=code;
        cmd.Parameters["@timeex"].Value =DateTime.Now.AddMinutes(timeExpire).ToString();
        cmd.ExecuteNonQuery();
        conn.Close();


        //生成邮件内容
        string body = "";
        body = body + "亲爱的" + username + ",您好:<br />"; ;
        body = body + "您不久前提交了哆嗒网的密码修改申请。请尽快使用下面的链接，修改您的密码<br />";
        body = body + "<a href='http://www.duodaa.com/renewpw.aspx?uname=" +username+"&code="+code.ToString()+"'>"+"http://www.duodaa.com/renewpw.aspx?uname="+username+"&code="+code.ToString()+"</a><br />";
        body = body + "为保障您的账号安全，本链接的有效期为25分钟。<br />";
        body = body + "你身边的数学平台——哆嗒网<br />";
        body = body + DateTime.Now.ToString("yyyy-MM-dd");

        

        //生成邮件并发送
        MailAddress from = new MailAddress("service@duodaa.com");
        MailAddress to = new MailAddress(email);
        MailMessage message = new MailMessage(from, to);
        message.Subject = "哆嗒网密码重置邮件";
        message.IsBodyHtml = true;
        message.Body = body.ToString();

        SmtpClient smtp = new SmtpClient("smtp.exmail.qq.com");
        smtp.Port = 25;

        smtp.Credentials = new System.Net.NetworkCredential("service@duodaa.com", ConfigurationManager.AppSettings["ServiceMailPassword"]);//密码
        smtp.Send(message);
        
        message.Dispose();
               
        return email;
    }
    else
    {
        return "0";
    }
    }

    // 用userid和密码来判断用户是否能登录
    public static bool isLogOnByID(int uid, string psw)
    {

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd = new OleDbCommand("select id from users where id=@u and password1=@p", conn);
        cmd.Parameters.Add("@u", OleDbType.Integer, 20);
        cmd.Parameters.Add("@p", OleDbType.Char, 20);
        cmd.Parameters["@u"].Value = uid;
        cmd.Parameters["@p"].Value = psw;
        OleDbDataReader r1 = cmd.ExecuteReader();
        if (r1.Read())
        {
            conn.Close();
            conn.Dispose();
            return true;
        }
        else
        {
            conn.Close();
            conn.Dispose();
            return false;
        }
    }

  
  

}
