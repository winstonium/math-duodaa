<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="mainlist.aspx.cs" Inherits="download_Default" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>



<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
<link type="text/css" href="downpages.css" rel="Stylesheet" />
    
</asp:Content>


<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">



<div class="downclassdiv">
<div class="downtitlediv"><a href="#" target="_blank">图书</a></div>

<div class="unitsbar">
<div>
<div class="downunitdiv">
    ddddddddddd<br />
    ffffffffff</div>

</div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>



</div>

<div class="unitsbar">
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
</div>

<div class="unitsbar">
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
<div><div class="downunitdiv">ddddddddddd<br />
    ffffffffff</div></div>
</div>

<div>
    <a href="#" target="_blank">更多...</a>
        </div>
</div>





</asp:Content>


<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
  
</asp:Content>

