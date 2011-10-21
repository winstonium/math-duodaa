<%@ Control Language="c#" Inherits="zhidao.admin.top" CodeFile="top.ascx.cs" %>
<table cellpadding="0" cellspacing="0" border="0" style="WIDTH: 800px; HEIGHT: 18px">
	<tr>
		<td>
			<asp:Button id="Button1" Text="会员管理" runat="server" onclick="Button1_Click"></asp:Button></td>
		<td>
			<asp:Button id="Button2" Text="问题管理" runat="server" onclick="Button2_Click"></asp:Button></td>
		<td>
			<asp:Button id="Button3" Text="审核问题" runat="server" onclick="Button3_Click"></asp:Button></td>
		<td>
			<asp:Button id="Button4" Text="系统设置" runat="server" onclick="Button4_Click"></asp:Button></td>
		<td>
			<asp:Button id="Button5" Text="退出" runat="server" onclick="Button5_Click"></asp:Button></td>
	</tr>
</table>
