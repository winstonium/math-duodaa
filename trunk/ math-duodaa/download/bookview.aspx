<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="bookview.aspx.cs" Inherits="download_bookview" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
全部图书-资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
    <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
    <table width="700" cellpadding="0" cellspacing="0" class="allinfo" >
<tr>
<td rowspan="4" class="pictd"><div></div></td>
<td style="width:580px"><span class="title">世界人民的侦探</span></td>
</tr>

<tr>
<td><span class="author">作者：</span><span class="author">科南</span></td>
</tr>

<tr>
<td><span>出版社：</span><span>Springer</span></td>
</tr>

<tr>
<td >
<div class="downloadtext" style="float:left">下载链接:</div><div class="downloadtext1">第一次下载请务必了解<a href="#ins">下载说明</a>。</div>
<div></div>
<span class="downlink"><a href="#" >下载地址1</a></span><span class="downlink"><a href="#">下载地址2</a></span>

 </td>
</tr>

<tr>
<td colspan="2" style="padding:0px 0px 0px 10px;">
<p>&nbsp;</p>
<div id="ins">下载说明：</div>
<p>&nbsp;</p>
<p>按以下步骤可以成功下载哆嗒数学网全部资料。</p>
<p>&nbsp;</p>
<p>1、点击本页对应的下下载链接，将跳转到新页面。新页面的上方会出现如下图所示的横条。</p>
<p><img alt="哆嗒数学网下载说明" src="imgs/ins_01.gif" /></p>
<p>&nbsp;</p>
<p>2、上图中红圈部分将进行倒计时，当倒计时结束后，在该位置显示将发生变化，如下图所示。</p>
<p><img alt="哆嗒数学网下载说明" src="imgs/ins_02.gif" /></p>
<p>&nbsp;</p>
<p>3、点击红圈中的“跳过广告”将进入119g网盘资源页面。跟据网页提示，即可下载资源。如果发现有资料不能下载请<a href="/contact.aspx" target="_self">联系我们</a>。</p>


</td>
</tr>

</table>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
    <uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

