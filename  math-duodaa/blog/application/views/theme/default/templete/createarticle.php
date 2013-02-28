<div class="main_frame">


<div class="newarticle_form" >
<form id="article_form" method="post" action="{article_submit}">

<!-- 载入文章的数据 -->

<input id="ar_saveid" style="visibility:hidden;" value="{ar_saveid}"/>
<input id="ar_draft_title" style="visibility:hidden;" value="{ar_draft_title}"/>
<input id="ar_draft_content" style="visibility:hidden;" value="{ar_draft_content}"/>
<input id="ar_draft_tags" style="visibility:hidden;" value="{ar_draft_tags}"/>

<!-- 载入文章的数据(完) -->



<div class="newarticle_bar">发表新文章</div>
<div class="title_div_bar">标题</div>
<input type="text" id="ar_title" class="newarticle_title"></input>
<div class="title_div_bar">内容</div>
<textarea id="CKeditor_main" class="ckeditor" cols="138" rows="10"></textarea>
<div class="title_div_bar" style="padding-top:10px;">标签</div>
<input type="text" id="ar_tags" class="newarticle_title"></input>
<div class="article_opertion">
<span><em id="preview" class="btn2" style="background-image: url({img_article_operation_btns1})">预览</em></span>
<span><em id="save" class="btn2" style="background-image: url({img_article_operation_btns1})">保存草稿</em></span>
<span><em id="form_submit" class="btn1" style="background-image: url({img_article_operation_btns1})" >发布</em></span>
</div>
<div class="clear"></div>
</form>
</div>
<script src="/blog/ckeditor/ckeditor.js"></script>

<script>
CKEDITOR.replace( 'CKeditor_main',
 {
	//extraPlugins: 'devtools' ,
	extraPlugins: 'autogrow,duodaa_math,abbr',
	removePlugins: 'resize',
	
	toolbar : [ 
		       	[  
				   'duodaa_math','abbr',
			       'Font','FontSize',
			       'Bold','Italic','Underline',
			       'TextColor','BGColor',
			       'JustifyLeft','JustifyCenter','JustifyRight',
			       'NumberedList','BulletedList',
			       'Link','Unlink'
			       //'Image' 
			    ] 

			  ]//,

 }
  
  );


  </script>
  
<script>
//$("#CKeditor_main").ckeditor();
  
function ar_save_post()
{

	ar_info = {
			    title:$("#ar_title").val(),
				content:CKEDITOR.instances.CKeditor_main.getData(),
				tags:$("#ar_tags").val(),
				ar_saveid:$("#ar_saveid").val()
			  };
	
	  
	 $.post( "{save_posted_page}",
			 ar_info,
			 function(data){receive_save_callback(data);}
		   );
}

function ar_creat_post()
{

	ar_info = {
			  title:$("#ar_title").val(),
			  content:CKEDITOR.instances.CKeditor_main.getData(),
			  ar_saveid:$("#ar_saveid").val()
		      };
    
	//alert($("#ar_saveid").val());
	$.post( "{article_submit}",
			 ar_info,
			 function(data){receive_create_callback(data);			 }
		   );
}

function receive_save_callback(ar_data)
{ 
	alert("保存成功!");
	$("#ar_saveid").attr({ value : ar_data });
    //alert(ar_data);
	//var a_data = ar_data;

	//a_data = unescape(a_data.replace(/\\/g, "%"));
	//a_data = eval("("+a_data+")");
	//CKEDITOR.instances.CKeditor_main.setData(a_data.ar_content+a_data.ar_content);
}

function receive_create_callback(ar_data)
{ 
	alert('保存成功！');
	window.location.href="{aritile_site_url}/"+ar_data;
	//$("#ar_saveid").attr({ value : ar_data });
    //alert(ar_data);
	
}

if($("#ar_saveid")[0].value!="0")
{
	$("#ar_title").val( $("#ar_draft_title").val() );
	CKEDITOR.instances.CKeditor_main.setData($("#ar_draft_content").val());
	$("#ar_tags").val( $("#ar_draft_tags").val() );
}

	 $("#form_submit").click(function(){ar_creat_post();});
	 $("#save").click(function(){ar_save_post();});
	 

	
  


</script>




</div>

<div class="clear"></div>