<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="mainlist.aspx.cs" Inherits="download_Default" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
<link type="text/css" href="downpages.css" rel="Stylesheet" />
    <style type="text/css">
        .classtitlediv
        {
            height: 20px;
            width: 167px;
        }
    </style>
</asp:Content>


<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">



<div class="downclassdiv">
<div class="classtitlediv">图书</div>
<div class="downunitdiv"></div>
<div class="downunitdiv"></div>
</div>



</asp:Content>


<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
  
</asp:Content>

