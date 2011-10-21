using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Data.OleDb;

/// <summary>
///Class1 的摘要说明
/// </summary>
public class autoExecute
{
	public autoExecute()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}

    public static int abc = 0;

   
    
    public static void setExpireState() //将过期问题的state设为2
    {
        
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        try
        {
            OleDbCommand cmd = new OleDbCommand("update problems set state='2' where expiretime < @date and state='0'", conn);
            cmd.Parameters.Add("@date", OleDbType.Date);
            cmd.Parameters["@date"].Value = DateTime.Now;
            cmd.ExecuteNonQuery();
            
        }
        catch (Exception)
        {
            throw;
        }
        finally
        {
            
            conn.Close();
            
            
        }

        

    }

    
}