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
        	var thedoc = $("#math_frame").contents().find("#math_latex").text();
        	var mathHTML = '$' +thedoc + '$<span>&nbsp;</span>';
            editor.insertHtml(mathHTML);
					return;
			
        }
    };
});

function getIFrameDOM(fid){
	var fm = getIFrame(fid);
	return fm.document||fm.contentDocument;
}
function getIFrame(fid){
	return document.getElementById(fid)||document.frames[fid];
}