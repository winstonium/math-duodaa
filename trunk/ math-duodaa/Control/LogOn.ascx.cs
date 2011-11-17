using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;
using System.Configuration;


public partial class Control_LogAndReg : System.Web.UI.UserControl
{

    public string QQ_AppID = ConfigurationManager.AppSettings["QQ_AppID"];

    protected void Page_Load(object sender, EventArgs e)
    {
        
        if (Session["userlogin"].ToString() == "0")
        {
            userinfoPad.Visible = false;
            userloginPad.Visible = true;
        }
        else
        {
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            OleDbCommand cmd = new OleDbCommand("select a.username,b.tw,b.hd,b.dd,b.point,b.gold from users a,userinformation b where a.id=b.userid and a.id=@id", conn);
            cmd.Parameters.Add("@id", OleDbType.Integer);
            cmd.Parameters["@id"].Value = Session["userid"].ToString();
            OleDbDataReader r1 = cmd.ExecuteReader();
            if (r1.Read())
            {
                username.InnerHtml = r1["username"].ToString();
                point.InnerHtml = r1["point"].ToString();
                gold.InnerHtml = r1["gold"].ToString();
               // tw.Text = r1["tw"].ToString();
               // hd.Text = r1["hd"].ToString();
               // dd.Text = r1["dd"].ToString();
               // point.Text = r1["point"].ToString();
               // gold.Text = r1["gold"].ToString() + "<img src='images/gold_0.gif'/>";

            }
            r1.Close();
            conn.Close();
            userinfoPad.Visible = true;
            userloginPad.Visible = false;
        }
    }

    protected void logON_Click(object sender, System.EventArgs e)
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
            OleDbCommand cmd = new OleDbCommand("select id from users where username=@u and password1=@p", conn);
            cmd.Parameters.Add("@u", OleDbType.Char, 20);
            cmd.Parameters.Add("@p", OleDbType.Char, 20);
            cmd.Parameters["@u"].Value = log_un.Text.Trim();
            cmd.Parameters["@p"].Value = log_psw.Text;
            OleDbDataReader r1 = cmd.ExecuteReader();
            if (r1.Read())
            {
                Session["userlogin"] = "1";
                Session["userid"] = r1["id"].ToString();

                System.Web.HttpCookie newcookie;

                newcookie = new HttpCookie("userinfo");
                newcookie.Values["userid"] = r1["id"].ToString();
                newcookie.Values["psw"] = log_psw.Text;

                if (Request.Cookies["userinfo"] == null) newcookie.Values["usercookieid"] = r1["id"].ToString();
                else newcookie.Values["usercookieid"] = ((Request.Cookies["userinfo"].Values["usercookieid"] == null || Request.Cookies["userinfo"].Values["usercookieid"].Trim() == "") ? r1["id"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"]);
                //||Request.Cookies["userinfo"].Values["usercookieid"].Trim()==""

                newcookie.Expires = DateTime.Now.AddYears(30);
                Response.AppendCookie(newcookie);

                r1.Close();
                conn.Close();
                Response.Redirect(Request.RawUrl);

            }
            else
            {
                r1.Close();
                conn.Close();
                Response.Write("<script>window.alert('用户名或密码错误。')</script>");
            }
        }

    }



    protected void logOUT_Click(object sender, EventArgs e)
    {
        string cookieid = Request.Cookies["userinfo"].Values["usercookieid"];
        // string cookieid1 = Request.Cookies["userinfo"].Values["userid"];
        //Response.Write("<script>window.alert('"+cookieid1+"')</script>");
        Session["userlogin"] = "0";
        Session["userid"] = "0";
        System.Web.HttpCookie newcookie;
        newcookie = new HttpCookie("userinfo");
        newcookie.Values["userid"] = "0";
        newcookie.Values["psw"] = "0";
        newcookie.Values["usercookieid"] = cookieid;
        newcookie.Expires = DateTime.Now.AddYears(30);
        Response.AppendCookie(newcookie);
        Response.Redirect(Request.RawUrl);
    }
    protected void qqConnetct_Click(object sender, ImageClickEventArgs e)
    {
        string qqAppID = ConfigurationManager.AppSettings["QQ_AppID"];
        string qqKey = ConfigurationManager.AppSettings["QQ_Key"];
        string callBackUrl = "http://duodaa.com/qqopenid.aspx";

        var context = new QzoneSDK.Context.QzoneContext(qqAppID, qqKey);
        var requestToken = context.GetRequestToken(callBackUrl);

        Session["requesttokenkey"] = requestToken.TokenKey.ToString();
        Session["requesttokensecret"] = requestToken.TokenSecret.ToString();
        string authenticationUrl = context.GetAuthorizationUrl(requestToken, callBackUrl);

        Response.Redirect(authenticationUrl);
    }
}