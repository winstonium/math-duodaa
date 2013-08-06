<?php
require_once QA_INCLUDE_DIR.'qa-app-limits.php';
require_once QA_INCLUDE_DIR.'qa-db-users.php';
require_once QA_INCLUDE_DIR.'qa-db-selects.php';
require_once QA_INCLUDE_DIR.'qa-app-q-list.php';
require_once QA_INCLUDE_DIR.'qa-app-search.php';

//验证用户用户登录
function duodaa_login($un,$psw)
{
    //echo $un;
    $user['error']='';
    if ( strpos($un, '@')!==false) // handles can't contain @ symbols
    {
        $matchusers=qa_db_user_find_by_email($un);
    }
    else
    {
        $matchusers=qa_db_user_find_by_handle($un);
    }

   // var_dump($matchusers) ;
    if(count($matchusers)==1)
    {
        $userid= $matchusers[0];
        $userinfo=qa_db_select_with_pending(qa_db_user_account_selectspec($userid, true));

        if (strtolower(qa_db_calc_passcheck($psw, $userinfo['passsalt'])) == strtolower($userinfo['passcheck']))
        {
            $user=array_merge($userinfo,$user);
            //return true; //'登陆成功';
        }

        else
        {
            $user['error']='密码错误';
           // return '密码错误';
        }

    }

    else
    {
        $user['error']='用户不存在';
    }

    return $user;
}

//得到用户的提问列表
