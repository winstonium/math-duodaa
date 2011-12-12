<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="mainlist.aspx.cs" Inherits="download_Default" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>



<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
    <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />

    
</asp:Content>


<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">






<asp:DataList ID="class1" runat="server" CssClass="downclasstab" ItemStyle-CssClass="downunittd" HeaderStyle-CssClass="titletd" RepeatColumns="3" RepeatDirection="Horizontal">
<HeaderTemplate>
<a href="books.aspx" target="_blank">图&nbsp;&nbsp;&nbsp;&nbsp;书</a>
</HeaderTemplate>
<ItemTemplate>
<ul>
    <li><a href="bookview_<%#DataBinder.Eval(Container.DataItem,"ID").ToString().Trim()  %>.html" target="_blank" class="title"><%#  DataBinder.Eval(Container.DataItem,"Title").ToString().Trim()  %></a></li>
    <li class="chinesetitle"><%#  DataBinder.Eval(Container.DataItem, "ChineseTitle").ToString().Trim() %></li>
    <li class="author"><%#  DataBinder.Eval(Container.DataItem,"Author").ToString().Trim()  %></li>
    <li class="publisher"><%#  DataBinder.Eval(Container.DataItem, "Publisher").ToString().Trim()%></li>
    <li class="pages"><%#  DataBinder.Eval(Container.DataItem, "Pages").ToString().Trim()%>页</li>
    </ul>

    
</ItemTemplate>
<FooterStyle CssClass="more" />
<FooterTemplate>
<a href="books.aspx" target="_blank">更多...</a>
</FooterTemplate>
</asp:DataList>

</asp:Content>


<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
    <uc1:buttom runat="server"  />
 
</asp:Content>

