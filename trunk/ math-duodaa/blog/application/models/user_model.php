


<?php
class user_model extends CI_Model
{
    
	public function __construct()
	{
		$this->load->database();
	}

	public function get_user_config($username)
	{
		$query = $this->db->query('select * from userconfig where username="'.$username.'"');
		$query_result=$query->result_array();
		if($query_result==null)return null;
		else return $query_result[0];

	}
	
	public function get_user_level($username)
	{
		$query = $this->db->query('select * from userlevel where username="'.$username.'"');
		$query_result=$query->result_array();
		if($query_result==null)return null;
		else return $query_result[0];	
	}
	
	
	//得到用户头像的html
	function get_qa_avartar_html($user,$size=200)
	{
		$userid_array = qa_handles_to_userids(array($user));
		$userid = $userid_array[$user];
		
		$useraccount=qa_db_select_with_pending(qa_db_user_account_selectspec($userid, true));
		$avartahtml=qa_get_user_avatar_html(
				$useraccount['flags'],
				$useraccount['email'],
				$useraccount['handle'],
				$useraccount['avatarblobid'],
				$useraccount['avatarwidth'],
				$useraccount['avatarheight'],
				qa_opt('avatar_profile_size')
		);
		$avartahtml=strtolower($avartahtml);
	
		if($avartahtml!=null)
		{
			$avartahtml=strtolower($avartahtml);
			$avartahtml=str_replace('?', '\?', $avartahtml);    //生成avarta的html串,从站点的根目录引用
	
		}
		else
		{
			$avartahtml='<a href="'.$this->config->item('qaroot_src').'?qa=user/'.$user.'" class="qa-user-link">';
			$avartahtml.='<img src="'.base_url($this->config->item('app_src')).'/views/theme/'.$this->config->item('theme').'/img/default_avatar.jpg'.'"/>';
			$avartahtml.='</a>';
		}
	
		return $avartahtml;
	}


}