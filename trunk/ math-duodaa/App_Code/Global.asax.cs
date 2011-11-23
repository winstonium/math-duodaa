using System;
using System.Collections;
using System.ComponentModel;
using System.Web;
using System.Web.SessionState;
using System.Timers;
using System.Net;
using System.IO;
using System.Threading;
using System.Data;
using System.Data.OleDb;
using System.Timers;


namespace zhidao 
{
	/// <summary>
	/// Global 的摘要说明。
	/// </summary>
	public class Global : System.Web.HttpApplication
	{
		/// <summary>
		/// 必需的设计器变量。
		/// </summary>
		private System.ComponentModel.IContainer components = null;

		public Global()
		{
			InitializeComponent();
		}	
		
		protected void Application_Start(Object sender, EventArgs e)
		{
			Application["CnWebName"]=System.Configuration.ConfigurationManager.AppSettings["CnWebName"];
            Application["Description"] = System.Configuration.ConfigurationManager.AppSettings["Description"];
            Application["Keywords"] = System.Configuration.ConfigurationManager.AppSettings["Keywords"];

            //执行过期时间的的设置
           //  autoExecute.setExpireState();
           // System.Timers.Timer setExprireStageTimer =new System.Timers.Timer(15000);
           // setExprireStageTimer.Elapsed += new ElapsedEventHandler(setExprireStageTimer_Elapsed);

		}


 
		protected void Session_Start(Object sender, EventArgs e)
		{

           
            if (Request.Cookies["userinfo"]!=null )
            {
                HttpCookie newcookie = Request.Cookies["userinfo"];

                if (newcookie.Values["userid"] != null)//查找cookies，如果cookies存在，就登录
                {
                    int cookieuserid =(newcookie.Values["userid"]!=null?Int32.Parse(newcookie.Values["userid"]):0);
                    string cookiepsw=(newcookie.Values["psw"]!=null?newcookie.Values["psw"]:"0");

                    bool isLogOn = logic.isLogOnByID(cookieuserid, cookiepsw);
                    if (isLogOn==true)
                    {
                        Session["userlogin"] = "1";
                        Session["userid"] = newcookie.Values["userid"].ToString();
                        if (Request.Cookies["userinfo"].Values["usercookieid"] == null)
                        {
                            newcookie.Values["usercookieid"] = newcookie.Values["userid"].ToString();
                            Response.AppendCookie(newcookie);
                        }
                    }
                    else
                    {
                        Session["userlogin"] = "0";
                        Session["userid"] = "0";
                    }
                }
               
                else
                {
                    Session["userlogin"] = "0";
                    Session["userid"] = "0";
                }
            }
            else 
            {
                Session["userlogin"] = "0";
                Session["userid"] = "0";
            }

            
            Session["adminlogin"] = "0";

		}

		protected void Application_BeginRequest(Object sender, EventArgs e)
		{
            
           
		}

		protected void Application_EndRequest(Object sender, EventArgs e)
		{


             
		}

		protected void Application_AuthenticateRequest(Object sender, EventArgs e)
		{

		}

		protected void Application_Error(Object sender, EventArgs e)
		{
            
		}

		protected void Session_End(Object sender, EventArgs e)
		{


		}

		protected void Application_End(Object sender, EventArgs e)
		{

            
		}

        //定时执行的作业

        void setExprireStageTimer_Elapsed(object sender, ElapsedEventArgs e) 
        {
            autoExecute.setExpireState();
        }
      

           
        

		#region Web 窗体设计器生成的代码
		/// <summary>
		/// 设计器支持所需的方法 - 不要使用代码编辑器修改
		/// 此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{    
			this.components = new System.ComponentModel.Container();
		}
		#endregion
	}
}

