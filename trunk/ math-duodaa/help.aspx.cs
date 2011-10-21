using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Web.UI.HtmlControls ;
using System.Collections.Specialized;

public partial class help : System.Web.UI.Page
{

    public string[] category_1st = new string[]
    {
        "入门",
        "如何注册",
        "如何提问",
        "如何回答",
        "搜索内容",
        "积分成长",
        "奖品兑换",
        "举报",
        "LaTeX简介",
        "哆嗒协议"
    };

 /*   public string[][] category_2st = new string[][]
    {
    new string[]{"哆嗒网温馨提示"},
    new string[]{"请进注册页面","填写注册信息","确认提交"},
    new string[]{"登录","输入提问内容","上传图片","确认提交"},
    new string[]{"登录","输入回答内容","上传图片","确认提交"},
    new string[]{"使用问题搜索","关于搜索广告"},
    new string[]{"哆分增加和减少"," 嗒币增加和减少"},
    new string[]{"基本规则","提交兑奖信息","其它规则"},
    new string[]{"举报方式"},
    new string[]{"什么是LaTeX","常用数学符号"},
    new string[]{"总则","使用规则","服务内容"}
    
    };
    */
    
    
    protected void Page_Load(object sender, EventArgs e)
    {
        
      
        _category.Text = Request.QueryString["category"]==null?"0":Request.QueryString["category"].Trim();
        _category.Text = "nr" + _category.Text;

        ContentPlaceHolder ch = (ContentPlaceHolder)Master.FindControl("mainContent");
        HtmlContainerControl categoryControl = (HtmlContainerControl)ch.FindControl(_category.Text);
        categoryControl.Visible = true;
            
            
      
       
    }

    
}