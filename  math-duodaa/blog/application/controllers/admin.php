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
		
		if($au!='' && $al!='')
		{
			echo $au;
			echo '<br>';
			echo $al;
			
		}
        	
        else
        {
		
		echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>'."\n";
        echo '<form action="/blog/index.php/admin/" method="post">'."\n";
        echo '添加用户：<input name="add_username" id="add_username" style="width:100px" /> 权限:<input name="add_userlevel" id="add_userlevel" style="width:20px" value = "0" />'."\n" ;
        echo '<input type="submit" value="确定" />'."\n";
        echo '</form>'."\n";
        }
        
     

	}

	
}
