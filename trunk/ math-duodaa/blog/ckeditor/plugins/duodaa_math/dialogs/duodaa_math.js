var duodaa_math_edior_html='hahaha';
CKEDITOR.dialog.add( 'duodaa_math', function( editor ) {
    return {
        title: "哆嗒数学公式编辑" ,
        minWidth: 500,
        minHeight: 300,
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
                        html: '<div style="width:500px;height:300px;"><iframe id="math_frame" style="width:500px;height:300px;" frameborder="no" src="' + CKEDITOR.basePath + 'plugins/duodaa_math/dialogs/mathdialog.html"></iframe></div>'
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
  var mathSPAN = '<span>&nbsp;</span>';
  var duodaa_insert_serprator = "<span>duodaa_insert_serprator</span>";
  
  editor.insertHtml(duodaa_insert_serprator);
  var newString = editor.getData();
  
  var insertPosStart = newString.indexOf(duodaa_insert_serprator);
  var string1 = newString.substr(0,insertPosStart);
  
  var pre_dollar_count = string1.split("$").length;
  
  var contentstring
  if(pre_dollar_count%2==1)
  {
	  contentstring = newString.replace(duodaa_insert_serprator,"$" + mathHTML + "$" + mathSPAN);
	  editor.setData(contentstring);
  }
  
  else
  {
     contentstring = newString.replace(duodaa_insert_serprator+" ", mathHTML );
	 editor.setData(contentstring);
  }
 
  //alert(pre_dollar_count);
  
	
}

