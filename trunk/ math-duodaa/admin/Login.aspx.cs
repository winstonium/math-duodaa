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

namespace zhidao.admin
{
	/// <summary>
	/// Login 的摘要说明。
	/// </summary>
	public partial class Login : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
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

		protected void Button1_Click(object sender, System.EventArgs e)
		{
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
			conn.Open();
			OleDbCommand cmd=new OleDbCommand("select username from sys where username=@name and password1=@pass",conn);
			cmd.Parameters.Add("@name",OleDbType.Char,20);
			cmd.Parameters.Add("@pass",OleDbType.Char,20);
			cmd.Parameters["@name"].Value=username.Text;
			cmd.Parameters["@pass"].Value=password1.Text;
			OleDbDataReader r1=cmd.ExecuteReader();
			if(r1.Read())
			{
				Session["adminlogin"]="1";
				Response.Redirect("index.aspx");
			}
			else
				this.RegisterClientScriptBlock("tz1","<script>window.alert('用户名或密码错误。')</script>");
			r1.Close();
			conn.Close();
		}
	}
}
