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
	/// view_ok 的摘要说明。
	/// </summary>
	public partial class view_ok : System.Web.UI.Page
	{
	
		protected void Page_Load(object sender, System.EventArgs e)
		{
			// 在此处放置用户代码以初始化页面
			string _uid=Request.QueryString["uid"];
			string _pid=Request.QueryString["pid"];
			if(_uid=="" || _pid=="")
				Response.Redirect("index.aspx");
			else
			{
                OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
				conn.Open();
				OleDbCommand cmd=new OleDbCommand("select userid from problems where id=@id",conn);
				cmd.Parameters.Add("@id",OleDbType.Integer);
				cmd.Parameters["@id"].Value=_pid;
				OleDbDataReader d1=cmd.ExecuteReader();
				if(d1.Read())
				{
					if(d1["userid"].ToString()==Session["userid"].ToString())
					{
						d1.Close();
						cmd=new OleDbCommand("select id from answer where problemsid=@id and state='2'",conn);
						cmd.Parameters.Add("@id",OleDbType.Integer);
						cmd.Parameters["@id"].Value=_pid;
						d1=cmd.ExecuteReader();
						if(d1.Read())
						{
							d1.Close();
							Label1.Text="此问题已经评出最佳答案了。3秒后自动返回……";
							return;
						}
						else
						{
						
                            cmd = new OleDbCommand("select prize from problems where id=@id", conn);
                            cmd.Parameters.Add("@id",OleDbType.Integer);
                            cmd.Parameters["@id"].Value=_pid;                                     
                            d1=cmd.ExecuteReader();
                            d1.Read();
                            int _prize= Int32.Parse(d1["prize"].ToString());   // 得到该问题的悬赏数值 _prize 。

                            d1.Close();   //得到参数后关闭

                            cmd=new OleDbCommand("update answer set state='2' where userid=@uid and problemsid=@pid",conn);
							cmd.Parameters.Add("@uid",OleDbType.Integer);
							cmd.Parameters.Add("@pid",OleDbType.Integer);
							cmd.Parameters["@uid"].Value=_uid;
							cmd.Parameters["@pid"].Value=_pid;
							cmd.ExecuteNonQuery();
							cmd=new OleDbCommand("update userinformation set dd=dd+1 where userid=@uid",conn);
							cmd.Parameters.Add("@uid",OleDbType.Integer);
							cmd.Parameters["@uid"].Value=_uid;
							cmd.ExecuteNonQuery();
							cmd=new OleDbCommand("update problems set state='1' where id=@id",conn);
							cmd.Parameters.Add("@id",OleDbType.Integer);
							cmd.Parameters["@id"].Value=_pid;
							cmd.ExecuteNonQuery();
							conn.Close();

                            AddValue.addPoint("", Int32.Parse(_uid), GetConstant.AddPointClass[2]);     // 给_uid用户加积分
                            AddValue.addGold("", Int32.Parse(_uid),  GetConstant.AddGoldClass[2] + _prize);  // 给_uid用户加金币
                            LogOperation.AddLog(Session["userid"].ToString(),
                                                _uid,
                                                GetConstant.LogType[3] + _pid,                //回答问题的LOGTYPE
                                                GetConstant.AddPointClass[2],          //回答问题加积分
                                                GetConstant.AddGoldClass[2]+_prize,    //回答问题加金币
                                                DateTime.Now,                          //Log记录的时间
                                                GetInfo.getClientIpAddress(),          //记录Log操作的IP
                                                Request.Cookies["userinfo"].Values["usercookieid"] == null ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"].ToString(),
                                                "--");
							
                            Label1.Text="此答案已经采纳，将关闭此问题。3秒后自动返回……";
						}
					}
					else
					{
						d1.Close();
						Label1.Text="您不是本问题的提问人。3秒后自动返回……";
						return;
					}
				}
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
		/// 设计器支持所需的方法 - 不要使用代码编辑器修改
		/// 此方法的内容。
		/// </summary>
		private void InitializeComponent()
		{    

		}
		#endregion
	}
}
