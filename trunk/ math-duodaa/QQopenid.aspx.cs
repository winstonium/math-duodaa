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

    public qquser qu;
    

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["userid"] != null & Session["userid"].ToString().Trim() != "0")
        {
            qqLoginSuccess.Visible = false;
            qqWelcome.Visible = true;
        }
        else
        {
            if (Request.QueryString["oauth_vericode"] != null)
            {
                try
                {
                    string requestTokenKey = Session["requesttokenkey"].ToString();

                    string requestTokenSecret = Session["requesttokensecret"].ToString();

                    string verifier = Request.QueryString["oauth_vericode"];

                    string key = ConfigurationManager.AppSettings["QQ_AppID"];

                    string secret = ConfigurationManager.AppSettings["QQ_Key"];

                    QzoneSDK.Qzone qzone = new QzoneSDK.Qzone(key, secret, requestTokenKey, requestTokenSecret, verifier, false, "");

                    Session["qqOpenid"] = qzone.OpenID;

                    if (siteid_qqLogOn(Session["qqOpenid"].ToString().Trim()) != "0")
                    {
                        Session["userlogin"] = "1";
                        Session["userid"] = siteid_qqLogOn(Session["qqOpenid"].ToString().Trim());
                      

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

                        Session["qqOpenid"] = null;
                        Response.Redirect(Request.RawUrl);
                    }

                    else
                    {
                                                
                        string currentUser = qzone.GetCurrentUser();

                        JavaScriptSerializer json = new JavaScriptSerializer();

                        qquser qq_userinfo = json.Deserialize<qquser>(currentUser);

                        qu = qq_userinfo;

                        if (!IsPostBack)
                        {
                            string newuser = genUsername(qq_userinfo.nickname.ToString());
                            NewUsername.Text = newuser;
                            log_un1.Text = newuser;
                        }
                        
                    }
                }
                catch (Exception)
                {
                    Session["qqOpenid"] = null;
                    ErrorMsg.Visible = true;
                    qqLoginSuccess.Visible = false;
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

        else
        {
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            OleDbCommand cmd = new OleDbCommand("select id from users where username=@u and password1=@p and OpenID_qq='0'", conn);
            cmd.Parameters.Add("@u", OleDbType.Char, 20);
            cmd.Parameters.Add("@p", OleDbType.Char, 20);
            cmd.Parameters["@u"].Value = log_un.Text.Trim();
            cmd.Parameters["@p"].Value = log_psw.Text;
            OleDbDataReader r1 = cmd.ExecuteReader();
            if (r1.Read())
            {
                Session["userlogin"] = "1";
                Session["userid"] = r1["id"].ToString();
                r1.Close();
                conn.Close();


                //写入QQ的OPENID////////////////////////////////////////////
                conn = new OleDbConnection(dbConStr.dbConnStr());
                conn.Open();
                cmd = new OleDbCommand("update users set OpenID_qq=@qoid where id=@uid", conn);
                cmd.Parameters.Add("@qoid", OleDbType.Char);
                cmd.Parameters.Add("@uid", OleDbType.Char, 20);
                cmd.Parameters["@qoid"].Value = Session["qqOpenid"].ToString();
                cmd.Parameters["@uid"].Value = Session["userid"].ToString();
                cmd.ExecuteNonQuery();
                conn.Close();

                ////////////////////////////////////////////////////////////

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


                conn.Dispose();
                Response.Redirect(Request.RawUrl);

            }
            else
            {
                r1.Close();
                conn.Close();
                Response.Write("<script>window.alert('用户名或密码错误或者这个哆嗒用户已经绑定过QQ号。')</script>");
            }
        }

    }
    
    
    protected void CreateNew_Click(object sender, EventArgs e)
    {
        if (RegularExpressionValidator4.IsValid==false)
        { Response.Write("<script>window.alert('用户名输入有误。')</script>"); }
        else if (!RegularExpressionValidator5.IsValid)
        { Response.Write("<script>window.alert('QQ号输入有误。'); </script>"); }
        else if (!xy2.Checked)
        { Response.Write("<script>window.alert('哆嗒协议必须同意。谢谢')</script>"); }
       

        else
        {
            string un,pw,qnumber,em ;
            string tempwstring = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY0123456789";
            int i;
            Random rand=new Random();

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
                            cmd.Parameters["@sex"].Value = qu.gender.Trim();
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



     
}



