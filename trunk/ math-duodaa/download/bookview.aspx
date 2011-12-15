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
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

