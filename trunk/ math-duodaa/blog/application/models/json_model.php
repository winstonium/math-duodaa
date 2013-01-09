


<?php
class json_model extends CI_Model
{
    
	public function __construct()
	{
		$this->load->database();
	}

	public function get_index_config()
	{
		$json = file_get_contents(APPPATH.'/../index_config.js');
		$json = substr($json,3); // 去掉bom头
		$json_array = json_decode($json,true);
		
		return $json_array;
	}
	
	

}