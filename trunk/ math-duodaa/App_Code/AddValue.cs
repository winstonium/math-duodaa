using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.OleDb;

/// <summary>
///AddValue 的摘要说明
/// </summary>
public class AddValue
{
    public AddValue()
    {
        //
        //TODO: 在此处添加构造函数逻辑
        //
    }

    public static int addPoint(string username, int userid, int vPoint) //加积分
    {
        string uName = username;
        int vP = vPoint;
        int vID = userid;
        string sql;
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();


        if (vID == 0)                 //如果参数２为０，则使用‘用户名’来查询
        {
            sql = "select * from users where username = '" + uName + "'";
            OleDbCommand cmd = new OleDbCommand(sql, conn);
            OleDbDataReader r1 = cmd.ExecuteReader();

            if (r1.Read())
            {
                string uID = r1["ID"].ToString();
                r1.Close();
                conn.Close();

                OleDbConnection conn1 = new OleDbConnection(dbConStr.dbConnStr());
                conn1.Open();

                string sql1 = "update userinformation set point = point +" + vP.ToString() + " where userid = " + uID;
                OleDbCommand cmd1 = new OleDbCommand(sql1, conn1);
                cmd1.ExecuteNonQuery();
                conn1.Close();
                return (1);  // 加完返回1

            }

            else
            {
                r1.Close();
                conn.Close();
                return (0);  //

            }
        }


        else         // 第二参数不为0则用ID来查询
        {
            sql = "select * from users where ID = " + vID.ToString();
            OleDbCommand cmd = new OleDbCommand(sql, conn);
            OleDbDataReader r1 = cmd.ExecuteReader();

            if (r1.Read())
            {
                string uID = r1["ID"].ToString();
                r1.Close();
                conn.Close();

                OleDbConnection conn1 = new OleDbConnection(dbConStr.dbConnStr());
                conn1.Open();

                string sql1 = "update userinformation set point = point +" + vP.ToString() + " where userid = " + uID;
                OleDbCommand cmd1 = new OleDbCommand(sql1, conn1);
                cmd1.ExecuteNonQuery();
                conn1.Close();
                return (1);  // 加完返回1

            }

            else
            {
                r1.Close();
                conn.Close();
                return (0);  //

            }
        }


    }


    public static int addGold(string username, int userid, int vGold) //加金币
    {
        string uName = username;
        int vG = vGold;
        int vID = userid;
        string sql;


        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();



        if (vID == 0)                 //如果参数２为０，则使用‘用户名’来查询
        {
            sql = "select * from users where username = '" + uName + "'";
            OleDbCommand cmd = new OleDbCommand(sql, conn);
            OleDbDataReader r1 = cmd.ExecuteReader();

            if (r1.Read())
            {
                string uID = r1["ID"].ToString();
                r1.Close();
                conn.Close();

                OleDbConnection conn1 = new OleDbConnection(dbConStr.dbConnStr());
                conn1.Open();

                string sql1 = "update userinformation set gold = gold +" + vG.ToString() + " where userid = " + uID;
                OleDbCommand cmd1 = new OleDbCommand(sql1, conn1);
                cmd1.ExecuteNonQuery();
                conn1.Close();
                return (1); // 加完返回1

            }

            else
            {
                r1.Close();
                conn.Close();
                return (0);

            }



        }
        else
        {
            sql = "select * from users where ID = " + vID.ToString();
            OleDbCommand cmd = new OleDbCommand(sql, conn);
            OleDbDataReader r1 = cmd.ExecuteReader();

            if (r1.Read())
            {
                string uID = r1["ID"].ToString();
                r1.Close();
                conn.Close();

                OleDbConnection conn1 = new OleDbConnection(dbConStr.dbConnStr());
                conn1.Open();

                string sql1 = "update userinformation set gold = gold +" + vG.ToString() + " where userid = " + uID;
                OleDbCommand cmd1 = new OleDbCommand(sql1, conn1);
                cmd1.ExecuteNonQuery();
                conn1.Close();
                return (1); // 加完返回1
            }

            else
            {
                r1.Close();
                conn.Close();
                return (0);

            }
        }
    }



    public static int addPrize(int problemid, int vPrize) //加问题的悬赏值
    {
        int vPr = vPrize;
        int vID = problemid ;
        string sql;

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();

        sql = "select * from problems where ID = " + vID.ToString();

        OleDbCommand cmd = new OleDbCommand(sql, conn);
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read())
        {
            r1.Close();
            conn.Close();

            OleDbConnection conn1 = new OleDbConnection(dbConStr.dbConnStr());
            conn1.Open();

            string sql1 = "update problems set prize = prize +" + vPr.ToString() + " where id = " + vID.ToString();
            OleDbCommand cmd1 = new OleDbCommand(sql1, conn1);
            cmd1.ExecuteNonQuery();
            conn1.Close();
            return (1); // 加完返回1
        }

        else
        {
            r1.Close();
            conn.Close();
            return (0);

        }

    }

    public static int addExpireTime(int _problemid, int _day, int _hour, int _minute) //增加过期时间
    { 
        string sql;
        int pid = _problemid, day = _day, hour = _hour, minute = _minute;
        DateTime date;
        

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        sql="select expiretime from problems where id=@pid";
        OleDbCommand cmd = new OleDbCommand(sql, conn);
        cmd.Parameters.Add("@pid", OleDbType.Integer);
        cmd.Parameters["@pid"].Value = pid ;
        OleDbDataReader r1=cmd.ExecuteReader();
        r1.Read();
        date =DateTime.Parse(r1["expiretime"].ToString());
        r1.Close();

        date = date.AddDays(day).AddHours(hour).AddMinutes(minute);

        sql = "update problems set expiretime=@exptime where id=@pid ";
        cmd = new OleDbCommand(sql, conn);
        cmd.Parameters.Add("@pid", OleDbType.Integer);
        cmd.Parameters.Add("@exptime", OleDbType.Date);
        cmd.Parameters["@pid"].Value = pid ;
        cmd.Parameters["@exptime"].Value = date;
        cmd.ExecuteNonQuery();

        return 1;
    }

}