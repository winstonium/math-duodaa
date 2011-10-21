<%@ Page language="c#" Inherits="zhidao.myhd" CodeFile="myhd.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="ad" Src="Control/ad.ascx" %>
<%@ Register TagPrefix="uc1" TagName="Login" Src="Control/Login.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>我的回答-<%=Application["CnWebName"]%></title>
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
							<div align="left"><a href="index.aspx">基金吧</a>&gt;我的提问</div>
							<div align="right">共有相关问题
								<asp:Label id="_count" runat="server"></asp:Label>&nbsp;项</div>
							<asp:DataGrid id="Grid1" runat="server" AutoGenerateColumns="False" Width="100%" AllowPaging="True"
								GridLines="None" CellPadding="0">
								<ItemStyle Font-Size="14px"></ItemStyle>
								<HeaderStyle Font-Size="12px" HorizontalAlign="Left"></HeaderStyle>
								<Columns>
									<asp:HyperLinkColumn DataNavigateUrlField="id" DataNavigateUrlFormatString="view.aspx?id={0}" DataTextField="caption"
										HeaderText="标题" DataTextFormatString="{0}&lt;br&gt;&lt;hr size=1 color=#eae6e8&gt;">
										<HeaderStyle Width="500px"></HeaderStyle>
									</asp:HyperLinkColumn>
									<asp:BoundColumn DataField="answer" HeaderText="回答数" DataFormatString="{0}&lt;br&gt;&lt;hr size=1 color=#eae6e8&gt;">
										<HeaderStyle Width="60px"></HeaderStyle>
										<ItemStyle HorizontalAlign="Center"></ItemStyle>
									</asp:BoundColumn>
									<asp:BoundColumn DataField="state1" HeaderText="状态" DataFormatString="&lt;img src='images/state_{0}.gif'&gt;&lt;br&gt;&lt;hr size=1 color=#eae6e8&gt;">
										<HeaderStyle Width="40px"></HeaderStyle>
										<ItemStyle HorizontalAlign="Center"></ItemStyle>
									</asp:BoundColumn>
									<asp:BoundColumn DataField="state2" HeaderText="被采纳答案" DataFormatString="&lt;img src='images/dd_{0}.gif'&gt;&lt;br&gt;&lt;hr size=1 color=#eae6e8&gt;">
										<HeaderStyle Width="100px"></HeaderStyle>
										<ItemStyle HorizontalAlign="Center"></ItemStyle>
									</asp:BoundColumn>
									<asp:BoundColumn DataField="sj" HeaderText="提问时间" DataFormatString="{0:MM-dd}&lt;br&gt;&lt;hr size=1 color=#eae6e8&gt;">
										<HeaderStyle Width="80px"></HeaderStyle>
										<ItemStyle HorizontalAlign="Center"></ItemStyle>
									</asp:BoundColumn>
								</Columns>
								<PagerStyle VerticalAlign="Bottom" NextPageText="下一页" PrevPageText="上一页" HorizontalAlign="Center"></PagerStyle>
							</asp:DataGrid>
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
