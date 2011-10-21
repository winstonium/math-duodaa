<%@ Page language="c#" Inherits="zhidao.zzview" CodeFile="zzview.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="ad" Src="Control/ad.ascx" %>
<%@ Register TagPrefix="uc1" TagName="Login" Src="Control/Login.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>
			<%=labtitle%>
			-<%=Application["CnWebName"]%></title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta content='<%=Application["Description"]%>' name="Description" >
		<meta content='<%=Application["Keywords"]%>' name="Keywords" >
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<link type="text/css" href="baidu.css" rel="stylesheet">
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<uc1:top id="Top1" runat="server"></uc1:top>
			<table width="800" cellpadding="5" cellspacing="0" border="0">
				<tr>
					<td width="570" valign="top">
						<div class="leftdiv">
							<div align="left"><a href="index.aspx">基金吧</a>&gt;<asp:Label id="Label1" runat="server"></asp:Label>的个人资料</div>
							<TABLE id="Table1" cellSpacing="1" cellPadding="1" width="100%" border="0">
								<TR>
									<TD><FONT face="宋体">帐号</FONT></TD>
									<TD>
										<asp:Label id="xm" runat="server"></asp:Label></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">性别</FONT></TD>
									<TD>
										<asp:Label id="xb" runat="server"></asp:Label></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">电子邮件</FONT></TD>
									<TD>
										<asp:Label id="email" runat="server"></asp:Label></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">简介</FONT></TD>
									<TD>
										<asp:Label id="jj" runat="server"></asp:Label></TD>
								</TR>
								<tr>
									<td><FONT face="宋体">提问资数</FONT></td>
									<td>
										<asp:Label id="tw" runat="server"></asp:Label></td>
								</tr>
								<tr>
									<td><FONT face="宋体">回答次数</FONT></td>
									<td>
										<asp:Label id="hd" runat="server"></asp:Label></td>
								</tr>
								<tr>
									<td><FONT face="宋体">答对次数</FONT></td>
									<td>
										<asp:Label id="dd" runat="server"></asp:Label></td>
								</tr>
							</TABLE>
						</div>
					</td>
					<td width="180" valign="top">
						<div class="rightdiv"><table cellpadding="0" cellspacing="0" border="0" width="160">
								<tr>
									<td>
										<uc1:Login id="Login1" runat="server"></uc1:Login></td>
								</tr>
							</table>
						</div>
						<br>
						<div class="addiv"><table cellpadding="0" cellspacing="0" border="0" width="160">
								<tr>
									<td>
										<uc1:ad id="Ad1" runat="server"></uc1:ad></td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
			<uc1:buttom id="Buttom1" runat="server"></uc1:buttom>
		</form>
	</body>
</HTML>
