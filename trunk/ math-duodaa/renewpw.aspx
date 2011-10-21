<%@ Page Language="C#" AutoEventWireup="true" CodeFile="renewpw.aspx.cs" Inherits="renewpw" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <uc1:top id="Top1" runat="server"></uc1:top>
    <div>
    
        <table runat="server" id="tb1" style="width:800px;"  >
            <tr>
                <td colspan="3">
                    请输入您的新密码：<asp:TextBox ID="TextBox1" runat="server" TextMode="Password"></asp:TextBox>
                    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
                     ValidationExpression="[a-zA-Z0-9]{6,20}" ControlToValidate="textBox1"
                        ErrorMessage="密码不合要求，只能为6到20位字母或数字"></asp:RegularExpressionValidator>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    请再输入以上密码：<asp:TextBox ID="TextBox2" runat="server" TextMode="Password"></asp:TextBox>
                    <asp:CompareValidator ID="CompareValidator1" runat="server" ControlToValidate="textBox2" 
                     ControlToCompare="textBox1"
                        ErrorMessage="两次输入的密码不相同"></asp:CompareValidator>
                </td>
            </tr>
            <tr>
                <td>
                    <asp:Button ID="Button1" runat="server" Text="确认修改" onclick="Button1_Click" />
                    </td>
                <td>
                    &nbsp;</td>
                <td>
                    &nbsp;</td>
            </tr>
        </table>
    
        <br />
    <asp:Label id="l1" runat="server"></asp:Label>
    </div>
    <br />
    <br />
    <br />
    <br />

    <uc1:buttom runat="server" />
    </form>
</body>
</html>
