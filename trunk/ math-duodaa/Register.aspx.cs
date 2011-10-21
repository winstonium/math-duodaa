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
	/// Register 的摘要说明。
	/// </summary>
	public partial class Register : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			if(Session["userlogin"].ToString()=="0")
				Msg.Text="如果您已经是哆嗒网的注册用户，可以直接使用已有的帐号<A href='login.aspx' target=_self>登录</A>。";
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
            if (RegularExpressionValidator6.IsValid == false)
            {
                RegularExpressionValidator3.IsValid = false;
                RegularExpressionValidator3.ErrorMessage = "用户名不合要求。<br>只可输入长度3到20的字母、数字和汉字。";
            }
			if(username.Text=="" || password1.Text=="" || password2.Text=="" || email.Text=="" || qq_Account.Text=="")
			this.RegisterClientScriptBlock("tz1","<script>window.alert('请输入完整。谢谢！')</script>");
            else if (RegularExpressionValidator3.IsValid == false)
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('用户名只能是3-20个字母、数字和汉字！')</script>"); }
            else if (RegularExpressionValidator4.IsValid == false)
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('密码只能是6-20个字母或数字！')</script>"); }
            else if (CompareValidator1.IsValid == false)
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('两次密码不相同！')</script>"); }
            else if (RegularExpressionValidator5.IsValid == false)
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('无效的QQ号格式！')</script>"); }
            else if (RegularExpressionValidator1.IsValid == false)
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('无效的邮件格式！')</script>"); }
            else if (Session["checkcode"].ToString().ToLower() != checkcode.Text.ToLower().Trim())
            { this.RegisterClientScriptBlock("tz1", "<script>window.alert('验证码不正确！')</script>"); }
            else
            {
                if (xy.Checked == false)
                    this.RegisterClientScriptBlock("tz1", "<script>window.alert('您没有同意协议，不能创建用户。')</script>");
                else
                {
                    OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                    conn.Open();
                    OleDbCommand cmd = new OleDbCommand("select username from users where username=@username", conn);
                    cmd.Parameters.Add("@username", OleDbType.Char, 20);
                    cmd.Parameters["@username"].Value = username.Text.Trim();
                    OleDbDataReader r1 = cmd.ExecuteReader();
                    if (r1.Read())
                    {
                        r1.Close();
                        this.RegisterClientScriptBlock("tz1", "<script>window.alert('用户名已经存在，请重新输入一个。')</script>");
                        username.Text = "";
                    }
                    else
                    {
                        r1.Close();
                        cmd = new OleDbCommand("insert into users(username,password1) values(@username,@password)", conn);
                        cmd.Parameters.Add("@username", OleDbType.Char, 20);
                        cmd.Parameters["@username"].Value = username.Text.Trim();
                        cmd.Parameters.Add("@password", OleDbType.Char, 20);
                        cmd.Parameters["@password"].Value = password2.Text;
                        cmd.ExecuteNonQuery();
                        cmd = new OleDbCommand("select id from users where username='" + username.Text.Trim() + "'", conn);
                        r1 = cmd.ExecuteReader();
                        r1.Read();
                        string _id = r1["id"].ToString();
                        r1.Close();
                        cmd = new OleDbCommand("insert into userinformation(userid,sex,email,information,sj,lastlogindate,QQ) values(@userid,@sex,@email,@information,@sj,@lastlogindate,@qq)", conn);
                        cmd.Parameters.Add("@userid", OleDbType.Integer);
                        cmd.Parameters.Add("@sex", OleDbType.Char, 2);
                        cmd.Parameters.Add("@email", OleDbType.Char, 50);
                        cmd.Parameters.Add("@information", OleDbType.Char, 200);
                        cmd.Parameters.Add("@sj", OleDbType.Date);
                        cmd.Parameters.Add("@lastlogindate", OleDbType.Date);
                        cmd.Parameters.Add("@qq", OleDbType.Char, 20);
                        cmd.Parameters["@userid"].Value = _id;
                        cmd.Parameters["@sex"].Value = sex.SelectedValue;
                        cmd.Parameters["@email"].Value = email.Text.Trim();
                        cmd.Parameters["@information"].Value = information.Text.Trim();
                        cmd.Parameters["@sj"].Value = DateTime.Now;
                        cmd.Parameters["@lastlogindate"].Value = DateTime.Now.AddDays(-1);
                        cmd.Parameters["@qq"].Value=qq_Account.Text.Trim();
                        if (cmd.ExecuteNonQuery() == 1)
                        {
                            Session["userlogin"] = "1";
                            Session["userid"] = _id;
                            Msg.Text = "您已经成功注册，可以直接使用刚注册的帐号<A href='login.aspx' target=_self>登录</A>。";
                            this.RegisterClientScriptBlock("tz1", "<script>window.alert('注册成功。');self.location='default.aspx';</script>");
                        }
                    }
                    conn.Close();
                }
            }
		}
	}
}
