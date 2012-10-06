<?php 
require 'config.php';
require_once BLOG_QAROOT.'/qa-include/qa-base.php';
require_once BLOG_QAROOT.'/qa-include/qa-app-users.php';
require_once BLOG_QAROOT.'/qa-include/qa-db-users.php';
require_once BLOG_QAROOT.'/qa-include/qa-db-selects.php';


//基本的函数载入
require_once BLOG_ROOT.'/include/strings.php';
require_once BLOG_ROOT.'/include/articles.php';
require_once BLOG_ROOT.'/include/users.php';

//语言与主题
//require_once BLOG_ROOT.'/lang/'.BLOG_LANG.'/lang.php';
//$blog_lang= new blog_lang();
//require_once BLOG_ROOT.'/include/urls.php';
//$blog_urls= new blog_urls();
require_once BLOG_ROOT.'/include/useritems.php';
$uis=new useritems();
require_once BLOG_ROOT.'/theme/'.BLOG_THEME.'/theme.php';


//require_once BLOG_ROOT;

$blog_user_handle=trim(qa_get_logged_in_handle());

$is_acted=is_activated($blog_user_handle);

$bqs='';


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




$bqs=blog_get_query_info();

$blog_page->pagetype=$bqs;


//首页代码

if($bqs['type']=='home')
{
	echo 'sssssssssssssssssssss';
	exit;
	
}

else if($bqs['type']=='user')
{
	//echo 'fffffff';
	//echo $bqs['para1'];
	$blog_page->pagetype=$bqs['type'];
	$blog_page->page_paras=$bqs;
	$blog_page->print_page();
	
	//$list=blog_get_latescommentlist('math001');
	//var_dump($list[0]);
	exit;
	
}



?>