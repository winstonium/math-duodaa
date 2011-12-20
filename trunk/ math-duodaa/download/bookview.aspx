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
<table width="700" class="allinfo" >
<tr>
<td rowspan="4" class="pictd"><div></div></td>
<td ><span class="title">世界人民的侦探</span></td>
</tr>

<tr>
<td><span class="author">作者：</span><span class="author">科南</span></td>
</tr>

<tr>
<td><span>出版社：</span><span>Springer</span></td>
</tr>

<tr>
<td>
<div class="downloadtext">下载链接:</div>
<div>1</div>
<span>下载地址1</span><span>下载地址2</span>

 </td>
</tr>

<tr>
<td>1</td>
<td>1</td>
</tr>

</table>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

