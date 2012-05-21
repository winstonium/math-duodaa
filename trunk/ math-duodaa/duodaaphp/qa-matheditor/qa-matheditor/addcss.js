
      
       //提取src的值   
       var math_root = document.getElementById("matheditor-addCss").getAttribute("src");
       //取得问号后的值
       math_root = math_root.substring(math_root.indexOf("?")+1, math_root.length) 
       
       var newLinkEle = document.createElement("link");
       
       newLinkEle.setAttribute("rel","stylesheet");
       newLinkEle.setAttribute("type", "text/css");
       newLinkEle.setAttribute("href", math_root + "matheditor.css");
       
       document.getElementsByTagName("head")[0].appendChild(newLinkEle);
       
       
      // document.write(math_root);
        
        