using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.OleDb;

/// <summary>
///dbOperation 的摘要说明
/// </summary>
public class dbOperation
{
	public dbOperation()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}

     public static int dropColumn(string tableName,string columnName) //删掉一列

    {
    string tName = tableName;
        string cName = columnName;

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string sql = "alter table " + tName + " drop " + cName;
       
         OleDbCommand cmd = new OleDbCommand(sql, conn);
        cmd.ExecuteNonQuery();

        conn.Close();
        conn.Dispose();
        return 1;
}


    public static int addCharColumn(string tableName,string columnName,string defaultValue) //为表增加一个字段，字符型
    {
        string tName = tableName;
        string cName = columnName;
        string dValue = defaultValue;
    

       

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();

        string sql = "alter table " + tName + " add column " + cName + " char" ;

        

        OleDbCommand cmd = new OleDbCommand(sql, conn);
        cmd.ExecuteNonQuery();
        if (dValue != "") 
        {
        cmd=new OleDbCommand("update "+ tName + " set "+ cName +" ='"+dValue +"' where 1=1",conn);
        cmd.ExecuteNonQuery();
        }

        conn.Close();
        conn.Dispose();

        return 1;

    }
}