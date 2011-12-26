using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;
using System.IO;
using System.Net;


public partial class download_bookview : System.Web.UI.Page
{
    public string booktitle,bookpic,bookchtitle,bookauthor,bookpub,bookurls,booktags;
   
    protected void Page_Load(object sender, EventArgs e)
    {
        if (!IsPostBack)
        {
            bind();
           
        }
    }

    protected void bind()
    {
        if (Request.QueryString["id"] == null) Response.Redirect("books.aspx");
        string id = Request.QueryString["id"].ToString().Trim();
        string xlsPath = HttpContext.Current.Server.MapPath(@"~\app_Data\Excel\books.xls");
        string connString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" + xlsPath + ";Extended Properties=Excel 8.0;";
        OleDbConnection ExcelConn = new OleDbConnection(connString);
        ExcelConn.Open();

        OleDbCommand cmd = new OleDbCommand("select * from [sheet1$] where id="+id, ExcelConn);
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read())
        {
            booktitle = r1["Title"].ToString();
            bookpic = r1["Pics"].ToString();
            bookchtitle = r1["ChineseTitle"].ToString();
            bookauthor = r1["Author"].ToString();
            bookpub = r1["Publisher"].ToString();
            bookurls = r1["Urls"].ToString();
            booktags = r1["Tags"].ToString(); ;

            ExcelConn.Close();
        }

        else{
            ExcelConn.Close();
            Response.Write("<script>window.alert('没有查找到相关资料。将返回上次页面。')</script>");
            Response.Write("<script>history.go(-1)</script>");
        
        }




        
    }

      protected string picUrl(string url)
    {
        string u = @"imgs/books/" + url;
        return File.Exists(Server.MapPath(u)) ? u : @"imgs/books/nopic.jpg";
        
    
    
    }

      public string setDownUrl(string urls)
      {
          string[] urlarr = urls.Split( '|');
          string finalUrl = "";
          int i = urlarr.Count();
          int j=0;
          for (j = 0; j < i; j++) 
          {
           finalUrl+="<span class=\"downlink\"><a href=\""+getShortenUrl(urlarr[j])+"\" target=\"_blank\" >下载地址"+(j+1).ToString()+"</a></span>";
          }
          return finalUrl;
      
      }

      protected string getShortenUrl(string url)
      {
          try
          {
              string ApiUrl = "http://api.adf.ly/api.php?key=8407e88cf121c0945714981c05c9ead0&uid=1134496&advert_type=int&domain=adf.ly&url="+url;

              WebClient wc = new WebClient();
              
              wc.Dispose();
              return wc.DownloadString(ApiUrl);
          }
          catch (Exception e)
          {
              return url;
          }
      }
}