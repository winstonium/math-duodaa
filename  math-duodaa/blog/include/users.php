<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

require_once 'files.php';
require_once 'dboperations.php';

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
function blog_is_userexist($user)
{
 if(is_dir(BLOG_ROOT.'/data/'.$user)) 
  {
   	return 1;          // 
  }
  else 
  {
  	return 0;
  }
	
}


function blog_get_userconfig($user)
{
	$db=blog_opendb();
	
	$result = blog_db_query($db,'select * from userconfig where username="'.$user.'"');
	
	
	
	return $result[0];
}

