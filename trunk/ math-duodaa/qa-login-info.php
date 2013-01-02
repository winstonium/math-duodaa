<?php
require 'qa-config.php';
require 'qa-include/qa-base.php';
require_once 'qa-include/qa-app-users.php';

function set_duodaa_user()
{
$user=array();
$user['username']=qa_get_logged_in_handle();

if(!$user['username'])
{
	//header("Content-type: text/html; charset=utf-8");
	//unset($user['username']);
	$user['nologin']=1;
	$user['nologinzh']='没有登录';
	
	//echo json_encode($user);

}

else 
{
	$user['nologin']=0;
    $user['points'] = qa_get_logged_in_points();
}


return $user;


}
//echo 
