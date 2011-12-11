<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="All.aspx.cs" Inherits="AllProblems_All" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>
<%@ Register Assembly="AspNetPager" Namespace="Wuqi.Webdiyer" TagPrefix="webdiyer" %>



<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
全部问题-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
<link type="text/css" href="allproblem.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">

<asp:DataList ID="dl1" 
              runat="server"
              CellPadding="5"
               Width="700"
              >
              <ItemTemplate>
              <a class="ptitle" href="/view_<%# DataBinder.Eval(Container.DataItem,"id") %>.html" target="_blank"><%#DataBinder.Eval(Container.DataItem,"caption")%></a>
                
              </ItemTemplate>
            
              
              
              </asp:DataList>
<webdiyer:AspNetPager runat="server" ID="pager1" 
        onpagechanged="pager1_PageChanged" 
         CssClass="paginator"
         CurrentPageButtonClass="cpb" 
         EnableUrlRewriting="true" UrlRewritePattern="./all_pages_{0}.html"
        >
        </webdiyer:AspNetPager>

        

         

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

