<%@ Page language="c#" Inherits="zhidao.admin.userlist" CodeFile="userlist.aspx.cs" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="top.ascx" %>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<HTML>
	<HEAD>
		<title>会员管理</title>
		<meta name="GENERATOR" Content="Microsoft Visual Studio .NET 7.1">
		<meta name="CODE_LANGUAGE" Content="C#">
		<meta name="vs_defaultClientScript" content="JavaScript">
		<meta name="vs_targetSchema" content="http://schemas.microsoft.com/intellisense/ie5">
	</HEAD>
	<body>
		<form id="Form1" method="post" runat="server"><fieldset>
		<uc1:top id="Top1" runat="server"></uc1:top>
			<script language="javascript">
       function SelectAll(tempControl)
       {
           //将除头模板中的其它所有的CheckBox取反 

            var theBox=tempControl;
             xState=theBox.checked;    

            elem=theBox.form.elements;
            for(i=0;i<elem.length;i++)
            if(elem[i].type=="checkbox" && elem[i].id!=theBox.id)
             {
                  if(elem[i].checked!=xState)
                        elem[i].click();
            }
  }  
			</script>
			<TABLE id="Table1" border="0" width="800">
				<TR>
					<TD colSpan="2">
						<asp:DataGrid id="DataGrid1" runat="server" Width="100%" AutoGenerateColumns="False" PageSize="15"
							AllowPaging="True" BorderWidth="1px" Font-Size="Smaller" BorderColor="#CCCC99">
							<HeaderStyle HorizontalAlign="Center" ForeColor="#0000CC" BackColor="#FFFFCC"></HeaderStyle>
							<FooterStyle BackColor="#FFFF99"></FooterStyle>
							<Columns>
								<asp:TemplateColumn HeaderText="操作">
									<HeaderStyle Width="50px"></HeaderStyle>
									<HeaderTemplate>
										<asp:CheckBox id="chkHeader" runat="server" Text="全选" AutoPostBack="False" onclick="javascript:SelectAll(this);"></asp:CheckBox>
										</FONT>
									</HeaderTemplate>
									<ItemTemplate>
										<asp:CheckBox id="CheckBox1" runat="server"></asp:CheckBox>
									</ItemTemplate>
								</asp:TemplateColumn>
								<asp:BoundColumn Visible="False" DataField="userid"></asp:BoundColumn>
								<asp:BoundColumn DataField="username" HeaderText="帐号">
									<HeaderStyle Width="100px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="sex" HeaderText="性别">
									<HeaderStyle Width="40px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="email" HeaderText="电子邮件">
									<HeaderStyle Width="100px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="sj" HeaderText="注册时间">
									<HeaderStyle Width="100px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="tw" HeaderText="提问次数">
									<HeaderStyle Width="80px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="hd" HeaderText="回答次数">
									<HeaderStyle Width="80px"></HeaderStyle>
								</asp:BoundColumn>
								<asp:BoundColumn DataField="dd" HeaderText="答对次数">
									<HeaderStyle Width="80px"></HeaderStyle>
								</asp:BoundColumn>
							</Columns>
							<PagerStyle BackColor="#FFFF99" Mode="NumericPages"></PagerStyle>
						</asp:DataGrid></TD>
				</TR>
				<TR>
					<TD>
						<asp:TextBox id="TextBox1" runat="server"></asp:TextBox>
						<asp:Button id="Button2" runat="server" Text=" 搜 索 " onclick="Button2_Click"></asp:Button><FONT face="宋体">共有</FONT>
						<asp:Label id="Label1" runat="server"></asp:Label><FONT face="宋体">个注册用户。</FONT></TD>
					<TD>
						<asp:Button id="Button1" runat="server" Text=" 删 除 " onclick="Button1_Click"></asp:Button></TD>
				</TR>
			</TABLE>
			</fieldset>
		</form>
	</body>
</HTML>
