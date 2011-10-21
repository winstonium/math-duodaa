using System;
using System.Collections;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using System.Data.OleDb;

namespace zhidao
{
	/// <summary>
	/// Login 的摘要说明。
	/// </summary>
	public partial class Login : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			if(Session["userlogin"].ToString()=="1")
				Response.Redirect("default.aspx");
		}

		#region Web 窗体设计器生成的代码
		override protected void OnInit(EventArgs e)
		{
			//
			// CODEGEN: 该调用是 ASP.NET Web 窗体设计器所必需的。
			//
			InitializeComponent();
			base.OnInit(e);
		}
		
		/// <summary>
		/// 设计器支持所需的方法 - 不要使用代码编辑器修改
		/// 此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{    

		}
		#endregion

		protected void Button2_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("Register.aspx");
		}

		protected void Button1_Click(object sender, System.EventArgs e)
		{
			if(username.Text=="" || password1.Text=="")
				this.RegisterClientScriptBlock("tz1","<script>window.alert('请输入完整。谢谢！')</script>");
            else if (Session["checkcode"].ToString().ToLower() != checkcode.Text.ToLower().Trim())
            {
                Response.Write("<script>window.alert('验证码输入错误！')</script>");

            }
			else
			{
				OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
				conn.Open();
				OleDbCommand cmd=new OleDbCommand("select id from users where username=@u and password1=@p",conn);
				cmd.Parameters.Add("@u",OleDbType.Char,20);
				cmd.Parameters.Add("@p",OleDbType.Char,20);
				cmd.Parameters["@u"].Value=username.Text;
				cmd.Parameters["@p"].Value=password1.Text;
				OleDbDataReader r1=cmd.ExecuteReader();
				if(r1.Read())
				{
					Session["userlogin"]="1";
					Session["userid"]=r1["id"].ToString();

                    System.Web.HttpCookie newcookie;


                    newcookie = new HttpCookie("userinfo");
                    newcookie.Values["userid"] = r1["id"].ToString();
                    newcookie.Values["psw"] = password1.Text;
                    
                    if (Request.Cookies["userinfo"] == null) newcookie.Values["usercookieid"] = r1["id"].ToString();
                    else newcookie.Values["usercookieid"] = ((Request.Cookies["userinfo"].Values["usercookieid"] == null || Request.Cookies["userinfo"].Values["usercookieid"].Trim() == "") ? r1["id"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"]);
                    //||Request.Cookies["userinfo"].Values["usercookieid"].Trim()==""
                    
                    newcookie.Expires = DateTime.Now.AddYears(30);
                    Response.AppendCookie(newcookie);


                    
                 
                    

					r1.Close();
					conn.Close();
					Response.Redirect("index.aspx");
				}
				else
				{
					r1.Close();
					conn.Close();
					this.RegisterClientScriptBlock("tz1","<script>window.alert('用户名或密码错误。')</script>");
				}
			}
		}
	}
}
