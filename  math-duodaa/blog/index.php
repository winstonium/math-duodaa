<?php 
require 'config.php';
require_once BLOG_QAROOT.'/qa-include/qa-base.php';
require_once BLOG_QAROOT.'/qa-include/qa-app-users.php';

//基本的函数载入
require_once BLOG_ROOT.'/include/strings.php';
require_once BLOG_ROOT.'/include/articles.php';
require_once BLOG_ROOT.'/include/users.php';

//语言与主题
require_once BLOG_ROOT.'/lang/'.BLOG_LANG.'/lang.php';
$blog_lang= new blog_lang();
require_once BLOG_ROOT.'/theme/'.BLOG_THEME.'/theme.php';
//require_once BLOG_ROOT;

$blog_user_handle=trim(qa_get_logged_in_handle());

$is_acted=is_activated($blog_user_handle);

$bqs='';
if($is_acted==-2)
{
	$bqs='not_log_on';
    echo $blog_lang->error_info['not_log_on'];
	exit;

}

if($is_acted==-1)
{
	$bqs='blocked';
    echo '<script>window.location.href="'.BLOG_NOTLOGIN_TRANSFER.'"</script>';
	exit;

}

if($is_acted==0)
{
	$bqs='not_activated';
    echo '<script>window.location.href="'.BLOG_NOTLOGIN_TRANSFER.'"</script>';
	exit;

}

//require_once 'theme/'.BOLOG_THEME.'/theme.php';

//echo $blog_user_handle;
//echo BLOG_QAROOT;




$bqs=blog_get_query_str();

$blog_page=new blog_page();
$blog_page->pagetype=$bqs;
$blog_page->print_page();

//首页代码
if($bqs=='home')
{
	//echo is_activated($blog_user_handle);
	//echo is_activated('hahaha').'||';
	
	//$ats = blog_load_articles('math001','','id',0);
	
	exit;
	
}



?>