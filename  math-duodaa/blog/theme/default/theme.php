<?php
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

$theme_dir = dirname(__FILE__);
require_once BLOG_ROOT.'/theme/default.php';

$blog_page=new blog_page();
$blog_page->lang = $blog_lang ;    //页面语言
$blog_page->urls = $blog_urls;     //页面链接

$blog_page->css_href=convert_dir_src($theme_dir).'\style.css';
$blog_page->bg_jpg=convert_dir_src($theme_dir).'\bg.jpg';
$blog_page->blog_logo=convert_dir_src($theme_dir).'\blog_logo.gif';
?>


