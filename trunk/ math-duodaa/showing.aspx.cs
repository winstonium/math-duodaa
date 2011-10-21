using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net;
using System.Collections.Specialized;
using System.Data.OleDb;

public partial class showing : System.Web.UI.Page
{
    public NameValueCollection qInfo;
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["userid"].ToString() != "44")
            Response.Redirect("login.aspx");
        
        qDetail.Visible = false;
        eqEditor.Visible = false;
        
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        Button1.Text = "重新获取信息";
        qInfo = GetQuestionInfo.GetQuestionData(TextBox1.Text);

        if (qInfo["Error"] == "")
        {

            Table2.Visible = false;
            bt.Text = qInfo["qTittle"];
            nr.Text = qInfo["qContent"] != "" ? qInfo["qContent"] : "";
            nr2.Text = qInfo["qSupply"] != "" ? "<b>问题补充：</b>"+qInfo["qSupply"] : "";
            zz.Text = qInfo["qAskerName"];
            Label2.Text = gobackurl(TextBox1.Text)[1];
            HyperLink1.NavigateUrl = gobackurl(TextBox1.Text)[0];
            

            qDetail.Visible = true;
            eqEditor.Visible = true;
          

        }
        else
        {

            qDetail.Visible = false;
            eqEditor.Visible = false;
            
            Table2.Rows[0].Cells[1].Text = qInfo["Error"];
            
            Table2.Visible = true;
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        qInfo = GetQuestionInfo.GetQuestionData(TextBox1.Text);
        
        if (qInfo["Error"] == null | qInfo["Error"] !="" )
            this.RegisterClientScriptBlock("tz1", "<script>window.alert('非正常形式的输入！')</script>");
        
        else if (T1.Value.Trim() == "")
            this.RegisterClientScriptBlock("tz1", "<script>window.alert('请输入完整。谢谢！')</script>");
       
        else 
        {
            Button2.Enabled = false;
            Button2.Text = "提交中...";
            insertShowing(qInfo);
            Response.Redirect("showing_ok.aspx?state=1");
         }
    }

    private void insertShowing(NameValueCollection info)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();

        string[] fileNames = new string[2];
        string fileNamesJoin;
        if (FileUpload1.HasFile) fileNames[0] = logic.isImgUplaod(FileUpload1);
        else fileNames[0] = "";
        if (FileUpload2.HasFile) fileNames[1] = logic.isImgUplaod(FileUpload2);
        else fileNames[1] = "";

        fileNamesJoin = fileNames[0] + "|" + fileNames[1];

        string sql = "insert into showQuestion(showUserName,showUrl,showTittle,showAskerName,showReward,showContent,showPicture,showSupply,showAnswer,showSupport,showTime)";
        sql += " values(@sUserName,@sUrl,@sTittle,@sAskerName,@sReward,@sContent,@sPicture,@sSupply,@sAnswer,@sSupport,@sTime)"; 
        OleDbCommand cmd1 = new OleDbCommand(sql, conn);

        cmd1.Parameters.Add("@sUserName", OleDbType.Char);
        cmd1.Parameters.Add("@sUrl", OleDbType.Char);
        cmd1.Parameters.Add("@sTittle", OleDbType.Char);
        cmd1.Parameters.Add("@sAskerName", OleDbType.Char);
        cmd1.Parameters.Add("@sReward", OleDbType.Integer);
        cmd1.Parameters.Add("@sContent", OleDbType.VarChar);
        cmd1.Parameters.Add("@sPicture", OleDbType.Char);
        cmd1.Parameters.Add("@sSupply", OleDbType.VarChar);
        cmd1.Parameters.Add("@sAnswer", OleDbType.VarChar);
        cmd1.Parameters.Add("@sSupport", OleDbType.Integer);
        cmd1.Parameters.Add("@sTime", OleDbType.Date);

        cmd1.Parameters["@sUserName"].Value=GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString()));
        cmd1.Parameters["@sUrl"].Value = HyperLink1.NavigateUrl.ToString();
        cmd1.Parameters["@sTittle"].Value = info["qTittle"];
        cmd1.Parameters["@sAskerName"].Value = info["qAskerName"];
        cmd1.Parameters["@sReward"].Value = Int32.Parse(info["qReward"]);
        cmd1.Parameters["@sContent"].Value = info["qContent"];
        cmd1.Parameters["@sPicture"].Value = fileNamesJoin;
        cmd1.Parameters["@sSupply"].Value = info["qSupply"];
        cmd1.Parameters["@sAnswer"].Value = addSpace(T1.Value.Trim()); 
        cmd1.Parameters["@sSupport"].Value = 0;
        cmd1.Parameters["@sTime"].Value = DateTime.Now.ToString();

        cmd1.ExecuteNonQuery();

            }


    protected string addSpace(string str) //处理“<”危险的问题
    {
        string getStr = str.Replace("<", "&lt;");
        return getStr;
    }
    
    
    private string[] gobackurl(string siteurl)   // 根据siteurl判断链接来源，反回一个数组siteLink，siteLink[0]是url，siteLink[1]是中文名字
    {
        string sitename=GetQuestionInfo.qSiteFrom(siteurl);
        string[] siteLink = new string[] { "", "#" };
        switch(sitename)
        {
            case "baidu": 
                siteLink[1] = "百度知道"; 
                siteLink[0] = siteurl;
                break;
            case "wenwen":
                siteLink[1] = "搜搜问问"; 
                siteLink[0] = siteurl;
                break;
            case "aiwen":
                siteLink[1] = "新浪爱问";
                siteLink[0] = siteurl;
                break;
            
        }

        return siteLink;
    }
}