<?php 
function setDownloadHtml($requests,$root)
{
	$rqsts=$requests;
	$pagetype='main';
	$csvroot=$root.'items\csv\books.csv';
	
	
	
	//return $root;
	/*下面用于判断请求页的类型*/	
	
	if(isset($rqsts[1]))
	{
		if(preg_match('/^main$/',$rqsts[1]))
		{
			
			$pagetype='main';
			
		}
		else if(preg_match('/^list[\d]*$/',$rqsts[1]))
		{
			$pagetype = 'list';
			
		}
		
		else if(preg_match('/^item[\d]*$/',$rqsts[1]) || preg_match('/^[\d]+$/',$rqsts[1]))
		{
			
			//return 'item';
			$pagetype='item';
			//return $pagetype;
		}
		
		else
		{
			$pagetype='main';
			
		}
		
	}
	
	else
	{
		
		$pagetype='main';
		
	}
	
	
	
	
	/*下面来拉接主页的html*/
	
	if($pagetype=='main')
	{
		
		$rqsts[1]='list1';
		return setDownloadHtml($rqsts,$root);	
		
	}
	
	else if($pagetype=='list')
	{
		
		$listpage=str_replace('list','',$rqsts[1]);
		
		
		
		if($listpage<=0)$listpage=1;
		
		
		
		$fp=new SplFileObject($csvroot,'r');
		$fp_lines=getLines($fp);                   //得到总行数,由于数组从0开始，所以只要显示1到$fp_lines即可(第0行是表头)
		//$fp->fgetcsv(',','')
		//$fp->fg
		$html=setlistNav($listpage);
		$html.=setItemslist($fp_lines,$listpage,$fp,$root);
		$html.=setlistNav($listpage);
			   
		
		
		
		return $html;
		}
	
	
	/*当pagetype为item的时候，生成具体物品页面的html*/
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
		//把各个参数设置
		$itemid=(isset($iteminfos[0])?$iteminfos[0]:'');          //物品ID
		$itemtitle=(isset($iteminfos[1])?$iteminfos[1]:'');       //数目标题
		$itemchntitle=(isset($iteminfos[2])?$iteminfos[2]:'');    //中文标题
		
		$itempic=(isset($iteminfos[3])?$iteminfos[3]:'');         //物品图片文件名
		//if(!file_exists($root.'items\imgs\\'.$itempic))$itempic='abc';
		$itempic=file_exists($root.'items/imgs/'.$itempic)?$root.'items/imgs/'.$itempic:$root.'items/imgs/NoPic.gif';
		
		$itempublisher=(isset($iteminfos[4])?$iteminfos[4]:'');   //出版商
		$itemauthor=(isset($iteminfos[5])?$iteminfos[5]:'');      //作者
		$itempages=(isset($iteminfos[6])?$iteminfos[6]:'');       //页码数
		$itemisbn=(isset($iteminfos[7])?$iteminfos[7]:'');        //isbn
		$itemtag_string=(isset($iteminfos[8])?$iteminfos[8]:'');  //标签原始字符串用"|"分割
		$itemurl_string=(isset($iteminfos[9])?$iteminfos[9]:'');  //下载链接原始字符串用"|"分割
		$itemtags=explode('|',$itemtag_string);
		$itemurls=explode('|',$itemurl_string);
		
		$adver1='<script type="text/javascript">/*468*15，创建于2012-6-25*/ var cpro_id = \'u957301\';</script><script src="http://cpro.baidu.com/cpro/ui/c.js" type="text/javascript"></script>';
		$adver2='<script type="text/javascript">var sogou_ad_id=60486;var sogou_ad_height=60;var sogou_ad_width=640;</script><script language="JavaScript" type="text/javascript" src="http://images.sohu.com/cs/jsfile/js/c.js"></script>';
		
		
		$html='<TABLE class="allinfo" cellSpacing="0" cellPadding="0" width="700">'."\n";
		$html.='<TR>'."\n";
        $html.='<TD class="pictd" rowSpan="4">'."\n";
        $html.='<DIV>'."\n";
		$html.='<CENTER>'."\n";
        $html.='<IMG title="'.$itemtitle.'" alt="'.$itemtitle.'" src="'.$itempic.'">'."\n";
        $html.='</CENTER>'."\n";
        $html.='</DIV>'."\n";
        $html.='</TD>'."\n";
        $html.='<TD style="width: 580px;">'."\n";
        $html.='<DIV class="title">'.$itemtitle.'</DIV>'."\n";
        $html.='<DIV class="chinesetitle">中文书名：'.$itemchntitle.'</DIV>'."\n";
        $html.='</TD>'."\n";
        $html.='</TR>'."\n";
        $html.='<TR>'."\n";
        $html.='<TD><SPAN class="author">作者：</SPAN><SPAN class="author">'.$itemauthor.'</SPAN></TD>'."\n";
        $html.='</TR>'."\n";
        $html.='<TR>'."\n";
        $html.='<TD><SPAN>出版社：</SPAN><SPAN>'.$itempublisher.'</SPAN></TD>'."\n";
        $html.='</TR>'."\n";
        $html.='<TR>'."\n";
        $html.='<TD style="text-align: left; color: rgb(50, 124, 142); font-size: 13px;">资料标签：';
		
		for($i=0;isset($itemtags[$i]);$i++)
		{
			$html.=$itemtags[$i].' ';
			
			}
		$html.='</TD>'."\n";
		
        $html.='</TR>'."\n";
        $html.='<TR>'."\n";
        $html.='<TD style="text-align: left; color: rgb(50, 124, 142); font-size: 13px;" colSpan="2">'."\n";
        $html.='<TABLE cellSpacing="0" cellPadding="0">'."\n";
        $html.='<TR>'."\n";
        $html.='<TD style="width: 100px; text-align: center; vertical-align: middle;">'."\n";
		$html.='<DIV style="float: left;" class="downloadtext">下载链接:</DIV>'."\n";
		$html.='</TD>'."\n";
        $html.='<TD>'."\n";
        $html.='<DIV class="downloadtext1">第一次下载请务必了解<A href="#ins">下载说明</A>。</DIV>'."\n";  
        $html.='<DIV><!-- 广告位 -->'.$adver1.'</DIV>'."\n";
        $html.='<DIV><!-- 广告位 -->'.$adver2.'</DIV>'."\n";
		$html.='<SPAN class="downlink">'."\n";
		
		for($i=0;isset($itemurls[$i]);$i++)
		{
		$html.='<A href="'.$itemurls[$i].'"target="_blank">下载地址'.($i+1).'</A> '."\n";
		}
		
		$html.='</SPAN>'."\n";
		$html.='</TD>'."\n";
		$html.='</TR>'."\n";
		$html.='</TABLE>'."\n";
		$html.='</TD>'."\n";
		$html.='</TR>'."\n";
        $html.='<TR>'."\n";
        $html.='<TD colSpan="2">'."\n";
        $html.='<DIV style="margin: 20px; padding: 20px; border: 2px solid rgb(192, 192, 192);">'."\n";
        $html.='<P>&nbsp;</P>'."\n";
        $html.='<DIV id="ins">下载说明：</DIV>'."\n";
        $html.='<P>1、 如果发现有资料不能下载请<A href="#" target="_blank">联系我们</A>。</P></DIV>'."\n";
        $html.='</TD>'."\n";
        $html.='</TR>'."\n";
		
		
		$html.='</TABLE>'."\n";
		
		return $html;
		}
		
		else {return '没有找到';}
	}
	
	
	
}



