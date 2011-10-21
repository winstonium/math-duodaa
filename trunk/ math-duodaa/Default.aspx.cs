using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Collections.Specialized;
using System.Text.RegularExpressions;
using System.Net;
using System.Data.OleDb;
using System.Data;

public partial class Default : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        setLatestQuestion();
        setAnounce();
        setPromotion();
    }

    protected void setLatestQuestion()
    {
               
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string _sql = "select top 10 id,caption,prize,answer,grade from problems where sh='0' order by state,prize desc,sj desc";
        OleDbDataAdapter mydata;
        DataSet ds = new DataSet();

        mydata = new OleDbDataAdapter(_sql, conn);
        mydata.Fill(ds, "Latestq");
        LatestQuestion.DataSource = ds.Tables["Latestq"];
        LatestQuestion.DataBind();

       _sql = "select top 10 id,caption,grade from problems where sh='0' and state='1' order by sj desc";
       DataSet ds1 = new DataSet();
       mydata = new OleDbDataAdapter(_sql, conn);
       mydata.Fill(ds1, "Latesta");
       LatestDone.DataSource = ds1.Tables["Latesta"];
       LatestDone.DataBind();
        
        
        conn.Close();
        conn.Dispose();
    }

    protected void setAnounce()
    {
        DataSet ds = new DataSet();
        ds.ReadXml(Server.MapPath(@"\xml\AnounceLinks.xml"));

        
        anouncelist.DataSource = ds.Tables["linkinfo"].DefaultView;
        anouncelist.DataBind();
    }

    protected void setPromotion()
    {
        DataSet ds = new DataSet();
        ds.ReadXml(Server.MapPath(@"\xml\Promotionlinks.xml"));

        promotionlist.DataSource = ds.Tables["linkinfo"].DefaultView;
        promotionlist.DataBind();
    
    }

    protected string prizeshow(string prize)
    {
        if (prize == "0") return "";
        else return "<img src='images/diamond.gif' alt='悬赏' /><small>" + prize + "</small>&nbsp;";

    }

    protected string titleshow(string title)
    {
        if (title.Length > 18) return title.Substring(0, 17) + "...";
        else return title;

    }
}