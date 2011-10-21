using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Collections.Specialized;
using System.Text.RegularExpressions;
using System.Net;

/// <summary>
///GetQuestionInfo 的摘要说明
/// </summary>
public class GetQuestionInfo
{
	public GetQuestionInfo()
	{
		//
		//TODO: 在此处添加构造函数逻辑
		//
	}

    public static string qSiteFrom(string url)
    {
        string[] siteName = new string[] 
        {   "0",          //用0来标识无匹配
            "baidu"
        };
        int i=0,j=0;

        Regex[] baiduURL = new Regex[]
        {
        new Regex(@"http:\/\/z\.baidu\.com\/question\/\d+\.html.*"),
        new Regex(@"http:\/\/zhidao\.baidu\.com\/question\/\d+\.html.*")
        };


        if (i == 0)
        {
            for (j = 0; j < baiduURL.Length; j++)
            {

                if (baiduURL[j].IsMatch(url))
                {
                    i = 1;
                    break;
                };

            }
        }

        return siteName[i];
    }

    public static NameValueCollection GetQuestionData(string source)
    {
        string url = source; //把url问号后的内容去掉
        if (source.IndexOf("?") >= 0) url = source.Substring(0, source.IndexOf("?"));

        string strContent = "", tempStr;
        NameValueCollection QuestionData = new NameValueCollection();
        QuestionData.Add("Error", ""); //记录错误
        QuestionData.Add("qTittle", ""); //问题标题
        QuestionData.Add("qAskerName", "");//提问者用户名
        QuestionData.Add("qReward", ""); //悬赏
        QuestionData.Add("qContent", "");//问题详细
        QuestionData.Add("qSupply", "");//问题补充
        QuestionData.Add("isPic", "No"); // 是否有图片

        int strStart, strLen;

        if (QuestionData["Error"] == "")
        {
            if (qSiteFrom(url) == "0")
            {
                QuestionData["Error"] = "无效的链接格式！";
            }
        }

        if (QuestionData["Error"] == "")
        {
            try
            {
                WebClient wc = new WebClient();
                strContent = wc.DownloadString(url);
                wc.Dispose();
            }
            catch (Exception)
            {
                QuestionData["Error"] = "问题标题信息获取失败，请检查网络！";
            }
        }
        

        if (QuestionData["Error"] == "")
        {
            strStart = strContent.IndexOf("<!--qbox start-->") + "<!--qbox start-->".Length; //得到qbox的起始位置
            strLen = strContent.IndexOf("<!--qbox end-->") - strStart; //得到qbox长度
            if (strStart > "<!--qbox start-->".Length)
            {
                strContent = strContent.Substring(strStart, strLen); // 得到qbox的所有东东
            }
            else
            {
                QuestionData["Error"] = "问题信息获取失败，检查连接!";

            }

            if (QuestionData["Error"] == "")
            {
                strStart = strContent.IndexOf("<span class=\"question-title\">");
                if (strStart < 0)
                {
                    QuestionData["Error"] = "问题标题信息获取失败，请重新获取!";
                }
                else
                {
                    strStart += "<span class=\"question-title\">".Length;
                    strLen = strContent.IndexOf("</span>", strStart) - strStart;
                    tempStr = strContent.Substring(strStart, strLen); //得到question-title
                    QuestionData["qTittle"] = tempStr;
                }
            }

            if (QuestionData["Error"] == "")
            {
                strStart = strContent.IndexOf("class=\"user-name\">");
                if (strStart < 0)
                {
                    QuestionData["qAskerName"] = "匿名";
                }
                else
                {
                    strStart += "class=\"user-name\">".Length;
                    strLen = strContent.IndexOf("</a>", strStart) - strStart;
                    tempStr = strContent.Substring(strStart, strLen); //得到提问者用户名
                    QuestionData["qAskerName"] = tempStr;
                }
            }

            if (QuestionData["Error"] == "")
            {
                strStart = strContent.IndexOf("<span class=\"black i-reward\">悬赏分：");
                if (strStart < 0)
                {

                }
                else
                {
                    strStart += "<span class=\"black i-reward\">悬赏分：".Length;
                    strLen = strContent.IndexOf("</span>", strStart) - strStart;
                    tempStr = strContent.Substring(strStart, strLen); //得到提问悬赏
                    QuestionData["qReward"] = tempStr;
                }
            }

            
            if (QuestionData["Error"] == "")
            {
                strStart = strContent.IndexOf("<pre id=\"question-content\">");
                if (strStart < 0)
                {

                }
                else
                {
                    strStart += "<pre id=\"question-content\">".Length;
                    strLen = strContent.IndexOf("</pre>", strStart) - strStart;
                    tempStr = strContent.Substring(strStart, strLen); //得到提问详细
                    QuestionData["qContent"] = tempStr;
                }
            }


            if (QuestionData["Error"] == "")
            {
                strStart = strContent.IndexOf("<pre id=\"question-suply\">");
                if (strStart < 0)
                {

                }
                else
                {
                    strStart += "<pre id=\"question-suply\">".Length;
                    strLen = strContent.IndexOf("</pre>", strStart) - strStart;
                    tempStr = strContent.Substring(strStart, strLen); //得到提问补充
                    QuestionData["qSupply"] = tempStr;

                }
            }
            

        }
        return QuestionData;
    }
}