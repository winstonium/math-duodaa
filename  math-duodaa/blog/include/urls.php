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
	 //Error��Ϣ
   var $error_info = array(
   
   'not_log_on' => '����Ҫ��¼�����ʹ�����¹���!',
   'user_blocked' => '��������ʺ��Ѿ������Σ�������վ����Ա��ϵ!',
   'not_activated' => '����˺���δ����!'
   
   );

   var $user_info = array(
   'user_register' =>'\\?qa=register&to=^blog_root^',
   'user_login' => '\\?qa=login&to=^blog_root^',
   'user_recent_comments' =>'��������',
   'user_recent_messages' =>'��������',
   'user_all_messages' =>'ȫ������',
   'user_qa_home' => '\\',
   'user_blog_home'=> '.\\',
   'user_blog_myhome' => ''                   				//�ҵĿռ䣬�ù��캯������
   
   );
   
   var $user_function = array(
   
   
   );
   
   
   
   
   function __construct()
   {
       $this->user_info['user_blog_myhome']='.\\?bq=user_'.trim(qa_get_logged_in_handle());
   }
	
   function replace_urls()
   {
   //�����滻��Ӧ��ϵ
   
   
   
   }
}

?>