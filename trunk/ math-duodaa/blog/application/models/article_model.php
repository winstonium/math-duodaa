<?php
class article_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_article_list($count = 10,$type='list')
	{
		$query = $this->db->query('select * from article limit 0,'.$count);
		return $query->result_array();
		
	}
	
	public function get_article_list_by_author($username='math001',$count=10,$status=0)
	{
		$query = $this->db->query('select * from article where status='.$status.' and username="'.$username.'" order by createtime desc limit 0,'.$count);
		return $query->result_array();
		
	}
	
	public function select_single_article($articleid)
	{
		$aid = (int)$articleid;
		if(!is_int($aid))$aid=0;
		else
			 $aid=$articleid;
		
		$query = $this->db->query('select * from article where id ='. $aid);
		//var_dump($query);
		$q_result = $query->result_array();
		//var_dump($q_result[0]) ;
		
		if($q_result==null) return null;
		else return $q_result[0];
	}
	
	public function update_article($articleid,$username,$caption,$content,$tags='',$createtime=null,$status=0)
	{
		
		
		if($this->select_single_article($articleid)==null)
		{
			return null;
			
			
		}
		
		else
		{
			
			$data = array
			(
				'username'    => $username,
				'caption'	  => $caption,
				'content'     => $content,
				'tags'        => $tags,
				'createtime'  => $createtime,
			    'status'      => $status
					
			);
			
			
			
			$this->db->where('id', $articleid);
			$this->db->update('article', $data);
			
			return $articleid;
			
		}
		
	}
	
	public function insert_article($username,$caption,$content,$tags,$createtime=null,$status=0)
	{
		if(is_array($tags))$tgs = implode(',',$tags); 
		else $tgs = $tags;
		
		if($createtime == null)$ct = date('Y-m-d G:i:s');
		else $ct = $createtime;
		
		$article_data = array(
				'username'     => $username,
				'caption'      => $caption,
				'content'      => $content,
				'tags'         => $tgs,
				'createtime'   => $ct,
				'status'       => $status
								);
		
		//var_dump($article_data);
		$this->db->insert('article', $article_data);
		
		return $this->db->insert_id();
		
	}
}