<?php
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

$theme_dir = dirname(__FILE__);
require_once dirname($theme_dir).'/default.php';

?>


