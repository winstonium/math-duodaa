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
            $username=$requests[1];
            $password=isset($requests[2])?$requests[2]:'0';


            $usr=duodaa_login($username,$password);

            //var_dump($usr) ;
            if($usr['error']=='')
            {
                $json=duodaa_qlist();
            }
            else
            {

            }

            //网页编码UTF-8
            header("Content-type:text/html;charset=utf-8");
            echo $json;
            //var_dump($usr);

            return null;
		}



	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/