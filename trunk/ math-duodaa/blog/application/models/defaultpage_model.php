<?php
class defaultpage_model extends CI_Model 
{

	public function __construct()
	{
		//$this->load->database();
		$this->load->model('user_model');
		$this->load->model('article_model');
		$this->load->model('comment_model');
		$this->load->model('message_model');
		$this->load->model('ui_model');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->helper('text');
		
	}
	
	public function header_items()
	{
		$items=array(
				'blog_title'    => '哆嗒数学网空间',
				'siteurl'      => site_url(),
				'jq_ui_css'    => $this->config->item('jq_ui_css'),
				'jq_src'       => $this->config->item('jq_src'),
				'jq_ui_src'    => $this->config->item('jq_ui_src'),
				'css_src'      => base_url($this->config->item('app_src').'views/theme/'.$this->config->item('theme').'/style.css'),
				
				);
		
		return $items;
	}
	
	public function head_items()
	{
		
		$items= array(			
			'blog_logo'           =>      base_url($this->config->item('app_src').'views/theme/'.$this->config->item('theme').'/img/blog_logo.gif'),
			'bg_img'              =>      base_url($this->config->item('app_src').'views/theme/'.$this->config->item('theme').'/img/bg.jpg')
		
				);
		return $items;
		
	}
	
	public function mainleft_items()
	{
		$items= array(
				
		);
		return $items;
	}
	public function mainright_items()
	{
		$items= array(
		);
		return $items;
	}
	public function foot_items()
	{
		$items= array(
				'copyrightdate'       =>     date('Y')
		);
		return $items;
	}
	
	public function all_items()
	{
		$items = array_merge(
				$this->header_items(),
				$this->head_items(),
				$this->mainleft_items(),
				$this->mainright_items(),
				$this->foot_items()
				);
		$items['nav_div_items'] = $this->ui_model->nav_div_items();
		$items['logon_div_items'] = $this->ui_model->logon_div_items();
		
		//var_dump($items['logon_div_items']);
		//$items = array_merge($items,$this->ui_model->nav_div_items());
		
		return $items;
				
		
	}
		
}