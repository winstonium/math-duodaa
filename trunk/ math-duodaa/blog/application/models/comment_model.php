<?php
class comment_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_comments_by_to_user($username)
	{
		$query = $this->db->query('select * from comment where tousername="'.$username.'"');
		$query_result=$query->result_array();
		return $query_result;
		
	}
	
		
}