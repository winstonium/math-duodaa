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

	//如果没有e参数数不对直接中止运行
	if(!isset($_GET['e']) || qa_get_logged_in_email()!=$_GET['e'])
	{
		echo '非法请求'; 
		exit;
	}
	
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
		$t_online=$tablePreStr."online";
		$t_pals_def_sort=$tablePreStr."pals_def_sort";
		$t_pals_sort=$tablePreStr."pals_sort";
		$t_mypals=$tablePreStr."pals_mine";
		$t_invite_code=$tablePreStr."invite_code";
		$t_user_activation=$tablePreStr."user_activation";
		
		//定义读操作
		$u_email=qa_get_logged_in_email();
		dbtarget('r',$dbServs);
		$dbo=new dbex;
		$sql="select * from $t_users where user_email='$u_email'";
		$user_info=$dbo->getRow($sql);
		
		//如果sns里没有这个email帐号，就注册 一个然后登录
		if(empty($user_info))
		{
           //下面新建一个$u_email的账号
           
		   //下面定义新建信息的变量
		   $user_name=qa_get_logged_in_handle();
		   $user_pws=substr(md5(rand(0,1000000)),0,10);
		   $user_sex=1;
		   $user_email=$u_email;
		   $is_pass=1;
		   $user_ico=($user_sex==0)?"skin/$skinUrl/images/d_ico_0_small.gif":"skin/$skinUrl/images/d_ico_1_small.gif";
	       
		   
           $sort_rs = api_proxy("pals_sort_def");
		   
		   //写入数据
		   dbtarget('w',$dbServs);
	       $sql="insert into $t_users (user_name,user_pws,user_sex,user_email,user_add_time,user_ico,invite_from_uid,is_pass,lastlogin_datetime,birth_year , birth_month , birth_day ,login_ip )"
					." values('$user_name','$user_pws',$user_sex,'$user_email','".constant('NOWTIME')."','$user_ico',0,$is_pass,'".constant('NOWTIME')."','','','','$_SERVER[REMOTE_ADDR]')";//$invite_fromuid直接置为0

		   if(!$dbo->exeUpdate($sql))
		   {
			  action_return(0,$re_langpackage->re_reg_false,"-1");
		   }

	       $user_id=mysql_insert_id();
	       $now_time=time();

	       $sql="insert into $t_online (user_id,user_name,user_sex,user_ico,active_time,hidden) values ($user_id,'$user_name',$user_sex,'$user_ico','$now_time',0)";
	       $dbo->exeUpdate($sql);

			foreach($sort_rs as $rs){
				$sort_id=$rs['id'];
				$sort_name=$rs['name'];
				$sql="insert into $t_pals_sort ( name , user_id ) values ( '$sort_name' , $user_id )";
				$dbo->exeUpdate($sql);
			}
			
			//写入session登录
			set_sess_userid($user_id);
		    set_sess_usersex($user_sex);
		    set_sess_username($user_name);
		    set_sess_userico($user_ico);
		    set_sess_online('0');
			
			
		   //结束后提示一些必要信息
			echo '<html>'."\n";
			echo '<head>'."\n";
			echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
			echo '</head>'."\n";
			echo '<body>'."\n";
            echo '你的空间账号已经激活。<br />'."\n";
            echo '注意，你空间的<span style="color:red;">性别信息默认为"女"</span>，请登录后自行修改！<br>'."\n";
            echo '<span id="leftTime">3</span>秒后重新进入空间主页.......'."\n";
			echo '<script>var leftsec=3;function minusTime(){if(leftsec!=0){document.getElementById("leftTime").innerHTML=leftsec--;}else{alert("hahaha");leftsec--;}}'."\n";
			echo 'setInterval("minusTime();",1000)</script>'."\n";
			echo '</body>'."\n";
			echo '</html>'."\n";
			
			exit;
		}
		
		elseif(get_sess_userid()!=$user_info['user_id'])
		{
			//写入session登录
			set_sess_userid($user_info['user_id']);
		    set_sess_usersex($user_info['user_sex']);
		    set_sess_username($user_info['user_name']);
		    set_sess_userico($user_info['user_ico']);
		    set_sess_online('0');
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