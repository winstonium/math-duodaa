using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

public partial class addtest : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (dbOperation.addCharColumn("userinformation", "QQ", "0") == 1) Label1.Text = "添加成功!";
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        if (dbOperation.dropColumn("userinformation", "QQ") == 1) Label1.Text = "删除成功!";
    }
}