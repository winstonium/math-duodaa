<?php
/**
* @copyright[Iweb SNS] (C)2009-2099 jooyea.net.
* @category foundation
* @package fcookie.php
* @author chendeshan 2010-11-18 17:27:21
* @version 1.5
*/

//����keyֵ��ȡ$_COOKIEֵ
function getCookie($key){
	return isset($_COOKIE[$key]) ? $_COOKIE[$key]:NULL;
}

/*
	����cookieֵ
	$key:cookie����;
	$value:cookieֵ;
	$time:����cookie��Сʱ��;*/
function set_cookie($key,$value,$time=0){
	if($time=intval($time)){
		$time=time()+60*60*$time;
	}
	setcookie($key,$value,$time);
}

?>