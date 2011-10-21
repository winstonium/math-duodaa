using System;
using System.Collections;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Web;
using System.Web.SessionState;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls;
using System.Data.OleDb;

namespace zhidao
{
	/// <summary>
	/// tiwen_search 的摘要说明。
	/// </summary>
	public partial class tiwen_search : System.Web.UI.Page
	{
		OleDbConnection conn;

		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			if(Session["userlogin"].ToString()=="0")
				Response.Redirect("login.aspx");

            RadioButtonList1.Items[0].Text = GetConstant.gradeClassName[1];
            RadioButtonList1.Items[1].Text = GetConstant.gradeClassName[2];
            RadioButtonList1.Items[2].Text = GetConstant.gradeClassName[3];
            RadioButtonList1.Items[3].Text = GetConstant.gradeClassName[4];
            RadioButtonList1.Items[4].Text = GetConstant.gradeClassName[5];
            RadioButtonList1.Items[5].Text = GetConstant.gradeClassName[0];
			
            
			if(!IsPostBack)
			{
				//conn=new OleDbConnection(dbConStr.dbConnStr());
				string _bt=Request.QueryString["caption"];
                //_caption.Text = _bt ;
				bt.Text=_bt;
				//OleDbDataAdapter mydata=new OleDbDataAdapter("select a.id from problems a,problemsinformation b where a.id=b.problemsid and a.state='1' and a.caption like '%"+_bt+"%'",conn);
				//DataSet ds=new DataSet();
				//mydata.Fill(ds,"tiwen1");
				//pager1.RecordCount=ds.Tables["tiwen1"].Rows.Count;
				//BindData();
			}
		}

		private void BindData()
		{
			//OleDbDataAdapter adapter=new OleDbDataAdapter("select a.id,a.caption,b.content from problems a,problemsinformation b where a.id=b.problemsid and a.state='1' and a.caption like '%"+_caption.Text+"%'",conn);
			//DataSet ds=new DataSet();
			//adapter.Fill(ds,pager1.PageSize*(pager1.CurrentPageIndex-1),pager1.PageSize,"aa");
			//data1.DataSource=ds.Tables["aa"];
			//data1.DataBind();
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
		/// 设计器支持所需的方法 - 不要使用代码编辑器修改
		/// 此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{    
			//this.pager1.PageChanged += new Wuqi.Webdiyer.PageChangedEventHandler(this.pager1_PageChanged);

		}
		#endregion

		//private void pager1_PageChanged(object src, Wuqi.Webdiyer.PageChangedEventArgs e)
		//{
		//	pager1.CurrentPageIndex=e.NewPageIndex;
		//	BindData();
		//}

