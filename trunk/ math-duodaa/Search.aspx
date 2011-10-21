<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Page language="c#" Inherits="zhidao.Search" CodeFile="Search.aspx.cs" %>
<%@ Register TagPrefix="webdiyer" Namespace="Wuqi.Webdiyer" Assembly="AspNetPager" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>
			<%=Application["CnWebName"]%>
			搜索</title>
		<meta content="Microsoft Visual Studio .NET 7.1" name="GENERATOR">
		<meta content="C#" name="CODE_LANGUAGE">
		<meta content="JavaScript" name="vs_defaultClientScript">
		<meta content='<%=Application["Description"]%>' name=Description>
		<meta content='<%=Application["Keywords"]%>' name=Keywords>
		<meta content="http://schemas.microsoft.com/intellisense/ie5" name="vs_targetSchema">
		<LINK href="baidu.css" type="text/css" rel="stylesheet">
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<uc1:top id="Top1" runat="server"></uc1:top>
			<table cellSpacing="0" cellPadding="5" width="800" border="0">
				<TBODY>
					<tr>
						<td vAlign="top">
							<div class="leftdiv">
								<div align="right">共搜到相关问题
									<asp:label id="_count" runat="server"></asp:label>&nbsp;项</div>
								<asp:datalist id="Sdata" Width="90%" Runat="server">
									<ItemTemplate>
										<table cellpadding="0" cellspacing="0" border="0" width="100%">
											<tr>
												<td><a href='view.aspx?id=<%# DataBinder.Eval(Container.DataItem,"id") %>'><%# DataBinder.Eval(Container.DataItem,"caption") %></a></td>
											</tr>
											<tr>
												<td><%# Left(Convert.ToString(DataBinder.Eval(Container.DataItem,"content")),100) %></td>
											</tr>
											<tr>
												<td>回答时间:<%# DataBinder.Eval(Container.DataItem,"sj") %>&nbsp;-&nbsp;最佳回答者:<%# DataBinder.Eval(Container.DataItem,"username") %></td>
											</tr>
										</table>
									</ItemTemplate>
								</asp:datalist></div>
						</td>
					</tr>
				</TBODY>
			</table>
			<uc1:buttom id="Buttom1" runat="server"></uc1:buttom><asp:textbox id="TextBox1" runat="server" Width="0px" Visible="False">10</asp:textbox></form>
		</TR></TBODY></TABLE></FORM>
	</body>
</HTML>
