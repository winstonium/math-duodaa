<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="contact.aspx.cs" Inherits="contact" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
联系我们-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
<!--rightBotMain start -->
<div class="contactMain">
<!--rightBot start -->
<!--rightBot end -->
<br class="spacer" />
<!--best start -->
<div id="best">
<h2><span>联系我们 </span></h2>
<p class="bestTxt">你可以通过以下方式联系到我们。
</p>
<p class="bestTxt2 style4">&nbsp;</p>

    <table style="width: 100%;">
        <tr>
            <td style="vertical-align: middle;color: #333333;">
                 QQ群: 
            </td>
            <td style="font-size: 24px; vertical-align: middle; color: #333333;">
                 128709478    
            </td>
            <td>
            <a target="_blank" href="http://qun.qq.com/#jointhegroup/gid/128709478"><img border="0" src="images/joinus.png" alt="加入哆嗒" title="加入哆嗒" /></a> 
            </td>
            
        </tr>
        <tr>
            <td style="vertical-align:bottom;color: #333333;">
                 百度Hi群: 
            </td>
            <td style="font-size: 24px; vertical-align: bottom; color: #333333;">
                 1331647 
            </td>
            <td>
            <a target="_blank" href="baidu://addgroup/?id=1331647"><img border="0" src="images/joinus.png" alt="加入哆嗒" title="加入哆嗒" /></a>  
            </td>
            
        </tr>

         <tr>
            <td style="vertical-align:bottom;color: #333333;">
                 百度知道团队: 
            </td>
            <td style="font-size: 24px; vertical-align: bottom; color: #333333;">
                 哆嗒数学平台 
            </td>
            <td>
            <a target="_blank" href="http://z.baidu.com/team/view/%E5%93%86%E5%97%92%E6%95%B0%E5%AD%A6%E5%B9%B3%E5%8F%B0"><img border="0" src="images/joinus.png" alt="加入哆嗒" title="加入哆嗒" /></a>  
            </td>
            
        </tr>

        
         <tr>
            <td style="vertical-align:bottom;color: #333333;">
                 搜搜问问团队: 
            </td>
            <td style="font-size: 24px; vertical-align: bottom; color: #333333;">
                 哆嗒数学平台 
            </td>
            <td>
            <a target="_blank" href="http://wenwen.soso.com/t/t708090.htm"><img border="0" src="images/joinus.png" alt="加入哆嗒" title="加入哆嗒" /></a>  
            </td>
            
        </tr>


    </table>


    <br />
    <br />
<br class="spacer" />
</div>
<!--best end -->
</div>
<!--rightBotMain end -->
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

