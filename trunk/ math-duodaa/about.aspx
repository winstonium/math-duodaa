﻿<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="about.aspx.cs" Inherits="about" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>



<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
关于哆嗒数学-<%=Application["CnWebName"]%>
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
<h2><samp><span>关于哆嗒数学</span></samp></h2>
<p class="bestTxt">Duodaa.com的诞生</p>
<p class="bestTxt3">2010年，哆嗒网正式诞生了。这是一个为数学学习者及爱好者交流、互助途径的平台。它采用MathJax技术，方便的使用LaTeX代码输入公式，为大家提供专业、准确而简单的数学符号及公式输入手段。同时也成为数学爱好者之间分享数学学习经验及资料的家园。它欢迎一切对数学具有浓厚兴趣或疑问的人们，愿意为彼此驾起便捷、通畅的联系桥梁。在这里，你不必担心成为绝望的孤岛独思者，这里有千千万万的同伴，陪你一同在数学的海洋里畅游。
</p>
<p class="bestTxt">&nbsp;</p>



<p class="bestTxt">Duodaa.com的成长</p>
<p class="bestTxt3">如果你也爱好数学，请不要吝惜你的热情。请将你的迷惑、思考或者是经验及智慧，通过哆嗒网尽情的展现。也许你的一个小小问题，会触发一段美妙的思考，也许你的一个简简单单的答案，会照亮一段思考的迷途，也许你的一份看似普通的学习资料，帮助了千千万万个需要它的人们。你还可以捐助哆嗒网站，也许是一分一毫，但也促进它更快更好的成长，为更多的人看到它、加入它贡献一点力量。
</p>

<p class="bestTxt">&nbsp;</p>


<p class="bestTxt">Duodaa.com的目标</p>
<p class="bestTxt3">哆嗒网不仅希望能够即时解决数学学习者、爱好者遇到的问题，也希望通过努力使数学学习成为大家热爱思考、追求智慧的途径之一,更希望通过网站的建设和运营，帮助更多的人开始或者更好的学习数学。爱上数学，爱上数学学习网，爱上哆嗒数学平台。
</p>

<p class="bestTxt">&nbsp;</p>


</div>
<!--best end -->
</div>
<!--rightBotMain end -->
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

