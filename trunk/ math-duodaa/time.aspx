<%@ Page Language="C#" AutoEventWireup="true" CodeFile="time.aspx.cs" Inherits="time" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    
    <script type="text/javascript">
       
        
        today = new Date();
        today1 = today.getTime(); ;
        
        today2 = "2003-3-23 0:00:00"
        today3 = new Date(today2);

        function shijian(postTime) { // 判断时间断

            var currentTime = new Date("<% =DateTime.Now.ToString() %>");
            var diffTime = currentTime - postTime.getTime();
            if (diffTime < 1000 * 60)    // 一分钟以内
            {
                return ("刚刚");
            }

            else if (diffTime < 1000 * 60 * 5) //5分钟以内
            {
                return ("5分钟以内");
            }  
             
            else if  (diffTime < 1000 * 60 * 10) // 10分钟以内
            {
                return ("10分钟以内");
            }
            
            else if (diffTime < 1000 * 60 * 20) // 20分钟以内
            {
                return ("20分钟以内");
            }
            
            else if (diffTime < 1000 * 60 * 30) // 30分钟以内
            {
                return ("30分钟以内");
            }

            else if (diffTime < 1000 * 60 * 60) // 1小时以内
            {
                return ("1小时以内");
            }
            
            else if (diffTime < 1000 * 60 * 60 * 2) // 2小时以内
            {
                return ("2小时以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 5) // 5小时以内
            {
                return ("5小时以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 12) // 12小时以内
            {
                return ("12小时以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24) // 一天以内
            {
                return ("1天以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 * 3) // 3天以内
            {
                return ("3天以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 * 7) // 1周以内
            {
                return ("1周以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 * 30) //1个月以内
            {
                return ("1个月以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 * 92) // 3个月以内
            {
                return ("3个月以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 *183) // 6个月以内
            {
                return ("6个月以内");
            }

            else if (diffTime < 1000 * 60 * 60 * 24 * 365) // 一年以内
            {
                return ("1年以内");
            }
            
            else // 一年以上
            {
                return ("1年以上");
            }
            
        }
        function showMSG() {
            alert("5 seconds!");
            today4 = new Date();
            document.getElementById("d1").innerHTML = today4.toString();
            document.getElementById("d2").innerHTML = shijian(today3);
        }
    
    </script>
    
    <title></title>
</head>
<body>
    <script type="text/javascript">
        document.write(today);
        document.write("<br>");
        
        document.write(today1);
        document.write("<br>");
        
        document.write(today2);
        document.write("<br>");
        
        document.write(today3);
        document.write("<br>");

        
      
    </script>
    
    <div id="d1">sad</div>
    <div id="d2"></div>
    
    <form> 　　<input type="button" value="Display timed alertbox!" onclick="setTimeout('showMSG();',5000)"/> 　　</form> 　
    　<p>Click on the button above. An alert box will be 　　displayed after 5 seconds.</p> 
</body>

</html>
