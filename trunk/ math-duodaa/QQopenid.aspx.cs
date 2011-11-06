using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Web.Script.Serialization;

public partial class QQopenid : System.Web.UI.Page
{
    public class qquser
    {
        public string ret { get; set; }

        public string msg { get; set; }

        public string nickname { get; set; }

        public string figureurl { get; set; }

        public string figureurl_1 { get; set; }

        public string figureurl_2 { get; set; }

        public string gender { get; set; }

    }
    

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Request.QueryString["qq"] != null)
        {
            try
            {
                string requestTokenKey = Session["requesttokenkey"].ToString();

                string requestTokenSecret = Session["requesttokensecret"].ToString();

                string verifier = Request.QueryString["oauth_vericode"];

                string key = ConfigurationManager.AppSettings["QQ_AppID"];

                string secret = ConfigurationManager.AppSettings["QQ_Key"];

                QzoneSDK.Qzone qzone = new QzoneSDK.Qzone(key, secret, requestTokenKey, requestTokenSecret, verifier, false, "");


                string currentUser = qzone.GetCurrentUser();


                JavaScriptSerializer json = new JavaScriptSerializer();

                qquser qq_userinfo = json.Deserialize<qquser>(currentUser);
            }
            catch (Exception)
            {
                ErrorMsg.Visible = true;
            }

        }

    }
    protected void Button1_Click(object sender, EventArgs e)
    {

    }
}