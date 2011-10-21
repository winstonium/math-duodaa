<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="Prize.aspx.cs" Inherits="Prize" %>

<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" runat="server">
奖品兑换-<%=Application["CnWebName"]%>
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
<a href="default.aspx" class="direction" >哆嗒数学</a> <span class="direction">></span> <a href="#" class="direction">奖品兑换</a>

<h2><span>奖品兑换</span></h2>
 <p class="bestTxt"> <samp id="qState" runat="server"></samp>&nbsp;&nbsp;<samp id="qPrize" runat="server"></samp>&nbsp;&nbsp; <samp ID="qExpireTime" runat="server"></samp></p>    

<div id="p1" runat="server"></div>
<div id="p2" runat="server"></div>

<p class="bestTxt2">提问人：<asp:LinkButton ID="asker" runat="server" class="asker"></asp:LinkButton><asp:HyperLink ID="qq" runat="server" Target="_blank"></asp:HyperLink>  </p>





<br />

<div id="NotLoginNote" runat="server" visible="false" style="font-size: 25px">提示：你需要登录后才能提问和回答。</div>
<div id="EquationEditor" runat="server" style=" padding:20px 10px 20px 10px; background-color:#F1F8E9">
<script type="text/javascript" src="./jsfunction/viewshow.js"></script>


</div>

<br />
<br />

<asp:datalist id="answerdata" Runat="server">

<HeaderTemplate><p class="bestTxt"><%=elseAnswerStr %>回答<%=view_answercount %>条</p> </HeaderTemplate>
<ItemTemplate>

<div ><%#imgsShow(DataBinder.Eval(Container.DataItem,"pic").ToString(),0)%></div>
<div ><%#imgsShow(DataBinder.Eval(Container.DataItem,"pic").ToString(),1)%></div>

<p ><%#verifyOutput(DataBinder.Eval(Container.DataItem, "content").ToString())%></p>
<br />
<p class="bestTxt2">
    回答人： <%# ifSelfAnwser(DataBinder.Eval(Container.DataItem, "userid").ToString(), DataBinder.Eval(Container.DataItem, "username").ToString(), DataBinder.Eval(Container.DataItem, "content").ToString().Trim(), DataBinder.Eval(Container.DataItem, "QQ").ToString().Trim())%>
   <br />
   <a href='view_ok.aspx?uid=<%# DataBinder.Eval(Container.DataItem,"userid") %>&pid=<%# DataBinder.Eval(Container.DataItem,"problemsid") %>'>采纳答案</a> 
</p>
<br />
<div >- - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
<br />
<br class="spacer" />


</ItemTemplate>

</asp:datalist>

<!--
<p class="bestTxt3">Ut tempus neque vel arcu. Maecens eu mi. Vivamus placat <span>lacinia lorem.</span> Duis odio felis, luctus at, tristique eget, laoreetqis, leoaretra. Maecenas est arcu, dictum in, fermentumet, dus at, urna anteer.<a href="#"></a></p>

<p class="bestTxt">Sed semper scelerisque magna. In hac habitasse plav dictumst. Curabitur dapibus scelerisque moin neque neque, </p>
<p class="bestTxt2"><a href="http://www.duodaa.com">Acelit. proin tortor dui, blandit eu,</a> luctus non, tempus ut, augue odales. <span>Suspendisse eu purusvel</span> neque egestas odtport ullaer faucibus, nisi a auctor tristique, est nisl porta arcu,</p>
<p class="bestTxt2"><a href="http://www.duodaa.com">Acelit. proin tortor dui, blandit eu,</a> luctus non, tempus ut, augue odales. <span>Suspendisse eu purusvel</span> neque egestas odtport ullaer faucibus, nisi a auctor tristique, est nisl porta arcu,</p>
<p class="bestTxt2"><a href="http://www.duodaa.com">Acelit. proin tortor dui, blandit eu,</a> luctus non, tempus ut, augue odales. <span>Suspendisse eu purusvel</span> neque egestas odtport ullaer faucibus, nisi a auctor tristique, est nisl porta arcu,</p>
<p class="bestTxt3">Ut tempus neque vel arcu. Maecens eu mi. Vivamus placat <span>lacinia lorem.</span> Duis odio felis, luctus at, tristique eget, laoreetqis, leoaretra. Maecenas est arcu, dictum in, fermentumet, dus at, urna anteer.<a href="http://www.duodaa.com"></a></p>
<br class="spacer" />
-->


</div>
<!--best end -->
</div>
<!--rightBotMain end -->
</asp:Content>



<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
</asp:Content>

