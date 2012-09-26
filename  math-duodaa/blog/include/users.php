<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}


function is_blocked($handle)
{
   $json = file_get_contents(BLOG_ROOT.'/data/userconfig.js') ;
   
    //下面的代码用于去掉utf-8文本的bom头。
    if ( substr($json, 0, 3)=="\xEF\xBB\xBF")
           $json=substr_replace($json, '', 0, 3) ; 
     
    $json_arr = json_decode($json,true);
    if(in_array($handle, $json_arr['blocked']))
    {
     return true;
    }
    else return false;
}

function is_activated($handle)
{
  if($handle=='') 
  {
  	return -2;           // 没有登录
  }
  if(is_blocked($handle))
  {
  	return -1;          // 被封号
  } 
  if(is_dir(BLOG_ROOT.'/data/'.$handle)) 
  {
  	//echo BLOG_ROOT.'/data/'.$handle;
  	return 1;          // 
  }
  else 
  {
  	return 0;
  }
  
  
}