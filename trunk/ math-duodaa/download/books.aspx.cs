using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;
using System.Data;

public partial class download_books : System.Web.UI.Page
{
    
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            bind();
        }
    }

    protected void bind() 
    {

        string xlsPath = HttpContext.Current.Server.MapPath(@"~\app_Data\Excel\books.xls") ;
        string connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" + xlsPath + ";Extended Properties=Excel 8.0;";
        DataSet ds = new DataSet();
        PagedDataSource pds = new PagedDataSource();

        OleDbConnection ExcelConn = new OleDbConnection(connString);
        ExcelConn.Open();
        OleDbDataAdapter mydata = new OleDbDataAdapter("select * from [sheet1$] order by id desc", ExcelConn);
        mydata.Fill(ds, "allbooks");

        pds.DataSource = ds.Tables["allbooks"].DefaultView;
        pager1.RecordCount = pds.Count;
        pager1.PageSize = 10;
        pds.AllowPaging = true;
        pds.PageSize = pager1.PageSize;
        pds.CurrentPageIndex = pager1.CurrentPageIndex - 1;


        dl1.DataSource = pds;

        dl1.DataBind();

        mydata.Dispose();
        ExcelConn.Close();
        ExcelConn.Dispose();
    }


    protected void pager1_PageChanged(object sender, EventArgs e)
    {
        bind();
    }
}