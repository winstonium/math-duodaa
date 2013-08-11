<?php

/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-plugin/example-page/qa-example-page.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Page module class for example page plugin


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

	class duodaa_data_for_client {
		
		var $directory;
		var $urltoroot;
		

		function load_module($directory, $urltoroot)
		{
			$this->directory=$directory;
			$this->urltoroot=$urltoroot;
		}

		
		function suggest_requests() // for display in admin interface
		{	
			return null;
		}

		
		function match_request($request)
		{
			if (stripos($request,'duodaa_data/')===0)
            {
                return true;
            }

            else
            {
                return false;
            }
		}


		function process_request($request)
		{
            require_once 'data_user.php';
            require_once 'data_question.php';
            $requests = explode('/',$request);

            $username=isset($requests[1])?$requests[1]:'0';                          //第一个设置是用户名
            $password=isset($requests[2])?$requests[2]:'0';                          //第二个设置是密码

            $request_type=isset($requests[3])?$requests[3]:'0';                      //第三个是设置请求类型
            // login - 登录
            // logout - 登出

            $para_1=isset($requests[4])?$requests[4]:'0';
            $para_2=isset($requests[5])?$requests[5]:'0';


            $usr=duodaa_login($username,$password);

            switch($request_type)
            {
                case '0':
                   //$request_type='login';
                    break;

                case 'login':
                    $usr=duodaa_login($username,$password);
                    $json_data = $this->to_JSON($usr);

                    break;
                case 'qlist':
                    $qlist=duodaa_qlist();
                   // var_dump($qlist);
                    $json_data = $this->to_JSON($qlist);
                    break;
                default:break;


            }

            header("Content-type:text/html;charset=utf-8");
            echo $json_data;



            return null;
		}

        function to_JSON($array_souce)
        {
            $json = json_encode($array_souce);

            //以下处理中文问题
            $json = preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $json);

            return $json;
        }

	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/