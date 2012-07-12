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

	//如果主站没有登录直接中止运行
	if(qa_get_logged_in_userid()=='')
	{
		echo '非法请求'; 
		exit;
	}

	//如果主站登录，分两个情况
	if(qa_get_logged_in_userid()!='')
	{  
		//数据表定义区
		$t_users=$tablePreStr."users";
    	$t_group_members=$tablePreStr."group_members";
		$t_online=$tablePreStr."online";
		$t_mypals=$tablePreStr."pals_mine";
		$t_frontgroup=$tablePreStr."frontgroup";
		
		//定义读操作
		$u_email=$_GET['e'];
		dbtarget('r',$dbServs);
		$dbo=new dbex;
		$sql="select * from $t_users where user_email='$u_email'";
		$user_info=$dbo->getRow($sql);
		
		//如果sns里没有这个email帐号，就注册 一个然后登录
		if(empty($user_info))
		{
            echo '<html>'."\n";
			echo '<head></head>'."\n";
			echo '<body>'."\n";
            echo '你的空间账号已经激活。<br /><span id="leftTime">3</span>秒后重新进入空间主页.......'."\n";
			echo '<script>var leftsec=3;function minusTime(){if(leftsec!=0){document.getElementById("leftTime").innerHTML=leftsec--;}else{alert("hahaha");leftsec--;}'."\n";
			echo 'setInterval("minusTime();",1000)</script>'."\n";
			echo '</body>'."\n";
			echo '</html>'."\n";
			
			exit;
		}
		
		elseif(get_sess_userid()!=$user_info['user_id'])
		{
			echo $u_email.'没有登录。';
			exit;			
		}
		
	}
    else
    {
    	echo '非法请求'; 
    	exit;
    }

?>