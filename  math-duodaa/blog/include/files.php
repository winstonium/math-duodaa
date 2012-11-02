<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}


function blog_load_jstoarray($dir)
{
   // if(is_file($dir)) return null;
	$json = file_get_contents($dir) ;
	
    
    //下面的代码用于去掉utf-8文本的bom头。
    if ( substr($json, 0, 3)=="\xEF\xBB\xBF")
    {$json=substr_replace($json, '', 0, 3) ; } 
           
    $json_arr = json_decode($json,true);
    //var_dump($json_arr);
   // var_dump($json);
    
    return $json_arr;

}

function blog_get_filelist($dir)
{
 $list=scandir($dir,1);
 $list=array_diff($list, array('.','..'));
 
 return $list;

}