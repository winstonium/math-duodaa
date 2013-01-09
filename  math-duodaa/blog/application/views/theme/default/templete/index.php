<style type="text/css">
/* 轮播css*/
#banner {
						     position:relative;    
					         width:300px;
							 height:350px; 
							 border:1px solid #666; 
							 overflow:hidden; 
							 font-size:16px
							} 
					#banner_list a{ left:0px;}
					#banner_list img {border:0px;} 
					#banner_bg {
						          position:absolute; 
								  bottom:0;
								  left:0px;
								  background-color:#000;height:30px;
								  filter: Alpha(Opacity=30);
								  opacity:0.3;z-index:1000;
								  cursor:pointer; 
								  width:300px; 
							   } 
					#banner_info{position:absolute; bottom:4px; left:5px;height:22px;color:#fff;z-index:1001;cursor:pointer;} 
					#banner_text {position:absolute;width:120px;z-index:1002; right:3px; bottom:3px;} 
					#banner ul {
								  position:absolute;
								  list-style-type:none;
								  filter: Alpha(Opacity=80);
								  opacity:0.8; z-index:1002; 
								  margin:0; padding:0; 
								  bottom:3px; right:5px;
								  height:20px;
						       } 
					#banner ul li { 
					                padding:0 8px; 
					                line-height:18px;
									float:left;display:block;
									color:#FFF;border:#e5eaff 1px solid;
									background-color:#6f4f67;
									cursor:pointer; margin:0;
									font-size:16px;
								  } 
				   #banner_list a{position:absolute;} /* <! 让四张图片都可以重叠在一起 */
/* 轮播css(完)*/				   
				   


#ttBox
{
	width:96%;

}

#ttBox .headline{
	padding-bottom: 20px;
	border-bottom-width: 1px;
	border-bottom-style: dotted;
	border-bottom-color: #666;	
	margin-top:15px;
	}
#ttBox .headline a.main_title
{
	color:#834829;
	font-weight:bold;
	font-family: '微软雅黑','黑体',"Arial Narrow",HELVETICA;
	font-size: 22px;
	text-align: center;
}

#ttBox .headline div.relative_titles
{
	text-align: left;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
	
#ttBox .headline div.relative_titles a
{
	color: #1D569C;
	font-size:14px;
	font-family: "宋体","Arial Narrow",sans-serif;
}
#ttBox .headline div.relative_titles div 
{
	padding-top:3px;
	padding-bottom:3px;
	
}
#ttBox .headline div.relative_titles div span
{
	padding-left:5px;
	padding-right:5px;
	color: #1D569C;
	font-size:14px;
	font-family: "宋体","Arial Narrow",sans-serif;
}

#subbox
{
	
	}
#subbox ul
{
	padding-left:18px;
	

}
#subbox ul li
{
	float:none;
	text-align:left;
	list-style-type:disc;
	padding-top:2px;
	padding-left:3px;
	margin-left:15px;
	margin-bottom:4px;
	color:#53301d;
	font-size:8px;
	
	
	
	}
#subbox ul li a
{
	
	padding-right:5px;
	
	color: #1D569C;
	font-size:16px;
	font-family: "宋体","Arial Narrow",sans-serif;
	
	}

#recommended{ 
background-color:#f8f5e8;
padding-top:5px;
padding-bottom:5px;
}

#recommended .title
{
	height: 30px;
	width:100%;
 	background-image: url(/blog/application/views/theme/default/img/index/300width_items.gif);
	background-repeat: no-repeat;
	background-position:0 -10px;
	text-align:left;
	color:#834829;
	padding-left:40px;
	padding-top:5px;
	}
#recommended ul li{	
	list-style:disc;
	padding-left:3px;
	vertical-align: middle;	
	height:23px;
	color:#53301d;
	font-size:8px;
	text-align:left;
}
#recommended ul li a
{
	color:#888;
	font-size:15px;
	
	}


#anounce
{
	background-color: #ddd;
	padding-bottom:5px;
	padding-top:10px;
	margin: 10px;

	}
#anounce ul{
	padding-top:8px;
	padding-left:15px;
	text-align:left;
	list-style-type:none;
	width:100%;
	margin-left:20px;
	}
	
#anounce ul li
{
	list-style: disc;
	padding-left: 3px;
	height: 23px;
	color: #53301d;
	font-size: 8px;
	vertical-align: middle;	
	}
