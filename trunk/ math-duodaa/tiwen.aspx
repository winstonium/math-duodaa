<%@ Page ValidateRequest="false" language="c#" Inherits="zhidao.tiwen" CodeFile="tiwen.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>我要提问-<%=Application["CnWebName"]%></title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta content='<%=Application["Description"]%>' name="Description" >
		<meta content='<%=Application["Keywords"]%>' name="Keywords" >
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<LINK href="baidu.css" type="text/css" rel="stylesheet">
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<uc1:top id="Top1" runat="server"></uc1:top>
			<div class="leftdiv">
				<table cellpadding="0" cellspacing="0" border="0" width="800">
					<tr>
						<td><b>提问</b>
						</td>
					</tr>
					<tr>
						<td>
							<table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr height="50">
									<td width="300">请输入您的提问：（系统将自动寻找与之相符的主题）</td>
									<td>
										<asp:TextBox id="caption" runat="server" Width="300px" MaxLength="100"></asp:TextBox>
										</td>
								</tr>
								<tr height="50">
									<td></td>
									<td>
										<asp:Button id="Button1" runat="server" Text="继续提问 " onclick="Button1_Click"></asp:Button></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<uc1:buttom id="Buttom1" runat="server"></uc1:buttom>
		</form>
	</body>
</HTML>
