<%@ Control Language="C#" AutoEventWireup="true" CodeFile="LogOn.ascx.cs" Inherits="Control_LogAndReg" %>






<div id="userinfoPad" runat="server" style="padding: 15px; width: 200px; height: 200px; text-align: left; vertical-align: bottom; border: 2px solid #eeeeee; background-color: inherit; display:block; margin-left: 10px;">
<div>
    <div style="margin-bottom: 10px; width: 200px; ">
       <span id="username" runat="server" style="width: 150px;font-size: 24px; color: #000;width: 124px; font-weight: bolder;"></span> 
       <span style="width:70px; text-align:right; vertical-align:middle; display:inline-block;"><asp:Button ID="logout" runat="server" OnClick="logOUT_Click" BackColor="#eeeeee" Height="25px" Width="40px" Text="退出"  /></span>
    </div>
 
    <div id="topLink">
          <a href="mytw.aspx" style="font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; display: block; width: 60px; font-size: 13px; float: left;">我的提问</a>
          <a href="myhd.aspx" style="font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; display: block; width: 62px; font-size: 13px; float: left;">我的回答</a>
          <a href="#" style="font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; display: block; width: 62px; font-size: 13px; float: left;">奖品兑换</a>
     </div> 
</div>
<br />
<div id="useraccount" >      
  <div style=" display:block; margin-top:10px;">
   <span runat="server" style="font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 17px; ">我的哆分：</span><span runat="server" id="point" style="font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 18px; "></span>
  </div>
  
  <div style=" display:block; margin-top:10px;">
   <span runat="server" style="font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 17px; ">我的嗒币：</span><span runat="server" id="gold" style="font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 18px; ">850</span>
  </div>   
</div>

<div id="usercenter">
<a href="#" style=" display:block; margin-top:10px; text-decoration: none; font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 15px; color: #FF6600">进入个人中心</a> 
<a href="editinfo.aspx" style="display:block; margin-top:10px;text-decoration: none; font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 15px; color: #FF6600">修改资料</a></div>
</div>






<div id="userloginPad" runat="server" 
    style="padding: 15px; width: 200px; height: 220px; text-align: left; vertical-align: bottom; border: 2px solid #eeeeee; background-color: inherit; display:block; margin-left: 10px;" >
<div id="userbasefun">
   
     <span style="width: 150px;font-size: 24px; color: #000;width: 124px; font-weight: bolder;"> 用户登录</span>
     
</div>


<div>      
   <table style="width:200px">
   <tr>
   <th style="font-size:15px;width:50px;">用户名：</th>
   <td><asp:TextBox ID="log_un" runat="server" Width="100px" MaxLength="20"></asp:TextBox></td>
   <td><asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="错误" ControlToValidate="log_un"
				ValidationExpression="[\u0800-\u4e00 \u4e00-\u9fa5 a-zA-Z_0-9]{3,20}"></asp:RegularExpressionValidator>
       <asp:RegularExpressionValidator id="RegularExpressionValidator3" runat="server" ControlToValidate="log_un"
				ValidationExpression="\S+"></asp:RegularExpressionValidator></td>
   </tr>
   <tr>
   <th style="font-size:15px;width:50px;">密&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
   <td><asp:TextBox ID="log_psw" runat="server" Width="100px"  MaxLength="20" TextMode="Password"></asp:TextBox></td>
   <td><asp:RegularExpressionValidator id="RegularExpressionValidator2" runat="server" ErrorMessage="错误" ControlToValidate="log_psw"
				ValidationExpression="[0-9a-zA-Z]{6,20}"></asp:RegularExpressionValidator></td>
   </tr>
   <tr>
   <th style="font-size:15px;width:50px;">验证码：</th>
   <td><asp:TextBox ID="log_verify" runat="server" Width="50px" MaxLength="6" ></asp:TextBox><img id="verifyimg" src="checkimage.aspx"title="看不清，点击换一张图" alt="看不清，点击换一张图" onclick="this.src='checkimage.aspx?f='+Math.random()" /><a href="#" onclick="document.getElementById('verifyimg').src='checkimage.aspx?f='+Math.random()" style="font-size: 11px; text-decoration: none" >换一张</a></td>
   <td></td>
   </tr>

   </table>

 
  
   
       <div>
      
      <span><asp:Button ID="log_submit" runat="server" OnClick="logON_Click" BackColor="#eeeeee"  Text="登录" Height="25px" Width="40px" /></span>
    </div>
    
    <div style="float: left"><span style="font-size: 14px">其它帐号登录：</span><span id="qqLoginBtn"></span></div>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc.js"></script>
    <script type="text/javascript">
        QC.Login.insertButton({
            btnId: 'qqLoginBtn', //插入按钮的html标签id
            size: 'B_S', //按钮样式，A、B、C为三种样式， 
            //S、M、L、XL为同一种样式的不同尺寸，支持如下 : 
            //A_S, A_M, A_L, A_XL; 
            //B_S, B_M, B_L; 
            //C_S;

            clientId: '100226499', //appId
            scope: '', //授权范围，可选
            redirectURI: 'http://duodaa.com/' // 回调地址，可选
	
        });
</script>
</div>

<div id="userreg"><a href="Register.aspx" 
        style="font-size: 13px;  font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; color: #FF0000" >注册帐户</a> <a  href="forgetpw.aspx" style="font-size: 13px; font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; color: #FF0000">忘记密码</a></div>

</div>

