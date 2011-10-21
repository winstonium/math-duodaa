
        var temStr = "";
        var mathShowTime;
        var timeoutNum = new Array();


        function verifyInput() {
            var getStr = document.getElementById("T1_container").getElementsByTagName("textarea")[0].value.replace(/(^\s*)|(\s*$)/g, ""); 
            //var getStr = document.getElementById("T1").value.replace(/(^\s*)|(\s*$)/g, ""); 
            getStr = getStr.replace(/</g, "&lt;");
            
            

            if (getStr.indexOf("#%%#@@()bbaa**&&") >= 0) {
                alert("非法输入！");
                getStr = getStr.split("#%%#@@()bbaa**&&").join("");
                document.getElementById("T1_container").getElementsByTagName("textarea")[0].value = getStr;
                //document.getElementById("T1").value = getStr;
            }

            if (getStr.indexOf("\\$") >= 0 ) {
                alert("不能使用\\$，若要输入\'$\'，请使用\\Dollar命令。");
                getStr = getStr.split("\\$").join("");
                document.getElementById("T1_container").getElementsByTagName("textarea")[0].value = getStr;
            }

            if (temStr != getStr && document.getElementById("liveshow").checked) 
            {

                //window.alert( document.getElementById("liveshow").checked);
                temStr = getStr;
                
                document.getElementById("mathshow").innerHTML = controlStr(temStr);          //处理换行问题 
                MathJax.Hub.Queue(["Typeset", MathJax.Hub, "mathshow"]);
                
            }
        }

        //处理换行问题 

        function controlStr(str)  //字符在显示前的特殊处理
        {
            
          return (str.split("\n").join("<br />"));

        }

        function startVerify()   //
        {

            mathShowTime = setInterval(verifyInput, 1000);
         }

       

        
        function getInsertText(insEuqa) {
            textBox = document.getElementById("T1_container").getElementsByTagName("textarea")[0];
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
            if ((pre.split("$").length )% 2  == 1) insEquation = "$" + insEquation + "$";

            textBox.value = pre + insEquation + post;  //插入的最终值


            textBox.focus();
            if (typeof (textBox.selectionStart) == "number") {   //非IE光标到插入位置
                textBox.setSelectionRange(start + insEquation.length, start + insEquation.length); 
            }
            else  {　//IE光标到插入位置
                var range = textBox.createTextRange();
                
                range.collapse(true);
                range.moveEnd('character', start + insEquation.length);
                range.moveStart('character', start + insEquation.length);
          
                range.select();
                

            }

        }

        function delayHide(classNUM) {
            var i = classNUM;
            var className=new Array("operators","brackets","greekletters","relations","arrows","accents");
            document.getElementById(className[i]).style.display = "none"; 
           

        }

        function hideDiv(classNUM) {
            var i = classNUM;
            var delayTIME=500;
             timeoutNum[i] = setTimeout("delayHide("+i.toString()+")", delayTIME);
         
        }
        
        function showDiv(classNUM) {
            var i = classNUM;
            var className=new Array("operators","brackets","greekletters","relations","arrows","accents");
      
                if (timeoutNum[i] != undefined) clearTimeout(timeoutNum[i]);
                document.getElementById(className[i]).style.display = "";
                document.getElementById(className[i]).style.position = "absolute";
            
        }

