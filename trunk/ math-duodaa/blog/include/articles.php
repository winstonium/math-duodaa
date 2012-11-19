<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}
require_once 'files.php';
require_once 'dboperations.php';

//读取文章列表，读成数组
function blog_load_articles($user,$articlenum=10)
{
   $sql = 'select * from article where username="'.$user.'" order by createtime desc limit 0,'.$articlenum;
   
   $db=blog_opendb();
   $result = blog_db_query($db,$sql);
   
   return $result;
}



function blog_load_messages($touser,$messagenums=5)
{
   $sql = 'select * from message where tousername="'.$touser.'" order by createtime desc limit 0,'.$messagenums; 
   
   $db=blog_opendb();
   $result = blog_db_query($db,$sql);
   
   return $result;
}

function blog_load_comments($touser,$commentnums=5)
{
   $sql = 'select * from comment where tousername="'.$touser.'" order by createtime desc limit 0,'.$commentnums; 
	
   $db=blog_opendb();
   $result = blog_db_query($db,$sql);
   
   return $result;
	
}

function blog_load_single_article($user,$articlenum)
{
	$dir = BLOG_ROOT.'/data/'.$user.'/articles/'.$articlenum.'.js' ;
	//echo $dir;
	
	return blog_load_jstoarray($dir);

}

function blog_load_single_message($user,$msgnum)
{
   $dir= BLOG_ROOT.'/data/'.$user.'/messages/'.$msgnum.'.js' ;
   return blog_load_jstoarray($dir);
  
}









