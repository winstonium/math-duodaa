using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Xml;
using System.Text.RegularExpressions;

public partial class anounce : System.Web.UI.Page
{
    public string anounceid,anouncetitle,anouncecontent;

    protected void Page_Load(object sender, EventArgs e)
    {
        
        anounceid = Request.QueryString["id"];
        if (anounceid == null) anounceid = "0";
        if (!Regex.IsMatch(anounceid, @"\d")) anounceid = "0";




        if (anounceid != "0")
        {
            XmlDocument XmlAnounce = new XmlDocument();
            XmlAnounce.Load(HttpContext.Current.Server.MapPath("~/xml/AnounceLinks.xml"));
            XmlNodeList XmlAnouceList = XmlAnounce.SelectNodes("links/linkinfo");

            anouncetitle = XmlAnouceList[int.Parse(anounceid)-1].SelectSingleNode("title").InnerText;
            anouncecontent = XmlAnouceList[int.Parse(anounceid) - 1].SelectSingleNode("content").InnerText;


        }
        else
        {
            anouncetitle = "无此公告";
            anouncecontent = "你查看的公告是不存在的。";
        }
    }
}