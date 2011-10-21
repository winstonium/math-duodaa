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
	/// index 的摘要说明。
	/// </summary>
	public partial class index : System.Web.UI.Page
	{
        
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
            
            string grade = Request.QueryString["grade"];
            TextBox2.Text=grade;

            if(!IsPostBack)
            {
                if(grade!=null)
                     Button1.Text = "全部" + GetConstant.gradeClassName[Int32.Parse(grade)] + "问题";
				showdata("10",grade);
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
			this.Grid1.PageIndexChanged += new System.Web.UI.WebControls.DataGridPageChangedEventHandler(this.Grid1_PageIndexChanged);

		}
		#endregion


		protected void Button1_Click(object sender, System.EventArgs e)
		{
			TextBox1.Text="10";
			showdata("10",TextBox2.Text);
			Button1.Font.Bold=true;
			Button2.Font.Bold=false;
			Button3.Font.Bold=false;
		}
		private void showdata(string _if,string _grade)
		{
			string _sql;
            string gradestring;
            if (_grade ==null || _grade=="") gradestring = "";
            else gradestring = " and grade=" + _grade;
			if(_if=="10")
				_sql="select * from problems where sh='0'"+gradestring+" order by sj desc";
			else
                _sql = "select * from problems where sh='0'" + gradestring + " and state='" + _if + "' order by sj desc";
			OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
			OleDbDataAdapter mydata=new OleDbDataAdapter(_sql,conn);
			DataSet ds=new DataSet();
			mydata.Fill(ds,"problems1");
			_count.Text=ds.Tables["problems1"].Rows.Count.ToString();
			Grid1.DataSource=ds.Tables["problems1"];
			Grid1.DataBind();
		}

		protected void Button2_Click(object sender, System.EventArgs e)
		{
			TextBox1.Text="1";
            showdata("1", TextBox2.Text);
			Button1.Font.Bold=false;
			Button2.Font.Bold=true;
			Button3.Font.Bold=false;
		}

		protected void Button3_Click(object sender, System.EventArgs e)
		{
			TextBox1.Text="0";
            showdata("0", TextBox2.Text);
			Button1.Font.Bold=false;
			Button2.Font.Bold=false;
			Button3.Font.Bold=true;
		}

		private void Grid1_PageIndexChanged(object source, System.Web.UI.WebControls.DataGridPageChangedEventArgs e)
		{
			Grid1.CurrentPageIndex=e.NewPageIndex;
            showdata(TextBox1.Text, TextBox2.Text);
		}
	}
}
