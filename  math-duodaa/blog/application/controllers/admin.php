<?php

class admin extends CI_Controller {
     var $admins;
     var $username;

	public function __construct()
	{
		//var $admins;
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('article_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
		$this->load->model('defaultpage_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->helper('text');

		
		
		$this->admins = array('math001','duodaamaster');
		$this->username = qa_get_logged_in_handle();	
		if(!in_array($this->username, $this->admins))
		{
			echo 'no permits!';
			exit;
			
		}
		
	}

	public function index()
	{
		//$admins = array('math001','duodaamaster');
        //echo $this->username;
		$au = isset($_POST['add_username'])?$_POST['add_username']:'';
		$al = isset($_POST['add_userlevel'])?$_POST['add_userlevel']:'';
		
		$au = trim($au);
		$al = trim($al);
		
		echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>'."\n";
		
		if($au!='' && $al!='')
		{
			$uids = qa_handles_to_userids(array($au),true);
			$uid= $uids[$au];
			
			if($uid!=null)
			{
				if($this->user_model->get_user_config($au)!==null or $this->user_model->get_user_level($au)!==null)
				{
					echo '已经建立过此用户，或者出现其它错误';
					exit;
					
				}
				
				$blogsetting=array(
						'username'     =>     $au,
						'blogtitle'    =>     $au.'的空间',
						'blogsubtitle' =>     $au.'于哆嗒数学网撰写文章的空间',
						'articlesshow' =>     10
						
						);
				$userlevel = array(
						'username'     =>     $au,
						'level'    =>         0+$al
						);
				$this->db->insert('userconfig',$blogsetting);
				$this->db->insert('userlevel',$userlevel);
				
				echo $au.'创建成功！';
				exit;
			}
			else
			{
				echo '用户名不存在';
				exit;
			}
		
			
		}
        	
        else
        {
		
		
        echo '<form action="/blog/index.php/admin/" method="post">'."\n";
        echo '添加用户：<input name="add_username" id="add_username" style="width:100px" /> 权限:<input name="add_userlevel" id="add_userlevel" style="width:20px" value = "0" />'."\n" ;
        echo '<input type="submit" value="确定" />'."\n";
        echo '</form>'."\n";
        }
        
     

	}

	
}
