using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net.Mail;
using System.Data.OleDb;

public partial class forgetpw : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        
      
    }

   
    protected void Button1_Click(object sender, EventArgs e)

    {
        if (!RegularExpressionValidator1.IsValid)
        { this.RegisterClientScriptBlock("tz1", "<script>window.alert('用户名只能是3-20个字母、数字或下划线！')</script>"); }
        else
        {
            Button1.Enabled = false;
            string em=logic.isPasswordEmail(TextBox1.Text.Trim());
            if (em != "0") Label1.Text = "密码重置邮件已经发送到您的邮箱("+em+")，请尽快查收。";
            else Label1.Text = "没有这个用户，你可注册后登录。"; 
            
        }
    }
}