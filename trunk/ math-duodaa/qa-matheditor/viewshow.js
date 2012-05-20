
        var temStr = "";
        var timeoutNum = new Array();
        
        //下面得到输入框的的id
        var qa_INPUT_ID = document.getElementById("viewShow").getAttribute("src");
        qa_INPUT_ID = qa_INPUT_ID.substring(qa_INPUT_ID.indexOf("?")+1, qa_INPUT_ID.length); 
		//document.write(qa_INPUT_ID);
        
        //得到textarea的标签
        text_Input = document.getElementById(qa_INPUT_ID);
		//alert( text_Input.className);
        
        //下面定义预览Previwe的标签
        var Math_Preview = document.getElementById("wmd-preview-" + qa_INPUT_ID) ;
        var Math_Preview_Buffer =document.getElementById("wmd-preview-" +  qa_INPUT_ID + "-buffer") ;
		
		//alert(Math_Preview.className);
		//alert(Math_Preview_Buffer.className);
        
        
        //下面定义math_Preview的相关属性和方法用来同步公式预览格
        var math_Preview = {
        		  delay: 150,        // delay after keystroke before updating

        		  preview: null,     // filled in by Init below
        		  buffer: null,      // filled in by Init below

        		  timeout: null,     // store setTimout id
        		  mjRunning: false,  // true when MathJax is processing
        		  oldText: null,     // used to check if an update is needed

        		  //
        		  //  Get the preview and buffer DIV's
        		  //
        		  Init: function () {
        		    this.preview = Math_Preview;
        		    this.buffer = Math_Preview_Buffer ;
					//alert(this.preview.className);
					
        		  },

        		  //
        		  //  Switch the buffer and preview, and display the right one.
        		  //  (We use visibility:hidden rather than display:none since
        		  //  the results of running MathJax are more accurate that way.)
        		  //
        		  SwapBuffers: function () {
        		    var buffer = this.preview, preview = this.buffer;
        		    this.buffer = buffer; this.preview = preview;
        		    buffer.style.visibility = "hidden"; buffer.style.position = "absolute";
        		    preview.style.position = ""; preview.style.visibility = "";
        		  },

        		  //
        		  //  This gets called when a key is pressed in the textarea.
        		  //  We check if there is already a pending update and clear it if so.
        		  //  Then set up an update to occur after a small delay (so if more keys
        		  //    are pressed, the update won't occur until after there has been 
        		  //    a pause in the typing).
        		  //  The callback function is set up below, after the Preview object is set up.
        		  //
        		  Update: function () {
        		    if (this.timeout) {clearTimeout(this.timeout)}
        		    this.timeout = setTimeout(this.callback,this.delay);
        		  },

        		  //
        		  //  Creates the preview and runs MathJax on it.
        		  //  If MathJax is already trying to render the code, return
        		  //  If the text hasn't changed, return
        		  //  Otherwise, indicate that MathJax is running, and start the
        		  //    typesetting.  After it is done, call PreviewDone.
        		  //  
        		  CreatePreview: function () {
        		    this.timeout = null;
        		    if (this.mjRunning) return;
        		    //var text = text_Input.value;
        		    var text = verifyInput();
        		    if (text === this.oldtext) return;
        		    this.buffer.innerHTML = this.oldtext = text;
        		    this.mjRunning = true;
        		    MathJax.Hub.Queue(
        		      ["Typeset",MathJax.Hub,this.buffer],
        		      ["PreviewDone",this]
        		    );
        		  },

        		  //
        		  //  Indicate that MathJax is no longer running,
        		  //  and swap the buffers to show the results.
        		  //
        		  PreviewDone: function () {
        		    this.mjRunning = false;
        		    this.SwapBuffers();
        		  }

        		};

        		//
        		//  Cache a callback to the CreatePreview action
        		//
        		math_Preview.callback = MathJax.Callback(["CreatePreview",math_Preview]);
        		math_Preview.callback.autoReset = true;  // make sure it can run more than once

    
        
        
        
        
      
        function verifyInput() {
        	
        	var inputEle = document.getElementById(qa_INPUT_ID);
            var getStr = inputEle.value.replace(/(^\s*)|(\s*$)/g, ""); 
            //var getStr = document.getElementById("T1").value.replace(/(^\s*)|(\s*$)/g, ""); 
                                             
            if (getStr.indexOf("#%%#@@()bbaa**&&") >= 0) {
                //alert("非法输入！");
                getStr = getStr.split("#%%#@@()bbaa**&&").join("");
                inputEle.value = getStr;
                //document.getElementById("T1").value = getStr;
            }
             
            getStr = getStr.replace(/</g, "&lt;"); //把小于号转掉
            //getStr = getStr.split("\n").join("<br />"); //把换行转掉 
            getStr = getStr.replace(/(\r)*\n/g,"<br/>").replace(/\s/g,"&nbsp;");
            //getStr = getStr.split(" ").join("&nbsp;");
            
            /*
            if (getStr.indexOf("\\$") >= 0 ) {
                alert("不能使用\\$，若要输入\'$\'，请使用\\Dollar命令。");
                getStr = getStr.split("\\$").join("");
                document.getElementById("T1_container").getElementsByTagName("textarea")[0].value = getStr;
            }
            */

            /*
            if (temStr != getStr && document.getElementById("liveshow").checked) 
            {

                //window.alert( document.getElementById("liveshow").checked);
                temStr = getStr;                
                document.getElementById("mathshow").innerHTML = controlStr(temStr);          //处理换行问题 
               // MathJax.Hub.Queue(["Typeset", MathJax.Hub, "mathshow"]);
                
            }
            */
            
            return getStr;
        }

        
        //字符在显示前的特殊处理
        /*
        function controlStr(str)  
        {
            
          return (str.split("\n").join("<br />"));  //处理换行问题

        }
        */

        /*
        function startVerify()   //
        {

            mathShowTime = setInterval(verifyInput, 1000);
         }
        */
        
        
        function getInsertText(insEuqa) {
            textBox = document.getElementById(qa-INPUI-ID);
            //var textBox = document.getElementById("T1");
            var insEquation = insEuqa;
            var start = 0;
            var end = 0;

           
            //非IE得到两个值
            if (typeof (textBox.selectionStart) == "number") {
                start = textBox.selectionStart;
                end = textBox.selectionEnd;

            } //


            //IE得到两个值
            else if (document.selection) {
                    var textlen = 0;
                
                    textBox.focus();
                    var range = document.selection.createRange();
                    t1 = range.text;
                    textlen = range.text.length;
                    range.text = "#%%#@@()bbaa**&&";
                    var s1 = textBox.value.split("#%%#@@()bbaa**&&")[0];
                    var s2 = textBox.value.split("#%%#@@()bbaa**&&")[1];
                    start=s1.length;
                    end = start + textlen;
                    textBox.value = s1 + t1 + s2;
                    //alert(textlen.toString()+","+start.toString() + "," + end.toString());
                


            }

            var pre = textBox.value.substr(0, start);
            var post = textBox.value.substr(end, textBox.value.length );
            
            //下面一句用来判断是否在两边加上$号
            if ( (pre.split("$").length -pre.split("\\$").length )% 2  == 1) insEquation = "$" + insEquation + "$";

            textBox.value = pre + insEquation + post;  //插入的最终值


            textBox.focus();
            if (typeof (textBox.selectionStart) == "number") {   //非IE光标到插入位置
                textBox.setSelectionRange(start + insEquation.length, start + insEquation.length); 
            }
            else  
            {
                var range = textBox.createTextRange();//IE光标到插入位置
                
                range.collapse(true);
                range.moveEnd('character', start + insEquation.length);
                range.moveStart('character', start + insEquation.length);
          
                range.select();
                

            }

        }

  

  
        


