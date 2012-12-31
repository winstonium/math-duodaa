<?php
class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('article_model');

	}

	public function index()
	{
	
		$data = $this->defaultpage_model->all_items();
		
		$this->parser->parse('theme/default/templete/header',$data);
		$this->parser->parse('theme/default/templete/head',$data);
		$this->parser->parse('theme/default/templete/index',$data);
		$this->parser->parse('theme/default/templete/foot',$data);
		
		
	}

}