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
    <span style="font-size: 25px; font-family: 幼圆; color: #C18B1E; font-weight: bolder;">
        <br />
        欢迎您通过腾讯QQ来登录哆嗒网！<br />
        你可选择一种方式继续操作。</span><br />
        <br />
    <table style="width:600px">
    <tr style="height: 25px">
   <td colspan="3" style="font-size:15px;width:600px;">1、若已经拥有哆嗒账号，你可以选择绑定账号。</td>
   
   </tr>
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
    <br />
    <br />
     <table style="width:600px">
    <tr style="height: 25px">
   <td colspan="3" style="font-size:15px;width:600px;">2、你也可以重新输入QQ号后，创建新的哆嗒账号。</td>
   
   </tr>
   <tr style="height: 25px">
   <th style="font-size:15px;width:100px;">QQ号：</th>
   <td><asp:TextBox ID="qq_Account" runat="server" Width="300px" MaxLength="20" 
           BorderColor="#CCCC00" BorderStyle="Solid" BorderWidth="1px" Font-Size="Large" 
           Height="20px"></asp:TextBox></td>
   <td><asp:RegularExpressionValidator id="RegularExpressionValidator5" runat="server" ErrorMessage="无效的QQ号。<br>如果是邮件QQ请输入对应的数字QQ号。" ControlToValidate="qq_Account"
											ValidationExpression="[0-9]{0,20}"></asp:RegularExpressionValidator>
       </td>
   </tr>
   
   <tr>
   <th style="font-size:15px;width:100px;"></th>
   <td colspan="2">
       <asp:Button ID="Button1" runat="server" Text="创 建 哆 嗒 账 号" Height="30" 
           Width="300" BackColor="#94A63E" Font-Size="Large" ForeColor="White" 
           Font-Bold="True" Font-Names="微软雅黑" /> 
       </td>
   
   </tr>


   </table>

    </div>
    
    
    </div>

</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

