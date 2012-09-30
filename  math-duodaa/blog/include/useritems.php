<?php

if(!BLOG_VER)
{
echo '<script>window.location.href="/";</script>';	
exit;
}

class useritems
{
   var $items;
   var $rplc_text ;
   
   var $rplc_urls ;
   

   
   function	__construct()
	{
	   $this->items=$this->load_lang();	   
	   
	   $this->rplc_text=$this->load_rplc_text();
	   $this->rplc_urls=$this->load_rplc_url();

	   foreach($this->items as $key => $keyvalue)
	   {
	      $this->replace_text($key);
	      $this->relace_url($key);
	   }
	}
   
   function load_lang()
    {
      return require BLOG_ROOT.'/lang/'.BLOG_LANG.'/lang.php';
    }

   function load_rplc_text()
   {
       return require 'useritems-textreplace.php';   
   }
   
   function load_rplc_url()
   {
     return require 'useritems-urlreplace.php';   
   }
	
   function replace_text($key)
   {
   	  //var_dump($this->rplc_text[$key]);
      if(isset($this->rplc_text[$key]))
      {
       $ptns=$this->rplc_text[$key][0];
      
       	for($i=0;isset($ptns[$i]);$i++)
	       {
	       	$ptns[$i]="::".$ptns[$i]."::";
	       }
	
	  $this->items[$key] = str_replace($ptns, $this->rplc_text[$key][1], $this->items[$key]);
      }
   }
   
   function relace_url($key)
   {
	   if(isset($this->rplc_urls[$key]))
	      {
	       $ptns=$this->rplc_urls[$key][0];
	       $link_texts =$this->rplc_urls[$key][1];
	       $link_urls = $this->rplc_urls[$key][2];
	       $link_targets = isset($this->rplc_urls[$key][3])?$this->rplc_urls[$key][3]:null;
	      
         
			      for($i=0;isset($ptns[$i]);$i++)
			      {
			       $ptns[$i]="::".$ptns[$i]."::";
			       $links[$i]=$this->ger_url($link_texts[$i], $link_urls[$i],$link_targets[$i]);
			      }
	        //var_dump($links);
	       $this->items[$key] = str_replace($ptns,$links, $this->items[$key]);
	      }
	    
	      
   }
   
   function ger_url($text,$url,$target=null)
   {
   	$link = '<a href="'.$url.'" ';
   	if($target)$link .= 'targe="'.$target .'"';
   	$link .= '>'.$text.'</a>'; 
   	
   	return $link;
   
   
   }

}