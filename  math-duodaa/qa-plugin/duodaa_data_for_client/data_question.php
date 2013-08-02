<?php
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-db-users.php';
require_once QA_INCLUDE_DIR.'qa-db-selects.php';


//验证用户用户登录


//得到用户的提问列表
function duodaa_qlist($un=null,$type=null,$isanswered=false)
    {

        $link=mysql_connect("localhost",QA_MYSQL_USERNAME,QA_MYSQL_PASSWORD);
        mysql_select_db(QA_MYSQL_DATABASE);

        $sql_query = 'SELECT IF(created > updated, created,updated) AS update_time FROM qa_posts ORDER BY update_time DESC';

        $result=mysql_query($sql_query);
        return $result;
     }