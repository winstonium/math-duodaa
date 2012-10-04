<?php 
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

class blog_page
{
   //以下设置在载入中需要使用的参数
   var $handle;             //登录用户名
   var $uis;               //ui
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
      $this->handle=trim(qa_get_logged_in_handle());
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
        if($this->handle)
        {$html.='<div>'.$this->uis->items['USR_blogmyhome_url'].'</div>'."\n";}
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
      	$user = $p_paras['para1'];  //para1就是要找的用户名
      	$user_config =blog_get_userconfig($user);  //读取用户的配置信息
      	
          if(!isset($p_paras['para2']))  //没有设置第二个参数，说明是用户的首页
          {
          	$html.='<div class="main_frame">'."\n";
          	
          	////////////////下面是mainleft//////////////
          	
          	$html.='<div class="main_left">'."\n";
          	
            //主标题和副标题
          	$html.='<div class="spacetitle">'."\n";
            $html.='<div class="main_title"><a href="'.convert_dir_src(BLOG_ROOT).'/?bq=user_'.$user.'">'.$user_config['blog_title'].'</a></div>'."\n";
            $html.='<div class="sub_title">'.$user_config['blog_subtitle'].'</div>'."\n";
            $html.='</div> '."\n";
          	
            //读取文章列表
            $articles=blog_get_articlelist($user,$user_config['main_article_counts']);
            
            //没有文章则提示错误，并指引修改
            if($articles==null)
            {
            	$html.=$this->uis->items['USR_noarticle_url'];
            }
            else
            {
            	$articles_detail=blog_load_articles($user, $articles);
                //var_dump($articles_detail);
                $html.='<div class="articles">'."\n";
            	
            	   foreach($articles_detail as $key =>$val)  //输出文章列表
            	   {
            	   	  //var_dump($val);
            	      $html.='<div class="article">'."\n";
            	      $html.='<div class="ar_title"><a href="'.convert_dir_src(BLOG_ROOT).'/?bq=user_'.$user.'_ar'.$articles[$key].'">'.$val['title'].'</a></div>'."\n";
                      $html.='<div class="ar_date">'.$val['date'].'</div>'."\n";
                      $html.='<div class="clear"></div>'."\n";
                      $html.='<div class="ar_content">'.$val['content'].'</div>'."\n";

                      $html.='<div class="ar_operation">'."\n";
                      $html.='<span><a href="#">阅读全文</a></span>'."\n";
                      $html.='<span><a href="#">评论</a></span>'."\n";

                      if($this->handle==$user) //如果就是本用户登录，显示编辑和删除
                      {
                      $html.='<span><a href="#">编辑</a></span>'."\n";
                      $html.='<span><a href="#">删除</a></span>'."\n";
                      }
                      
                      $html.='</div>';
        	   	
            	     $html.='</div>'."\n";
            	
            	   }
            	$html.='</div>'."\n";
            
            }
            
          	
          	$html.='</div>'."\n";
          	
          	////////////////mainleft完////////////////////
          	
          	//////////////下面是mainright/////////////
          	$html.='<div class="main_right">'."\n";
          	
	          	////////////载入avatar图;
	          	$userid=qa_handles_to_userids(array($user));
	          	$userid=$userid[$user];
	          	$useraccount=qa_db_select_with_pending(qa_db_user_account_selectspec($userid, true));
	          	$avartahtml=qa_get_user_avatar_html($useraccount['flags'], $useraccount['email'], $useraccount['handle'],
							$useraccount['avatarblobid'], $useraccount['avatarwidth'], $useraccount['avatarheight'], qa_opt('avatar_profile_size'));	
	          	if($avartahtml!=null)
	          	{
					$avartahtml=strtolower($avartahtml);
					//$avartahtml=preg_replace('/<a >/', '', $avartahtml);
				    $avartahtml=str_replace('?', convert_dir_src(BLOG_QAROOT).'?', $avartahtml);    //生成avarta的html串,从站点的根目录引用
		          	////////////////载入avatar图 。完。/////////////////////
	          	}		
	          	else 
	          	{
	          		$avartahtml='<a href="'.convert_dir_src(BLOG_QAROOT).'?qa=user/'.$user.'" class="qa-user-link">';
	          		//echo $avartahtml;
	          	    $avartahtml.='<img src="'.convert_dir_src(BLOG_ROOT.'/theme/'.BLOG_THEME.'/default_avatar.jpg').'"/>';
	          	    $avartahtml.='</a>';
	          	}
          	
	       	$html.='<div class="photo" >'.$avartahtml.'</div>'."\n";
	        $html.='<div class="username"><a href="'.convert_dir_src(BLOG_QAROOT).'?qa=user/'.$user.'">'.$user.'</a></div>'."\n";					
          	
	        //评论显示
	        $html.='<div class="comments">'."\n";
            $html.='<div class="cm_title">'.$this->uis->items['USR_recent_comments'].'</div>'."\n";
            $html.='<div class="clear"></div>'."\n";
            $html.='<div class="cm_detail"><a href="#">对的，你好呀。。。。。ffffff...</a> </div>'."\n";
            $html.='<div class="cm_detail"><a href="#">对的，你好呀。。。。。ffffff...</a> </div>'."\n";
            $html.='<div class="cm_detail"><a href="#">对的，你好呀。。。。。ffffff...</a> </div>'."\n";
            $html.='<div class="cm_detail"><a href="#">对的，你好呀。。。。。ffffff...</a> </div>'."\n";
            $html.='<div class="cm_detail"><a href="#">对的，你好呀。。。。。ffffff...</a> </div>'."\n";
            $html.='</div>'."\n";
            //评论显示完

            //留言显示
            $html.='<div class="messages">'."\n";
            $html.='<div class="ms_title">'.$this->uis->items['USR_recentmsg'].'</div>'."\n";
            $html.='<div class="ms_showmore"><a href="#">全部留言...</a> </div>'."\n";
            $html.='<div class="clear"></div>'."\n";
            $html.='<div class="ms_detail"><a href="#">对的，你好呀。。。。。 </a></div>'."\n";
			$html.='<div class="ms_detail"><a href="#">对的，你好呀。。。。。 </a></div>'."\n";
			$html.='<div class="ms_detail"><a href="#">对的，你好呀。。。。。 </a></div>'."\n";
			$html.='<div class="ms_detail"><a href="#">对的，你好呀。。。。。 </a></div>'."\n";
			$html.='<div class="ms_detail"><a href="#">对的，你好呀。。。。。 </a></div>'."\n";
            $html.='</div>'."\n";
            //留言显示完



	        
	        
	        $html.='</div>'."\n";
          	
          	$html.='</div>'."\n";
               
            
          	//$html.='sssssssssssssss<br>';
          //	var_dump($user_config);
            
           
            
            
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
