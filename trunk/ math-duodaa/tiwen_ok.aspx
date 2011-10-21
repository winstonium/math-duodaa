<%@ Page language="c#" Inherits="zhidao.tiwen_ok" CodeFile="tiwen_ok.aspx.cs" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>提交处理-<%=Application["CnWebName"]%></title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta content='<%=Application["Description"]%>' name="Description" />
		<meta content='<%=Application["Keywords"]%>' name="Keywords" />
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<FONT face="宋体">
				<asp:Label id="Label1" runat="server"></asp:Label> </FONT>
                <p></p>
                <asp:hyperlink ID="Hyperlink1" runat="server" Font-Bold="True" 
                Font-Names="幼圆" Font-Size="13pt" ForeColor="#009900">返回首页</asp:hyperlink>
                 
                &nbsp;&nbsp;&nbsp;
                 
                <asp:hyperlink ID="Hyperlink2" runat="server" Font-Bold="True" 
                Font-Names="幼圆" Font-Size="13pt" ForeColor="#009900">查看问题</asp:hyperlink>
                
            </FONT>
                
		</form>
	</body>

</HTML>
