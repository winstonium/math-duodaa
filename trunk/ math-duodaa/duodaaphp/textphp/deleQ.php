<?php
require_once '../qa-include/qa-base.php';
require_once QA_INCLUDE_DIR.'qa-app-captcha.php';
require_once QA_INCLUDE_DIR.'qa-app-users.php' ;
require_once QA_INCLUDE_DIR.'qa-app-users-edit.php' ;
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-app-posts.php';
require_once QA_INCLUDE_DIR.'qa-db.php';
require_once QA_INCLUDE_DIR.'qa-db-selects.php';

set_time_limit(0);

for($i=100;$i<500;$i++)
{
	$post=qa_db_single_select(qa_db_full_post_selectspec(null, $i));
	if(is_array($post))qa_post_set_hidden($i);

}