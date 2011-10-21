<%@ Page language="c#" Inherits="zhidao.admin.Login" CodeFile="Login.aspx.cs" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>问吧后台登录口</title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<fieldset>
				<TABLE cellSpacing="0" width="160" cellPadding="0" border="0" height="160" id="TABLE1"
					runat="server">
					<TR>
						<TD colSpan="3"><b>&nbsp;&nbsp;后台管理</b></TD>
					</TR>
					<TR>
						<TD align="right" style="WIDTH: 54px"><FONT size="2">帐号：</FONT></TD>
						<TD>
							<asp:TextBox id="username" runat="server" Width="100px" MaxLength="20"></asp:TextBox></TD>
						<TD>
							<asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="*" ControlToValidate="username"
								ValidationExpression="[^<,>,/,']*"></asp:RegularExpressionValidator></TD>
					</TR>
					<TR>
						<TD align="right" style="WIDTH: 54px"><FONT size="2">密码：</FONT></TD>
						<TD>
							<asp:TextBox id="password1" runat="server" TextMode="Password" Width="100px" MaxLength="20"></asp:TextBox></TD>
						<TD>
							<asp:RegularExpressionValidator id="RegularExpressionValidator2" runat="server" ErrorMessage="*" ControlToValidate="password1"
								ValidationExpression="[^<,>,/,']*"></asp:RegularExpressionValidator></TD>
					</TR>
					<TR>
						<TD colSpan="3" align="center">
							<asp:Button id="Button1" runat="server" Text=" 登 录 " onclick="Button1_Click"></asp:Button>
						</TD>
					</TR>
				</TABLE>
			</fieldset>
		</form>
	</body>
</HTML>
