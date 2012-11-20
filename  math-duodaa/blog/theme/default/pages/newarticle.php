<?php
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php require $themedir.'/parts/header.php';?>


<body background="<?php echo $bg_img?>">

<script src="<?php echo convert_dir_src(BLOG_ROOT).'/ckeditor/ckeditor.js'?>"></script>


<center>

<?php 

require $themedir.'/parts/blog_top.php';

?>

<div class="main_frame">

<div class="main_left">


<?php require $themedir.'/parts/CKeditor_main.php'?>



</div>

<div class="main_right">

<div class="photo" ><?php echo blog_get_qa_avartar_html($user_login);?></div>


</div>

</div>

<div class="clear"></div>

<?php 

require $themedir.'/parts/foot.php';

?>


</center>
</body>
</html>