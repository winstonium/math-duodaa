<?php 
function setDownloadHtml($requests,$root)
{
	$rqsts=$requests;
	$pagetype='main';
	$csvroot=$root.'items\csv\books.csv';
	
	/*下面用于判断请求页的类型*/	
	
	if(isset($rqsts[1]))
	{
		if(preg_match('/^main$/',$rqsts[1]))
		{
			
			return 'main';
			
		}
		else if(preg_match('/^list[\d]*$/',$rqsts[1]))
		{
			return 'list';
			
		}
		
		else if(preg_match('/^item[\d]*$/',$rqsts[1]) || preg_match('/^[\d]+$/',$rqsts[1]))
		{
			
			//return 'item';
			$pagetype='item';
			//return $pagetype;
		}
		
		else
		{
			return 'main';
			
		}
		
	}
	
	else
	{
		
		return 'main';
		
	}
	
	
	/*下面来拉接主页变的html*/
	
	if($pagetype=='main')
	{
		
		
		//$books=file[]
		
		
	}
	
	else if($pagetype=='item')
	{
		//$itemnum = preg_split('item', $rqsts[1])[0];
		$itemnum =  $rqsts[1];
	
		$file =fopen($csvroot,'r');
		
		
		while(!feof($file))
		{   
			$iteminfos= explode(',',fgets($file));
			if($iteminfos[0] == $itemnum)
			{
				break;
			}
			
			
		}
		
		
		
		fclose($file);
		//return 'aaaaaaaa';
		return $iteminfos[1];
	}
	
	
	
}





?>