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
require_once BLOG_ROOT.'/include/useritems.php';

//主题文件侠
$themedir=BLOG_ROOT.'/theme/'.BLOG_THEME;
require_once BLOG_ROOT.'/theme/default.php';


$user_login=trim(qa_get_logged_in_handle());

$bqs='';

$bqs=blog_get_query_info();

//首页代码

if($bqs['type']=='home')
{
	echo 'sssssssssssssssssssss';
	exit;
	
}

else if($bqs['type']=='user')
{
	
	require $themedir.'/pages/user.php';
	exit;
	
}



?>