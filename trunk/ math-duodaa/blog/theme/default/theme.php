<?php
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

$theme_dir = dirname(__FILE__);
require_once BLOG_ROOT.'/theme/default.php';

$blog_page=new blog_page();
$blog_page->css_href=convert_dir_src(dirname(__FILE__)).'\style.css';

?>


