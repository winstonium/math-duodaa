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

/// <summary>
///PrizeContent 的摘要说明
/// </summary>
public class PrizeContent
{


    private string PrizeContentXmlPath = @"app_data\xml\prize\PrizeContent.xml";

    private string PrizeID;

    public string PrizeName;

    public string PrizeStock;

    public string PrizeAmount;

    public string PrizeUnit;

    public string PrizePrice;
    
    public string PrizeDetail;
    
    public string PrizeDetailReg;

    
    public PrizeContent(string PrID)
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
        DataSet ds = new DataSet();
        ds.ReadXml(HttpContext.Current.Server.MapPath("~") + PrizeContentXmlPath);
        
        DataTable dt = ds.Tables["prizeinfo"];
        DataRow[] drow = dt.Select("PrizeID='"+PrID+"'");

        this.PrizeName = drow[0]["PrizeName"].ToString();
        this.PrizeStock = drow[0]["PrizeStock"].ToString();
        this.PrizeAmount = drow[0]["PrizeAmount"].ToString();
        this.PrizeUnit = drow[0]["PrizeUnit"].ToString();
        this.PrizePrice = drow[0]["PrizePrice"].ToString();
        this.PrizeDetail = drow[0]["PrizeDetail"].ToString();
        this.PrizeDetailReg = drow[0]["PrizeDetailReg"].ToString();

        
	}

/*
    private bool isExchagable(string userid)
    {
        int Max = 1;  //设置时间段内兑换上限
        int ApplyInterval = 15; // 设置时间段长度，以天为单位
        string _sql = "select top @Max count(*) from PrizeExchange where Prize_userid=@userid and Prize_ApplyTime>@time ";

        OleDbConnection conn = new OleDbConnection();
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        cmd.Parameters.AddWithValue("@Max", Max);
        cmd.Parameters.AddWithValue("@userid", userid);
        cmd.Parameters.AddWithValue("@time", DateTime.Now.AddDays(-ApplyInterval));

        OleDbDataReader r1 = cmd.ExecuteReader();
        r1.Read();
        if (int.Parse(r1[0].ToString()) == Max)
        {
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return true;
        }
        else
        {
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return false;
        }    
    }

    public int SaveData(string userid, int subAmount)
    {
        if(!isExchagable(userid))
        {
            return 0; //基限未到不能兑换
        }
        else if(logic.isGoldEnough( Int32.Parse( userid),Int32.Parse(this.PrizeInfo["PrizePrice"]))!=0)
        {
            return -1; //金币不够不能兑换
        
        }
        else
        {
        string _sql = "insert into PrizeExchange(Prize_userid,Prize_username,Prize_Class,Prize_Amount,Prize_Content,Prize_ApplyTime,Prize_isValid,Prize_isGiveOut)";
        _sql += " values(@userid,@username,@class,@amount,@content,@applytime,@isvalid,@isgiveout)";
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        cmd.Parameters.AddWithValue("@userid", userid);
        cmd.Parameters.AddWithValue("@username", GetInfo.getUsernameFromID(int.Parse(userid)));
        cmd.Parameters.AddWithValue("@class", this.PrizeInfo["PrizeName"]);
        cmd.Parameters.AddWithValue("@amount", subAmount);
        cmd.Parameters.AddWithValue("@content", this.PrizeInfo["PrizeDetail"] + this.PrizeInfo["PrizeDetailContent"]);
        cmd.Parameters.AddWithValue("@applytime", DateTime.Now);
        cmd.Parameters.AddWithValue("@isvalid", 0);
        cmd.Parameters.AddWithValue("@isgiveout", 0);

        cmd.ExecuteNonQuery();
        conn.Close();
        conn.Dispose();

        AddValue.addGold("",-Int32.Parse( userid),Int32.Parse(this.PrizeInfo["PrizePrice"])); //扣金币

        return 1; //兑换成功
        }
    }

 */ 


}