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
	/// editinfo 的摘要说明。
	/// </summary>
	public partial class editinfo : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			if(Session["userlogin"].ToString()=="0")
				Response.Redirect("index.aspx");
			else
			{
				if(!IsPostBack)
				{
					OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
					conn.Open();
					OleDbCommand cmd=new OleDbCommand("select a.username,b.sex,b.email,b.information, b.qq from users a,userinformation b where a.id=b.userid and a.id="+Session["userid"].ToString(),conn);
					OleDbDataReader r1=cmd.ExecuteReader();
					if(r1.Read())
					{
						xm.Text=r1["username"].ToString();
						if(r1["sex"].ToString()=="男")
							xb.SelectedIndex=0;
						else
							xb.SelectedIndex=1;
						email.Text=r1["email"].ToString();
                        qq.Text = r1["qq"].ToString().Trim();
						jj.Text=r1["information"].ToString();
					}
					r1.Close();
					conn.Close();
				}
			}
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
			if(email.Text=="")
				this.RegisterClientScriptBlock("tz1","<script>window.alert('请输入EMAIL！')</script>");
			else
			{
				OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
				conn.Open();
				OleDbCommand cmd;
				if(mm.Text=="")
				{
					cmd=new OleDbCommand("update userinformation set sex='"+xb.SelectedValue+"',email='"+email.Text+"',information='"+jj.Text+"',qq='"+qq.Text+"' where userid="+Session["userid"].ToString(),conn);
					cmd.ExecuteNonQuery();
				}
				else
				{
					cmd=new OleDbCommand("update users set password1='"+mm.Text+"' where id="+Session["userid"].ToString(),conn);
					cmd.ExecuteNonQuery();
					cmd=new OleDbCommand("update userinformation set sex='"+xb.SelectedValue+"',email='"+email.Text+"',information='"+jj.Text+"' where userid="+Session["userid"].ToString(),conn);
					cmd.ExecuteNonQuery();
				}
				conn.Close();
				Response.Redirect("editinfo.aspx");
			}
		}
	}
}
