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
	//该源码下载自www.51aspx.com(５１ａｓｐｘ．ｃｏｍ)

	/// <summary>
	/// myhd 的摘要说明。
	/// </summary>
	public partial class myhd : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			if(Session["userlogin"].ToString()=="0")
				Response.Redirect("index.aspx");
			if(!IsPostBack)
			{
				showdata();
			}
		}
		private void showdata()
		{
			string _sql;
			_sql="select a.id,a.caption,a.answer,a.state as state1,b.state as state2,a.sj from problems a,answer b where a.id=b.problemsid and b.userid="+Session["userid"].ToString()+" order by a.sj desc";
			OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
			OleDbDataAdapter mydata=new OleDbDataAdapter(_sql,conn);
			DataSet ds=new DataSet();
			mydata.Fill(ds,"answer1");
			_count.Text=ds.Tables["answer1"].Rows.Count.ToString();
			Grid1.DataSource=ds.Tables["answer1"];
			Grid1.DataBind();
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
			this.Grid1.PageIndexChanged += new System.Web.UI.WebControls.DataGridPageChangedEventHandler(this.Grid1_PageIndexChanged);

		}
		#endregion

		private void Grid1_PageIndexChanged(object source, System.Web.UI.WebControls.DataGridPageChangedEventArgs e)
		{
			Grid1.CurrentPageIndex=e.NewPageIndex;
			showdata();
		}
	}
}
