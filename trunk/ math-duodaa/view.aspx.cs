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
using System.Text.RegularExpressions;

public partial class view : System.Web.UI.Page
{
    public string bestAnswerContent, bestAnswerDoner, elseAnswerStr;
    public string view_qTitle, view_qGrade, view_qGradeLink, view_qContent,view_answercount;
    public string[] view_pic;


    protected void Page_Load(object sender, EventArgs e)
    {
        _id.Text = Request.QueryString["id"].ToString().Trim();
        EqEditor.Attributes["qID"] = _id.Text;

        setQuestionInfo();
        setBestAnswerInfo();
        setAnswerInfo();
        setNotLogin();
       // Response.Write("<script>window.alert('" + EqEditor.Attributes["qID"] + "');</script>");
        
    }

    protected void setQuestionInfo()
    { 
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        string _sql = "select a.id,a.caption,a.sj,a.pictures,a.expiretime,a.userid,a.prize,a.state,a.grade,b.content,c.username,d.qq from problems a,problemsinformation b,users c,userinformation d where a.id=b.problemsid and a.userid=c.id and d.userid=c.id and a.id=" + _id.Text;
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        OleDbDataReader read1 = cmd.ExecuteReader();

        if (read1.Read())
        {
            if (read1["state"].ToString() == "0")
            {
                qState.InnerHtml = "待解决的问题";
                qState.Style.Add("color", "#ff0000");
                qState.Style.Add("font-weight", "900");

                TimeSpan diffTime = DateTime.Parse(read1["expiretime"].ToString()) - DateTime.Now;
                qExpireTime.InnerHtml = "问题还有" + diffTime.Days.ToString() + "天" + diffTime.Hours.ToString() + "小时" + diffTime.Minutes.ToString() + "分钟过期";
                qExpireTime.Style.Add("color", "#aaaaaa");

                qPrize.InnerHtml = read1["prize"].ToString() == "0" ? "" : "悬赏:" + read1["prize"].ToString() + "<img alt='问题悬赏' title='问题悬赏' src='images/diamond.gif' />";

            }
            else if (read1["state"].ToString() == "1")
            {
                qState.InnerHtml = "已解决的问题";
                qState.Style.Add("color", "#228b22");
                qState.Style.Add("font-weight", "900");

                qPrize.InnerHtml = read1["prize"].ToString() == "0" ? "" : "悬赏:" + read1["prize"].ToString() + "<img alt='问题悬赏' title='问题悬赏' src='images/diamond.gif' />";
            }
            else
            {
                qState.InnerHtml = "已关闭的问题";
                qState.Style.Add("color", "#ffa500");
                qState.Style.Add("font-weight", "900");

                qPrize.InnerHtml = read1["prize"].ToString() == "0" ? "" : "悬赏:" + read1["prize"].ToString() + "<img alt='问题悬赏' title='问题悬赏' src='images/diamond.gif' />";

            }

            view_qGrade = GetConstant.gradeClassName[Int32.Parse(read1["grade"].ToString())];
            view_qGradeLink = "index.aspx?grade=" + read1["grade"].ToString();

            view_qTitle = read1["caption"].ToString();

            p1.InnerHtml = imgsShow(read1["pictures"].ToString(), 0);
            p2.InnerHtml = imgsShow(read1["pictures"].ToString(), 1);

            view_qContent = "&nbsp;" + verifyOutput(read1["content"].ToString());

            asker.Text = read1["username"].ToString();
            asker.PostBackUrl = "zzview.aspx?userid=" + read1["userid"].ToString().Trim();

            qq.NavigateUrl="http://wpa.qq.com/msgrd?v=3&uin="+read1["QQ"].ToString().Trim()+"&site=www.duodaa.com&menu=yes";
            qq.ImageUrl = "http://wpa.qq.com/pa?p=2:" + read1["QQ"].ToString().Trim() + ":42";
            
            read1.Close();
            read1.Dispose();
            conn.Close();
            conn.Dispose();

        }
        else 
        {

            read1.Close();
            read1.Dispose();
            conn.Close();
            conn.Dispose();
            Response.Redirect("default.aspx");
        }

        
    }

