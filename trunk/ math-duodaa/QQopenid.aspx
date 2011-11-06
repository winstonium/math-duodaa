<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="QQopenid.aspx.cs" Inherits="QQopenid" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>


<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
哆嗒数学QQ号绑定-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">
    <br />
    <br />
    <asp:Label ID="ErrorMsg" runat="server" Text="在利用QQ登录时，发生错误" Visible="false"></asp:Label>
    <div id="qqLoginSuccess" runat="server" style="width: 600px; height: 300px">
    
    <div id="Connenct" runat="server">
    <table style="width:600px">
   <tr style="height: 25px">
   <th style="font-size:15px;width:100px;">用户名：</th>
   <td><asp:TextBox ID="log_un" runat="server" Width="300px" MaxLength="20" 
           BorderColor="#CCCC00" BorderStyle="Solid" BorderWidth="1px" Font-Size="Large" 
           Height="20px"></asp:TextBox></td>
   <td><asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="错误" ControlToValidate="log_un"
				ValidationExpression="[\u0800-\u4e00 \u4e00-\u9fa5 a-zA-Z_0-9]{3,20}"></asp:RegularExpressionValidator>
       <asp:RegularExpressionValidator id="RegularExpressionValidator3" runat="server" ControlToValidate="log_un"
				ValidationExpression="\S+"></asp:RegularExpressionValidator></td>
   </tr>
   <tr>
   <th style="font-size:15px;width:100px;">密&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
   <td><asp:TextBox ID="log_psw" runat="server" Width="300px"  MaxLength="20" TextMode="Password" BorderColor="#CCCC00" BorderStyle="Solid" BorderWidth="1px" Font-Size="Large" 
           Height="20px"></asp:TextBox></td>
   <td><asp:RegularExpressionValidator id="RegularExpressionValidator2" runat="server" ErrorMessage="错误" ControlToValidate="log_psw"
				ValidationExpression="[0-9a-zA-Z]{6,20}"></asp:RegularExpressionValidator></td>
   </tr>
   <tr>
   <th style="font-size:15px;width:100px;">验证码：</th>
   <td><asp:TextBox ID="log_verify" runat="server" Width="50px" MaxLength="6" BorderColor="#CCCC00" BorderStyle="Solid" BorderWidth="1px" Font-Size="Large" 
           Height="20px"></asp:TextBox><img id="verifyimg" src="checkimage.aspx"title="看不清，点击换一张图" alt="看不清，点击换一张图" onclick="this.src='checkimage.aspx?f='+Math.random()" /><a href="#" onclick="document.getElementById('verifyimg').src='checkimage.aspx?f='+Math.random()" style="font-size: 11px; text-decoration: none" >换一张</a></td>
   <td></td>
   </tr>

   
   <tr>
   <th style="font-size:15px;width:100px;"></th>
   <td colspan="2">
       <asp:Button ID="ConnectDuodaa" runat="server" Text="绑 定 哆 嗒 账 号" Height="30" 
           Width="300" BackColor="#94A63E" Font-Size="Large" ForeColor="White" 
           Font-Bold="True" Font-Names="微软雅黑" /> 
       </td>
   
   </tr>


   </table>
    </div>

    <div id="Creat" runat="server">
    
    </div>
    
    
    </div>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

