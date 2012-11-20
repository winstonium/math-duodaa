<div class="messages">
<div class="ms_title">最新留言</div>
<div class="ms_showmore"><a href="#">全部留言</a> </div>
<div class="clear"></div>
<?php for($i=0;$i<count($comments);$i++){?>
<div class="cm_detail"><a href="#"><?php echo blog_cutstring($messages[$i]['content'],20)?></a> </div>

<?php }?>

</div>