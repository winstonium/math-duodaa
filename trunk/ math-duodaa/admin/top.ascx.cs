namespace zhidao.admin
{
	using System;
	using System.Data;
	using System.Drawing;
	using System.Web;
	using System.Web.UI.WebControls;
	using System.Web.UI.HtmlControls;

	/// <summary>
	///		top 的摘要说明。
	/// </summary>
	public partial class top : System.Web.UI.UserControl
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
		///		设计器支持所需的方法 - 不要使用代码编辑器
		///		修改此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{

		}
		#endregion

		protected void Button1_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("userlist.aspx");
		}

		protected void Button2_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("problems.aspx");
		}

		protected void Button3_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("audit.aspx");
		}

		protected void Button4_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("index.aspx");
		}

		protected void Button5_Click(object sender, System.EventArgs e)
		{
			Session["adminlogin"]="0";
			Response.Redirect("../index.aspx");
		}
	}
}
