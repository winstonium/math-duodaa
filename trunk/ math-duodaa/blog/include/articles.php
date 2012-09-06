<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}


function blog_load_articles($handle,$category='',$orderby='id',$desc=0)
{
    //$xml_array=simplexml_load_file(BLOG_ROOT.'/data/'.$handle.'/articles.xml');
    $json = file_get_contents(BLOG_ROOT.'/data/'.$handle.'/articles.js') ;
    
    //下面的代码用于去掉utf-8文本的bom头。
    if ( substr($json, 0, 3)=="\xEF\xBB\xBF")
           $json=substr_replace($json, '', 0, 3) ; 
    
  
    
    $json_arr = json_decode($json,true);
    
    $articles=$json_arr;
    $articles=blog_articles_order($articles,$orderby,$desc);
    
    
    
    return $articles;//$articles;

    
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

