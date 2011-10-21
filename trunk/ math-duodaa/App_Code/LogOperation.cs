using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.OleDb;

/// <summary>
///LogOperation 的摘要说明
/// </summary>
public class LogOperation
{
	public LogOperation()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}

    // 添加一个Log
    public static void AddLog(string UsernameFrom,string UsernameTo,string LogAction,int PointAdd,int GoldAdd,DateTime ActionTime,string ActionIP,string ActionCookies,string ActionMac)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string sql = "insert into UserActionLog(logUsernameFrom,logUsernameTo,logAction,logPointAdd,logGoldAdd,logActionTime,logActionIP,logActionCookies,logActionMac) ";
        sql += "values(@uFrom,@uTo,@lAction,@lPoint,@lGold,@lTime,@lIP,@lCookie,@lMac)";

        OleDbCommand cmd = new OleDbCommand(sql,conn);
        cmd.Parameters.Add("@uFrom", OleDbType.Char);
        cmd.Parameters.Add("@uTo", OleDbType.Char);
        cmd.Parameters.Add("@lAction", OleDbType.Char);
        cmd.Parameters.Add("@lPoint", OleDbType.Integer);
        cmd.Parameters.Add("@lGold", OleDbType.Integer);
        cmd.Parameters.Add("@lTime", OleDbType.Date);
        cmd.Parameters.Add("@lIP", OleDbType.Char);
        cmd.Parameters.Add("@lCookie", OleDbType.Char);
        cmd.Parameters.Add("@lMac", OleDbType.Char);

        cmd.Parameters["@uFrom"].Value = UsernameFrom.Trim();
        cmd.Parameters["@uTo"].Value = UsernameTo.Trim();
        cmd.Parameters["@lAction"].Value = LogAction.Trim();
        cmd.Parameters["@lPoint"].Value = PointAdd;
        cmd.Parameters["@lGold"].Value = GoldAdd;
        cmd.Parameters["@lTime"].Value = ActionTime;
        cmd.Parameters["@lIP"].Value = ActionIP.Trim();
        cmd.Parameters["@lCookie"].Value = ActionCookies.Trim();
        cmd.Parameters["@lMac"].Value = ActionMac.Trim();

        cmd.ExecuteNonQuery();
        conn.Close();
        conn.Dispose();
    }

    public static bool isAvailableToAskQuestion(string username,string usercookieid,string ip) 
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        bool passed=true;
        string sql = "";
        OleDbDataReader r1;
        int[] TimeInv = new int[] {30,20,10,5 }; //时间段设置，以分钟为单位
        int[] CountLim = new int[] { 6, 5, 4, 3 }; // 每个时候段的发贴上限
        int i=0; //记数器

        //and (logUsernameFrom=@uFrom or logActionCookies=@lCookie or logActionIP=@lIP)
        //logActionTime>@lTime and\
        //logAction=@lAction
        for (i = 0; i < TimeInv.Length; i++)
        {
            if (passed)
            {
                sql = "select count(*) from UserActionLog where logAction like @lAction+'%' and logActionTime>@lTime and (logUsernameFrom=@uFrom or logActionCookies=@lCookie or logActionIP=@lIP)";

                OleDbCommand cmd = new OleDbCommand(sql, conn);

                cmd.Parameters.Add("@lAction", OleDbType.Char);
                cmd.Parameters.Add("@lTime", OleDbType.Date);
                cmd.Parameters.Add("@uFrom", OleDbType.Char);
                cmd.Parameters.Add("@lCookie", OleDbType.Char);
                cmd.Parameters.Add("@lIP", OleDbType.Char);

                cmd.Parameters["@lAction"].Value = GetConstant.LogType[0];           //提问的标识了符串
                cmd.Parameters["@lTime"].Value = DateTime.Now.AddMinutes(-TimeInv[i]);
                cmd.Parameters["@uFrom"].Value = username;
                cmd.Parameters["@lCookie"].Value = usercookieid;
                cmd.Parameters["@lIP"].Value = ip;


                r1 = cmd.ExecuteReader();
                if (r1.Read())
                {
                    if (Int32.Parse(r1[0].ToString()) >= CountLim[i]) passed = false;
                }
            }
            else
            {
                break;
            }

        }

        return passed; 
    }

    public static bool isAvailableToAnswerQuestion(string username, string usercookieid, string ip,string pid)
    {

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
      
        string sql = "select id from UserActionLog where logAction=@lAction and (logUsernameFrom=@uFrom or logActionCookies=@lCookie or logActionIP=@lIP)";
        OleDbCommand cmd = new OleDbCommand(sql, conn);

        cmd.Parameters.Add("@lAction", OleDbType.Char);
        cmd.Parameters.Add("@uFrom", OleDbType.Char);
        cmd.Parameters.Add("@lCookie", OleDbType.Char);
        cmd.Parameters.Add("@lIP", OleDbType.Char);

        cmd.Parameters["@lAction"].Value = GetConstant.LogType[0]+pid;  //提问的标识了符串
        cmd.Parameters["@uFrom"].Value = username;
        cmd.Parameters["@lCookie"].Value = usercookieid;
        cmd.Parameters["@lIP"].Value = ip;

        OleDbDataReader r1=cmd.ExecuteReader();

        if (r1.Read()) return false;
        else return true;
        
         
    
    }

    public static bool isAvailableToGiveAnswerPrize(string username)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();

        string sql = "select count(*) from UserActionLog where logAction=@lAction and logUsernameTo=@uTo ";
        OleDbCommand cmd = new OleDbCommand(sql, conn);

        cmd.Parameters.Add("@lAction", OleDbType.Char);
        cmd.Parameters.Add("@uTo", OleDbType.Char);
        
        cmd.Parameters["@lAction"].Value = GetConstant.LogType[8];  //回答的标识的符串
        cmd.Parameters["@uTo"].Value = username;
        OleDbDataReader r1 = cmd.ExecuteReader();
        r1.Read();

        if (Int32.Parse(r1[0].ToString()) >= 10) return false;   //大于10次，就不能再加分了
        else return true;
    }

}