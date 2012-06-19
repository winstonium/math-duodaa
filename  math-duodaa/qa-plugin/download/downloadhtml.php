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
			$iteminfos= explode(',',trim(fgets($file)));
			if($iteminfos[0] == $itemnum)
			{
				break;
			}
			
			
		}
		
		$item_exist = !feof($file);
		
		fclose($file);
		
		if($item_exist)
		{
		$itemid=(isset($iteminfos[0])?$iteminfos[0]:'');
		$itemtitle=(isset($iteminfos[1])?$iteminfos[1]:'');
		$itemchntitle=(isset($iteminfos[2])?$iteminfos[2]:'');
		$itempic=(isset($iteminfos[3])?$iteminfos[3]:'');
		$itempublisher=(isset($iteminfos[4])?$iteminfos[4]:'');
		$itemauthor=(isset($iteminfos[5])?$iteminfos[5]:'');
		$itempages=(isset($iteminfos[6])?$iteminfos[6]:'');
		$itemisbn=(isset($iteminfos[7])?$iteminfos[7]:'');
		$itemtag_string=(isset($iteminfos[8])?$iteminfos[8]:'');
		$itemurl_string=(isset($iteminfos[9])?$iteminfos[9]:'');
		return $iteminfos[1];
		}
		
		else {return '没有找到';}
	}
	
	
	
}





?>