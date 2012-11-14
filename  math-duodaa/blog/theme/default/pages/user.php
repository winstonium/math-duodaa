<?php

$userconfig=blog_get_userconfig($bqs['para1']);          //$bqs['para1']是用户名,这里得到该用户的设置
$articles = blog_load_articles($bqs['para1'],$userconfig['articlesshow']);           //$bqs['para1']是用户名,文章列表

$modifyright = ($bqs['para1']==$user_login);             //设置修改的权限
$page_title = '哆嗒数学网'.$userconfig['username'].'的空间';   //得到title的文字

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require $themedir.'/parts/header.php';?>


<body background="<?php echo $bg_img?>">
<center>

<?php 

require $themedir.'/parts/blog_top.php';

?>

<div class="main_frame">

<div class="main_left">

<div class="spacetitle">
<div class="main_title"><a href="#"><?php echo $userconfig["blogtitle"];?></a></div>
<div class="sub_title"><?php echo $userconfig["blogsubtitle"];?></div>
</div>

<div class="clear"></div>

<?php require $themedir.'/parts/articlelist.php';?>

<div class="clear"></div>



</div>



</div>

</center>
</body>
</html>