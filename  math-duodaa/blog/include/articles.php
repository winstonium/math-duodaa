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



function blog_load_messages($user,$messagenums)
{
   foreach ($messagenums as $key => $val)
   {
   	 $messages[$key]= blog_load_single_message($user,$messagenums[$key]);
   }  
   return $messages;
}

function blog_articles_order($atcs,$by='id',$desc=0)
{
        $i=0;
        $j=0;
        
	    $atcs1=$atcs;
	    $atcs1_num=count($atcs1);
	    
        for($i=0;$i<$atcs1_num;$i++)
             for($j=$i+1;$j<$atcs1_num;$j++)
             {
			    if($desc==0)
		        {
		          if($atcs1[$i][$by]>$atcs1[$j][$by])
		          {
		            $t=$atcs1[$i];
		            $atcs1[$i]=$atcs1[$j];
		            $atcs1[$j]=$t;
		          }
		          //echo 'wo';
		        }
		        else  
                {
		          if($atcs1[$i][$by]<$atcs1[$j][$by])
		          {
		            $t=$atcs1[$i];
		            $atcs1[$i]=$atcs1[$j];
		            $atcs1[$j]=$t;
		          }
		           //echo 'ho';
		        }
             }  
        return $atcs1;
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



function blog_get_articlelist($user,$count)
{
 $dir=BLOG_ROOT.'/data/'.$user.'/articles';
 $list=blog_get_filelist($dir);
 
 foreach($list as $key =>$val)
 {
   if(strrchr($val,'.js')!='.js')$list=array_diff($list, array($val));   //把非.js的文件从表中去掉
   else $list[$key]=substr($val,0, strlen($val)-strlen('.js'));          // 后缀去掉
 }
 
 if(isset($count))
 {
 	$list = array_slice($list, 0,$count);
 }
 
 return $list;
}

function blog_get_messagelist($user,$count=5)
{
   $dir=BLOG_ROOT.'/data/'.$user.'/messages';
   $list=blog_get_filelist($dir);
 
 foreach($list as $key =>$val)
 {
   if(strrchr($val,'.js')!='.js')$list=array_diff($list, array($val));   //把非.js的文件从表中去掉
   else $list[$key]=substr($val,0, strlen($val)-strlen('.js'));          // 后缀去掉
 }
 
 if(isset($count))
 {
 	$list = array_slice($list, 0,$count);
 }
 
 return $list;
}


function blog_get_latescommentlist($user,$count=5)
{
 $dir = BLOG_ROOT.'/data/'.$user.'/comments/latest.js' ;
 $list = blog_load_jstoarray($dir);
 $list = array_slice($list,0,$count);
 return $list;
}