using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;

public partial class test : System.Web.UI.Page
{
    string[] PrAm;
    string[] PrPc;
    string[] PrPs;

    
    
    protected void Page_Load(object sender, EventArgs e)
    {
        PrizeContent pc = new PrizeContent("2");

        string[] PrizeAmounts = pc.PrizeAmount.Split(new char[] { '|' });
        string[] PrizePrices = pc.PrizePrice.Split(new char[] { '|' });
        string[] PrizeStrocks = pc.PrizeStock.Split(new char[] { '|' });
        PrAm = PrizeAmounts;
        PrPc = PrizePrices;
        PrPs = PrizeStrocks;
        
        

      

    }
    protected void b1_Click(object sender, EventArgs e)
    {

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string _sql = "CREATE TABLE PrizeExchange(";
        _sql += "id COUNTER(1,1) PRIMARY KEY, ";
        _sql += "Prize_userid varchar(255),";
        _sql += "Prize_username varchar(255),";
        _sql += "Prize_Class varchar(255),";
        _sql += "Prize_Amount varchar(255),";
        _sql += "Prize_Content varchar(255),";
        _sql += "Prize_ApplyTime varchar(255),";
        _sql += "Prize_isValid varchar(255),";
        _sql += "Prize_isGiveOut varchar(255))";

        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        cmd.ExecuteNonQuery();
        conn.Close();
        conn.Dispose();

       



    }
 
}