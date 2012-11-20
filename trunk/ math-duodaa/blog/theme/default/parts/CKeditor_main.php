

<div class="newarticle_form">
<form>
<div class="newarticle_bar">发表新文章</div>
<div class="title_div_bar">标题</div>
<input type="text" id="title" class="newarticle_title"></input>
<div class="title_div_bar">内容</div>
<textarea id="CKeditor_main" name="CKeditor_main" class="ckeditor" cols="80" rows="10"></textarea>
<div class="article_opertion"></div>
</form>
</div>
<script>
CKEDITOR.replace( 'CKeditor_main',
 {
	//extraPlugins: 'devtools' ,
	extraPlugins: 'autogrow',
	removePlugins: 'resize',
	
	toolbar : [ 
		       	[  
			       'Font','FontSize',
			       'Bold','Italic','Underline',
			       'TextColor','BGColor',
			       'JustifyLeft','JustifyCenter','JustifyRight',
			       'NumberedList','BulletedList',
			       'Link','Unlink'//,
			       //'Image' 
			    ] 

			  ]//,

 }
  
  );


  </script>

<?php
?>