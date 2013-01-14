<?php
class ui_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('user_model');
	}

	public function nav_div_items()
	{
		$username = qa_get_logged_in_handle();
		$user = $this->user_model->get_user_config($username);
		$userlevel = $this->user_model->get_user_level($username);
		
		
		$items[0] = array(
				           'href'  =>  '/',
				           'text'  =>  '哆嗒数学首页'
				         );
		$items[1] = array(
						   'href'  =>  site_url(),
						   'text'  =>  '空间首页'
				         );
		//判断权限
		if($userlevel!==null and $userlevel>=0)
		{
			$items[2] = array(
					'href'  =>  site_url('createarticle'),
					'text'  =>  '发表文章'
			);
			$items[3] = array(
					'href'  =>  site_url('articel/draft'),
					'text'  =>  '我的草稿'
			);
			
		}
		
		return $items;
	}

	public function logon_div_items()
	{
		$username = qa_get_logged_in_handle();
		
		
		if($username==null)
		{
			$tourl = str_replace('http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'], '', current_url());
			$tourl = str_replace('http://'.$_SERVER['SERVER_NAME'], '', $tourl);
			
			$items[0] = array('href'=>'/?qa=register&to='.$tourl,'text'=>'注册');
			$items[1] = array('href'=>'/?qa=login&to='.$tourl,'text'=>'登陆');
			
		}
		else
		{   
			$items[0] = array('href'=>'/?qa=logout','text'=>'退出');
			$items[1] = array('href'=>site_url('user/modify'),'text'=>'修改空间设置');
			$items[2] = array('href'=>'/?qa=user/'.$username,'text'=>'<u>'.$username.'</u>');
			
		}
		return $items;
	}
}