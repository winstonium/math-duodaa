<?php
/*
 * 注意：此文件由tpl_engine编译型模板引擎编译生成。
 * 如果您的模板要进行修改，请修改 templates/duodaa_temp/index.html
 * 如果您的模型要进行修改，请修改 models/index.php
 *
 * 修改完成之后需要您进入后台重新编译，才会重新生成。
 * 如果您开启了debug模式运行，那么您可以省去上面这一步，但是debug模式每次都会判断程序是否更新，debug模式只适合开发调试。
 * 如果您正式运行此程序时，请切换到service模式运行！
 *
 * 如有您有问题请到官方论坛（http://tech.jooyea.com/bbs/）提问，谢谢您的支持。
 */
?><?php
	header("content-type:text/html;charset=utf-8");
	if(!file_exists('docs/install.lock')){
		header("location:install/index.php");
	}
	require("foundation/asession.php");
	require("configuration.php");
	require("includes.php");
	require("foundation/module_users.php");
	require("foundation/fcontent_format.php");
	require("foundation/fplugin.php");
	require("api/base_support.php");
	
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="Description" content="<?php echo $metaDesc;?>" />
<meta name="Keywords" content="<?php echo $metaKeys;?>" />
<meta name="author" content="<?php echo $metaAuthor;?>" />
<meta name="robots" content="all" />
<title><?php echo $siteName;?></title>
<base href='<?php echo $siteDomain;?>' />
<?php $plugins=unserialize('a:0:{}');?>
<link rel="stylesheet" href="skin/default/jooyea/css/layout.css" />
<script src="servtools/ajax_client/ajax.js" language="javascript"></script>
<script src="skin/default/js/yui-utilities.js" type="text/javascript"></script>
<script src="skin/default/js/tbra.js" type="text/javascript"></script>
<script src="skin/default/js/jooyea.js" type="text/javascript"></script>
<script src="servtools/md5.js" language="javascript"></script>
<script type="text/javascript" language="javascript" src="servtools/dialog/zDrag.js"></script>
<script type="text/javascript" language="javascript" src="servtools/dialog/zDialog.js"></script>
<script language="javascript">
function goLogin(){
	Dialog.confirm("<?php echo $pu_langpackage->pu_login;?>",function(){top.location="<?php echo $indexFile;?>";});
}
</script>
</head>
<body id="index">
<div class="container">

<?php include("uiparts/duodaa_uiparts/guestheader.php");?>

	<div class="wrapper">

<div class="clear"></div>
<div class="main recom_user">
	<div class="cont">
    	<div class="user_holder">
            <h2><?php echo $ah_langpackage->ah_total;?><?php echo $total_member;?><?php echo $ah_langpackage->ah_member_events_here;?></h2>
    <div class="left_part">
        <div id="MainPromotionBanner">
            <div id="SlidePlayer">
                <ul class="Slides">
                    
                    <li><a href="#"><img src="skin/default/jooyea/images/def.jpg" alt="" /></a></li>
                    
                </ul>
            </div>
        </div>
       <!--
        <script type="text/javascript">
        TB.widget.SimpleSlide.decorate('SlidePlayer', {eventType:'mouse', effect:'scroll'});
        </script>
        -->
	</div>
    <div class="right_part">
        <?php foreach($user_rs as $val){?>
            <dl>
                <dt><a class="avatar" hidefocus="true" href="home.php?h=<?php echo $val['user_id'];?>" target="_blank"><img src="<?php echo $val['user_ico'];?>" alt="<?php echo $val['user_name'];?>" /></a></dt>
                <dd><a href="home.php?h=<?php echo $val['user_id'];?>" hidefocus="true" target="_blank"><?php echo sub_str($val['user_name'],5,true);?></a></dd>
                <dd class="time"><?php echo format_datetime_short($val['user_add_time']);?></dd>
            </dl>
        <?php }?>
    </div>

        </div>
         <div class="snsintro">
        	<dl>
                <dt class="space1"><?php echo $ah_langpackage->ah_personal_space;?></dt><?php echo $ah_langpackage->ah_personal_space_detail;?>
            </dl>
            <dl>
                <dt class="group2"><?php echo $ah_langpackage->ah_groups_share;?></dt><?php echo $ah_langpackage->ah_groups_share_detail;?>
            </dl>
            <dl>
                <dt class="game3"><?php echo $ah_langpackage->ah_game_application;?></dt><?php echo $ah_langpackage->ah_game_application_detail;?>
            </dl>
        </div>
	</div>
	<!--插件位置!-->
	<div class="index_newMember">
		
		<?php echo isset($plugins['index_newMember'])?show_plugins($plugins['index_newMembers']):'';?>
	</div>
	<!--插件位置!-->
