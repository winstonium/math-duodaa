using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.ComponentModel;
using System.Security.Permissions;
using System.Data;
using System.Data.OleDb;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;


public partial class download_Default : System.Web.UI.Page
{  

    protected void Page_Load(object sender, EventArgs e)
    {
        SetTableShow("books");
    }

    protected void SetTableShow(string classname)
    //classname指显示表的大类，比如是books,还是notes.同时也关联了excel的文件名和表名
    {
        string xlsPath = HttpContext.Current.Server.MapPath(@"~\app_Data\Excel\") + classname + ".xls";
        string connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" + xlsPath + ";Extended Properties=Excel 8.0;";
        DataSet ds = new DataSet();

        OleDbConnection ExcelConn = new OleDbConnection(connString);
        ExcelConn.Open();
        OleDbDataAdapter mydata = new OleDbDataAdapter("select top 9 * from [sheet1$] order by id desc", ExcelConn);
        mydata.Fill(ds,"class1");
        class1.DataSource = ds.Tables["class1"];
        class1.DataBind();

        mydata.Dispose();
        ExcelConn.Close();
        ExcelConn.Dispose();


    }
}