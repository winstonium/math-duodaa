<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="Default" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>

<asp:Content ContentPlaceHolderID="titleStr" runat="server"><%=Application["CnWebName"] %></asp:Content>
<asp:Content ID="CssStyle" runat="server" ContentPlaceHolderID="linkCss">
<link type="text/css" href="duodaahomepage.css" rel="stylesheet" />
</asp:Content>
<asp:Content ID="mnContent" ContentPlaceHolderID="mainContent" Runat="Server">
<!--rightBotMain start -->
<div id="rightBotMain">
<!--rightBot start -->
<div id="rightBot">
<p class="top"></p>
<!--rightBot2 start -->
<div id="rightBot2">
<h1></h1>

<a href="#" class="whatSp"></a>
<ul class="rightLink1">
<asp:DataList runat="server" ID="promotionlist">
<ItemTemplate>
<li><a href="<%#DataBinder.Eval(Container.DataItem,"link")  %>" >[<%#DataBinder.Eval(Container.DataItem, "class").ToString()%>]<%# DataBinder.Eval(Container.DataItem,"title").ToString() %>【<%#DataBinder.Eval(Container.DataItem, "author").ToString()%>】</a></li>
</ItemTemplate>
</asp:DataList>

</ul>
<br class="spacer" />
</div>


<div style="font-size: 14px; font-family: 宋体, Arial, Helvetica, sans-serif; border: 1px solid #eeeeee; font-weight: bold; color: #808080;"  >
赞助商广告<br />
<!--Obeus.com Ads (Duodaa Math) Begin-->
<script type="text/javascript" src="http://obeus.com/initframe/58208/?site=41811"></script><noscript><a href="http://obeus.com">Obeus.com</a> - <a href="http://obeus.com/pay-per-click-advertising/">Advertising, Pay Per Click</a>, <a href="http://obeus.com/affiliate-program/">Affiliate Program, Pay Per Click</a>. More about <a href="http://obeus.com/site_info/41811/">Duodaa Math</a></noscript>
<!--Obeus.com Ads (Duodaa Math) End-->



</div>

<!--rightBot2 end -->
<p class="bot"></p>
<br class="spacer" />
</div>
<!--rightBot end -->
<br class="spacer" />
<!--best start -->
<div id="best">
<h2><span>最新问题</span></h2>
<p class="bestTxt">哆嗒网友正在问如下问题
</p>
<asp:datalist id="LatestQuestion" runat="server">
<ItemTemplate>
<p class="bestTxt2"><span> <b><%# GetConstant.gradeClassName[int.Parse(DataBinder.Eval(Container.DataItem,"grade").ToString())] %></b> </span>&nbsp;<a href="view_<%# DataBinder.Eval(Container.DataItem,"id").ToString() %>.html"><%# titleshow(DataBinder.Eval(Container.DataItem,"caption").ToString().Trim()) %></a>&nbsp; <%#prizeshow(DataBinder.Eval(Container.DataItem, "prize").ToString().Trim())%> <%#DataBinder.Eval(Container.DataItem, "answer").ToString()%>回答</p>
</ItemTemplate>
</asp:datalist>



<h2><span>最近解决问题</span></h2>
<p class="bestTxt">近期内为网友解决的问题
</p>
<asp:datalist id="LatestDone" runat="server">
<ItemTemplate>
<p class="bestTxt2"><span> <b><%# GetConstant.gradeClassName[int.Parse(DataBinder.Eval(Container.DataItem,"grade").ToString())] %></b> </span>&nbsp;<a href="view_<%# DataBinder.Eval(Container.DataItem,"id").ToString() %>.html"><%# titleshow(DataBinder.Eval(Container.DataItem,"caption").ToString().Trim()) %></a>&nbsp;·&nbsp;<%#GetInfo.getUsernameFromID(Int32.Parse( GetInfo.getAnswerDoner(DataBinder.Eval(Container.DataItem, "id").ToString().Trim())))%></p>
</ItemTemplate>
</asp:datalist>
<!--
<p class="bestTxt2"><span><b>小学数学</b>  </span><a href="#">我们为什么要定义无理数？</a>·leitingok</p>

-->

<!--
<p class="bestTxt3">Ut tempus neque vel arcu. Maecens eu mi. Vivamus placat <span>lacinia lorem.</span> Duis odio felis, luctus at, tristique eget, laoreetqis, leoaretra. Maecenas est arcu, dictum in, fermentumet, dus at, urna anteer.<a href="http://www.865171.cn"></a></p>
<p class="pic"></p>
-->
<br class="spacer" />
</div>
<!--best end -->
</div>
<!--rightBotMain end -->
<!--last panel start -->
<div id="last">
<p class="lastTop"></p>


<p></p>
<h2 class="res"><span><b>公告</b></span></h2>
<ul>
<asp:DataList runat="server" ID="anouncelist">
<ItemTemplate>
<li><a href="<%#DataBinder.Eval(Container.DataItem,"link")  %>" ><%# titleshow( DataBinder.Eval(Container.DataItem,"title").ToString() )%></a></li>
</ItemTemplate>
</asp:DataList>


</ul>
<h2 class="future"><span>赞助商广告</span></h2>
<div style="width: 100%; text-align: center">


<script type="text/javascript">
    clicksor_enable_adhere = false;
    //default pop-under house ad url
    clicksor_enable_pop = true; clicksor_frequencyCap = -1;
    durl = ''; clicksor_enable_layer_pop = false;
    //default banner house ad url 
    clicksor_default_url = '';
    clicksor_banner_border = '#99CC33'; clicksor_banner_ad_bg = '#FFFFFF';
    clicksor_banner_link_color = '#000000'; clicksor_banner_text_color = '#666666';
    clicksor_banner_image_banner = true; clicksor_banner_text_banner = true;
    clicksor_layer_border_color = '';
    clicksor_layer_ad_bg = ''; clicksor_layer_ad_link_color = '';
    clicksor_layer_ad_text_color = ''; clicksor_text_link_bg = '';
    clicksor_text_link_color = ''; clicksor_enable_text_link = false;
    clicksor_layer_banner = false;
</script>
<script type="text/javascript" src="http://ads.clicksor.com/newServing/showAd.php?nid=1&amp;pid=193074&amp;adtype=4&amp;sid=306278"></script>
<noscript><a href="http://www.yesadvertising.com">affiliate marketing</a></noscript>


</div>

<br class="spacer" />
<!--
<h3>Aenean in lorem</h3>
<p class="lastTxt">non nisl gravida gravida. Nampd</p>
<a href="" class="plan">feugiat leo sed nulla.</a>
<h3>Fusce vel nequeIcidunt</h3>
<p class="lastTxt">tempus fementum, nisl at aliquet</p>
<a href="#" class="plan">ullamcorper, pentum ela</a>
<h3>Consectetuer auectetuer tum  elementum nisi</h3>
<p class="lastTxt">facilisis lacinia, libero ligula euiod erat, eget lobortis ante nisl ut qam.</p>
<a href="#" class="plan">Duis convallis,</a>
<h3>Proin facilisis tincidunt aue</h3>
<p class="lastTxt">Neque est et risus. Sed ornare</p>
<a href="" class="plan">facilisis tortor. Namin</a>
-->
<p class="lastBot"></p>
</div>




</asp:Content>

<asp:Content ID="btContent" runat="server" ContentPlaceHolderID="buttomContent" >

<uc1:buttom runat="server"  />
</asp:Content>