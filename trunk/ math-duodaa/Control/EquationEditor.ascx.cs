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

public partial class Control_EquationEditor : System.Web.UI.UserControl
{
       
    protected void Page_Load(object sender, EventArgs e)
    {
        //设置输入框中的内容
        //T1.Text = this.Attributes["Tcontent"];
        //设置是显示提交按纽还是修改按纽
        if (GetInfo.isAnswered(this.Attributes["qID"], Session["userid"].ToString()))
        {
            Button1.Visible = false;
            Button2.Visible = true;
        }
        else 
        {
            Button1.Visible = true;
            Button2.Visible = false;
        }


        //this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('" + GetInfo.isAnswered(this.Attributes["qID"], Session["userid"].ToString()) + "')</script>");
    }

    protected string addSpace(string str) //处理<问题
    {
        string getStr = str.Replace("<", "&lt;");
        return getStr;
    }

    protected void Button1_Click(object sender, System.EventArgs e)
    {
        string inputTxt = T1.Text.Trim();
        string _id=this.Attributes["qID"].ToString();
        string[] fileNames = new string[2];
        string fileNamesJoin;

        

        if (Session["userlogin"].ToString() == "0")
            this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('请先登录。谢谢！')</script>");
        else
        {

            if (inputTxt == "")               
                this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('请输入完整。谢谢！')</script>");
            else if (logic.isQuestionOpen(_id) == 0)
                this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('问题已经解决或关闭')</script>");

            else
            {
                if (FileUpload1.HasFile) fileNames[0] = logic.isImgUplaod(FileUpload1);
                else fileNames[0] = "";
                if (FileUpload2.HasFile) fileNames[1] = logic.isImgUplaod(FileUpload2);
                else fileNames[1] = "";

                fileNamesJoin = fileNames[0] + "|" + fileNames[1];

                OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                conn.Open();
                OleDbCommand cmd = new OleDbCommand("select id from answer where userid=@uid and problemsid=@pid and state='1'", conn);
                cmd.Parameters.Add("@uid", OleDbType.Integer);
                cmd.Parameters.Add("@pid", OleDbType.Integer);
                cmd.Parameters["@uid"].Value = Session["userid"].ToString();
                cmd.Parameters["@pid"].Value = _id;
                OleDbDataReader read1 = cmd.ExecuteReader();
                if (read1.Read())
                {
                    read1.Close();
                    this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('问题已经解决、关闭或您已经回答过了。')</script>");
                    return;
                }
                else
                {
                    read1.Close();

                    if (LogOperation.isAvailableToAnswerQuestion(GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString())), Request.Cookies["userinfo"].Values["usercookieid"].ToString(), GetInfo.getClientIpAddress(), _id))
                    {
                        cmd = new OleDbCommand("insert into answer(userid,problemsid,sj,pic,content) values(@id,@pid,@sj,@pic,@nr)", conn);
                        cmd.Parameters.Add("@id", OleDbType.Integer);
                        cmd.Parameters.Add("@pid", OleDbType.Integer);
                        cmd.Parameters.Add("@sj", OleDbType.Date);
                        cmd.Parameters.Add("@pic", OleDbType.VarChar);
                        cmd.Parameters.Add("@nr", OleDbType.VarChar);
                        cmd.Parameters["@id"].Value = Session["userid"].ToString();
                        cmd.Parameters["@pid"].Value = _id;
                        cmd.Parameters["@sj"].Value = DateTime.Now.ToString();
                        cmd.Parameters["@pic"].Value = fileNamesJoin;
                        cmd.Parameters["@nr"].Value = addSpace(inputTxt);
                        cmd.ExecuteNonQuery();
                        cmd = new OleDbCommand("update problems set answer=answer+1 where id=" + _id, conn);
                        cmd.ExecuteNonQuery();
                        cmd = new OleDbCommand("update userinformation set hd=hd+1 where userid=" + Session["userid"].ToString(), conn);
                        cmd.ExecuteNonQuery();
                        conn.Close();


                        //加积分
                        //加金币
                        if (LogOperation.isAvailableToGiveAnswerPrize(GetInfo.getUsernameFromID(Int32.Parse(Session["userid"].ToString()))))
                        {
                            //加积分
                            //加金币
                            AddValue.addPoint("", Int32.Parse(Session["userid"].ToString()), GetConstant.AddPointClass[1]);
                            AddValue.addGold("", Int32.Parse(Session["userid"].ToString()), GetConstant.AddGoldClass[1]);
                            LogOperation.AddLog(GetInfo.getAskerNameByPid(_id),
                                                Session["userid"].ToString(),
                                                GetConstant.LogType[8],          //回答问题的LOGTYPE
                                                GetConstant.AddPointClass[1],       //回答问题加积分
                                                GetConstant.AddGoldClass[1],      //回答问题加金币
                                                DateTime.Now,
                                                GetInfo.getClientIpAddress(),
                                                Request.Cookies["userinfo"].Values["usercookieid"] == null ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"].ToString(),
                                                "--");

                        }
                        else
                        {

                            LogOperation.AddLog(GetInfo.getAskerNameByPid(_id),
                                                    Session["userid"].ToString(),
                                                    GetConstant.LogType[8],          //回答问题的LOGTYPE
                                                    0,       //不加分
                                                    0,      // 不加金币
                                                    DateTime.Now,
                                                    GetInfo.getClientIpAddress(),
                                                    Request.Cookies["userinfo"].Values["usercookieid"] == null ? Session["userid"].ToString() : Request.Cookies["userinfo"].Values["usercookieid"].ToString(),
                                                    "--");

                        }


                        Response.Redirect("view_" + _id + ".html");
                    }
                    else
                    {
                        Response.Redirect("errorpages\\error.aspx?e=2");
                    }
                }
            }
        }
    }
    protected void Button2_Click(object sender, System.EventArgs e)
    {
        string inputTxt = T1.Text.Trim();
        string _id = this.Attributes["qID"].ToString();
        string[] fileNames = new string[2];
        string fileNamesJoin;
        
       
        if (Session["userlogin"].ToString() == "0")
            this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('请先登录。谢谢！')</script>");
        else
        {
            if (inputTxt == "")
                this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('请输入完整。谢谢！')</script>");
            else if (logic.isQuestionOpen(_id) == 0)
                this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('问题已经解决或关闭')</script>");
            else
            {
                OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
                conn.Open();
                OleDbCommand cmd = new OleDbCommand("select id,pic from answer where userid=@uid and problemsid=@pid and state='1'", conn);
                cmd.Parameters.Add("@uid", OleDbType.Integer);
                cmd.Parameters.Add("@pid", OleDbType.Integer);
                cmd.Parameters["@uid"].Value = Session["userid"].ToString();
                cmd.Parameters["@pid"].Value = _id;
                OleDbDataReader read1 = cmd.ExecuteReader();
                if (!read1.Read())
                {
                    read1.Close();
                    this.Page.RegisterClientScriptBlock("tz1", "<script>window.alert('问题已经解决、关闭或者你没回答过这个问题。')</script>");
                    return;
                }
                else
                {
                    string curFiles = read1["pic"].ToString();
                    if (FileUpload1.HasFile) fileNames[0] = logic.isImgUplaod(FileUpload1);
                    else fileNames[0] = curFiles.Split(new char[] { '|' })[0];
                    if (FileUpload2.HasFile) fileNames[1] = logic.isImgUplaod(FileUpload2);
                    else fileNames[1] = curFiles.Split(new char[] { '|' })[1];

                    fileNamesJoin = fileNames[0] + "|" + fileNames[1];
                    read1.Close();
                    cmd = new OleDbCommand("update answer set content=@content ,pic='" + fileNamesJoin + "' where userid=@uid and problemsid=@pid", conn);

                    cmd.Parameters.Add("@content", OleDbType.Char);
                    cmd.Parameters.Add("@id", OleDbType.Integer);
                    cmd.Parameters.Add("@pid", OleDbType.Integer);

                    cmd.Parameters["@content"].Value = addSpace(inputTxt);
                    cmd.Parameters["@id"].Value = Session["userid"].ToString();
                    cmd.Parameters["@pid"].Value = _id;


                    cmd.ExecuteNonQuery();
                    conn.Close();
                    Response.Redirect("view_" + _id + ".html");
                }
            }
        }
    }   

    

}