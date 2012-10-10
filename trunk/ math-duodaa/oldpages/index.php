
<?php
//读取xml
$qdoc = new DOMDocument(); 
$qdoc->load('view.xml'); //读取xml文件 

$qids = $qdoc->getElementsByTagName( "id" ); 
$qAskers = $qdoc->getElementsByTagName( "a_username" ); 
$qTitles= $qdoc->getElementsByTagName( "caption" ); 



?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><HTML><!-- Powered by Question2Answer - http://www.question2answer.org/ --><HEAD>
<META content="text/html; charset=utf-8" http-equiv="Content-type">
<TITLE>
哆嗒数学网 - 网老问题总览</TITLE>
<META name="description" content="哆嗒数学网老问题总览">
<LINK rel="stylesheet" type="text/css" href="/oldpages/css/qa-styles.css">

<style>
div.qdiv {
	font-family: "微软雅黑";
	font-size: 13px;
	padding-top: 3px;
	padding-right: 2px;
	padding-bottom: 3px;
	padding-left: 2px;	
	}

div.qdiv a.qlink{ }
div.qdiv a.qlink:hover{}

div.qdiv a.qasker{
	font-size: 11px;
	
	padding-left: 5px;
}
div.qdiv a.asker:hover{}
</style>

<SCRIPT type="text/javascript" src="/MathJax/MathJax.js?config=default">
</SCRIPT>

<!--[if IE]><LINK rel="stylesheet" type="text/css" href="/oldpages/css/ie.css"><![endif]-->
</HEAD>
<BODY class="qa-template-question qa-body-js-off">


<DIV class="qa-body-wrapper">
<DIV class="qa-header">
<DIV class="qa-logo"><A class="qa-logo-link" href="http://www.duodaa.com/">哆嗒数学网</A></DIV>
<DIV class="qa-search">
<FORM method="GET" action="../?qa=search"><INPUT name="qa" value="search" type="hidden"><INPUT 
class="qa-search-field" name="q"><INPUT class="qa-search-button" value="搜索" type="submit"></FORM></DIV>
<DIV class="qa-nav-user">
<UL class="qa-nav-user-list">
  <LI class="qa-nav-user-item qa-nav-user-login"><A class="qa-nav-user-link" 
  href="http://www.duodaa.com/?qa=login&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">登录</A></LI>
  <LI class="qa-nav-user-item qa-nav-user-register"><A class="qa-nav-user-link" 
  href="http://www.duodaa.com/?qa=register&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">注册</A></LI></UL>
<DIV class="qa-nav-user-clear"></DIV></DIV>
<DIV class="qa-nav-main">
<UL class="qa-nav-main-list">
  <LI class="qa-nav-main-item qa-nav-main-custom-3"><A class="qa-nav-main-link" 
  href="http://www.duodaa.com//">首页</A></LI>
  <LI class="qa-nav-main-item qa-nav-main-questions"><A class="qa-nav-main-link" 
  href="http://www.duodaa.com/?qa=questions">问题</A></LI>
  <LI class="qa-nav-main-item qa-nav-main-unanswered"><A class="qa-nav-main-link" 
  href="http://www.duodaa.com/?qa=unanswered">待回复</A></LI>
  <LI class="qa-nav-main-item qa-nav-main-tag"><A class="qa-nav-main-link" href="http://www.duodaa.com/?qa=tags">标签</A></LI>
  <LI class="qa-nav-main-item qa-nav-main-user"><A class="qa-nav-main-link" 
  href="http://www.duodaa.com/?qa=users">用户</A></LI>
  <LI class="qa-nav-main-item qa-nav-main-ask"><A class="qa-nav-main-link" href="http://www.duodaa.com/?qa=ask">提问</A></LI></UL>
