<?php
class index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('article_model');
		$this->load->model('json_model');
		$this->load->helper('url');

	}

	public function index()
	{
	    $json=$this->json_model->get_index_config();
	    

	    $ttbox = $json['ttboxes'];
	    
	    //生成头头的相关文章的链接
	    foreach($ttbox as $k_1 => $v_1)
	    {
	    	foreach($ttbox[$k_1]['relatives'] as $k_2 => $v_2)
	    	{
	    		$links = array();
	    		
	    		foreach($ttbox[$k_1]['relatives'][$k_2] as $k_3 => $v_3)
	    		{
	    			$t = $ttbox[$k_1]['relatives'][$k_2][$k_3]['title'];
	    			$u = $ttbox[$k_1]['relatives'][$k_2][$k_3]['url'];
	    		    $links = array_merge($links,array(anchor($u,$t,'target="_blank"' )))	;
	    		}
	    		
	    		$ttbox[$k_1]['relatives'][$k_2]['links']=implode('<span>|</span>', $links);
	    	}
	    	
	    }
	    //生成头头的相关文章的链接（完）
	    
	    
	    $banner_list = $json['banners'];
	    
	    
	    $bannerbuttons =array();
	    
	    for($i=1;$i<=count($banner_list);$i++)
	    {
	    $bannerbuttons =array_merge($bannerbuttons,array(array('buttoncount'=> $i )));
	    }
	    
	    $subbox = $json['subbox'];
	   
	    $anounce = $json['anounce'];
	    
	    $recommended = $json['recommended'];
	    
	    //var_dump($anounce['main']);
	  
	    	    
		$data = $this->defaultpage_model->all_items();
		$data['ttbox'] = $ttbox;
		$data['bannerbuttons'] = $bannerbuttons;
		$data['banner_list'] = $banner_list;
		$data['subbox'] = $subbox;
		$data['anounce_main'] = array($anounce['main']);
		$data['anounce_subs'] = $anounce['subs'];
		$data['recommended'] =  $recommended;
		
		
		
		$this->parser->parse('theme/default/templete/header',$data);
		$this->parser->parse('theme/default/templete/head',$data);
		$this->parser->parse('theme/default/templete/index',$data);
		$this->parser->parse('theme/default/templete/foot',$data);
		
		
	}

}