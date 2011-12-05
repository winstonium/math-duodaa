﻿<%@ Control Language="C#" AutoEventWireup="true" CodeFile="LogOn.ascx.cs" Inherits="Control_LogAndReg" %>






<div id="userinfoPad" runat="server" style="padding: 15px; width: 200px; height: 275px; text-align: left; vertical-align: bottom; border: 2px solid #eeeeee; background-color: inherit; display:block; margin-left: 10px;">
<div>
    <div style="margin-bottom: 10px; width: 200px; ">
       <span id="username" runat="server" style="width: 150px;font-size: 24px; color: #000;width: 124px; font-weight: bolder;"></span> 
       <span style="width:70px; text-align:right; vertical-align:middle; display:inline-block;"><asp:Button ID="logout" runat="server" OnClick="logOUT_Click" BackColor="#eeeeee" Height="25px" Width="40px" Text="退出"  /></span>
    </div>
 
    <div id="topLink">
          <a href="/mytw.aspx" style="font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; display: block; width: 60px; font-size: 13px; float: left;">我的提问</a>
          <a href="/myhd.aspx" style="font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; display: block; width: 62px; font-size: 13px; float: left;">我的回答</a>
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
<a href="/editinfo.aspx" style="display:block; margin-top:10px;text-decoration: none; font-family: 宋体, Arial, Helvetica, sans-serif; font-size: 15px; color: #FF6600">修改资料</a></div>
</div>






<div id="userloginPad" runat="server" 
    style="padding: 15px; width: 200px; height: 275px; text-align: left; vertical-align: bottom; border: 2px solid #eeeeee; background-color: inherit; display:block; margin-left: 10px;" >
<div id="userbasefun">
   
     <span style="width: 150px;font-size: 24px; color: #000;width: 124px; font-weight: bolder;"> 用户登录</span>
     <div> <a  href="/forgetpw.aspx" style="font-size: 13px; font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; color: #FF0000">忘记密码</a>
     <a href="/Register.aspx" 
        style="font-size: 13px;  font-family: 宋体, Arial, Helvetica, sans-serif; text-decoration: none; color: #FF0000" >注册账号</a>
    </div>
     
</div>

<br />
<div style="padding: 0px; margin: 0px; ">   

    

 <div style="position: relative;   ">
  <div style="position: relative;height:20px; padding:8px; " >
  <div style="font-size:15px;width:75px; float: left;">用户名：</div>
   <div style="width: 100px; float: left;"><asp:TextBox ID="log_un" runat="server" Width="100px" MaxLength="20"></asp:TextBox></div>
   <div style="width: 25px;"><asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="错误" ControlToValidate="log_un"
				ValidationExpression="[\u0800-\u4e00 \u4e00-\u9fa5 a-zA-Z_0-9]{3,20}"></asp:RegularExpressionValidator>
       <asp:RegularExpressionValidator id="RegularExpressionValidator3" runat="server" ControlToValidate="log_un"
				ValidationExpression="\S+"></asp:RegularExpressionValidator></div>
  </div>
  
  <div style="position: relative;height:20px;padding:8px;">
  <div style="font-size:15px;width:75px;float: left;">密&nbsp;&nbsp;&nbsp;&nbsp;码：</div>
   <div style="width: 100px; float: left;"><asp:TextBox ID="log_psw" runat="server" Width="100px"  MaxLength="20" TextMode="Password"></asp:TextBox></div>
   <div style="width: 25px;"><asp:RegularExpressionValidator id="RegularExpressionValidator2" runat="server" ErrorMessage="错误" ControlToValidate="log_psw"
				ValidationExpression="[0-9a-zA-Z]{6,20}"></asp:RegularExpressionValidator></div>
  
  </div>

  <div style="position: relative;height:20px;padding:8px;">
   <div style="font-size:15px;width:75px;float: left;">验证码：</div>
   <div style="width: 100px; float: left;"><asp:TextBox ID="log_verify" runat="server" Width="50px" MaxLength="6" ></asp:TextBox><img id="verifyimg" src="/checkimage.aspx" title="看不清，点击换一张图" alt="看不清，点击换一张图" onclick="this.src='checkimage.aspx?f='+Math.random()" /><a href="#" onclick="document.getElementById('verifyimg').src='checkimage.aspx?f='+Math.random()" style="font-size: 11px; text-decoration: none" >换一张</a></div>
   
  </div>


 </div>
  
   
  <div>
      
      <asp:Button ID="log_submit" runat="server" OnClick="logON_Click" BackColor="#eeeeee"  Text="登录" Height="25px" Width="40px" />
  </div>
    
    
</div>
<br />
<div style="border-width: 3px; border-top-color: #C0C0C0; font-family: 宋体; color: #000000;">
<span style="font-size: 12px; font-family: 宋体, Arial, Helvetica, sans-serif">使用QQ号登录：</span> 
    <asp:ImageButton ID="qqConnetct" ImageUrl="~/images/qqConnect_logo_1.png" 
        runat="server" onclick="qqConnetct_Click" style="width: 16px" />
</div>
    


</div>

