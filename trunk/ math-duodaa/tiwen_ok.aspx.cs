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

namespace zhidao
{
	

	/// <summary>
	/// tiwen_ok 的摘要说明。
	/// </summary>
	public partial class tiwen_ok : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			string _state=Request.QueryString["state"];
            string _pid=Request.QueryString["pid"];

            if (_state == "0")
            {
                Label1.Text = "提交问题成功。";
                Hyperlink2.NavigateUrl = "view_" + _pid+".html";
                Hyperlink1.NavigateUrl = "default.aspx" ;

            }
            else if (_state == "1")
                Label1.Text = "提交问题成功，但须经管理人员审核后才能显示。";
            else
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
	}
}
