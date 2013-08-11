<?php
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-db-users.php';
require_once QA_INCLUDE_DIR.'qa-db-selects.php';


//验证用户用户登录


//得到用户的提问列表
function duodaa_qlist($userid=null,$categroryid=null,$type='Q',$start=0,$count=30)
    {

        $link=mysql_connect(QA_MYSQL_HOSTNAME,QA_MYSQL_USERNAME,QA_MYSQL_PASSWORD);
        $slected = mysql_select_db(QA_MYSQL_DATABASE,$link);

        $sql_query = 'SELECT *,IF(created < updated, updated,created) AS update_time '
                    .'FROM qa_posts '
                    .'WHERE '
                    .($userid===null?'1=1 ':'userid='.$userid.' ')
                    .($categroryid===null?'':'AND categroryid='.$categroryid.' ')
                    .($type===null?'':'AND type="'.$type.'" ')

                    .'ORDER BY update_time DESC LIMIT '.$start.', '.$count;

        $result=mysql_query($sql_query,$link);

       // echo $sql_query;
        //exit;
        $qlist = mysql_fetch_array($result);
        //var_dump($qlist);

        $i=0;
        while($row = mysql_fetch_array($result))
        {
            $qlist[$i++] = $row;
        }

        mysql_close($link);
       //var_dump($qlist);exit;

        return $qlist;

     }

function myQusetions($un,$strart,$end)
{

}

function myAnsweredQusetions($un,$strart,$end)
{

}