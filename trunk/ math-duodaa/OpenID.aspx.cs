using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Configuration;

public partial class OpenID : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        string qqAppID=ConfigurationManager.AppSettings["QQ_AppID"];
        string qqKey=ConfigurationManager.AppSettings["QQ_Key"];
        string callBackUrl = "http://duodaa.com/openid.aspx";

        var context = new QzoneSDK.Context.QzoneContext(qqAppID, qqKey);
        var requestToken = context.GetRequestToken(callBackUrl);

        Label1.Text += requestToken.TokenKey.ToString() ;
        Label2.Text += requestToken.TokenSecret.ToString();

        Session["requesttokenkey"] = requestToken.TokenKey.ToString();
        Session["requesttokensecret"] = requestToken.TokenSecret.ToString();

        var authenticationUrl = context.GetAuthorizationUrl(requestToken, callBackUrl);
               
        //Response.Redirect(authenticationUrl);



        if (Request.QueryString["oauth_vericode"] != null)
        {

            var requestTokenKey = Session["requesttokenkey"].ToString();

            var requestTokenSecret = Session["requesttokensecret"].ToString();

            var verifier = Request.QueryString["oauth_vericode"];

            string key = ConfigurationManager.AppSettings["ConsumerKey"];

            string secret = ConfigurationManager.AppSettings["ConsumerSecret"];

            QzoneSDK.Qzone qzone = new QzoneSDK.Qzone(key, secret, requestTokenKey, requestTokenSecret, verifier);

            //这里需要将qzone.OAuthTokenKey, qzone.OAuthTokenSecret, qzone.OpenID 存储起来用于后面的API的访问

            QzoneSDK.Qzone qzone2 = new QzoneSDK.Qzone(key, secret, qzone.OAuthTokenKey, qzone.OAuthTokenSecret, string.Empty, true, qzone.OpenID);

            Session["qzonesdk"] = qzone2;

            qzone2 = Session["qzonesdk"] as QzoneSDK.Qzone;

            var currentUser = qzone2.GetCurrentUser();

            var user = (BasicProfile)JsonConvert.Import(typeof(BasicProfile), currentUser);

            if (null != user)
            {

                this.Nickname.Text = user.Nickname;
                

                this.Figureurl.Text = user.Figureurl;

            }

        }


    }
}