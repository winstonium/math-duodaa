<?php 
if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}
class blog_items
{
 __construct($blog)

}


class blog_urls
{
	 //Error信息
   var $error_info = array(
   
   'not_log_on' => '你需要等录后才能使用文章功能!',
   'user_blocked' => '你的文章帐号已经被屏蔽，请与网站管理员联系!',
   'not_activated' => '你的账号尚未激活!'
   
   );

   var $user_info = array(
   'user_register' =>'\\?qa=register&to=^blog_root^',
   'user_login' => '\\?qa=login&to=^blog_root^',
   'user_recent_comments' =>'最新评论',
   'user_recent_messages' =>'最新留言',
   'user_all_messages' =>'全部留言',
   'user_qa_home' => '\\',
   'user_blog_home'=> '.\\',
   'user_blog_myhome' => ''                   				//我的空间，用构造函数定义
   
   );
   
   var $user_function = array(
   
   
   );
   
   
   
   
   function __construct()
   {
       $this->user_info['user_blog_myhome']='.\\?bq=user_'.trim(qa_get_logged_in_handle());
   }
	
   function replace_urls()
   {
   //设置替换对应关系
   
   
   
   }
}

?>