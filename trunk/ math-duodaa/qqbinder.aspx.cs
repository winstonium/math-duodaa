using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;

public partial class Default2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string binderType;


        binderType = Request.QueryString["bdType"] == null ? "" : Request.QueryString["bdType"].ToLower().Trim();

        if (binderType == "connect") 
        {

            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            OleDbCommand cmd = new OleDbCommand("select id from users where username=@u and password1=@p and OpenID_qq='0'", conn);
            cmd.Parameters.Add("@u", OleDbType.Char, 20);
            cmd.Parameters.Add("@p", OleDbType.Char, 20);
            cmd.Parameters["@u"].Value = Session["log_un"].ToString();
            cmd.Parameters["@p"].Value = Session["log_psw"].ToString();
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
                newcookie.Values["psw"] = Session["log_psw"].ToString();

                if (Request.Cookies["userinfo"] == null) newcookie.Values["usercookieid"] = Session["userid"].ToString();
                else newcookie.Values["usercookieid"] = ((Request.Cookies["userinfo"].Values["usercookieid"] == null || Request.Cookies["userinfo"].Values["usercookieid"].Trim() == "") ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"]);

                newcookie.Expires = DateTime.Now.AddYears(30);
                Response.AppendCookie(newcookie);
                //////////////////////////////////////////////////

                Session["log_un"] = null;
                Session["log_psw"] = null;
                Session["qqOpenid"] = null;
                
                conn.Dispose();
                Response.Redirect("qqopenid.aspx");

            }
            else
            {
                r1.Close();
                conn.Close();
                Response.Write("<script>window.alert('用户名或密码错误或者这个哆嗒用户已经绑定过QQ号。')</script>");
            }
        }
       
        else if (binderType == "creat")
        {



            Response.Redirect("qqopenid.aspx");
        }
        else
        {
            Response.Redirect("~");
        }


    }



}