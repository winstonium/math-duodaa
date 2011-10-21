using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;


public partial class errorpages_Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
       
        if (!IsPostBack) 
        {
            string errorid = Request.QueryString["e"];
            string errorContent="";
            
            if(errorid=="1")
            {
                errorContent="提交问题失败，可能由以下原因导致：<br />";
                errorContent+="1、 你的浏览器不支持或者禁用了cookies。<br />";
                errorContent+="2、 你提交问题的频率过快。我们建议您，对自己的问题多多思考后，再提交问题。<br />";
                errorContent+="3、 网络的其它异常。<br />";
                errorContent += "<br>3秒后自动返回首页...<br />";

            Label1.Text=errorContent;
            }

            else if (errorid == "2")
            {
                errorContent = "提交问题失败，可能由以下原因导致：<br />";
                errorContent += "1、 你的浏览器不支持或者禁用了cookies。<br />";
                errorContent += "2、 你有自问自答的行为。这是哆嗒网所不允许的。<br />";
                errorContent += "3、 网络的其它异常。<br />";
                errorContent += "<br>3秒后自动返回首页...<br />";

                Label1.Text = errorContent;
            }
            else
            {
                Label1.Text="<br>3秒后自动返回首页...<br />";
            }


            ;

        }
    }
}