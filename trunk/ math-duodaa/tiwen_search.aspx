<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<%@ Page ValidateRequest="false" language="c#" Inherits="zhidao.tiwen_search" CodeFile="tiwen_search.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="webdiyer" Namespace="Wuqi.Webdiyer" Assembly="AspNetPager" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>继续提问-<%=Application["CnWebName"]%></title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta content='<%=Application["Description"]%>' name="Description" >
		<meta content='<%=Application["Keywords"]%>' name="Keywords" >
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
		<LINK href="baidu.css" type="text/css" rel="stylesheet">
	    <style type="text/css">
            .style1
            {
                height: 18px;
            }
        </style>
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server">
			<uc1:top id="Top1" runat="server"></uc1:top>
            <script type="text/javascript" src="MathJax/MathJax.js"></script>
			<div class="leftdiv">
				<table cellpadding="0" cellspacing="0" border="0" width="800">
					<tr>
						<td><br>
							<B>请继续提问：</B></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td><table cellpadding="0" cellspacing="0" border="0" width="100%">
								<tr >
									<td>您的提问：</td>
									<td>
										<asp:TextBox id="bt" runat="server" Width="500px"></asp:TextBox>
										</td>
								</tr>
                                <tr>
									<td>问题类别：</td>
									<td>
										<asp:RadioButtonList ID="RadioButtonList1" runat="server" RepeatDirection="Horizontal">
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                        </asp:RadioButtonList>
										</td>
								</tr>
                                <tr>
									<td>悬赏额度：</td>
									<td>
                                        <asp:TextBox ID="prize" runat="server" Text="0" Width="50"></asp:TextBox>
                                        <asp:RegularExpressionValidator ID="RegularExpressionValidator4" 
                                        runat="server" ValidationExpression="^\s*\d+\s*$" ControlToValidate="prize"
                                         ErrorMessage="只能输入数字"></asp:RegularExpressionValidator>
										</td>
								</tr>
								<tr>
									<td>问题补充说明：</td>
									<td>
										<script type="text/javascript" src="jsfunction/viewshow.js"></script>
									    <!-- #include FILE="equation_editor/equationUI.aspx" -->    
										</td>
								</tr>


								<tr >
									<td></td>
									<td>
										<asp:Button id="Button1" runat="server" Text="提交问题" onclick="Button1_Click"></asp:Button></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</div>
			<uc1:buttom id="Buttom1" runat="server"></uc1:buttom>
		</form>
		</FORM>
	</body>
</HTML>
