<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="bookview.aspx.cs" Inherits="download_bookview" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
<%= booktitle %>-<%=bookchtitle %>-资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
    <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
  
  
<table width="700" cellpadding="0" cellspacing="0" class="allinfo" >
<tr>
<td rowspan="4" class="pictd">
<div><center> <img alt="<%=booktitle %>" title="<%=booktitle %>" src="<%= picUrl(bookpic)%>"  /></center></div>
</td>
<td style="width:580px">
<div class="title"> <%=booktitle %></div>
<div class="chinesetitle">中文书名：<%=bookchtitle %></div>
</td>
</tr>

<tr>
<td><span class="author">作者：</span><span class="author"><%=bookauthor %></span></td>
</tr>

<tr>
<td><span>出版社：</span><span><%=bookpub %></span></td>
</tr>

<tr>
<td style=" text-align:left;font-size: 13px;color: #327C8E;">

    资料标签：<%=string.Join( " ",booktags.Split('|')) %>
 </td>
</tr>
<tr>
<td colspan="2" style=" text-align:left;font-size: 13px;color: #327C8E;">
 <table cellpadding="0" cellspacing="0">
 <tr>
 <td style=" width:100px; text-align:center; vertical-align:middle;"><div class="downloadtext" style="float:left">下载链接:</div></td>
 <td >
  <div class="downloadtext1">第一次下载请务必了解<a href="#ins">下载说明</a>。</div>
<div></div>
<%=setDownUrl(bookurls)%>
 
 </td>
 </tr>
 </table> 
 
 
 </td>
</tr>

<tr>
<td colspan="2" >
<div style=" border: 2px solid #C0C0C0; padding: 20px; margin:20px">
<p>&nbsp;</p>
<div id="ins">下载说明：</div>
<p>&nbsp;</p>
<p>按以下步骤可以成功下载哆嗒数学网全部资料。</p>
<p>&nbsp;</p>
<p>1、点击本页对应的下载链接，将跳转到新页面。新页面的上方会出现如下图所示的横条。</p>
<p><img alt="哆嗒数学网下载说明" src="imgs/ins_01.gif" /></p>
<p>&nbsp;</p>
<p>2、上图中红圈部分将进行倒计时，当倒计时结束后，在该位置显示将发生变化，如下图所示。</p>
<p><img alt="哆嗒数学网下载说明" src="imgs/ins_02.gif" /></p>
<p>&nbsp;</p>
<p>3、点击红圈中的“跳过广告”将进入119g网盘资源页面。跟据网页提示，即可下载资源。如果发现有资料不能下载请<a href="/contact.aspx" target="_self">联系我们</a>。</p>
</div>

</td>
</tr>



</table>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
    <uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

