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

	class qa_download_page {
		
		var $directory;
		var $urltoroot;
		
	    var $rqs ;
		//var $pagetye='main' ; // "main"主目录页,"list"列表面,"item"具体的物品面
	

		function load_module($directory, $urltoroot)
		{
			$this->directory=$directory;
			$this->urltoroot=$urltoroot;
		}

		
		function suggest_requests() // for display in admin interface
		{	
			return array(
				array(
					'title' => '资料下载',
					'request' => '?qa=download',
					'nav' => 'B', // 'M'=main, 'F'=footer, 'B'=before main, 'O'=opposite main, null=none
				),
			);
		}

		
		function match_request($request)
		{
			$rqsts=explode('_', strtolower($request));
						
			
			if (isset($rqsts[0]) && $rqsts[0]=='download')
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
			$rqsts=explode('_', strtolower($request));
			
			$qa_content=qa_content_prepare();

			//$qa_content['title']=qa_lang_html('example_page/page_title');
			//$qa_content['error']='An example error'."\n";
			$qa_content['title']=' 资料下载';
			
			$qa_content['custom']='<link href="'.$this->urltoroot.'downpage.css" rel="stylesheet" type="text/css" />'."\n";
			//$qa_content['custom'].='Some <B>custom html</B>'."\n";
           // 
/*
			$qa_content['form']=array(
				'tags' => 'METHOD="POST" ACTION="'.qa_self_html().'"',
				
				'style' => 'wide',
				
				'ok' => qa_post_text('okthen') ? 'You clicked OK then!' : null,
				
				'title' => 'Form title',
				
				'fields' => array(
					'request' => array(
						'label' => 'The request',
						'tags' => 'NAME="request"',
						'value' => qa_html($request),
						'error' => qa_html('Another error'),
					),
					
				),
				
				'buttons' => array(
					'ok' => array(
						'tags' => 'NAME="okthen"',
						'label' => 'OK then',
						'value' => '1',
					),
				),
				
				'hidden' => array(
					'hiddenfield' => '1',
				),
			);
*/
			//$qa_content['custom_2']='<P><BR>More <I>custom html</I></P>';
			require_once $this->urltoroot.'downloadhtml.php';
			
			$qa_content['custom_2']=setDownloadHtml($rqsts,$this->urltoroot);
			//$qa_content['custom_2']=$this->urltoroot;
			
			
			
			
			return $qa_content;
		}
	
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/