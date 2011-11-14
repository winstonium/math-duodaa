<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<%@ Register TagPrefix="uc1" TagName="ad" Src="Control/ad.ascx" %>
<%@ Page language="c#" Inherits="zhidao.Register" CodeFile="Register.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>输入注册信息-<%=Application["CnWebName"]%></title>
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
			<table cellpadding="5" cellspacing="0" border="0">
				<tr>
					<td valign="top">
						<div class="leftdiv">
							<div>
								<asp:Label id="Msg" runat="server"></asp:Label></div>
							<TABLE id="Table1" cellSpacing="1" cellPadding="1" width="600" border="0" style="WIDTH: 600px; HEIGHT: 352px">
								<TR>
									<TD>基本信息</TD>
									<TD></TD>
									<TD></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">创建用户名(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="username" runat="server" Width="150px" MaxLength="20"></asp:TextBox></TD>
									<TD>
										<asp:RegularExpressionValidator id="RegularExpressionValidator3" runat="server" ErrorMessage="用户名不合要求。<br>只可输入长度3到20的字母、数字和汉字。" ControlToValidate="username"
											ValidationExpression="^[\u0800-\u4e00 \u4e00-\u9fa5 a-zA-Z0-9]{3,20}$"></asp:RegularExpressionValidator>
                                        <asp:RegularExpressionValidator id="RegularExpressionValidator6" runat="server"  ControlToValidate="username" EnableClientScript="false"
											ValidationExpression="\S+"></asp:RegularExpressionValidator>
                                            
                                            </TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">设置密码(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="password1" runat="server" TextMode="Password" Width="150px" MaxLength="20"></asp:TextBox></TD>
									<TD>
										<asp:RegularExpressionValidator id="RegularExpressionValidator4" runat="server" ErrorMessage="密码不合要求。<br>只可输入长度6到20的字母和数字。" ControlToValidate="password1"
											ValidationExpression="^[0-9a-zA-Z]{6,20}$"></asp:RegularExpressionValidator></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">请重复输入密码(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="password2" runat="server" TextMode="Password" Width="150px" MaxLength="20"></asp:TextBox></TD>
									<TD>
										<asp:CompareValidator id="CompareValidator1" runat="server" ErrorMessage="两次密码不相同" ControlToValidate="password2"
											ControlToCompare="password1"></asp:CompareValidator></TD>
								</TR>
                                <TR>
									<TD><FONT face="宋体">QQ号(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="qq_Account" runat="server" Width="250px" MaxLength="20"></asp:TextBox></TD>
									<TD>
										<asp:RegularExpressionValidator id="RegularExpressionValidator5" runat="server" ErrorMessage="无效的QQ号。<br>如果是邮件QQ请输入对应的数字QQ号。" ControlToValidate="qq_Account"
											ValidationExpression="^[0-9]{0,20}$"></asp:RegularExpressionValidator></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">电子邮件地址(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="email" runat="server" Width="250px" MaxLength="50"></asp:TextBox></TD>
									<TD>
										<asp:RegularExpressionValidator id="RegularExpressionValidator1" runat="server" ErrorMessage="无效的电子邮件格式" ControlToValidate="email"
											ValidationExpression="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"></asp:RegularExpressionValidator></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">性别</FONT></TD>
									<TD>
										<asp:DropDownList id="sex" runat="server">
											<asp:ListItem Value="男" Selected="True">男</asp:ListItem>
											<asp:ListItem Value="女">女</asp:ListItem>
										</asp:DropDownList></TD>
									<TD></TD>
								</TR>
								<TR>
									<TD><FONT face="宋体">简介</FONT></TD>
									<TD>
										<asp:TextBox id="information" runat="server" TextMode="MultiLine" Rows="10" Width="250px" MaxLength="250"></asp:TextBox></TD>
									<TD>
										<asp:RegularExpressionValidator id="RegularExpressionValidator2" runat="server" ErrorMessage="Error" ControlToValidate="information"
											ValidationExpression="[^<,>,/,']*"></asp:RegularExpressionValidator></TD>
								</TR>

                                <TR>
									<TD><FONT face="宋体">骗证码(必填)</FONT></TD>
									<TD>
										<asp:TextBox id="checkcode" runat="server" Width="50px" MaxLength="6"></asp:TextBox><img src="checkimage.aspx" title="看不清，点击换一张图" onclick="this.src='checkimage.aspx?f='+Math.random()"/></TD>
									<TD>
                                    
										</TD>
								</TR>

								<TR>
									<TD></TD>
									<TD>
										<asp:CheckBox id="xy" runat="server" Text="我已阅读并接受<a href='protocal.aspx'>哆嗒协议</a>"></asp:CheckBox></TD>
									<TD></TD>
								</TR>
								<TR>
									<TD></TD>
									<TD height="50">
										<asp:Button id="Button1" runat="server" Text="创建用户" onclick="Button1_Click"></asp:Button></TD>
									<TD></TD>
								</TR>
							</TABLE>
						</div>
					</td>
					<td width="180" valign="top"><div class="addiv">
							<uc1:ad id="Ad1" runat="server"></uc1:ad></div>
					</td>
				</tr>
			</table>
			<uc1:buttom id="Buttom1" runat="server"></uc1:buttom>
		</form>
	</body>
</HTML>
