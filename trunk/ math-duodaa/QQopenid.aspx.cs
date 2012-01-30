using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Web.Script.Serialization;
using System.Data.OleDb;
using System.Text.RegularExpressions;
using System.IO;
using System.Net;

public partial class QQopenid : System.Web.UI.Page
{
    public class qquser
    {
        public string ret { get; set; }

        public string msg { get; set; }

        public string nickname { get; set; }

        public string figureurl { get; set; }

        public string figureurl_1 { get; set; }

        public string figureurl_2 { get; set; }

        public string gender { get; set; }

    }

    qquser qu = new qquser();

    

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["userid"] != null & Session["userid"].ToString().Trim() != "0")
        {
            qqLoginSuccess.Visible = false;
            qqWelcome.Visible = true;
            
        }
        else
        {
            if (Request.QueryString["code"] != null  )
            {
                try
                {
                    string requestCode = Request.QueryString["code"];
                    string requestToken,accessToken ;
                    string qqOpenID;

                   
                        requestToken = @"https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=" + ConfigurationManager.AppSettings["QQ_AppID"];
                        requestToken += @"&client_secret=" + ConfigurationManager.AppSettings["QQ_Key"];
                        requestToken += @"&code=" + requestCode;
                        requestToken += @"&redirect_uri=" + @"http://duodaa.com/qqopenid.aspx";

                        WebClient wc = new WebClient();
                        accessToken = wc.DownloadString(requestToken).ToString();
                        accessToken = accessToken.Substring(0, accessToken.IndexOf("&")).Replace("access_token=", "");
                        qqOpenID = wc.DownloadString(@"https://graph.qq.com/oauth2.0/me?access_token=" + accessToken).ToString();
                        qqOpenID = qqOpenID.Substring(qqOpenID.IndexOf("\"openid\":\"") + "\"openid\":\"".Length);
                        qqOpenID = qqOpenID.Substring(0, qqOpenID.IndexOf("\""));

                        // Response.Write("<script>alert('aa:'+'" + qqOpenID + "')</script>");


                        Session["qqOpenid"] = qqOpenID.Trim();
                        
                                       

                    if (siteid_qqLogOn(qqOpenID.ToString().Trim()) != "0")
                    {
                        Session["userlogin"] = "1";
                        Session["userid"] = siteid_qqLogOn(qqOpenID.ToString().Trim());
                      

                        //写入用户的Cookies////////////////////////////////////////////
                        System.Web.HttpCookie newcookie;

                        newcookie = new HttpCookie("userinfo");
                        newcookie.Values["userid"] = Session["userid"].ToString();
                        newcookie.Values["psw"] = log_psw.Text;

                        if (Request.Cookies["userinfo"] == null) newcookie.Values["usercookieid"] = Session["userid"].ToString();
                        else newcookie.Values["usercookieid"] = ((Request.Cookies["userinfo"].Values["usercookieid"] == null || Request.Cookies["userinfo"].Values["usercookieid"].Trim() == "") ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"]);

                        newcookie.Expires = DateTime.Now.AddYears(30);
                        Response.AppendCookie(newcookie);
                        //////////////////////////////////////////////////

                        
                        Response.Redirect(Request.RawUrl);
                    }

                    else
                    {
                        
                        string requestUserJson="";
                        string currentUser ;

                        requestUserJson += @"https://graph.qq.com/user/get_user_info?access_token=" + accessToken;
                        requestUserJson += @"&oauth_consumer_key=" + ConfigurationManager.AppSettings["QQ_AppID"];
                        requestUserJson += @"&openid=" + qqOpenID;
                                                
                        currentUser = wc.DownloadString(requestUserJson).ToString();

                        qu.nickname = getJsonValue(currentUser, "nickname");
                        qu.gender = getJsonValue(currentUser, "gender");
                        Session["qq_gender"] = qu.gender;

                      //Response.Write("<script>alert('aa:'+'" + qu.gender + "')</script>");

                                              
                       

                        
                            string newuser = genUsername(qu.nickname.ToString());
                            NewUsername.Text = newuser;
                            log_un1.Text = newuser;
                        
                        
                    }
                }
                catch (Exception ex)
                {
                    
                    ErrorMsg.Visible = true;
                    qqLoginSuccess.Visible = false;
                   // Response.Write("<script>alert('aa:'+'" + ex.ToString() + "')</script>");
                    
                }

            }
        }
    }
   
    protected void ConnectDuodaa_Click(object sender, EventArgs e)
    {
        if (log_un.Text.Trim() == "" || log_psw.Text == "")
            Response.Write("<script>window.alert('请输入完整。谢谢！')</script>");
        else if (RegularExpressionValidator1.IsValid == false)
        { Response.Write("<script>window.alert('用户名输入有误')</script>"); }
        else if (RegularExpressionValidator2.IsValid == false)
        { Response.Write("<script>window.alert('密码输入有误。')</script>"); }
        else if (!xy1.Checked)
        { Response.Write("<script>window.alert('哆嗒协议必须同意。谢谢')</script>"); }
        else if (Session["checkcode"].ToString().ToLower() != log_verify.Text.ToLower().Trim())
        {
            Response.Write("<script>window.alert('验证码输入错误！若反复出错，请点击验证码图片换几张图再试。谢谢！')</script>");

        }
        else if (Session["qqOpenid"] == null)
        { Response.Write("<script>window.alert('未知错误！')</script>"); }

        else
        {
            Session["log_un"] = log_un.Text.Trim();
            Session["log_psw"] = log_psw.Text;
            Response.Redirect("qqbinder.aspx?bdType=connect");


        }

    }


    protected void CreateNew_Click(object sender, EventArgs e)
    {
        
        
        if (Session["qqOpenid"] == null)
        {
            Response.Write("<script>alert('aa:'+'" + "haha" + "')</script>");
        }
        else
        {
            if (RegularExpressionValidator4.IsValid == false)
            { Response.Write("<script>window.alert('用户名输入有误。')</script>"); }
            else if (!RegularExpressionValidator5.IsValid)
            { Response.Write("<script>window.alert('QQ号输入有误。'); </script>"); }
            else if (!xy2.Checked)
            { Response.Write("<script>window.alert('哆嗒协议必须同意。谢谢')</script>"); }


            else
            {
                string un, pw, qnumber, em;
                string tempwstring = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY0123456789";
                int i;
                Random rand = new Random();

                //用户名用输入框中的
                un = log_un1.Text;

                //生成18位密码字符串
                pw = "";
                for (i = 0; i < 18; i++) pw += tempwstring.Substring(rand.Next(tempwstring.Length), 1);

                //QQ号也用输入框中的
                qnumber = qq_Account.Text;

                //邮箱用qq邮箱
                em = qnumber + "@qq.com";



                OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                conn.Open();
                OleDbCommand cmd = new OleDbCommand("select username from users where username=@username", conn);
                cmd.Parameters.Add("@username", OleDbType.Char, 20);
                cmd.Parameters["@username"].Value = un.Trim();
                OleDbDataReader r1 = cmd.ExecuteReader();
                if (r1.Read())
                {
                    r1.Close();
                    Response.Write("<script>window.alert('用户名已经存在，请重新输入一个。')</script>");

                }
                else
                {
                    r1.Close();

                    cmd = new OleDbCommand("insert into users(username,password1,OpenID_qq) values(@username,@password,@opidqq)", conn);
                    cmd.Parameters.Add("@username", OleDbType.Char, 20);
                    cmd.Parameters["@username"].Value = un.Trim();
                    cmd.Parameters.Add("@password", OleDbType.Char, 20);
                    cmd.Parameters["@password"].Value = pw.Trim();
                    //下面写入QQ的OpenID
                    cmd.Parameters.Add("@opidqq", OleDbType.Char);
                    cmd.Parameters["@opidqq"].Value = Session["qqOpenid"].ToString();
                   
                    cmd.ExecuteNonQuery();

                    cmd = new OleDbCommand("select id from users where username='" + un.Trim() + "'", conn);
                    r1 = cmd.ExecuteReader();
                    r1.Read();
                    string _id = r1["id"].ToString();
                    r1.Close();

                    cmd = new OleDbCommand("insert into userinformation(userid,sex,email,information,sj,lastlogindate,QQ) values(@userid,@sex,@email,@information,@sj,@lastlogindate,@qq)", conn);
                    cmd.Parameters.Add("@userid", OleDbType.Integer);
                    cmd.Parameters.Add("@sex", OleDbType.Char, 2);
                    cmd.Parameters.Add("@email", OleDbType.Char, 50);
                    cmd.Parameters.Add("@information", OleDbType.Char, 200);
                    cmd.Parameters.Add("@sj", OleDbType.Date);
                    cmd.Parameters.Add("@lastlogindate", OleDbType.Date);
                    cmd.Parameters.Add("@qq", OleDbType.Char, 20);
                    cmd.Parameters["@userid"].Value = _id;
                    cmd.Parameters["@sex"].Value = Session["qq_gender"].ToString();
                    cmd.Parameters["@email"].Value = em.Trim();
                    cmd.Parameters["@information"].Value = " ";
                    cmd.Parameters["@sj"].Value = DateTime.Now;
                    cmd.Parameters["@lastlogindate"].Value = DateTime.Now.AddDays(-1);
                    cmd.Parameters["@qq"].Value = qnumber.Trim();
                    if (cmd.ExecuteNonQuery() == 1)
                    {
                        Session["userlogin"] = "1";
                        Session["userid"] = _id;

                        this.RegisterClientScriptBlock("tz1", "<script>window.alert('注册成功!今后你可以继续使用这个QQ号登录。');self.location='default.aspx';</script>");
                    }
                }
                conn.Close();
                conn.Dispose();
            }
        }
        
    }

    protected string siteid_qqLogOn(string qqOPENID)

    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd = new OleDbCommand("select id from users where OpenID_qq=@qqoid", conn);
        cmd.Parameters.Add("@qqoid", OleDbType.Char);
        cmd.Parameters["@qqoid"].Value = qqOPENID;
        OleDbDataReader r1 = cmd.ExecuteReader();
        if (r1.Read())
        {
            string siteid = r1[0].ToString().Trim();
            r1.Close();
            conn.Close();
            conn.Dispose();
            return siteid;
        }
        else
        {
            r1.Close();
            conn.Close();
            conn.Dispose();
            return "0";
        }
    
    }

    protected string genUsername(string qq_nickname)
      {
          string newusername;
          bool IsUsernameDone;

          Regex reg = new Regex(@"^[\u0800-\u4e00 \u4e00-\u9fa5 a-zA-Z_0-9]{3,12}$");//这里与自行注册的20个字符不一样（12个），是为了为后面的随机数字留出空间
          Random rand=new Random();

          if (!reg.IsMatch(qq_nickname.ToString()))
          {

              newusername = "duodaa";
              do
              {
                  newusername += rand.Next(0, 10).ToString();

                  OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                  conn.Open();
                  OleDbCommand cmd = new OleDbCommand("select id from users where username=@u", conn);
                  cmd.Parameters.Add("@u", OleDbType.Char);
                  cmd.Parameters["@u"].Value = newusername;
                  OleDbDataReader r1 = cmd.ExecuteReader();

                  IsUsernameDone = r1.Read();

                  r1.Close();
                  conn.Close();
                  conn.Dispose();
              }
              while (IsUsernameDone);

              return newusername.ToLower();

          }

          else
          {

              newusername = qq_nickname;
              do
              {
                  OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                  conn.Open();
                  OleDbCommand cmd = new OleDbCommand("select id from users where username=@u", conn);
                  cmd.Parameters.Add("@u", OleDbType.Char);
                  cmd.Parameters["@u"].Value = newusername;
                  OleDbDataReader r1 = cmd.ExecuteReader();

                  
                  IsUsernameDone = r1.Read();

                  if (IsUsernameDone) newusername += rand.Next(0, 10).ToString();

                  r1.Close();
                  conn.Close();
                  conn.Dispose();
              }
              while (IsUsernameDone);

              return newusername.ToLower();

          }
        
     
      }


    protected void linkQQ_Click(object sender, ImageClickEventArgs e)
      {
          Session["qqOpenid"] = null;

          string qqAppID = ConfigurationManager.AppSettings["QQ_AppID"];
          string qqKey = ConfigurationManager.AppSettings["QQ_Key"];
          string callBackUrl = @"http://duodaa.com/qqopenid.aspx";

          string requestUrl;

          requestUrl = @"https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" + qqAppID + @"&redirect_uri=" + callBackUrl;


          Response.Redirect(requestUrl);
      }

    protected string getJsonValue(string jsonString, string indexStr)
      {
          string json="";

          json = jsonString.Substring(jsonString.IndexOf("\"" + indexStr + "\":") + ("\"" + indexStr + "\":").Length);
          json = json.Substring(0,json.IndexOf(","));
          json = json.Replace("\"", "");

          return json;

      
      }
}



