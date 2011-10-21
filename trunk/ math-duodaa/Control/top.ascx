<%@ Control Language="c#" Inherits="zhidao.Control.top" CodeFile="top.ascx.cs" %>
 <style type="text/css">
#nav{
	background-color:#06C;
	height:24px;
	width: 900px;
   }
#nav ul {
	list-style-type: none;
	list-style-image: none;
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: none;
	border-left-style: none;
	padding: 0px;
	text-align:  center;
	vertical-align: middle;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	margin-left: 30px;
}
#nav ul li {
	float: left;
	text-align: center;
	vertical-align: middle;
	padding: 0px;
	background-color: #06C;

}
#nav ul li a {
	display: block;
	font-family: "微软雅黑";
	font-size: 15px;
	font-weight:500;
	font-style: normal;
	color: #FFF;
	margin-top: 0px;
	margin-right: 10px;
	margin-bottom: 0px;
	margin-left: 10px;
	text-decoration: none;	
	
}

#nav a:hover {
	color: #06C;
	text-decoration: underline;
	background-color: #FFF;
}

  .gsc-control-cse {
    font-family: Arial, sans-serif;
    border-color: #336699;
    background-color: #C5E6EC;
  }
  input.gsc-input {
    border-color: #94CC7A;
  }
  input.gsc-search-button {
    border-color: #cc9933;
    background-color: #cc9933;
  }
  .gsc-tabHeader.gsc-tabhInactive {
    border-color: #A9DA92;
    background-color: #66ff99;
  }
  .gsc-tabHeader.gsc-tabhActive {
    border-color: #A9DA92;
    background-color: #A9DA92;
  }
  .gsc-tabsArea {
    border-color: #A9DA92;
  }
  .gsc-webResult.gsc-result {
    border-color: #A9DA92;
    background-color: #FFFFFF;
  }
  .gsc-webResult.gsc-result:hover {
    border-color: #A9DA92;
    background-color: #FFFFFF;
  }
  .gs-webResult.gs-result a.gs-title:link,
  .gs-webResult.gs-result a.gs-title:link b {
    color: #B87B05;
  }
  .gs-webResult.gs-result a.gs-title:visited,
  .gs-webResult.gs-result a.gs-title:visited b {
    color: #788C11;
  }
  .gs-webResult.gs-result a.gs-title:hover,
  .gs-webResult.gs-result a.gs-title:hover b {
    color: #663300;
  }
  .gs-webResult.gs-result a.gs-title:active,
  .gs-webResult.gs-result a.gs-title:active b {
    color: #663300;
  }
  .gsc-cursor-page {
    color: #B87B05;
  }
  a.gsc-trailing-more-results:link {
    color: #B87B05;
  }
  .gs-webResult .gs-snippet {
    color: #101010;
  }
  .gs-webResult div.gs-visibleUrl {
    color: #788C11;
  }
  .gs-webResult div.gs-visibleUrl-short {
    color: #788C11;
  }
  .gs-webResult div.gs-visibleUrl-short {
    display: none;
  }
  .gs-webResult div.gs-visibleUrl-long {
    display: block;
  }
  .gsc-cursor-box {
    border-color: #A9DA92;
  }
  .gsc-results .gsc-cursor-page {
    border-color: #A9DA92;
    background-color: #FFFFFF;
  }
  .gsc-results .gsc-cursor-page.gsc-cursor-current-page {
    border-color: #A9DA92;
    background-color: #A9DA92;
  }
  .gs-promotion {
    border-color: #94CC7A;
    background-color: #CBE8B4;
  }
  .gs-promotion a.gs-title:link,
  .gs-promotion a.gs-title:link *,
  .gs-promotion .gs-snippet a:link {
    color: #0066CC;
  }
  .gs-promotion a.gs-title:visited,
  .gs-promotion a.gs-title:visited *,
  .gs-promotion .gs-snippet a:visited {
    color: #0066CC;
  }
  .gs-promotion a.gs-title:hover,
  .gs-promotion a.gs-title:hover *,
  .gs-promotion .gs-snippet a:hover {
    color: #0066CC;
  }
  .gs-promotion a.gs-title:active,
  .gs-promotion a.gs-title:active *,
  .gs-promotion .gs-snippet a:active {
    color: #0066CC;
  }
  .gs-promotion .gs-snippet,
  .gs-promotion .gs-title .gs-promotion-title-right,
  .gs-promotion .gs-title .gs-promotion-title-right *  {
    color: #454545;
  }
  .gs-promotion .gs-visibleUrl,
  .gs-promotion .gs-visibleUrl-short {
    color: #815FA7;
  }
</style>
<table cellpadding="0" cellspacing="0" border="0" width="900">
	<tr>
		<td style="width:200px"><a href=""><img alt="哆嗒网Logo" src="images/logo.gif" border="0" /></a></td>
		<td style="width:700px"></td>
	</tr>

   
    <tr>
    <td colspan="2">
    <div id="nav" >
    <ul>
    <li><a href="default.aspx">首页</a> </li>
    <li><a href="index.aspx">全部问题</a> </li>
    <li><a href="news.aspx">哆嗒独家</a> </li>
    <li><a href="#">资料下载</a> </li>
    <li><a href="#">奖品兑换</a> </li>
    </ul>   
    </div>
    </td>
    </tr>
    
    <tr>
    <td colspan="2" >
    <div style="width: 900px;">
    <div id="cse" style="width: 100%;">Loading</div>
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
    google.load('search', '1', { language: 'zh-CN', style: google.loader.themes.GREENSKY });
    google.setOnLoadCallback(function () {
        var customSearchControl = new google.search.CustomSearchControl('partner-pub-2689983092798329:4dm8agd2b41');
        customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
        var options = new google.search.DrawOptions();
        options.setAutoComplete(true);
        customSearchControl.draw('cse', options);}, true);
    </script>
    </div>
    <input type="button" name="tiwen" value="我要提问" style="width:200" onclick="top.location='tiwen.aspx';" />
    </td>
    </tr>
</table>


