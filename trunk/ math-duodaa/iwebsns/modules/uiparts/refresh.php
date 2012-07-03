<?php
/*
 * 注意：此文件由tpl_engine编译型模板引擎编译生成。
 * 如果您的模板要进行修改，请修改 templates/duodaa_temp/modules/uiparts/refresh.html
 * 如果您的模型要进行修改，请修改 models/modules/uiparts/refresh.php
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
if(filemtime("templates/duodaa_temp/modules/uiparts/refresh.html") > filemtime(__file__) || (file_exists("models/modules/uiparts/refresh.php") && filemtime("models/modules/uiparts/refresh.php") > filemtime(__file__)) ) {
	tpl_engine("duodaa_temp","modules/uiparts/refresh.html",1);
	include(__file__);
}else {
/* debug模式运行生成代码 结束 */
?><?php
//引入提醒模块公共函数
require("foundation/module_remind.php");
require("foundation/fdelay.php");

//数据表定义区
$t_online=$tablePreStr."online";
$DELAY_ONLINE=4;

//更新当前用户时间
$is_action=delay($DELAY_ONLINE);
if($is_action){
	$dbo=new dbex;
	dbtarget('w',$dbServs);
	update_online_time($dbo,$t_online);
	rewrite_delay();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="500" />
<title></title>
<base href='<?php echo $siteDomain;?>' />
</head>
<body style="margin:0px;padding-bottom:5px">
</body>
</html><?php } ?>