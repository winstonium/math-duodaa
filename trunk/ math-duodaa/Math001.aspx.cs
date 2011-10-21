using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Net;
using System.Collections.Specialized;
using System.Data.OleDb;

public partial class Math001 : System.Web.UI.Page
{   
    public NameValueCollection qInfo;
        
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["userid"].ToString() != "44")
            Response.Redirect("login.aspx");

        RadioButtonList1.Items[0].Text = GetConstant.gradeClassName[1];
        RadioButtonList1.Items[1].Text = GetConstant.gradeClassName[2];
        RadioButtonList1.Items[2].Text = GetConstant.gradeClassName[3];
        RadioButtonList1.Items[3].Text = GetConstant.gradeClassName[4];
        RadioButtonList1.Items[4].Text = GetConstant.gradeClassName[5];
        RadioButtonList1.Items[5].Text = GetConstant.gradeClassName[0];
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
            insertquestion("0");
            insertanswer(GetInfo.getLatestQuestionID());
            Response.Redirect("view_" + GetInfo.getLatestQuestionID() + ".html");

         }
    }

    private void insertquestion(string _sh)
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
      
           
        OleDbCommand cmd1 = new OleDbCommand("insert into problems(userid,sh,caption,state,answer,sj,expiretime,prize,grade,pictures) values(@id,'" + _sh + "',@bt,'0',0,@sj,@exptime,@prize,@grade,@pictures)", conn);
        cmd1.Parameters.Add("@id", OleDbType.Integer);
        cmd1.Parameters.Add("@bt", OleDbType.Char, 100);
        cmd1.Parameters.Add("@sj", OleDbType.Date);
        cmd1.Parameters.Add("@exptime", OleDbType.Date);
        cmd1.Parameters.Add("@prize", OleDbType.Integer);
        cmd1.Parameters.Add("@grade", OleDbType.Integer);
        cmd1.Parameters.Add("@pictures", OleDbType.VarChar);
        
        cmd1.Parameters["@id"].Value = "45"; //hahaha的id
        cmd1.Parameters["@bt"].Value = bt.Text;
        cmd1.Parameters["@sj"].Value = DateTime.Now.ToString();
        cmd1.Parameters["@exptime"].Value = DateTime.Now.AddDays(GetConstant.QTIME); //设置过期时间 QTIME 天
        cmd1.Parameters["@prize"].Value = 0;
        cmd1.Parameters["@grade"].Value = (RadioButtonList1.SelectedIndex + 1) % GetConstant.gradeClassName.Length;
        cmd1.Parameters["@pictures"].Value = "|";
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
        cmd1.Parameters["@nr"].Value = nr.Text + "\r\n" + nr2.Text.Replace("<b>","").Replace("</b>","");
        cmd1.ExecuteNonQuery();

        cmd1 = new OleDbCommand("update userinformation set tw=tw+1 where userid=@id", conn);
        cmd1.Parameters.Add("@id", OleDbType.Integer);
        cmd1.Parameters["@id"].Value = 45;
        cmd1.ExecuteNonQuery();
        conn.Close();

    }
    private void insertanswer(string latestid) 
    
    {
        string[] fileNames=new string[2];
        string fileNamesJoin;
        
        if(FileUpload1.HasFile)fileNames[0] = logic.isImgUplaod(FileUpload1);
        else fileNames[0]="";
        if(FileUpload2.HasFile)fileNames[1] = logic.isImgUplaod(FileUpload2);
        else fileNames[1]="";
        fileNamesJoin = fileNames[0] + "|" + fileNames[1];

        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();

            OleDbCommand cmd = new OleDbCommand("insert into answer(userid,problemsid,sj,pic,content) values(@id,@pid,@sj,@pic,@nr)", conn);
            cmd.Parameters.Add("@id", OleDbType.Integer);
            cmd.Parameters.Add("@pid", OleDbType.Integer);
            cmd.Parameters.Add("@sj", OleDbType.Date);
            cmd.Parameters.Add("@pic", OleDbType.VarChar);
            cmd.Parameters.Add("@nr", OleDbType.VarChar);
            
            cmd.Parameters["@id"].Value = "44";
            cmd.Parameters["@pid"].Value = latestid;
            cmd.Parameters["@sj"].Value = DateTime.Now.ToString();
            cmd.Parameters["@pic"].Value = fileNamesJoin;
            cmd.Parameters["@nr"].Value = addSpace(T1.Value.Trim());
            cmd.ExecuteNonQuery();
            cmd = new OleDbCommand("update problems set answer=answer+1 where id=" + latestid, conn);
            cmd.ExecuteNonQuery();
            cmd = new OleDbCommand("update userinformation set hd=hd+1 where userid=" + "44", conn);
            cmd.ExecuteNonQuery();
            conn.Close();
            Response.Redirect("view_" + latestid+".html");
        
    
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


    protected void Button3_Click(object sender, EventArgs e)
    {
        AddValue.addGold("", 44, 100);
    }
}