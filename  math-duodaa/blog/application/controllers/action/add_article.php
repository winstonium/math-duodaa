<?php
class add_article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('article_model');
		
	}

		
	public function add_single_by_post()
	{
		//$actor = qa_get_logged_in_handle();
		
		$username = qa_get_logged_in_handle();
		$caption = htmlentities($this->input->post('title'),ENT_QUOTES ,'UTF-8');
		
		$content = strip_tags($this->input->post('content'),ALLOW_CONTENT_TAGS) ;
		$content = htmlentities($content,ENT_QUOTES ,'UTF-8');
		
		$tags = htmlentities($this->input->post('tags'),ENT_QUOTES ,'UTF-8');
		$createtime = date('Y-m-d G:i:s');
		$id = $this->input->post('ar_saveid');
		
		
		
		$userlevel = $this->user_model->get_user_level($username);
		
		if($username==null)
		{
			echo '发生了错误1';
			exit;
			
		}
		elseif($caption==null)
		{
			echo '发生了错误2';
			exit;
				
		}
		else if($content==null)
		{
			echo '发生了错误3';
			exit;
		
		}
		
		
		//判断权限
		$power=-1;
		
		if($userlevel!=null)$power=$userlevel['level'];
		
		if($power<0)
		{
			echo '你没有权限发表文章';
			exit;
		}
		
		
		if($this->article_model->select_single_article($id)==null)
		{
		     $newid = $this->article_model->insert_article($username,$caption,$content,$tags,$createtime);
		}
		else 
		{
		     $newid = $this->article_model->update_article($id,$username,$caption,$content,$tags,$createtime);
		}
		
		
		echo $newid;
		
		
	}
	
	
	

}