
<?php


if(isset($_REQUEST['id']))
 $qid=$_REQUEST['id'];
 else $qid='0';

//echo $qid;
//读取xml
$qdoc = new DOMDocument(); 
$qdoc->load('view.xml'); //读取xml文件 

$qids = $qdoc->getElementsByTagName( "id" ); 
$qDoners = $qdoc->getElementsByTagName( "b_username" );
$qAskers = $qdoc->getElementsByTagName( "a_username" ); 
$qTitles = $qdoc->getElementsByTagName( "caption" ); 
$qContents = $qdoc->getElementsByTagName( "a_content" ); 
$aContents = $qdoc->getElementsByTagName( "b_content" ); 



for($i=0; isset($qids->item($i)->nodeValue);$i++)
{
	if($qids->item($i)->nodeValue==$qid)
	{   
	    
		$qAsker = $qAskers->item($i)->nodeValue;
		$qDoner = $qDoners->item($i)->nodeValue;
		$qTitle = $qTitles->item($i)->nodeValue;
		
		$qContent = $qContents->item($i)->nodeValue;
		$qContent = str_replace("\n","<br />",$qContent);
		
		$aContent = $aContents->item($i)->nodeValue;
		$aContent = str_replace("\n","<br />",$aContent);
		//$aContent = str_replace("_x000d_","",$aContent);
		
		$qContent_short = substr($qContent,0,200);
	    break;
	}
}
	
	//echo ($qTitle);
	
/*	
	if(isset($qTitle))
	{
		$html = file_get_contents('./view.txt');
		$html = str_replace("[-qa-Asker-]",$qAsker,$html);
		$html = str_replace("[-qa-Doner-]",$qDoner,$html);
		$html = str_replace("[-qa-question-title-]",$qContent,$html);
		$html = str_replace("[-qa-question-content-]",$qContent,$html);
		$html = str_replace("[-qa-answer-content-]",$aContent,$html);
		$html = str_replace("[-qa-question-content-short-]",$qContent_short,$html);
		
		$html =str_replace("\n","_x000d_",$html);
		
		}
	
*/

if(!isset($qTitle))
{
	header('Location:http://duodaa.com');
	exit;
	}



?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><HTML><!-- Powered by Question2Answer - http://www.question2answer.org/ --><HEAD>
<META content="text/html; charset=utf-8" http-equiv="Content-type"><TITLE><?php echo $qTitle; ?> - 
哆嗒数学网</TITLE>
<META name="description" content="<?php echo $qContent_short ?>">
<LINK rel="stylesheet" type="text/css" href="Oldpages/css/qa-styles.css">

<SCRIPT type="text/javascript" src="/MathJax/MathJax.js?config=default">
</SCRIPT>
<script type="text/javascript">/*120*270，创建于2012-6-2*/ var cpro_id = 'u924846';</script>
<script src="http://cpro.baidu.com/cpro/ui/f.js" type="text/javascript"></script>

<!--[if IE]><LINK rel="stylesheet" type="text/css" href="./css/ie.css"><![endif]-->
<META name="GENERATOR" content="MSHTML 9.00.8112.16441"></HEAD>
<BODY class="qa-template-question qa-body-js-off">
<SCRIPT type="text/javascript"><!--
			var b=document.getElementsByTagName('body')[0];
			b.className=b.className.replace('qa-body-js-off', 'qa-body-js-on');
		//--></SCRIPT>

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
<H1><SPAN class="entry-title"><?php echo $qTitle; ?></SPAN></H1>

<DIV id="q902" class="qa-q-view hentry question">

<DIV id="voting_902" class="qa-voting qa-voting-net">
<DIV class="qa-vote-buttons qa-vote-buttons-net"></DIV>
<DIV class="qa-vote-count qa-vote-count-net"></DIV>
<DIV class="qa-vote-clear"></DIV></DIV>
<DIV class="qa-q-view-main">
<DIV class="qa-q-view-content clearfix"><A name="902"></A>

<SPAN class="entry-content">
<?php echo $qContent; ?>

</SPAN>
</DIV><SPAN class="qa-q-view-meta">
<SPAN class="qa-q-view-who"><SPAN class="qa-q-view-who-pad">作者:</SPAN><SPAN class="qa-q-view-who-data"><SPAN 
class="vcard author"><A class="qa-user-link url nickname" href="http://www.duodaa.com/?qa=user/<?php echo $qAsker?>"><?php echo $qAsker?></A></SPAN></SPAN></SPAN></SPAN>
<DIV class="qa-q-view-buttons"><INPUT 
name="qa_click" type="hidden"></DIV>
<DIV style="display: none;" id="c902_list" class="qa-q-view-c-list"></DIV> <!-- END qa-c-list --></DIV></FORM>
<DIV class="qa-q-view-main">
<DIV style="display: none;" id="c902" class="qa-c-form">
<H2>请<A href="http://www.duodaa.com/?qa=login&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">登录</A>或<A 
href="http://www.duodaa.com/?qa=register&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">注册</A>后发表评论。</H2></DIV> 
<!-- END qa-c-form --></DIV> <!-- END qa-q-view-main -->
<DIV class="qa-q-view-clear"></DIV></DIV> <!-- END qa-q-view -->
<DIV style="display: none;" id="anew" class="qa-a-form">
<H2>请<A href="http://www.duodaa.com/?qa=login&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">登录</A>或<A 
href="http://www.duodaa.com/?qa=register&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">注册</A>后回答此问题。</H2></DIV> 
<!-- END qa-a-form -->
<H2><SPAN id="a_list_title">1个回答</SPAN></H2>
<DIV id="a_list" class="qa-a-list">
<DIV id="a903" class="qa-a-list-item hentry answer">
<FORM method="POST" action="./?qa=902/%E6%A6%82%E7%8E%87%E8%AE%BA">
<DIV id="voting_903" class="qa-voting qa-voting-net">
<DIV class="qa-vote-buttons qa-vote-buttons-net"></DIV>
<DIV class="qa-vote-count qa-vote-count-net"></DIV>
<DIV class="qa-vote-clear"></DIV></DIV>
<DIV class="qa-a-item-main">
<DIV class="qa-a-selection"></DIV>
<DIV class="qa-a-item-content"><A name="903"></A>
<SPAN class="entry-content">
<?php echo $aContent ?>
</SPAN>
</DIV><SPAN class="qa-a-item-meta">
    <SPAN 
class="qa-a-item-who"><SPAN class="qa-a-item-who-pad">作者:</SPAN><SPAN class="qa-a-item-who-data"><SPAN 
class="vcard author"><A class="qa-user-link url nickname" href="http://www.duodaa.com/?qa=user/<?php echo $qDoner ?>"><?php echo $qDoner ?></A></SPAN></SPAN></SPAN></SPAN>
<DIV class="qa-a-item-buttons"></DIV>
<DIV style="display: none;" id="c903_list" class="qa-a-item-c-list"></DIV> <!-- END qa-c-list --></DIV></FORM>
<DIV class="qa-a-item-main">
<DIV style="display: none;" id="c903" class="qa-c-form">
<H2>请<A href="http://www.duodaa.com/?qa=login&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">登录</A>或<A 
href="http://www.duodaa.com/?qa=register&amp;to=%3Fqa%3D902%2F%25E6%25A6%2582%25E7%258E%2587%25E8%25AE%25BA">注册</A>后发表评论。</H2></DIV> 
<!-- END qa-c-form --></DIV> <!-- END qa-a-item-main -->
<DIV class="qa-a-item-clear"></DIV></DIV> <!-- END qa-a-list-item --></DIV> <!-- END qa-a-list --></DIV> 
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

