<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}


function blog_get_query_str()
{
  if(!isset($_GET['bq'])) return 'home';
  else return $_GET['bq'];
}

function blog_get_query_info()
{
   $bq = blog_get_query_str();
   $bqs = explode('_', $bq);

   $qinfo= array(
   'type' <= bqs(0)
   
   
   );
  
   
    
    
    return $qinfo;

    
}

//将服务器路径转化为相对于blog站点的客服端路径
function convert_dir_src($dir)
{
require_once dirname(dirname(__FILE__)).'/config.php';
$src=str_replace($dir, BLOG_QAROOT, '/');

return $src;

}

