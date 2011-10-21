<%@ Page Language="C#" AutoEventWireup="true" CodeFile="forgetpw.aspx.cs" Inherits="forgetpw" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>忘记密码</title>
</head>
<body>
    <form id="form1" runat="server">
    <uc1:top runat="server" />
    <div>
    
        
        <table style="width:800px;">
            <tr>
                <td style="font-size: xx-large; font-weight: bolder; text-align: center;">
                    取回密码</td>
            </tr>
            <tr>
                <td style="text-align: center">
                    请输入用户名：<asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                    <asp:Button ID="Button1" runat="server" Text="确定" onclick="Button1_Click" 
                        style="height: 21px" /><br />
                        <asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="用户名不合要求" ControlToValidate="textBox1"
											ValidationExpression="\w{3,20}"></asp:RegularExpressionValidator>
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Label ID="Label1" runat="server" > </asp:Label></td>
            </tr>
        </table><br />
    <br />
    <br />
    <br />

    <uc1:buttom runat="server" />
    
        
    </div>
    </form>
</body>
</html>