    protected void setBestAnswerInfo()
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        //string _sql = "select a.id,a.caption,a.sj,a.pictures,a.expiretime,a.userid,a.prize,a.state,a.grade,b.content,c.username,d.qq from problems a,problemsinformation b,users c,userinformation d where a.id=b.problemsid and a.userid=c.id and d.userid=c.id and a.id=" + _id.Text;
        string _sql = "select a.content,a.userid,a.pic,b.qq from answer a,userinformation b where a.problemsid=" + _id.Text + " and a.state='2' and b.userid=a.userid";
        OleDbCommand cmd = new OleDbCommand(_sql, conn);
        OleDbDataReader r1 = cmd.ExecuteReader();

        if (r1.Read())
        {

            bestAnswerContent = verifyOutput(r1["content"].ToString());
            bestAnswerDoner = ifSelfAnwser(r1["userid"].ToString(), GetInfo.getUsernameFromID(Int32.Parse(r1["userid"].ToString())), "", r1["qq"].ToString().Trim());
            bestAnswerPic1.InnerHtml = imgsShow(r1["pic"].ToString(), 0);
            bestAnswerPic2.InnerHtml = imgsShow(r1["pic"].ToString(), 1);

            elseAnswerStr = "其它";

            bestAnswerDiv.Visible = true;
            EquationEditor.Visible = false;

            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();



        }
        else 
        {
            bestAnswerDiv.Visible = false;
            r1.Close();
            r1.Dispose();
            conn.Close();
            conn.Dispose();
        
        }
           
    }

    protected void setAnswerInfo()
    {
        OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
        conn.Open();
        OleDbDataAdapter mydata = new OleDbDataAdapter("select a.userid,a.problemsid,a.sj,a.state,a.pic,a.content,b.username,c.qq from answer a,users b,userinformation c where a.userid=b.id and c.userid=b.id and a.state<>'2' and a.problemsid=" + _id.Text + " order by a.sj", conn);
        DataSet ds = new DataSet();
        mydata.Fill(ds, "answer1");
        answerdata.DataSource = ds.Tables["answer1"];
        view_answercount = ds.Tables["answer1"].Rows.Count.ToString();
        answerdata.DataBind();
        mydata.Dispose();
        conn.Close();
        conn.Dispose();
    
    
    }

    protected void setNotLogin()
    {
        if (Session["userid"].ToString() == "0" || Session["userlogin"].ToString() == "0")
        {
            NotLoginNote.Visible = true;
            EquationEditor.Visible = false;
        }
    
    }

    protected string imgsShow(string files, int order)
    {
        string[] imgs;
        string imgstr;
        imgs = files.Split(new char[] { '|' });
        if (imgs[order] != "") imgstr = "图" + (order + 1).ToString() + "：<br /><img alt='哆嗒网_问题图片' title='哆嗒网_问题图片' src='useruploads/" + imgs[order] + "' />";
        else imgstr = "";
        return imgstr;

    }

    protected string verifyOutput(string str) //处理显示
    {
        string getStr = str;
        if (getStr.IndexOf("#%%#@@()bbaa**&&") >= 0) getStr = getStr.Replace("#%%#@@()bbaa**&&", "");
        if (getStr.IndexOf("\\$") >= 0) getStr = getStr.Replace("\\$", "");
        getStr = getStr.Replace("\n", "<br />");
        getStr = "&nbsp;" + getStr; //在前面加一个空格，以处理内容首个是公式不能显示的bug
        return getStr;
    }

    protected string ifSelfAnwser(string userid, string username, string nr, string _qq)
    {
        if (Session["userid"].ToString() == userid)
        {
            if (!IsPostBack)
            {
                TextBox cTbox;
                cTbox = (TextBox)EqEditor.FindControl("T1");
                cTbox.Text = nr;
            }
            return "<a class='asker' href='editinfo.aspx'>本条是我自己的回答</a>";
        }
        else
        {
            string qq_Link = "";
            if (_qq != "0") qq_Link = "<a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin=" + _qq + "&site=qq&menu=yes'><img border='0' src='http://wpa.qq.com/pa?p=2:" + _qq + ":42' alt='联系回答者' title='联系回答者'></a>";
            return "<a class='asker' href='zzview.aspx?userid="+userid+"'>" + username + "</a>&nbsp;&nbsp;" + qq_Link;
        }
    }

}