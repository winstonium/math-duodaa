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
/*
 * 此段代码由debug模式下生成运行，请勿改动！
 * 如果debug模式下出错不能再次自动编译时，请进入后台手动编译！
 */
/* debug模式运行生成代码 开始 */
if(!function_exists("tpl_engine")) {
	require("foundation/ftpl_compile.php");
}
if(filemtime("templates/duodaa_temp/index.html") > filemtime(__file__) || (file_exists("models/index.php") && filemtime("models/index.php") > filemtime(__file__)) ) {
	tpl_engine("duodaa_temp","index.html",1);
	include(__file__);
}else {
/* debug模式运行生成代码 结束 */
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
<?php include("uiparts/guestheader.php");?>
	<div class="wrapper">
        <div class="main">
            <?php include("$index_ref");?>
        </div>
        <div class='index_bottom'>
	
		<?php echo isset($plugins['index_bottom'])?show_plugins($plugins['index_bottom']):'';?>
        </div>
	</div>
<?php require("uiparts/footor.php");?>
</div>
<SCRIPT language=JavaScript src="servtools/ajax_client/auto_ajax.js"></SCRIPT>
</body>
</html><?php } ?>