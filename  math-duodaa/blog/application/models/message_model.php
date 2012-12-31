<?php
class message_model extends CI_Model 
{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_messages_by_to_user($username)
	{
		$query = $this->db->query('select * from message where tousername="'.$username.'"');
		$query_result=$query->result_array();
		return $query_result;
		
	}
	
		
}