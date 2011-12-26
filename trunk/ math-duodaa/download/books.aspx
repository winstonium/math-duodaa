<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="books.aspx.cs" Inherits="download_books" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>
<%@ Register Assembly="AspNetPager" Namespace="Wuqi.Webdiyer" TagPrefix="webdiyer" %>


<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
全部图书-资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
   <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
<br />

         <webdiyer:AspNetPager runat="server" ID="pager1" 
          onpagechanged="pager1_PageChanged" 
          CssClass="paginator"
          CurrentPageButtonClass="cpb" 
          EnableUrlRewriting="true" UrlRewritePattern="./books_page{0}.html"
          >      
         </webdiyer:AspNetPager>
<asp:DataList ID="dl1" 
              runat="server"
              CssClass="showalltab" 
              Width="760px"
              >
              
              <ItemTemplate>
              
             <div class="showallunits">
                <div class="pic"><a href="" target="_blank"><img alt="<%#  DataBinder.Eval(Container.DataItem, "Title").ToString().Trim() %>" src="<%# picUrl(DataBinder.Eval(Container.DataItem, "Pics").ToString().Trim()) %>"  /></a></div>
               <div class="showallunitsdetail">
                <div class="title"><a href="#"><%#  DataBinder.Eval(Container.DataItem, "Title").ToString().Trim() %></a></div>
                <div class="chinesetitle"><%#  DataBinder.Eval(Container.DataItem, "ChineseTitle").ToString().Trim() %></div>
                <div class="author"><%#  DataBinder.Eval(Container.DataItem, "Author").ToString().Trim() %></div>
                <div class="publisher"><%#  DataBinder.Eval(Container.DataItem, "Publisher").ToString().Trim() %></div>
               </div>
             </div>

         
              </ItemTemplate>
                          
              </asp:DataList>

              <webdiyer:AspNetPager runat="server" ID="pager2" 
        onpagechanged="pager2_PageChanged" 
         CssClass="paginator"
         CurrentPageButtonClass="cpb" 
         EnableUrlRewriting="true" UrlRewritePattern="./books_page{0}.html"
        >
        </webdiyer:AspNetPager>

</asp:Content>




<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom ID="Buttom1" runat="server"  />
</asp:Content>

