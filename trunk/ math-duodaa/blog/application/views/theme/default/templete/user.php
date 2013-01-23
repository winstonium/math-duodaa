


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
    
    <div style="display:none; ;" class="comment_div">111</div>
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
<script>
$("a.ar_operation_item").click(
function()
{
	
	
  if($(this).text()=='删除')
  {
	  var comment_div = $(this).parents("div.article").children(".comment_div");
	  comment_div.slideToggle(1000);
      return false;
  }

  if($(this).text().indexOf('评论')== 0)
  {
 
	  var comment_div = $(this).parents("div.article").children(".comment_div");
	  comment_div.slideToggle(1000);
      return false;
  }
	
}
		);

</script>
