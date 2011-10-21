<%@ Page Language="C#" AutoEventWireup="true" CodeFile="addtest.aspx.cs" Inherits="addtest" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
            Text="开始添加QQ列" />
        <asp:Button ID="Button2" runat="server" onclick="Button2_Click" Text="删除QQ列" />
        <br />
        <br />
        <asp:Label ID="Label1" runat="server" Text="就绪"></asp:Label>
    
    </div>
    </form>
</body>
</html>
