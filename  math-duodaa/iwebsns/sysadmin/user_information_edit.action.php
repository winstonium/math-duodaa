<?php
require("session_check.php");
require("../api/base_support.php");

//接收参数
$info_id=intval(get_argg('id'));
//数据库
$dbo = new dbex;
dbtarget('w',$dbServs);
//表定义
$t_user_information=$tablePreStr.'user_information';
//接收参数
$info_name=short_check(get_argp('info_name'));
$type=get_argp('info_type');
$values=trim(short_check(get_argp('info_values')));
$sort=get_argp('info_sort')?intval(get_argp('info_sort')): 0;
if(empty($info_name)){
	echo "<script type='text/javascript'>alert('信息名称不能为空');window.history.go(-1);</script>";
}
if($type!=0 && empty($values)){
	echo "<script type='text/javascript'>alert('信息值不能为空');window.history.go(-1);</script>";
}
$sql="update $t_user_information set info_name='$info_name',input_type=$type,info_values='$values' ,sort=$sort where  info_id=$info_id";
$is_success=$dbo->exeUpdate($sql);
if($is_success===false){
	echo "<script type='text/javascript'>alert('修改失败');window.history.go(-1);</script>";
}else{
   echo "<script type='text/javascript'>window.location.href='user_custom.php'</script>";
}
?>