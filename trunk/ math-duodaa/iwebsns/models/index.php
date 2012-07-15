<?php
	header("content-type:text/html;charset=utf-8");
	if(!file_exists('docs/install.lock')){
		header("location:install/index.php");
	}
	//定义常数
	$qa_root_to_sns=$_SERVER['DOCUMENT_ROOT'];  //得到站点根目录的目录
	
	//添加整合Question2Answer的引用
		
	require_once $qa_root_to_sns.'/qa-include/qa-base.php';
	require_once $qa_root_to_sns.'/qa-include/qa-app-users.php';
	
	//本身sns的引入
	require("foundation/asession.php");
	require("configuration.php");
	require("includes.php");
	require("foundation/module_users.php");
	require("foundation/fcontent_format.php");
	require("foundation/fplugin.php");
	require("api/base_support.php");
		
	
	
	
	if(qa_get_logged_in_userid()=='')
	{
		echo '<script>window.location.href="/?qa=login&to=iwebsns"</script>';
		exit;
	}
	elseif(get_sess_userid()== null)
	{
		echo '<script>window.location.href="/iwebsns/login_from_qa.php?e='.qa_get_logged_in_email().'"</script>';
		exit;
		
	}
	
	////////////////////////////

	
	
	//语言包引入
	$pu_langpackage=new publiclp;
		
	if(get_sess_userid()){
		echo '<script type="text/javascript">location.href="main.php";</script>';
	}
	$tg=get_argg('tg');
	if($tg=='invite'){
		$index_ref="modules/invite.php";
	}elseif($tg=='search_pals_list'){
		$index_ref="modules/mypals/search_pals_list.php";
	}else{
		$index_ref="modules/default.php";
  }
  //数据表定义区
	$t_plugins=$tablePreStr."plugins";

	$rec_rs=array();
	$rec_rs0=array();
	$rec_rs1=array();

	//首页会员推荐
	$rec_rs=api_proxy("user_recommend_get");

	foreach ($rec_rs as $key=>$val){
		if ($val['rec_class']=='0'){
			$rec_rs0[$key]=$val;
		}
	}
	//首页幻灯片
	foreach ($rec_rs as $key=>$val){
		if ($val['rec_class']=='1'){
			$rec_rs1[$key]=$val;
		}
	}
  //最新会员列表
  $user_rs=api_proxy("user_self_by_new","user_id,user_name,user_ico,user_add_time",8);

	//会员总数
	$total_member=api_proxy('user_self_by_total');
?>