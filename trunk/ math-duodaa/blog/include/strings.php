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