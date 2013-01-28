<?php
class dele_article extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('article_model');
		
	}

	
	public function dele_single_article($articleid=0)
	{
		$username = qa_get_logged_in_handle();
				
		$article = $this->article_model->select_single_article($articleid);
				
		$userlevel = $this->user_model->get_user_level($username);

		if($username==null)
		{
			echo '发生了错误1';
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
		
		
		if($article!=null)
		{
			$newid = $this->article_model->update_article($articleid,$article['username'],$caption,$content,$tags,$createtime,$status=1);
		}
		
		if($newid==null)
		{
			$newid = $this->article_model->insert_article($username,$caption,$content,$tags,$createtime,1);
		}
		
		echo $newid;
	}

}