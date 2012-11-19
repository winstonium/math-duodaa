<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

require_once 'files.php';
require_once 'dboperations.php';


function blog_get_userconfig($user)
{
	$db=blog_opendb();
	$result = blog_db_query($db,'select * from userconfig where username="'.$user.'"');
	
	return $result[0];
}

function blog_get_qa_userid($user)
{
	$userid=qa_handles_to_userids(array($user));
	$userid=$userid[$user];
	
	return $userid;
	
}

//得到用户头像的html
function blog_get_qa_avartar_html($user)
{
	$userid = blog_get_qa_userid($user);
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
		$avartahtml=str_replace('?', convert_dir_src(BLOG_QAROOT).'?', $avartahtml);    //生成avarta的html串,从站点的根目录引用
		
	}
	else
	{
		$avartahtml='<a href="'.convert_dir_src(BLOG_QAROOT).'?qa=user/'.$user.'" class="qa-user-link">';
		$avartahtml.='<img src="'.convert_dir_src(BLOG_ROOT.'/theme/'.BLOG_THEME.'/default_avatar.jpg').'"/>';
		$avartahtml.='</a>';
	}
	
	return $avartahtml;
}

