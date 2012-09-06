<?php 
//设置版本号
define('BLOG_VER','1.0.0');

////设置blog根目录
define('BLOG_ROOT',dirname(__FILE__));
//设置qa站点根目录
define('BLOG_QAROOT',dirname(BLOG_ROOT));

//设置可以激活的分数
define('ACTIVABLE_POINT',1000);

//设置没有登录跳转页面
define('BLOG_NOTLOGIN_TRANSFER','/?qa=login&to=blog');

//设置主题
define('BOLOG_THEME','default');


//设置语言
define('BLOG_LANG','zn');






?>