<?php

/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-include/qa-editor-basic.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Basic editor module for plain text editing


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

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../');
		exit;
	}


	class qa_editor_math {
	    var $urltoroot;	
	
		/*function load_module($localdir, $htmldir)
		{
		   $this->urltoroot=$localdir;
		}
*/	
	    function load_module($directory, $urltoroot)
		{
			$this->urltoroot=$urltoroot;
		}
	    
	    
	    
		function calc_quality($content, $format)
		{
			if ($format=='')
				return 1.0;
			elseif ($format=='html')
				return 0.2;
			else
				return 0;
		}


		function get_field(&$qa_content, $content, $format, $fieldname, $rows /* $autofocus parameter deprecated */)
		{
		    //echo 'hahaha';
		   $html = '';
		   $html .='<script id="matheditor-addCss" src="'.$this->urltoroot.'addcss.js?'.$this->urltoroot.'"></script>';
		   
		   //下面一行代码是读取输入版面的html
		   $html .= file_get_contents($this->urltoroot."mathpanpel.txt");
		   ////////////
		   
		   //下面一行代码是替换imgs的数路径
		   $html= str_replace("[qa-math-imgs-path]",$this->urltoroot."imgs",$html);
		   //////////////////////
		   
		   $html .= '<b>公式预览</b>' . "\n";
		   $html .= '<div id="wmd-preview-'.$fieldname.'" class="wmd-preview" ></div>' . "\n";
		   $html .= '<div id="wmd-button-bar-'.$fieldname.'" class="wmd-button-bar"></div>' . "\n";
		   $html .= '<textarea name="'.$fieldname.'" id="wmd-input-'.$fieldname.'" class="wmd-input">'.$content.'</textarea>' . "\n";
           $html .= '<script id="viewShow" src="'. $this->urltoroot. 'viewshow.js?'.$fieldname.'"></script>'."\n";

		//   $html .= '<script>document.write(hastr);</script>';
		
		
			return array(
				'type' => 'custom',
			    'html' =>  $html
			);
		}

		function focus_script($fieldname)
		{
			return "document.getElementById('".$fieldname."').focus();";
		}
		

		function read_post($fieldname)
		{
	    	$viewer=qa_load_module('viewer', '');
		
			return array(
				'format' => '',
			    'content'=> $viewer->get_text(qa_sanitize_html(qa_post_text($fieldname)), 'html', array())
			//	'content' =>qa_sanitize_html(qa_post_text($fieldname)),
			);
		}
	
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/