#anounce div.anounce_text
{
	
	}
	
#anounce div.anounce_text ul li a
{
	
	color:#1D569C;
	font-size:15px;
	}



</style>

<?php
 $content = file_get_contents(dirname(__FILE__).'/index_config.js');
 $json = json_decode($content);
// var_dump($json);

?>

<div class="main_frame">

<div style="height:10px; width:100%;"></div>

<!-- 左侧条目 -->
<div style="float:left; width:300px;">
                <!--轮播banner-->
    
    <div id="banner"> 
      <div id="banner_bg"></div> 
                <!--标题背景--> 
                <div id="banner_info"></div> 
                <!--标题--> 
                
                <ul id="bannerbutton"> 
                {bannerbuttons}
                <li>{buttoncount}</li>
                {/bannerbuttons}           
               
                </ul> 
                
                
                
                <div id="banner_list"> 
                
                {banner_list}
                 <a href="{url}" target="_blank">
                <img src="<?php echo base_url('/application/views/theme/default/img/index/')?>/{img}" title="{title}" alt="{title}" />
                </a> 
                {/banner_list} 
                </div> 
    </div> 
                 <!--轮播banner(完)-->
	<div style="height:20px; width:100%;"></div>
                
    <div id="recommended">  
      <div class="title">推 荐 文 章</div>
      <div class="links">
      <ul>
      {recommended}
       <li><a href="{url}" target="_blank">{title}</a></li>
      {/recommended}
      
      </ul>
      </div>
               </div>

</div>
<!-- 左侧条目(完) -->

<!-- 中间条目 -->
<div style="float:left; width:440px; ">
<div id="ttBox">
{ttbox}
<div class="headline">
<a href="{url}" class="main_title" target="_blank">{title}</a>
<div class="relative_titles">
{relatives}
<div>{links}</div>
{/relatives}

</div>
</div>
{/ttbox}




</div>


<div id="subbox">
<ul>
{subbox}
<li><a href="{url}" target="_blank">{title}</a></li>
{/subbox}


</ul>
</div>


</div>
<!-- 中间条目(完) -->

<!-- 右边条目 -->
<div style="float:left; width:260px;">
        <div id="anounce">
        {anounce_main}
        <div>
        <a href="{url}" target="_blank"><img style=" border: 1px solid #000;border-color:black;" src="<?php echo base_url('/application/views/theme/default/img/index/')?>/{img}" alt="{title}" title="{title}" /></a>
        </div>
        {/anounce_main}
        <div class="anounce_text">
        <ul>
        {anounce_subs}
        <li><a href="{url}" target="_blank">{title}</a></li>
        {/anounce_subs}
        
        </ul>
        </div>
       
        </div>
       
       <div style="width:250px; height:250px">
       <script type="text/javascript">
		/*250*250，创建于2013-1-4.blog首页，第一屏幕，左下方广告*/
		var cpro_id = "u1180786";
		</script>
		<script src="http://cpro.baidustatic.com/cpro/ui/c.js" type="text/javascript"></script>
       </div> 
       
       <div class="clear" style="height:30px; width:200px" ></div>
</div>
<!-- 右边条目 (完)-->




</div>

<div class="clear" style="width:1000px; height:30px"></div>



<script type="text/javascript">
var t = n = 0, count; 
$(document).ready(function(){ 
           count=$("#bannerbutton li").length; 
		 		   
           $("#banner_list a:not(:first-child)").hide(); 
           $("#banner_info").html($("#banner_list a:first-child").find("img").attr('alt')); 
           $("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr('href'), "_blank")}); 
           $("#banner li").click(function() { 
                  var i = $(this).text() - 1;//获取Li元素内的值，即1，2，3，4 
                  n = i; 
                  if (i >= count) return;
								   
                  $("#banner_info").html($("#banner_list a").eq(i).find("img").attr('alt')); 
                  $("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr('href'), "_blank")}) 
                  $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000); 
                  $(this).css({"background":"#be2424",'color':'#000'}).siblings().css({"background":"#6f4f67",'color':'#fff'}); 
                  }); 
t = setInterval("showAuto()", 4000); 
$("#banner").hover( function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);}); 
}) 

function showAuto() 
{ 
n = n >=(count - 1) ? 0 : ++n; 
$("#banner li").eq(n).trigger('click'); 
} 
</script> 