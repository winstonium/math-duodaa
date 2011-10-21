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
	/// Search 的摘要说明。
	/// </summary>
	public partial class Search : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			if(!IsPostBack)
			{
				TextBox1.Text=Request.QueryString["Word"];
				showdata(TextBox1.Text);
			}
		}

		static public string Left(string str, int L)
		{
			string tmpStr;
			tmpStr = str;
			if (str.Length > L)
			{

				tmpStr = str.Substring(0, L) + "...";
			}
			return tmpStr;
		}


		private void showdata(string _if)
		{
			string _sql;
				_sql="select a.id,a.caption,b.content,a.sj,c.username from problems a,answer b,users c where a.id=b.problemsid and b.userid=c.id and a.state='1' and b.state='2' and a.caption like '%"+_if+"%' order by a.sj desc";
                OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
			OleDbDataAdapter mydata=new OleDbDataAdapter(_sql,conn);
			DataSet ds=new DataSet();
			mydata.Fill(ds,"problems1");
			_count.Text=ds.Tables["problems1"].Rows.Count.ToString();
			Sdata.DataSource=ds.Tables["problems1"];
			Sdata.DataBind();
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
