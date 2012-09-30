<?php


 return array(
      'ER_userblocked' => array(
                                 array('url1'),      //第一行是要替换的字
                                 array('返回'),      //第二行是文字
                                 array(BLOG_ROOT),   //第三行是位置
                                 array('_self')      //第四行是链接的target
                                ) 
      ,
      
      'USR_login_url' => array(
                                 array('url1'),
                                 array($this->items['USR_login']),
                                 array('/?qa=login&to='.convert_dir_src(BLOG_ROOT)), 
                                 array('_self')
                                ) 
                                
      ,
      
       'USR_register_url' => array(
                                 array('url1'),
                                 array($this->items['USR_register']),
                                 array('/?qa=register&to='.convert_dir_src(BLOG_ROOT)), 
                                 array('_self')
                                ) 
                                
                                ,
      
      'USR_qahome_url' => array(
                                 array('url1'),
                                 array($this->items['USR_qahome']),
                                 array('/'), 
                                 array('_self')
                                ) 
                                ,
      
      'USR_bloghome_url' => array(
                                 array('url1'),
                                 array($this->items['USR_bloghome']),
                                 array(convert_dir_src(BLOG_ROOT)), 
                                 array('_self')
                                ) 
                                ,
      
      'USR_blogmyhome_url' => array(
                                 array('url1'),
                                 array($this->items['USR_blogmyhome']),
                                 array(convert_dir_src(BLOG_ROOT).'?bq=user_'.trim(qa_get_logged_in_handle())), 
                                 array('_self')
                                ) 
                                ,
      
     'USR_noarticle_url' => array(
                                 array('url1'),
                                 array($this->items['USR_noarticle']),
                                 array(convert_dir_src(BLOG_ROOT).'?bq=user_'.trim(qa_get_logged_in_handle())).'_creat', 
                                 array('_self')
                                ) 
                             
      );