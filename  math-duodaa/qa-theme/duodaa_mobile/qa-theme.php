<?php
	class qa_html_theme extends qa_html_theme_base
	{
		function head_script()
		{
			$this->output('<meta name="keywords" content="数学,应用数学,数学辅导,数学题,数学解答,数学考试,数学帮助,基础数学,LaTex,公式,在线数学,数学互助,数学教育" />');
			
				
				
		}
		
		function doctype()
		{
			
			$this->content['navigation']['footer']['feedback']['label'] = '<div class="feedback-image"></div>';
			
			$this->content['search']['button_label'] = '';
			$this->content['logo'] = '<A HREF="../" CLASS="qa-logo-link">'.qa_opt('site_title').'</A>';

			qa_html_theme_base::doctype();
		}
		function head_custom() {
			$this->output('<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />');
			qa_html_theme_base::head_custom();
		}
		
		function widgets($region, $place)
		{
			if($region != 'side')
				qa_html_theme_base::widgets($region, $place);
		}	
			
		function sidepanel()
		{

		}		
		function nav_user_search()
		{
			$this->search();
			$this->nav('user');
		}
	}
	