<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="anounce.aspx.cs" Inherits="anounce" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
哆嗒公告-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
<!--rightBotMain start -->
<div id="rightBotMain">
<!--rightBot start -->
<!--rightBot end -->
<br class="spacer" />
<!--best start -->


<div id="best">
<br />
<h2><samp><span>哆嗒公告</span></samp></h2>
<p class="bestTxt"><%=anouncetitle %></p>
<p class="bestTxt3"><%=anouncecontent %></p>
<br />
<br />
<p style="font-size: 14px; font-family: 华文中宋; color: #336699;">你身边的数学平台：哆嗒网&nbsp;</p>


</div>
<!--best end -->
</div>
<!--rightBotMain end -->
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

