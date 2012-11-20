<div class="comments">
<div class="cm_title">最新评论</div>
<div class="clear"></div>
<?php for($i=0;$i<count($comments);$i++){?>
<div class="cm_detail"><a href="#"><?php echo blog_cutstring($comments[$i]['content'],20)?></a> </div>

<?php }?>

</div>