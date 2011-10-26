<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="a02.aspx.cs" Inherits="anouncements_a01" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
哆嗒公告-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="~/duodaainnerpage.css" rel="Stylesheet" />
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
<h2><samp><span>哆嗒网即将推出嗒币兑换计划</span></samp></h2>
<p class="bestTxt3">哆嗒网将推出嗒币兑换奖品计划。目前计划细节正在制定中。敬请期待。</p>
<p class="bestTxt">你身边的数学平台：哆嗒网&nbsp;</p>





</div>
<!--best end -->
</div>
<!--rightBotMain end -->
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

