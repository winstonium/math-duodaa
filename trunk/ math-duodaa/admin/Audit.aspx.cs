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
	/// Audit 的摘要说明。
	/// </summary>
	public partial class Audit : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			if(Session["adminlogin"].ToString()=="0")
				Response.Redirect("login.aspx");
			if(!IsPostBack)
			{
				band("");
			}
		}
		private void band(string _key)
		{
			OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
			OleDbDataAdapter mydata=new OleDbDataAdapter("select a.id,a.caption,b.username,a.sj from problems a,users b where a.userid=b.id and a.sh='1' and a.caption like '%"+_key+"%'",conn);
			DataSet ds=new DataSet();
			mydata.Fill(ds,"problems1");
			Label1.Text=ds.Tables["problems1"].Rows.Count.ToString();
			DataGrid1.DataSource=ds.Tables["problems1"];
			DataGrid1.DataBind();
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
			this.DataGrid1.PageIndexChanged += new System.Web.UI.WebControls.DataGridPageChangedEventHandler(this.DataGrid1_PageIndexChanged);

		}
		#endregion

		protected void Button1_Click(object sender, System.EventArgs e)
		{
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
			foreach (DataGridItem i in DataGrid1.Items) 
			{ 
				CheckBox cbx = (CheckBox)i.FindControl("CheckBox1"); 
				if (cbx.Checked == true)
				{ 
					string strDNews; 
					strDNews = ""; 
					strDNews += (Convert.ToInt32(i.Cells[1].Text)).ToString() + ","; 
					strDNews = strDNews.Substring(0, strDNews.Length - 1); 
					string strSql1 = "delete from problems where id in (" + strDNews + ")"; 
					string strSql2 = "delete from problemsinformation where problemsid in (" + strDNews + ")";
					conn.Open(); 
					OleDbCommand cmdDel = new OleDbCommand(strSql1, conn); 
					cmdDel.ExecuteNonQuery(); 
					cmdDel = new OleDbCommand(strSql2, conn); 
					cmdDel.ExecuteNonQuery(); 
					conn.Close(); 
				} 
			} 
			band(TextBox1.Text);
		}

		protected void Button2_Click(object sender, System.EventArgs e)
		{
			band(TextBox1.Text);
		}

		private void DataGrid1_PageIndexChanged(object source, System.Web.UI.WebControls.DataGridPageChangedEventArgs e)
		{
			DataGrid1.CurrentPageIndex=e.NewPageIndex;
			band(TextBox1.Text);
		}

		protected void Button3_Click(object sender, System.EventArgs e)
		{
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
			foreach (DataGridItem i in DataGrid1.Items) 
			{ 
				CheckBox cbx = (CheckBox)i.FindControl("CheckBox1"); 
				if (cbx.Checked == true)
				{ 
					string strDNews; 
					strDNews = ""; 
					strDNews += (Convert.ToInt32(i.Cells[1].Text)).ToString() + ","; 
					strDNews = strDNews.Substring(0, strDNews.Length - 1); 
					string strSql1 = "update problems set sh='0' where id in (" + strDNews + ")"; 
					conn.Open(); 
					OleDbCommand cmdDel = new OleDbCommand(strSql1, conn); 
					cmdDel.ExecuteNonQuery(); 
					conn.Close(); 
				} 
			} 
			band(TextBox1.Text);
		}
	}
}
