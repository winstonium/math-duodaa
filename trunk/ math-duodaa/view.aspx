<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" ValidateRequest="false" EnableViewState="false" CodeFile="view.aspx.cs" Inherits="view" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>

<asp:Content ContentPlaceHolderID="titleStr" runat="server">
<%=view_qTitle%>-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content1" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="mainContent" Runat="Server">
<!--rightBotMain start -->
<div id="rightBotMain">
<!--rightBot start -->
<!--rightBot end -->
<br class="spacer" />
<!--best start -->

<script type="text/javascript" src="MathJax/MathJax.js"></script>
<asp:TextBox ID="_id" runat="server" Visible="false"></asp:TextBox>

<div id="best">
<br />
<a href="default.aspx" class="direction" >哆嗒数学</a> <span class="direction">></span> <a href="<%=view_qGradeLink %>" class="direction"><%=view_qGrade%></a>

<h2><samp><span><%=view_qTitle%></span></samp></h2>

 <p class="bestTxt"> <samp id="qState" runat="server"></samp>&nbsp;&nbsp;<samp id="qPrize" runat="server"></samp>&nbsp;&nbsp; <samp ID="qExpireTime" runat="server"></samp></p>    

<!-- JiaThis Button BEGIN -->
<div id="ckepop"><span class="jiathis_txt">分享到：</span>
<a class="jiathis_button_icons_1"></a>
<a class="jiathis_button_icons_2"></a>
<a class="jiathis_button_icons_3"></a>
<a class="jiathis_button_icons_4"></a>
<a class="jiathis_button_icons_5"></a>
<a href="http://www.jiathis.com/share?uid=1542635" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
<a class="jiathis_counter_style"></a>
</div>
<script type="text/javascript" >
    var jiathis_config = {
        data_track_clickback: true,
        url: location.href,
        summary: "<%=view_qState %>",
        title: "哆嗒数学网：" + "<%=view_qTitle%> ##",
        hideMore: false
    }
</script>
<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js?uid=1542635" charset="utf-8"></script>
<!-- JiaThis Button END -->


<p>&nbsp;</p>
<br />
<br />
<div id="p1" runat="server"></div>
<div id="p2" runat="server"></div>
<%=view_qContent%>
<br />
<br />
<p class="bestTxt2">提问人：<asp:LinkButton ID="asker" runat="server" class="asker"></asp:LinkButton><asp:HyperLink ID="qq" runat="server" Target="_blank"></asp:HyperLink>  </p>




<br />


<div runat="server" id="bestAnswerDiv" style="padding: 10px; border: 2px solid #FF9933; height:30%;">
<p class="bestTxt">&nbsp;&nbsp;<img alt="最佳答案" title="最佳答案"  src="images/bestAnswer.png" />&nbsp;&nbsp;最佳答案</p>
<div id="bestAnswerPic1" runat="server"></div>
<div id="bestAnswerPic2" runat="server"></div>
<p><%=bestAnswerContent %></p>
<br />
<p class="bestTxt2">回答者：<%=bestAnswerDoner %> </p>

</div>
<br />

<div id="NotLoginNote" runat="server" visible="false" style="font-size: 25px">提示：你需要登录后才能提问和回答。</div>
<div id="EquationEditor" runat="server" style=" padding:20px 10px 20px 10px; background-color:#F1F8E9">
<script type="text/javascript" src="./jsfunction/viewshow.js"></script>
<uc1:EquationEditor ID="EqEditor" runat="server" qID="0" ></uc1:EquationEditor>

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
<asp:Content ID="Content3" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

