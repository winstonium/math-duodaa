<?php 
	require("foundation/asession.php");
	require("configuration.php");
	require("includes.php");
	require("foundation/module_users.php");
	require("foundation/fcontent_format.php");
	require("foundation/fplugin.php");
	require("api/base_support.php");
	
	//定义常数
	$qa_root_to_sns=$_SERVER['DOCUMENT_ROOT'];  //得到站点根目录的目录
	
	//添加整合Question2Answer的引用
		
	require_once $qa_root_to_sns.'/qa-include/qa-base.php';
	require_once $qa_root_to_sns.'/qa-include/qa-app-users.php';

if(qa_get_logged_in_userid()!='')
{echo $_GET['e'];}
else
{echo '非法请求'; exit;}

?>