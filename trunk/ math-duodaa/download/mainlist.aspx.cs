using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.ComponentModel;
using System.Security.Permissions;




public partial class download_Default : System.Web.UI.Page
{
    public class book 
    {
        public string Title
        {
            get 
            {
                if ( Title == null) return "";
                else return  Title;
            }
            set
            {
                if (value == null)  Title = "";
                else  Title = value;
            }
        }

        public string ChineseTitle
        {
            get
            {
                if (ChineseTitle == null) return "";
                else return ChineseTitle;
            }
            set
            {
                if (value == null) ChineseTitle = "";
                else ChineseTitle = value;
            }


        }
       
        public string Pic

        {
            get
            {
                if (Pic == null) return "";
                else return Pic;
            }
            set
            {
                if (value == null) Pic = "";
                else Pic = value;
            }
        
        
        }      

        public string Publisher
        {
            get
            {
                if (Publisher == null) return "";
                else return Publisher;
            }
            set
            {
                if (value == null) Publisher = "";
                else Publisher = value;
            }


        }

        public string Author
        {
            get
            {
                if (Author == null) return "";
                else return Author;
            }
            set
            {
                if (value == null) Author = "";
                else Author = value;
            }


        }

        public string Pages
        {
            get
            {
                if (Pages == null) return "";
                else return Pages;
            }
            set
            {
                if (value == null) Pages = "";
                else Pages = value;
            }


        }

        public string ISBN10
        {
            get
            {
                if (ISBN10 == null) return "";
                else return ISBN10;
            }
            set
            {
                if (value == null) ISBN10 = "";
                else ISBN10 = value;
            }


        }

        public string ISBN13
        {
            get
            {
                if (ISBN13 == null) return "";
                else return ISBN13;
            }
            set
            {
                if (value == null) ISBN13 = "";
                else ISBN13 = value;
            }


        }

        public string[] Tags;

        public string[] Url;
    }

    

    protected void Page_Load(object sender, EventArgs e)
    {
        
    }

   // private string 
}