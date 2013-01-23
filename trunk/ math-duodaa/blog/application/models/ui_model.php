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
						   'href'  =>  site_url('user/index/'.qa_get_logged_in_handle()),
						   'text'  =>  '我的空间'
				         );
		//判断权限
		if($userlevel!==null and $userlevel>=0)
		{
			$items[2] = array(
					'href'  =>  site_url('createarticle'),
					'text'  =>  '发表文章'
			);
			$items[3] = array(
					'href'  =>  site_url('user/draft'),
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
			$items[2] = array('href'=>'/?qa=account','text'=>'<u>'.$username.'</u>');
			
		}
		return $items;
	}
	
	public function ar_operation_items($article=null)
	{
		$username = qa_get_logged_in_handle();
		$ar_owner = $article['username'];
		$user = $this->user_model->get_user_config($username);
		$userlevel = $this->user_model->get_user_level($username);
		
		if($ar_owner==null)
		{
			echo '文章读取错误！';
			exit;
		}
		
		
		$items[0]= array(
					'text'      => '阅读全文',
					'link'  => site_url('article/index/'.$article['ID']),
					    );
		$items[1]= array(
					'text'      => '评论',
					'link'  => '#',
			            );
		
		
		if($ar_owner==$username or $userlevel >= 4)
		{
			$items[2]= array(
					'text'      => '修改',
					'link'  => site_url('createarticle/index/'.$article['ID']),
			);
			$items[3]= array(
					'text'      => '删除',
					'link'  => '#',
			);
		}
		
		$comment_count = count($this->comment_model->get_comments_by_article_id($article['ID'])) ;
		if($comment_count>0)
		{
			$items[1]['text'] .= '('.$comment_count.')';
		}
		
		return $items;
		
	}
	
}