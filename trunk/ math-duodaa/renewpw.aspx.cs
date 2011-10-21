using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data.OleDb;

public partial class renewpw : System.Web.UI.Page
{

    protected void Page_Load(object sender, EventArgs e)
    {
         string uname = Request.QueryString["uname"], code = Request.QueryString["code"];

         if (!isOnTime(uname, code))
         {
             tb1.Visible = false;
             l1.Text = "无效或者过期的链接！";
         }

         else 
         {
           
         }

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        string uname = Request.QueryString["uname"], code = Request.QueryString["code"];
        if (isOnTime(uname, code))
        {
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            OleDbCommand cmd = new OleDbCommand("update users set password1='" + TextBox1.Text + "' where username='" + uname + "'", conn);
            cmd.ExecuteNonQuery();
            cmd = new OleDbCommand("update renewpw set code='0' where applyuser='" + uname + "'",conn);
            cmd.ExecuteNonQuery();
            tb1.Visible = false;
            l1.Text = "您的密码已经重置。";
            conn.Close();

        }
        else
        {
            tb1.Visible = false;
            l1.Text = "无效或者过期的链接！";
        
        }
       

    }

    protected bool isOnTime(string un,string cd) 
    {
        if (un == "" || un == null || cd == null || cd == "") return false;
        else
        {
            OleDbConnection conn = new OleDbConnection(dbConStr.dbConnStr());
            conn.Open();
            OleDbCommand cmd = new OleDbCommand("select id from renewpw where applyuser=@user and code=@code and timeexpire> @nowtime", conn);
            cmd.Parameters.Add("@user", OleDbType.Char, 20);
            cmd.Parameters.Add("@code", OleDbType.Char, 220);
            cmd.Parameters.Add("@nowtime", OleDbType.Date);
            cmd.Parameters["@user"].Value = un;
            cmd.Parameters["@code"].Value = cd;
            cmd.Parameters["@nowtime"].Value = DateTime.Now.ToString();
            OleDbDataReader r1= cmd.ExecuteReader();
            if (!r1.Read())
            { 
                r1.Close(); 
                conn.Close();
                return false;
            }
            else
            {
                r1.Close(); 
                conn.Close();
                return true;
            }
        }
    
    }
}