<script language="javascript">
function goLogin(){
	Dialog.confirm("<?php echo $pu_langpackage->pu_login;?>",function(){top.location="<?php echo $indexFile;?>";});
}
function getEnt(){
	document.onkeydown = function (e){
		var theEvent = window.event || e;
		var code = theEvent.keyCode || theEvent.which;
		if(code == 13){
			  login();
		}
	}
}
function inputTxt(obj,act)
{
  var str="<?php echo $ah_langpackage->ah_enter_name;?>";
  if(obj.value==''&&act=='set')
  {
     obj.value=str;
     obj.style.color='#cccccc';
  }
  if(obj.value==str&&act=='clean')
  {
     obj.value='';
     obj.style.color='gray';
  }
}
//ajax
function login_callback(content)
{
	var check=/\.php/;
	if(check.test(content)){
		 if($("tmpiId").checked){
			saveTmpEmail(1);
		 }else{
			  saveTmpEmail(0);
		 }
		 window.location.href=content;
	}else{
		$("emailmsg").innerHTML = '';
		$("pwdmsg").innerHTML = '';
		$("loadingmsg").innerHTML = '';
		var return_array=content.split("|");
		if($(return_array[0])){
			$(return_array[0]).innerHTML = return_array[1];
		}else if(return_array[0]=='active'){
			window.location.href="modules.php?app=user_activation";
		}
	}
}
function login_unready_callback(){
	var argb_div = $("loadingmsg");
	if($("emailmsg").innerHTML == '' || $("pwdmsg").innerHTML == ''){
		argb_div.innerHTML='';
	}else{
		argb_div.innerHTML="<img src='skin/default/jooyea/images/login_loading.gif' align='top' ><?php echo $l_langpackage->l_loading;?>";
	}
}
function saveTmpEmail(para){
	var email_time=new Date();
	var login_time=new Date();
	email_time.setTime(email_time.getTime() +3600*1000*24*300 );
	login_time.setTime(login_time.getTime() +3600*250 );
	if(para==1){
		var uemailStr=$("login_email").value;
		document.cookie='iweb_email='+uemailStr+';expires='+ email_time.toGMTString();
	}
	document.cookie="IsReged=Y;expires="+ login_time.toGMTString();
}
function login(){
	u_email=$('login_email').value;
	u_pws=$('login_pws').value;
	u_hidden=0;
	if($('hidden').checked){
		u_hidden=1;
	}
	var ajax_login=new Ajax();
	ajax_login.getInfo("do.php?act=login","post","app","u_email="+u_email+"&u_pws="+u_pws+"&hidden="+u_hidden,function(c){login_callback(c);},function(){login_unready_callback();});
}
//取得cookie值
$('login_email').value=get_cookie('iweb_email');
</script>
        </div>
        <div class='index_bottom'>
        	
		<?php echo isset($plugins['index_bottom'])?show_plugins($plugins['index_bottom']):'';?>
        </div>
	</div>
<?php require("uiparts/duodaa_uiparts/footor.php");?>
</div>
<SCRIPT language=JavaScript src="servtools/ajax_client/auto_ajax.js"></SCRIPT>
</body>
</html>