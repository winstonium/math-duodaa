using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Diagnostics;
using System.Text.RegularExpressions;
using System.Web.SessionState;
using System.Data.OleDb;
/// <summary>
///GetInfo 的摘要说明
/// </summary>
public class GetInfo
{
    public GetInfo()
    {
        //
        //TODO: 在此处添加构造函数逻辑
        //
    }

    //获取客户端IP
    public static string getClientIpAddress()
    {
        string ip = HttpContext.Current.Request.ServerVariables["HTTP_X_FORWORDED_FOR"];
        if (ip == null || ip == string.Empty)
        {
            ip = HttpContext.Current.Request.ServerVariables["REMOTE_ADDR"];

        }
        if (ip == null || ip == string.Empty)
        {
            ip = HttpContext.Current.Request.UserHostAddress;

        }

        return ip;
    }

    public static int getIdFromUsername(string username)
    {
        int Uid = 0;
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string sql = "select id from users where username = @uName";
        OleDbCommand cmd = new OleDbCommand(sql, conn);
        cmd.Parameters.Add("@uName", OleDbType.Char);
        cmd.Parameters["@uName"].Value = username;
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read()) Uid = Int32.Parse(r1["id"].ToString());

        r1.Close();
        r1.Dispose();
        conn.Close();
        conn.Dispose();


        return Uid;
        
         
    }

    public static string getUsernameFromID(int Uid )
    {
        string uName = "0";
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string sql = "select username from users where id = @uid";
        OleDbCommand cmd = new OleDbCommand(sql, conn);
        cmd.Parameters.Add("@uid", OleDbType.Integer);
        cmd.Parameters["@uid"].Value = Uid;
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read()) uName = r1["username"].ToString();

        r1.Close();
        r1.Dispose();
        conn.Close();
        conn.Dispose();


        return uName;


    }

    public static string getLatestQuestionID()
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd1 = new OleDbCommand("select top 1 id from problems order by sj desc", conn);
        OleDbDataReader r1 = cmd1.ExecuteReader();
        r1.Read();
        string _id = r1["id"].ToString();
        r1.Close();
        r1.Dispose();
        conn.Close();
        conn.Dispose();
        return _id;

    }

    public static string getAskerNameByPid(string pid)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbCommand cmd1 = new OleDbCommand("select userid from problems where id="+pid, conn);
        OleDbDataReader r1 = cmd1.ExecuteReader();
        if (r1.Read())
        {
            string r = r1["userid"].ToString();
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return r;
        }
        else
        {
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return ""; 
        } 

    }

    //通过问题id得到谁解决了这个问题
    public static string getAnswerDoner(string pid)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string sql = "select userid from answer where state='2' and problemsid= " + pid;
        OleDbCommand cmd = new OleDbCommand(sql, conn);
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read())
        {
            string r = r1["userid"].ToString();
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return r;
        }
        else
        {
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
            return "0";
        } 

               
    }

    //是否回答过个问题
    public static bool isAnswered(string pid, string userid)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string _sql = "select id from answer where problemsid=" + pid + "and userid=" + userid;
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        OleDbDataReader r=cmd.ExecuteReader();
        if (r.Read())
        {
            r.Close();
            r.Dispose();
            conn.Close();
            conn.Dispose();
            return true;
        }
        else
        {
            r.Close();
            r.Dispose();
            conn.Close();
            conn.Dispose();
            return false;
        }
    
    }

    //通过id得到回答内容
    public static string getAnswerContent(string pid, string userid)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string _sql = "select content from answer where problemsid=" + pid + "and userid=" + userid;
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        OleDbDataReader r = cmd.ExecuteReader();
        if (r.Read())
        {
            string content = r["content"].ToString();
            r.Close();
            r.Dispose();
            conn.Close();
            conn.Dispose();
            return content;
        }
        else
        {
            r.Close();
            r.Dispose();
            conn.Close();
            conn.Dispose();
            return "";
        }

    }

}

   