namespace zhidao.Control
{
	using System;
	using System.Data;
	using System.Drawing;
	using System.Web;
	using System.Web.UI.WebControls;
	using System.Web.UI.HtmlControls;
	using System.Data.OleDb;
    

	/// <summary>
	///		Login 的摘要说明。
	/// </summary>
	public partial class Login : System.Web.UI.UserControl
	{
		protected System.Web.UI.WebControls.Label labexit;

		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
            
            TABLE1.Attributes.Add("onkeydown", "if(event.which || event.keyCode){   if ((event.which == 13) || (event.keyCode == 13)) {   document.getElementById('" + Button1.UniqueID + "').click();return false;}}    else {return true}; ");  
            
			if(Session["userlogin"].ToString()=="0")
			{
				TABLE1.Visible=true;
				Table2.Visible=false;
			}
			else
			{
				OleDbConnection conn=new OleDbConnection(dbConStr.dbConnStr());
				conn.Open();
				OleDbCommand cmd=new OleDbCommand("select a.username,b.tw,b.hd,b.dd,b.point,b.gold from users a,userinformation b where a.id=b.userid and a.id=@id",conn);
				cmd.Parameters.Add("@id",OleDbType.Integer);
				cmd.Parameters["@id"].Value=Session["userid"].ToString();
				OleDbDataReader r1=cmd.ExecuteReader();
				if(r1.Read())
				{
					zh.Text=r1["username"].ToString();
					tw.Text=r1["tw"].ToString();
					hd.Text=r1["hd"].ToString();
					dd.Text=r1["dd"].ToString();
                    point.Text = r1["point"].ToString();
                    gold.Text = r1["gold"].ToString() + "<img src='images/gold_0.gif'/>";

				}
				r1.Close();
				conn.Close();
				TABLE1.Visible=false;
				Table2.Visible=true;
			}

		}

		#region Web 窗体设计器生成的代码
		override protected void OnInit(EventArgs e)
		{
			//
			// CODEGEN: 该调用是 ASP.NET Web 窗体设计器所必需的。
			//
			InitializeComponent();
			base.OnInit(e);
		}
		
		/// <summary>
		///		设计器支持所需的方法 - 不要使用代码编辑器
		///		修改此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{

		}
		#endregion

		protected void Button2_Click(object sender, System.EventArgs e)
		{
			Response.Redirect("Register.aspx");
		}

		protected void Button1_Click(object sender, System.EventArgs e)
		{
            if (username.Text == "" || password1.Text == "")
                Response.Write("<script>window.alert('请输入完整。谢谢！')</script>");
            else if (RegularExpressionValidator1.IsValid == false)
            { Response.Write("<script>window.alert('用户名输入有误')</script>"); }
            else if (RegularExpressionValidator2.IsValid == false)
            { Response.Write("<script>window.alert('密码输入有误')</script>"); }
            else if (Session["checkcode"].ToString().ToLower() != checkcode.Text.ToLower().Trim())
                {
                    Response.Write("<script>window.alert('验证码输入错误！若反复出错，请点击验证码图片换几张图再试。谢谢！')</script>");

                }
         
                
            else
                {
                    OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                    conn.Open();
                    OleDbCommand cmd = new OleDbCommand("select id from users where username=@u and password1=@p", conn);
                    cmd.Parameters.Add("@u", OleDbType.Char, 20);
                    cmd.Parameters.Add("@p", OleDbType.Char, 20);
                    cmd.Parameters["@u"].Value = username.Text;
                    cmd.Parameters["@p"].Value = password1.Text;
                    OleDbDataReader r1 = cmd.ExecuteReader();
                    if (r1.Read())
                    {
                        Session["userlogin"] = "1";
                        Session["userid"] = r1["id"].ToString();

                        System.Web.HttpCookie newcookie;

                            newcookie = new HttpCookie("userinfo");
                            newcookie.Values["userid"] = r1["id"].ToString();
                            newcookie.Values["psw"] = password1.Text;
                           
                            if (Request.Cookies["userinfo"] == null) newcookie.Values["usercookieid"] = r1["id"].ToString();
                            else newcookie.Values["usercookieid"] = ((Request.Cookies["userinfo"].Values["usercookieid"] == null || Request.Cookies["userinfo"].Values["usercookieid"].Trim() == "") ? r1["id"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"]);
                            //||Request.Cookies["userinfo"].Values["usercookieid"].Trim()==""
                           
                            newcookie.Expires = DateTime.Now.AddYears(30);
                            Response.AppendCookie(newcookie);
                      
                        r1.Close();
                        conn.Close();
                        Response.Redirect(Request.RawUrl);

                    }
                    else
                    {
                        r1.Close();
                        conn.Close();
                        Response.Write("<script>window.alert('用户名或密码错误。')</script>");
                    }
                }
            
		}

		protected void Button3_Click(object sender, System.EventArgs e)
		{
            string cookieid = Request.Cookies["userinfo"].Values["usercookieid"];
           // string cookieid1 = Request.Cookies["userinfo"].Values["userid"];
            //Response.Write("<script>window.alert('"+cookieid1+"')</script>");
            Session["userlogin"]="0";
			Session["userid"]="0";
            System.Web.HttpCookie newcookie;
            newcookie = new HttpCookie("userinfo");
            newcookie.Values["userid"] = "0";
            newcookie.Values["psw"] = "0";
            newcookie.Values["usercookieid"] = cookieid;
            newcookie.Expires = DateTime.Now.AddYears(30);
            Response.AppendCookie(newcookie);
            Response.Redirect(Request.RawUrl);
		}

	}
}