<DIV class="qa-nav-main-clear"></DIV></DIV>
<DIV class="qa-header-clear"></DIV></DIV> <!-- END qa-header -->
<DIV class="qa-sidepanel">
<DIV class="qa-sidebar">这里是<SPAN style="font-size: 18px;">哆嗒数学网</SPAN>。<BR><BR>
一个提出和回答数学问题的网站。				</DIV>
<DIV class="qa-nav-cat">
<UL class="qa-nav-cat-list qa-nav-cat-list-1">
  <LI class="qa-nav-cat-item qa-nav-cat-all"><A class="qa-nav-cat-link qa-nav-cat-selected" 
  href="http://www.duodaa.com/">所有分类</A></LI>
  <LI class="qa-nav-cat-item qa-nav-cat-小-学-数-学"><A class="qa-nav-cat-link" 
  href="http://www.duodaa.com/?qa=%E5%B0%8F-%E5%AD%A6-%E6%95%B0-%E5%AD%A6">小学数学</A></LI>
  <LI class="qa-nav-cat-item qa-nav-cat-中-学-数-学"><A class="qa-nav-cat-link" 
  href="http://www.duodaa.com/?qa=%E4%B8%AD-%E5%AD%A6-%E6%95%B0-%E5%AD%A6">中学数学</A></LI>
  <LI class="qa-nav-cat-item qa-nav-cat-大-学-数-学"><A class="qa-nav-cat-link" 
  href="http://www.duodaa.com/?qa=%E5%A4%A7-%E5%AD%A6-%E6%95%B0-%E5%AD%A6">大学数学</A></LI>
  <LI class="qa-nav-cat-item qa-nav-cat-专-业-数-学"><A class="qa-nav-cat-link" 
  href="http://www.duodaa.com/?qa=%E4%B8%93-%E4%B8%9A-%E6%95%B0-%E5%AD%A6">专业数学</A></LI></UL>
<DIV class="qa-nav-cat-clear"></DIV></DIV><BR><SPAN style='color: rgb(255, 102, 153); font-family: "微软雅黑"; font-size: 14px; font-weight: bold;'>温馨提示</SPAN><BR><BR>
<DIV 
style='color: rgb(51, 102, 204); font-family: "微软雅黑"; font-size: 14px;'>在两个'<CODE>$</CODE>'之间输入LaTeX代码可以输入公式。</DIV><BR>
<DIV 
style='color: rgb(51, 102, 204); font-family: "微软雅黑"; font-size: 14px;'>在两个'<CODE>`</CODE>'(大键盘数字1左边那个)之间输入AscIIMath代码可以输入公式。</DIV><BR>
<DIV 
style='color: rgb(51, 102, 204); font-family: "微软雅黑"; font-size: 14px;'>公式加载完成前，可能会显示很多乱码，请耐心等待。如果等待时间超过1分钟，请刷新页面再试。</DIV></DIV>
<DIV class="qa-main">
<br/>
<?php 

$page=isset($_REQUEST['page'])?$_REQUEST['page']:1;
//设置每页显示条数
$Count_per_Page = 400 ;

for($i= $Count_per_Page *($page-1); $i< $Count_per_Page * $page && isset($qids->item($i)->nodeValue) ;$i++)
{
		 
	    $qid = $qids->item($i)->nodeValue;
		$qAsker = $qAskers->item($i)->nodeValue;
		//$qDoner = $sheetData[$i]['C'];
		$qTitle = $qTitles->item($i)->nodeValue;
		
		echo '<div class="qdiv">';
		echo '<a class="qlink" target="_blank" href="\view_'.$qid.'.html">'.$qTitle.'</a>';
		echo '<span style="font-size: 11px;">&nbsp;&nbsp;作者</span><a class="qasker" target="_blank" href="\?qa=user/'.$qAsker.'">'.$qAsker.'</a>';
		echo '</div>'."\n";
		

	}



?>


 <!-- END qa-a-list --></DIV> 
<!-- END qa-main -->
<DIV class="qa-footer">
<DIV class="footer-copyright">
<P>Copyright © 2012 哆嗒数学网 - All rights reserved.</P></DIV>
<DIV class="qa-attribution">					Powered by <A href="http://www.question2answer.org/">Question2Answer</A></DIV>
<DIV class="footer-credit">
<P>Theme Designed By: <A href="http://pixelngrain.com/">Pixel n 
Grain</A></P></DIV>
<DIV class="qa-nav-footer">
<UL class="qa-nav-footer-list">
  <LI class="qa-nav-footer-item qa-nav-footer-feedback"><A class="qa-nav-footer-link" 
  href="http://www.duodaa.com/?qa=feedback">反馈</A></LI></UL>
<DIV class="qa-nav-footer-clear"></DIV></DIV>
<DIV class="qa-footer-clear"></DIV></DIV> <!-- END qa-footer --></DIV> <!-- END body-wrapper --><BR>
<SCRIPT type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F273defd6e057b6f121bd13ce24190832' type='text/javascript'%3E%3C/script%3E"));
</SCRIPT>
<!-- Powered by Question2Answer - http://www.question2answer.org/ --></BODY></HTML>