function getLines($file_pointer)
{
	
	
	$file_pointer->seek(1000000);
	
	return $file_pointer->key();
	
	}


function setlistNav($currentpage)
{
	$pagespernav=10;
	
	$pagenavfirst= floor(($currentpage-1)/$pagespernav)*$pagespernav+1;
	$pagenavlast=$pagenavfirst+$pagespernav-1;
	
	$html='<div class="paginator">'."\n";
	$html.='<a href="./?qa=download_list'.($currentpage-1).'">&lt;上一页</a>'."\n";
	$html.='<a href="./?qa=download_list'.($pagenavfirst-1).'">...</a>'."\n";
	for($i=$pagenavfirst;$i<=$pagenavlast;$i++)
	{
		if($currentpage==$i)
		$html.='<span class="cpb">'.$i.'</span>'."\n";
		else $html.='<a href="./?qa=download_list'.$i.'">'.$i.'</a>'."\n";
		
		}
	$html.='<a href="./?qa=download_list'.($pagenavlast+1).'">...</a>'."\n";
	$html.='<a href="./?qa=download_list'.($currentpage+1).'">下一页&gt;</a>'."\n";
	
    $html.='</div>'."\n";
	
	return $html;	
}

function setItemslist($totallines,$currentpage,$fp,$root)
{
	$itemsperpage=10;
	$pagespernav=10;
	
	$itemfirst=$totallines-($currentpage-1)*$itemsperpage;
	$itemlast=$itemfirst-$itemsperpage+1;
	
	if($itemfirst<1)
	{
		$html='没有找到你请求的资料。点击<a href="./?qa=download"><b>这里</b></a>返回资料首页。';
		
	}
	else 
	{
		$html='';
		$html.='<table class="showalltab" cellspacing="0" border="0" style="width:700px;border-collapse:collapse;">'."\n";
		for($i=$itemfirst-1;$i>=$itemlast && $i>0;$i--)
		{
		$fp->seek($i);
		//$iteminfos=$fp->fgetcsv();
		$iteminfos=explode(",",$fp->current());
		
		for($j=0;isset($iteminfos[$j]);$j++)
		{
			$iteminfos[$j]=str_replace('[comma]', ',', $iteminfos[$j]);
		}
		
		
		
		//把各个参数设置
		$itemid=(isset($iteminfos[0])?$iteminfos[0]:'');          //物品ID
		$itemtitle=(isset($iteminfos[1])?$iteminfos[1]:'');       //数目标题
		$itemchntitle=(isset($iteminfos[2])?$iteminfos[2]:'');    //中文标题
		
		$itempic=(isset($iteminfos[3])?$iteminfos[3]:'');         //物品图片文件名
		//if(!file_exists($root.'items\imgs\\'.$itempic))$itempic='abc';
		$itempic=file_exists($root.'items/imgs/'.$itempic)?$root.'items/imgs/'.$itempic:$root.'items/imgs/NoPic.gif';
		
		$itempublisher=(isset($iteminfos[4])?$iteminfos[4]:'');   //出版商
		$itemauthor=(isset($iteminfos[5])?$iteminfos[5]:'');      //作者
		$itempages=(isset($iteminfos[6])?$iteminfos[6]:'');       //页码数
		$itemisbn=(isset($iteminfos[7])?$iteminfos[7]:'');        //isbn
		$itemtag_string=(isset($iteminfos[8])?$iteminfos[8]:'');  //标签原始字符串用"|"分割
		$itemurl_string=(isset($iteminfos[9])?$iteminfos[9]:'');  //下载链接原始字符串用"|"分割
		$itemtags=explode('|',$itemtag_string);
		$itemurls=explode('|',$itemurl_string);
		
		//下面生成每一个单元格
		//if(isset($iteminfos[0]) && isset($iteminfos[0])!='')
		if(0==0)
		{
		$html.='<tr>'."\n";
		$html.='<td>'."\n";
		$html.='<div class="showallunits">'."\n";
		$html.='<div class="pic">'."\n";
		$html.='<a href="./?qa=download_'.$itemid.'" target="_blank"><img alt="'.$itemtitle.'" src="'.$itempic.'"></a>';
		$html.='</div>'."\n";
		$html.='<div class="showallunitsdetail">'."\n";
        $html.='<div class="title"><a href="./?qa=download_'.$itemid.'">'.$itemtitle.'</a></div>'."\n";
        $html.='<div class="chinesetitle">'.$itemchntitle.'</div>'."\n";
        $html.='<div class="author">'.$itemauthor.'</div>'."\n";
        $html.='<div class="publisher">'.$itempublisher.'</div>'."\n";
        $html.='</div>'."\n";
        $html.='</div>'."\n";
		$html.='</tr>'."\n";
		$html.='</td>'."\n";
		}
		
		}
		
		$html.='</table>'."\n";
	}
	
	return $html;
	
	}



?>