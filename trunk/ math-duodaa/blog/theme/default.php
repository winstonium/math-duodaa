<?php 
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

class blog_page
{
   //以下设置在载入中需要使用的参数
   var $lang;              //设置语言
   var $pagetype='home';  //设置页面类型，默认为用户主页
   var $head_title='';	 //设置页面head标签内的title
   var $css_href='';  //设置css的路径
   var $blog_logo='';
   var $bg_jpg='';  //设置背景图片的路径
   var $page_paras=null;  //设置页面参数
   
   //以下设置返回结果的变量
   var $head;  //页面的head标签内的内容
   var $body;  //页面的body标签内的内容
   
  
   
   
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
        $html.='<div><a href="/">'.$this->lang->user_info['user_qa_home'].'</a></div>'."\n";
        $html.='<div><a href="#">空间首页</a></div>'."\n";
        $html.='<div><a href="#">发表文章</a></div>'."\n";
        $html.='</div>'."\n";
        $html.='<div class="logon_div">'."\n";
        $html.='<div><a href="/">登录</a></div>'."\n";
        $html.='<div><a href="#">注册</a></div>'."\n";
        $html.='</div>'."\n";
        $html.='</div>'."\n";
        $html.='</div>'."\n";
        $html.='<div class="clear"></div>'."\n";
      	  
   	  }
   
   	  
   	  
   	  
      return $html;
   }
   
   function set_body_main()
   {
      $html='';
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
