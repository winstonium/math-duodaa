using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class Client_Server : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        Hello.Text += "今天是" + DateTime.Now.Year.ToString()+"年"+DateTime.Now.Month.ToString()+"月"+DateTime.Now.Day.ToString()+"日";
        
    }
}