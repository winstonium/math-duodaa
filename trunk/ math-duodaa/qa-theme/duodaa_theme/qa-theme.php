<?php

/*
	Question2Answer (c) Gideon Greenspan

	http://www.question2answer.org/

	
	File: qa-theme/Candy/qa-theme.php
	Version: See define()s at top of qa-include/qa-base.php
	Description: Override something in base theme class for Candy theme


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

	class qa_html_theme extends qa_html_theme_base
	{	
		// adding ie specific css
		function head_script()
		{
			if (isset($this->content['script']))
				foreach ($this->content['script'] as $scriptline)
					$this->output_raw($scriptline);
			
			$this->output('<!--[if IE]>');	
			$this->output('<LINK REL="stylesheet" TYPE="text/css" HREF="'.$this->rooturl.$this->ie_css().'"/>');
			$this->output('<![endif]-->');
			
		}
		
				
		function ie_css()
		{
			return 'ie.css';		
		}

        function header()
		
		{
			$this->output('<DIV CLASS="qa-header">');
			
			$fheader = fopen($this->rooturl.'headerlinks.ini','r');
			$this->output('<div style="text-align: right; width:97%;height:20px;padding-top: 5px;padding-bottom: 1px; ">',"\n");
			
			while (!feof($fheader))
			{
			 $headerinfos=explode(',',fgets($fheader));
			 if(isset($headerinfos[2])&& $headerinfos[2]==1)
			 {
			   $headerlinks=trim($headerinfos[1]);
			   $headertext=trim($headerinfos[0]);
			   if(substr($headerlinks,0,5)!='http:')$headerlinks=$this->rooturl.$headerlinks;
			   
			   $this->output('<a href="'.$headerinfos[1].'">'.$headerinfos[0].'</a>',"\n");
			 }
			
			}
		
			$this->output('</div>',"\n");
			fclose($fheader);
			
			$this->logo();
			$this->nav_user_search();
			$this->nav_main_sub();
			$this->header_clear();
			
			
			
			$this->output('</DIV> <!-- END qa-header -->', '');
			
			
			}
	
		// header part
		function nav_user_search() // reverse the usual order
		{
			$this->search();
			$this->nav('user');
			
			
		}
		
		// main content div
		function q_view_content($q_view)
		{
			if (!empty($q_view['content']))
				$this->output(
					'<DIV CLASS="qa-q-view-content clearfix">',
					$q_view['content'],
					'</DIV>'
				);
		}
		
		// custom footer
		function footer()
        {
            $this->output('<DIV CLASS="qa-footer">');			
			
			$this->output('<DIV CLASS="footer-copyright">');
			$this->output('<p>Copyright &copy; '.date('Y').' '.$this->content['site_title'].' - 版权所有.</p>');
			$this->output('</DIV>');
			
			$this->attribution();							
			
			//$this->output('<DIV CLASS="footer-credit">');
			//$this->output('<p>Theme Designed By: <a href="http://pixelngrain.com">Pixel n Grain</a></p>');
			//$this->output('</DIV>');
			
			$this->nav('footer');	
			
			$this->footer_clear();
            
            $this->output('</DIV>');
            
           
            $this->output('<DIV style="border:1px solid #eee;margin:5px;padding:3px"><div style="padding:8px 0px 8px 0px" >友情链接</div>');
            $this->output('<DIV>');
            
            $path=$_SERVER['DOCUMENT_ROOT'].'\friendlink.ini';
			$file = fopen( $path,'r');
			$html='';
			while(!feof($file))
			{
			$linksource = explode(',',fgets($file));
			$link = trim($linksource[1]);
			$linktext = trim($linksource[0]);
			$html .= '<a href="'.$link.'" targe="_blank">'.$linktext.'</a>';
			
			if( isset($linksource[2]))
			{$html .= '<br>'."\n";
			}
			else 
			{$html .= "\n";
			}
			}
			fclose($file);
			
			$this->output($html);
			$this->output('</DIV>');
            
            $this->output('</DIV>');
            $this->output(' <!-- END qa-footer -->');
			

        }
        
        
        
	}
	
	
	 

/*
	Omit PHP closing tag to help avoid accidental output
*/