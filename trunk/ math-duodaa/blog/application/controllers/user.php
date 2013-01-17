<?php

class user extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('article_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
		$this->load->model('defaultpage_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->helper('text');

	}

	public function index($username=null)
	{
		if(!isset($username))
		{
			echo '<script>window.location.href="'.site_url().'"</script>';
			exit;
		}
		
		$user = $this->user_model->get_user_config($username);
		if($user==null)
		{exit;}
		$articles_meta = $this->article_model->get_article_list_by_author($username);
		$comments_meta = $this->comment_model->get_comments_by_to_user($username);
		$messages_meta = $this->message_model->get_messages_by_to_user($username);
       // var_dump($messages_meta);
		//$comments_meta = $;
				
		$articles=array();
		$comments=array();
		$messages=array();
		
		
		foreach($articles_meta as $key => $article)
		{
			$articles[$key]['title']=$article['caption'];
			$articles[$key]['content']=mb_substr($article['content'],0, 200);
			$articles[$key]['date']=date('Y-m-d g:i',strtotime($article['createtime']));
			$articles[$key]['articlelink']=site_url('article/index/'.$article['ID']);
		}
		
		foreach($comments_meta as $key => $comment)
		{
			$comments[$key]['comment']=mb_substr($comment['content'],0,17).'...';
			
		}
		
		foreach($messages_meta as $key => $message)
		{
			$messages[$key]['message']=mb_substr($message['content'],0,17).'...';
		}
	
		$data = $this->defaultpage_model->all_items();
		
		//var_dump($user);
		$data = array_merge(
				$data, 
				array(
						'blog_title'          =>      $user['blogtitle'],
						'blog_subtitle'       =>      $user['blogsubtitle'],
						'user_photo'          =>      $this->user_model->get_qa_avartar_html($username),
						'user_profile'        =>      $this->config->item('qaroot_src').'?qa=user/'.$username
	
			      	  )
		         );
		
		
		
		$data['articles']= $articles;
		$data['comments']= $comments;
		$data['messages']= $messages;
		
		
		$this->parser->parse('theme/default/templete/header',$data);
		$this->parser->parse('theme/default/templete/head',$data);
		$this->parser->parse('theme/default/templete/user',$data);
		$this->parser->parse('theme/default/templete/foot',$data);
		
		
		
	}
	
	public function draft()
	{
        $username = qa_get_logged_in_handle();
        
        if($username==null)
        {
        	echo 'please login!';
        	exit;
        }

        $user = $this->user_model->get_user_config($username);

        if($user==null)
        {
        	echo 'no permits!';
        	exit;
        }
        
        //if(qa_get_logged_in_handle()!=$atcl['username'] or $this->user_model->get_user_level(qa_get_logged_in_handle())<4)
        
        $data = $this->defaultpage_model->all_items();
        
        $articles_meta = $this->article_model->get_article_list_by_author($username,1000,1);
        $comments_meta = $this->comment_model->get_comments_by_to_user($username);
        $messages_meta = $this->message_model->get_messages_by_to_user($username);
        // var_dump($messages_meta);
        //$comments_meta = $;
        
        $articles=array();
        $comments=array();
        $messages=array();
        
        
        foreach($articles_meta as $key => $article)
        {
        	$articles[$key]['title']=$article['caption'];
        	$articles[$key]['content']=mb_substr($article['content'],0, 200);
        	$articles[$key]['date']=date('Y-m-d g:i',strtotime($article['createtime']));
        	$articles[$key]['articlelink']=site_url('article/index/'.$article['ID']);
        }
        
        foreach($comments_meta as $key => $comment)
        {
        	$comments[$key]['comment']=mb_substr($comment['content'],0,17).'...';
        		
        }
        
        foreach($messages_meta as $key => $message)
        {
        	$messages[$key]['message']=mb_substr($message['content'],0,17).'...';
        }
        
        $data = $this->defaultpage_model->all_items();
        
        //var_dump($user);
        $data = array_merge(
        		$data,
        		array(
        				'blog_title'          =>      $user['blogtitle'],
        				'blog_subtitle'       =>      $user['blogsubtitle'],
        				'user_photo'          =>      $this->user_model->get_qa_avartar_html($username),
        				'user_profile'        =>      $this->config->item('qaroot_src').'?qa=user/'.$username
        
        		)
        );
        
        
        $data['articles']= $articles;
        $data['comments']= $comments;
        $data['messages']= $messages;
		
		
		
		$this->parser->parse('theme/default/templete/header',$data);
		$this->parser->parse('theme/default/templete/head',$data);
		$this->parser->parse('theme/default/templete/user',$data);
		$this->parser->parse('theme/default/templete/foot',$data);
		
	}

	public function modify()
	{
		echo 'Being built!';
		
	}
}
