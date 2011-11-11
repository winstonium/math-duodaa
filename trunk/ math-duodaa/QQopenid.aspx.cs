using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Web.Script.Serialization;
using System.Data.OleDb;

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
                        Session["qqOpenid"] = null;
                        
                        string currentUser = qzone.GetCurrentUser();

                        JavaScriptSerializer json = new JavaScriptSerializer();

                        qquser qq_userinfo = json.Deserialize<qquser>(currentUser);
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
        { Response.Write("<script>window.alert('密码输入有误')</script>"); }
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
                cmd = new OleDbCommand("update users set OpenID_qq=@qoid where id=@uid",conn);
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


}



