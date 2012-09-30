<?php 
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

class blog_page
{
   //以下设置在载入中需要使用的参数
   var $uis;
   var $lang;              //设置语言
   var $urls;              //设置链接集合
   var $pagetype='home';   //设置页面类型，默认为用户主页
   var $head_title='';	   //设置页面head标签内的title
   var $css_href='';       //设置css的路径
   var $blog_logo='';
   var $bg_jpg='';         //设置背景图片的路径
   var $page_paras=null;   //设置页面参数
   
   //以下设置返回结果的变量
   var $head;  //页面的head标签内的内容
   var $body;  //页面的body标签内的内容
   
   function __construct($uis)
   {
      $this->uis=$uis;
   }
   
   
   function load_head($title='',$keyword='')
   {
      $html='';
   	  $html.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">'."\n";
      $html.='<html xmlns="http://www.w3.org/1999/xhtml">'."\n";
      $html.='<head>'."\n";
      $html.='<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";
      $html.='<title>'.$title.'</title>'."\n";
      $html.='<link  rel="stylesheet" type="text/css" href="'.$this->css_href.'" />'."\n";
      $html.='</head>'."\n";
      $this->head=$html;
   
   }
  
   //下面用不同的pagetype生成body中不同的html代码
   function load_body()
   {    
   	  $html='';
      $html.='<body background="'.$this->bg_jpg.'">'."\n";
   	  $html.='<center>'."\n";
      $html.=$this->set_body_head()."\n";
      $html.=$this->set_body_main()."\n";
      $html.=$this->set_body_foot()."\n";
      $html.='</center>'."\n";
      $html.='</body>'."\n";
      $html.='</html>'."\n";
      $this->body=$html;
   }
   
   function set_body_head()
   {
   	  
   	  if($this->page_paras==null)$p_paras['type']='home';
   	  else $p_paras=$this->page_paras;   	  
      
   	  
   	  $html='';
   	  
   	  if($p_paras['type']=='user')
   	  {
   	    $html.='<div class="blog_top_container">'."\n";
   	    $html.='<div class="blog_top">'."\n";
   	    $html.='<div class="blog_logo"><img src="'.$this->blog_logo.'" />'."\n";
   	    $html.='</div>'."\n";
   	    $html.='<div class="nav_div">'."\n";
        $html.='<div>'.$this->uis->items['USR_qahome_url'].'</div>'."\n";
        $html.='<div>'.$this->uis->items['USR_bloghome_url'].'</div>'."\n";
        $html.='<div>'.$this->uis->items['USR_blogmyhome_url'].'</div>'."\n";
        $html.='<div><a href="#">发表文章</a></div>'."\n";
        $html.='</div>'."\n";
        $html.='<div class="logon_div">'."\n";
        $html.='<div>'.$this->uis->items['USR_login_url'].'</div>'."\n";
        $html.='<div>'.$this->uis->items['USR_register_url'].'</div>'."\n";
        $html.='</div>'."\n";
        $html.='</div>'."\n";
        $html.='</div>'."\n";
        $html.='<div class="clear"></div>'."\n";
      	  
   	  }
   
   	  
   	  
   	  
      return $html;
   }
   
   function set_body_main()
   {
   	  if($this->page_paras==null)$p_paras['type']='home';
   	  else $p_paras=$this->page_paras; 
   	
      $html='';
      if($p_paras['type']=='user')
      {
          if(!isset($p_paras['para2']))  //没有设置第二个参数，说明是用户的首页
          {
            $user = $p_paras['para1'];   //para1就是当然要找的用户名
            $user_config =blog_get_userconfig($user);
          	//$html.='sssssssssssssss<br>';
          //	var_dump($user_config);
            $articles=blog_get_articlelist($user,$user_config['main_article_counts']);
            
            //var_dump($articles_detail);
            if($articles!=null)
            {
            	$articles_detail=blog_load_articles($user, $articles);
            	$html.=$this->uis->items['USR_noarticle_url'];
            }
           
            
            
          }
      
      }
      
      
      return $html;
   }
   
   function set_body_foot()
   {
      $html='';
      return $html;  
   }



   function print_page()
   {
   	  $this->load_head();
   	  $this->load_body();
   	  
      echo $this->head;
      echo $this->body;
   
   }

}
