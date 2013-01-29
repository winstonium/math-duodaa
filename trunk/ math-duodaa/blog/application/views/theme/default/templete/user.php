


<div class="main_frame">

<div class="main_left">

<div class="spacetitle">
<div class="main_title"><a href="#">{blog_title}</a></div>
<div class="sub_title">{blog_subtitle}</div>
</div>

<div class="clear"></div>


<div class="articles">
{articles}
<div class="article">
	<div class="ar_title"><a href="{articlelink}">{title}</a></div>
    <div class="ar_date">{date}</div>
    <div class="clear"></div>
    <div class="ar_content">{content}</div>
    
    <div class="ar_operation">
        {ar_operation_items}
        <span><a href="{link}" class="ar_operation_item" >{text}</a></span>
        {/ar_operation_items}
     
    </div>
    
    <div class="comment_div" style="display:none; margin-top:10px;">
<div class="input" contenteditable="true" style="border: 1px solid #000;min-height:40px; width:600px;padding:5px;background-color:#fff;"></div>
<div style="width:600px;padding:5px;">
<button class="comment_submit_button" style="float:right;background-color:#52C503;height:30px;width:55px;font-size:14px;color:white;border: 1px solid #000; cursor:pointer;">发布</button>


</div>
<div style="height:0px;clear:both;"></div>
</div>
 </div>

 
{/articles}

</div>

<div class="clear"></div>



</div>

<div class="main_right">

<div class="photo" ><a href="{user_profile}" class="qa-avatar-link">{user_photo}</a></div>

<div class="comments">
<div class="cm_title">最新评论</div>
<div class="clear"></div>
{comments}
<div class="cm_detail"><a href="{href}">{comment}</a> </div>
{/comments}


</div><div class="clear"></div>
<div class="messages">
<div class="ms_title">最新留言</div>
<div class="ms_showmore"><a href="#">全部留言</a> </div>
<div class="clear"></div>
{messages}
<div class="cm_detail"><a href="#">{message}</a> </div>
{/messages}



</div><div class="clear"></div>
</div>

</div>
<div class="clear"></div>
<div id="dele_confirm" style="display:none;" title="删除确认">
  你确定要删除这篇文章吗？
</div>

<script>
$("a.ar_operation_item").click(
function()
{
	


  if($(this).text().indexOf('评论')== 0)
  {
 
	  var comment_div = $(this).parents("div.article").children(".comment_div");
	  comment_div.slideToggle(1000);
	  comment_input = $(this).parents("div.article").find(".input");
	  comment_input.focus();
	  
      return false;
  }

  if($(this).text()=="删除")
  {
	      $("#dele_confirm").text("  你确定要删除这篇文章吗？");
		  $(function() {
		    $( "#dele_confirm" ).dialog({
		      resizable: false,
		      height:240,
		      modal: true,

				  
		      buttons: {
		        "确认删除": function() {
			        $(this).dialog( "option", "buttons",[]);
			        $(this).text("正在删除中...");
		          //$( this ).dialog( "close" );
		        },
		        "取消": function() {
		          $( this ).dialog( "close" );
		        }
		      }
		    });
		  });

	  return false;

  }
	
}
		);



</script>
