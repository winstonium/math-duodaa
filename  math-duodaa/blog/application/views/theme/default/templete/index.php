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
					#banner_list img {border:0px;} 
					#banner_bg {
						          position:absolute; 
								  bottom:0;
								  background-color:#000;height:30px;
								  filter: Alpha(Opacity=30);
								  opacity:0.3;z-index:1000;
								  cursor:pointer; 
								  width:478px; 
							   } 
					#banner_info{position:absolute; bottom:4px; left:5px;height:22px;color:#fff;z-index:1001;cursor:pointer} 
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

#anounce
{
	background-color: #CCC;
	margin: 10px;
	padding: 10px;	
	}



</style>

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
                
                <ul> 
                <li>1</li> 
                <li>2</li> 
                <li>3</li> 
                <li>4</li> 
                <li>5</li>
                </ul> 
                <div id="banner_list"> 
                <a href="http://www.duodaa.com" target="_blank">
                <img src="http://files.jb51.net/demoimg/201008/o_p1.jpg" title="橡树小屋的blog" alt="橡树小屋的blog" /></a> 
                <a href="#" target="_blank">
                <img src="http://files.jb51.net/demoimg/201008/o_p3.jpg" title="橡树小屋的blog" alt="橡树小屋的blog" /></a> 
                <a href="#" target="_blank">
                <img src="http://files.jb51.net/demoimg/201008/o_p4.jpg" title="橡树小屋的blog" alt="橡树小屋的blog" /></a> 
                <a href="#" target="_blank">
                <img src="http://files.jb51.net/demoimg/201008/o_p5.jpg" title="橡树小屋的blog" alt="橡树小屋的blog" /></a>
                <a href="#" target="_blank"><img src="#" title="ffffblog" alt="fffff" /></a> 
                </div> 
                </div> 
                 <!--轮播banner(完)-->
				<div style="height:20px; width:100%;"></div>
                
               <div>{leftdown_ad}</div>

</div>
<!-- 左侧条目(完) -->


<div style="float:left; width:440px;height:500px; ">
<div id="ttBox">

<div class="headline">
<a href="#" class="main_title">日本大选  </a>
<div class="relative_titles">
<div><a href="#">安倍晋三当选日本首相</a><span>|</span><a href="#">时评：警惕！日本走向极右路线</a></div>
<div><a href="#">日本与中国开战？专家：绝无可能！</a></div>

</div>
</div>

<div class="headline">
<a href="#" class="main_title">中共十八大  </a>
<div class="relative_titles">
<div><a href="#">18大成官方民间双向热词</a><span>|</span><a href="#">习近平：腐败会致亡党亡国</a></div>
<div><a href="#">民众：收入翻番最期待</a></div>

</div>
</div>

</div>


</div>
<div style="float:left; width:260px; height:500px;">
<div id="anounce">
<div><a href="#"><img style=" border: 1px solid #000;border-color:black;" src="/blog/application/views/theme/default/img/index/righttop2.gif" /></a></div>
<div><a href="#">哆嗒数学有奖征文</a></div>
</div>
</div>




</div>

<div class="clear"></div>



<script type="text/javascript">
var t = n = 0, count; 
$(document).ready(function(){ 
           count=$("#banner_list a").length; 
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
t = setInterval("showAuto()", 3000); 
$("#banner").hover( function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 3000);}); 
}) 

function showAuto() 
{ 
n = n >=(count - 1) ? 0 : ++n; 
$("#banner li").eq(n).trigger('click'); 
} 
</script> 