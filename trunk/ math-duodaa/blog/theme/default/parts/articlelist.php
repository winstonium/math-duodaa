
<div class="articles">
<?php for($i=0;$i<count($articles);$i++){?>	
    <div class="article">
	<div class="ar_title"><a href="?bq=ar_<?php echo $articles[$i]['ID']?>"><?php echo $articles[$i]['caption']?></a></div>
    <div class="ar_date"><?php echo Date('Y-m-d H:i',strtotime($articles[$i]['createtime']))?></div>
    <div class="clear"></div>
    <div class="ar_content"><?php echo $articles[$i]['content']?></div>
    
    <?php echo blog_ger_ar_operation_bar($articles[$i],$modifyright); ?>
    
	</div>

<?php } ?>

</div>