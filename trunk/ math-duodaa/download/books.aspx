<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="books.aspx.cs" Inherits="download_books" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>
<%@ Register Assembly="AspNetPager" Namespace="Wuqi.Webdiyer" TagPrefix="webdiyer" %>


<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
<%=bkTitle %>-<%=bkChineseTitle %>-资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
   <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">

<table class="showalltab" rules="rows"  width="760">
<tr>
<td >
<div class="showallunits">
<div ></div>

</div>

</td>
</tr>
<tr>
<td >
<div class="showallunits">
<div ></div>

</div>

</td>
</tr>
</table>
</asp:Content>


<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

