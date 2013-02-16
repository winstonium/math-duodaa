var duodaa_math_edior_html='hahaha';
CKEDITOR.dialog.add( 'duodaa_math', function( editor ) {
    return {
        title: "哆嗒数学公式编辑" ,
        minWidth: 600,
        minHeight: 500,
        contents: [
            {
                id: 'tab-basic',
                label: 'Editor',
                elements: [
                    {
                    	//mathquill-editable 可编辑
                    	//mathquill-rendered-math 已经渲染
                    	//mathquill-embedded-latex 只做静态渲染
                        type: 'html',
                        //CKEDITOR.basePath
						//html: duodaa_math_edior_html
                        html: '<div style="width:600px;height:500px;"><iframe id="math_frame" style="width:100%;height:100%;" frameborder="no" scrolling="no" src="' + CKEDITOR.basePath + 'plugins/duodaa_math/dialogs/mathdialog.html"></iframe></div>'
                    }   
                ]
            }
        ],
        
		onShow : function(){
        	
        },
        onOk: function() {
        	//var thedoc = $("#math_frame").contents().find("#math_latex").text();
        	//var mathHTML = '$' +thedoc + '$<span>&nbsp;</span>';
            //editor.insertHtml(mathHTML);
				
				setInsertMath();
				
					return;
			
        }
    };
});

function setInsertMath()
{
  var editor = CKEDITOR.instances.CKeditor_main;
  var thedoc = $("#math_frame").contents().find("#math_latex").text();
  var mathHTML = thedoc 
  var mathSPAN = ' ';
  var duodaa_insert_serprator = "<samp>duodaa_insert_serprator</samp>";
  
  editor.insertHtml(duodaa_insert_serprator);
   
  var nowString = editor.getData();
  var insertPosStart = nowString.indexOf(duodaa_insert_serprator);
  var pre_string = nowString.substr(0,insertPosStart);


  var pre_dollar_count = pre_string.split("$").length;
  

  if(pre_dollar_count%2==1)
  {
	  
	  editor.insertHtml("<span contentEditable='false'>$" + mathHTML + "$</span>" + mathSPAN);
	  
	 
  }
  
  else
  {
     editor.insertHtml( mathHTML+" " );
	 //editor.setData(contentstring);
  }
 
  //alert(pre_dollar_count);
   if(editor.document.getElementsByTag("samp")!=null) editor.document.getElementsByTag("samp").getItem(0).remove();

}

