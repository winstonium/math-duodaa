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

   for($i=1;isset($bqs[$i]);$i++)
   {
     $qinfo['para'.$i]=trim($bqs[$i]);
   }
   $qinfo['type']=trim($bqs[0]);
   
    return $qinfo;

    
}

//将服务器路径转化为相对于blog站点的客服端路径
function convert_dir_src($dir)
{

$src=str_replace(BLOG_QAROOT, '', $dir);
if($src=='')$src='/';

$src=str_replace('\\', '/', $src);

return $src;

}

function blog_cutstring($str,$maxlen=20)
{
  
  if(strlen($str)>$maxlen-3)$s=mb_substr($str, 0,$maxlen-3,'utf-8').'...';
  else $s=$str;
  return $s;
}



function blog_echo_mb($str,$isecho=true)
{
  $mb_str = iconv('GBK','UTF-8',$str);
  if(isecho)echo $mb_str;	
  return $mb_str;	;	

}
