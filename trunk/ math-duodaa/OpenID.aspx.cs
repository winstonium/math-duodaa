using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;
using System.Web.Script.Serialization;


public partial class OpenID : System.Web.UI.Page
{
    public string authenticationUrl;
    public class user 
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
       


        if (Request.QueryString["oauth_vericode"] != null)
        {

            var requestTokenKey = Session["requesttokenkey"].ToString();

            var requestTokenSecret = Session["requesttokensecret"].ToString();

            var verifier = Request.QueryString["oauth_vericode"];

            string key = ConfigurationManager.AppSettings["QQ_AppID"];

            string secret = ConfigurationManager.AppSettings["QQ_Key"];

            QzoneSDK.Qzone qzone = new QzoneSDK.Qzone(key, secret, requestTokenKey, requestTokenSecret, verifier,false,"");

            string currentUser = qzone.GetCurrentUser();

         

            JavaScriptSerializer json =new JavaScriptSerializer();

            user qq_userinfo = json.Deserialize<user>(currentUser);

            Label3.Text = "<br />";
            Label3.Text += qq_userinfo.ret;
            Label3.Text += "<br />";
            Label3.Text += qq_userinfo.msg ;
            Label3.Text += "<br />";
            Label3.Text += qq_userinfo.nickname+"<<<<<<<你是"+qq_userinfo.gender+"的" ;
            Label3.Text += "<br />";
            Label3.Text +="<img src="+qq_userinfo.figureurl+" />" ;
            Label3.Text += "<br />";
            Label3.Text += "<img src=" + qq_userinfo.figureurl_1 + " />";
            Label3.Text += "<br />";
            Label3.Text += "<img src=" + qq_userinfo.figureurl_2 + " />";




            
        }


    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string qqAppID = ConfigurationManager.AppSettings["QQ_AppID"];
        string qqKey = ConfigurationManager.AppSettings["QQ_Key"];
        string callBackUrl = "http://duodaa.com/openid.aspx";

        var context = new QzoneSDK.Context.QzoneContext(qqAppID, qqKey);
        var requestToken = context.GetRequestToken(callBackUrl);

        Session["requesttokenkey"] = requestToken.TokenKey.ToString();
        Session["requesttokensecret"] = requestToken.TokenSecret.ToString();
        authenticationUrl = context.GetAuthorizationUrl(requestToken, callBackUrl);
        
        Response.Redirect(authenticationUrl);
    }
}