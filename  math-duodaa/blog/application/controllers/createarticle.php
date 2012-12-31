<?php

class createarticle extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('article_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
		
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->helper('text');

	}

	public function index()
	{  
		
		$username = qa_get_logged_in_handle();	
		
		
		if($username=='')
		{
			exit;
		}
		
		$user = $this->user_model->get_user_config($username);
		if($user==null)
		{
			exit;
		}
				
		$articles_meta = $this->article_model->get_article_list_by_author($username);
		$comments_meta = $this->comment_model->get_comments_by_to_user($username);
		$messages_meta = $this->message_model->get_messages_by_to_user($username);
        
		//$comments_meta = $;
				
		$articles=array();
		$comments=array();
		$messages=array();
		
		
		foreach($articles_meta as $key => $article)
		{
			$articles[$key]['title']=$article['caption'];
			$articles[$key]['content']=mb_substr($article['content'],0, 200);
			$articles[$key]['date']=date('Y-m-d g:i',strtotime($article['createtime']));			
		}
		
		foreach($comments_meta as $key => $comment)
		{
			$comments[$key]['comment']=mb_substr($comment['content'],0,17).'...';
		}
		
		foreach($messages_meta as $key => $message)
		{
			$messages_meta[$key]['comment']=mb_substr($message['content'],0,17).'...';
		}
	
		
		$data = $this->defaultpage_model->all_items();
		
		$data = array_merge(
				$data,
				array(
			'blog_title'          =>      $user['blogtitle'],
			'blog_subtitle'       =>      $user['blogsubtitle'],
			
				
			'img_article_operation_btns1' 
						          =>      base_url($this->config->item('app_src').'views/theme/'.$this->config->item('theme').'/img/article_operation_btns1.gif'),
				
						
			'article_submit'      =>      site_url('action/add_article/add_single_by_post'),
			'save_posted_page'    =>      site_url('action/save_article/save_single_by_post'),
			'aritile_site_url'    =>      site_url('article/index')
		
				)
		);
		

		
		
		
		$data['articles']= $articles;
		$data['comments']= $comments;
		$data['messages']= $messages;
		
		$this->parser->parse('theme/default/templete/header',$data);
		$this->parser->parse('theme/default/templete/head',$data);
		$this->parser->parse('theme/default/templete/createarticle',$data);
		$this->parser->parse('theme/default/templete/foot',$data);
		
		
		
	}

}