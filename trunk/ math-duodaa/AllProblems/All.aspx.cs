using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using Wuqi.Webdiyer;
using System.Data;
using System.Data.OleDb;


public partial class AllProblems_All : System.Web.UI.Page
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
      string _sql = "select * from problems where 1=1 order by sj desc";

      OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
      OleDbDataAdapter mydata = new OleDbDataAdapter(_sql, conn);
      DataSet ds = new DataSet();
      PagedDataSource pds=new PagedDataSource();
      
      mydata.Fill(ds, "problems1");

      pds.DataSource = ds.Tables["problems1"].DefaultView;
      pager1.RecordCount = pds.Count;
      pager1.PageSize = 30;
      pds.AllowPaging = true;
      pds.PageSize = pager1.PageSize;
      pds.CurrentPageIndex = pager1.CurrentPageIndex - 1;

     
      dl1.DataSource = pds;
      
      dl1.DataBind();
      
      conn.Close();
      conn.Dispose();
    
    }
    protected void pager1_PageChanged(object sender, EventArgs e)
    {
        bind();
    }
}