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
	/// zzview 的摘要说明。
	/// </summary>
	public partial class zzview : System.Web.UI.Page
	{
		public string labtitle;
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			if(!IsPostBack)
			{
				string _uid=Request.QueryString["userid"];
				if(_uid=="")
					Response.Redirect("default.aspx");
				else
				{
					OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
					conn.Open();
					OleDbCommand cmd=new OleDbCommand("select * from users a,userinformation b where a.id=b.userid and a.id="+_uid,conn);
					OleDbDataReader r1=cmd.ExecuteReader();
					if(r1.Read())
					{
						labtitle=r1["username"].ToString()+"的个人资料";
						Label1.Text=r1["username"].ToString();
						xm.Text=r1["username"].ToString();
						xb.Text=r1["sex"].ToString();
						email.Text=r1["email"].ToString();
						jj.Text=r1["information"].ToString();
						tw.Text=r1["tw"].ToString();
						hd.Text=r1["hd"].ToString();
						dd.Text=r1["dd"].ToString();
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
	}
}
