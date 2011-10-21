using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

/// <summary>
///dbConStr 的摘要说明
/// </summary>
public class dbConStr
{
	public  dbConStr()
    {
    }

    public static string dbConnStr()
    {
        string strconn = System.Configuration.ConfigurationManager.AppSettings["ConStr"];
        string path = System.Configuration.ConfigurationManager.AppSettings["dbPath"];
        strconn += HttpContext.Current.Server.MapPath("~");
        strconn += path;
        strconn += ";Jet OLEDB:Database Password=" + System.Configuration.ConfigurationManager.AppSettings["AccessDbPassword"] + ";";
        return(strconn);
    }

}
