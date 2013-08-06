<?php
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-db-users.php';
require_once QA_INCLUDE_DIR.'qa-db-selects.php';


//验证用户用户登录


//得到用户的提问列表
function duodaa_qlist($un=null,$type=null,$isanswered=false)
    {


        $link=mysql_connect(QA_MYSQL_HOSTNAME,QA_MYSQL_USERNAME,QA_MYSQL_PASSWORD);
        $slected = mysql_select_db(QA_MYSQL_DATABASE,$link);

        $sql_query = 'SELECT *,IF(created < updated, updated,created) AS update_time '
                    .'FROM qa_posts '
                    .'WHERE type="Q" '
                    .'ORDER BY update_time DESC LIMIT 0,30';

        $result=mysql_query($sql_query,$link);
        $qlist = mysql_fetch_array($result);
        $i=0;
        while($row = mysql_fetch_array($result))
        {
            $qlist[$i++] = $row;
        }

        mysql_close($link);

        //转成Json
        $qlist = json_encode($qlist);

        //以下处理中文问题
        $qlist = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $qlist);

        return $qlist;
     }

function myQusetions($un,$strart,$end)
{

}

function myAnsweredQusetions($un,$strart,$end)
{

}