		protected void Button1_Click(object sender, System.EventArgs e)
		{
            if (bt.Text.Trim() == "" || T1.Value.Trim() == "")
				this.RegisterClientScriptBlock("tz1","<script>window.alert('问题标题和问题描述必须输入。谢谢！')</script>");
            else if (RadioButtonList1.SelectedIndex < 0)
            { 
                this.RegisterClientScriptBlock("tz1", "<script>window.alert('请选择问题类别，谢谢！')</script>");
            }
            else if (RegularExpressionValidator4.IsValid == false)
            {
                this.RegisterClientScriptBlock("tz1", "<script>window.alert('悬赏额度只能输入数字，谢谢！')</script>");
            }
            else if (logic.isGoldEnough(Int32.Parse(Session["userid"].ToString()),Int32.Parse(prize.Text)) == 0)
            { 
                this.RegisterClientScriptBlock("tz1", "<script>window.alert('对不起，您的余额不足！')</script>"); 
            }
            else
            {
               
                conn = new OleDbConnection(dbConStr.dbConnStr());
                conn.Open();
                OleDbCommand cmd = new OleDbCommand("select syssh from sys", conn);
                OleDbDataReader r1 = cmd.ExecuteReader();
                r1.Read();
                if (r1["syssh"].ToString() == "0")
                {
                    r1.Close();
                    if(LogOperation.isAvailableToAskQuestion( GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString())),Request.Cookies["userinfo"].Values["usercookieid"].ToString(),GetInfo.getClientIpAddress()))
                    {
                        insertdata("0");  //插入问题
                    AddValue.addGold("", Int32.Parse(Session["userid"].ToString()), -Int32.Parse(prize.Text)); //扣金币
                    //记入Log
                    LogOperation.AddLog(GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString())), 
                        "SYSTEM",
                        GetConstant.LogType[0] + GetInfo.getLatestQuestionID(), 
                        0,
                        -Int32.Parse(prize.Text),
                        DateTime.Now, 
                        GetInfo.getClientIpAddress(),
                        Request.Cookies["userinfo"].Values["usercookieid"] == null ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"].ToString(),
                        "--");
                    Response.Redirect("tiwen_ok.aspx?state=0&pid="+GetInfo.getLatestQuestionID());
                    }
                    else
                    {
                    Response.Redirect("errorpages\\error.aspx?e=1");
                    }
                   
                }
                else
                {
                    r1.Close();
                   if(LogOperation.isAvailableToAskQuestion( GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString())),Request.Cookies["userinfo"].Values["usercookieid"].ToString(),GetInfo.getClientIpAddress()))
                    {
                        insertdata("1");  //插入问题
                    AddValue.addGold("", Int32.Parse(Session["userid"].ToString()), -Int32.Parse(prize.Text)); //扣金币
                    //记入Log
                    LogOperation.AddLog(GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString())), 
                        "SYSTEM", 
                        GetConstant.LogType[0], 
                        0,
                        -Int32.Parse(prize.Text),
                        DateTime.Now, 
                        GetInfo.getClientIpAddress(),
                        Request.Cookies["userinfo"].Values["usercookieid"] == null ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"].ToString(),
                        "--");
                    Response.Redirect("tiwen_ok.aspx?state=1&pid=" + GetInfo.getLatestQuestionID());
                    }
                    else
                    {
                    Response.Redirect("errorpages\\error.aspx?e=1");
                    }
                   

                }
            }
		}
      

        private void insertdata(string _sh)
        {
            conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            string[] fileNames= new string[2];
            string fileNamesJoin;
            if (FileUpload1.HasFile) fileNames[0] = logic.isImgUplaod(FileUpload1);
            else fileNames[0] = "";
            if (FileUpload2.HasFile) fileNames[1] = logic.isImgUplaod(FileUpload2);
            else fileNames[1] = "";

            fileNamesJoin = fileNames[0] + "|" + fileNames[1];
            
                OleDbCommand cmd1 = new OleDbCommand("insert into problems(userid,sh,caption,state,answer,sj,expiretime,prize,grade,pictures) values(@id,'" + _sh + "',@bt,'0',0,@sj,@exptime,@prize,@grade,@pictures)", conn);
                cmd1.Parameters.Add("@id", OleDbType.Integer);
                cmd1.Parameters.Add("@bt", OleDbType.Char, 100);
                cmd1.Parameters.Add("@sj", OleDbType.Date);
                cmd1.Parameters.Add("@exptime", OleDbType.Date);
                cmd1.Parameters.Add("@prize", OleDbType.Integer);
                cmd1.Parameters.Add("@grade", OleDbType.Integer);
                cmd1.Parameters.Add("@pictures", OleDbType.VarChar);
                cmd1.Parameters["@id"].Value = Session["userid"].ToString();
                cmd1.Parameters["@bt"].Value = addSpace(bt.Text.Trim());
                cmd1.Parameters["@sj"].Value = DateTime.Now.ToString();
                cmd1.Parameters["@exptime"].Value = DateTime.Now.AddDays(GetConstant.QTIME); //设置过期时间 QTIME 天
                cmd1.Parameters["@prize"].Value = prize.Text;
                cmd1.Parameters["@grade"].Value = (RadioButtonList1.SelectedIndex + 1) % GetConstant.gradeClassName.Length;
                cmd1.Parameters["@pictures"].Value = fileNamesJoin;    
            cmd1.ExecuteNonQuery();
                


                cmd1 = new OleDbCommand("select top 1 id from problems order by sj desc", conn);
                OleDbDataReader r1 = cmd1.ExecuteReader();
                r1.Read();
                string _id = r1["id"].ToString();
                r1.Close();

                cmd1 = new OleDbCommand("insert into problemsinformation(problemsid,content) values(@id,@nr)", conn);
                cmd1.Parameters.Add("@id", OleDbType.Integer);
                cmd1.Parameters.Add("@nr", OleDbType.VarChar);
                cmd1.Parameters["@id"].Value = _id;
                cmd1.Parameters["@nr"].Value = addSpace(T1.Value.Trim());
                cmd1.ExecuteNonQuery();

                cmd1 = new OleDbCommand("update userinformation set tw=tw+1 where userid=@id", conn);
                cmd1.Parameters.Add("@id", OleDbType.Integer);
                cmd1.Parameters["@id"].Value = Session["userid"].ToString();
                cmd1.ExecuteNonQuery();
                conn.Close();
            
        }


        protected string addSpace(string str) //处理“<”危险的问题
        {
            string getStr = str.Replace("<", "&lt;");
            return getStr;
        }


}
}
