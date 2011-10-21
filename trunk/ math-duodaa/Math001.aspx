<%@ Page ValidateRequest="false" Language="C#" AutoEventWireup="true" CodeFile="Math001.aspx.cs" Inherits="Math001" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<%@ Register TagPrefix="uc1" TagName="Login" Src="Control/Login.ascx" %>
<%@ Register TagPrefix="uc1" TagName="ad" Src="Control/ad.ascx" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
<script type="text/javascript" src="MathJax/MathJax.js"></script>
    <form id="form1" runat="server">
    <div>
    
        <uc1:top ID="top1" runat="server" />
    
    </div>
    <asp:Label ID="Label1" runat="server" Text="请输入问题链接" Font-Size="Small" />
    <asp:TextBox ID="TextBox1" runat="server" Width="500px"/>
    <asp:Button ID="Button1" runat="server" BackColor="#FFFFCC" ForeColor="#FF5050" onclick="Button1_Click" 
        Text="获取问题信息" Font-Bold="True" />
        <asp:Button ID="Button3" runat="server" BackColor="#FFFFCC" ForeColor="#FF5050" onclick="Button3_Click" 
        Text="加100嗒嗒币" Font-Bold="True" />
    <br />
										<asp:RadioButtonList ID="RadioButtonList1" runat="server" RepeatDirection="Horizontal">
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                            <asp:ListItem></asp:ListItem>
                                        </asp:RadioButtonList>
    <br />
    <asp:Label ID="Label2" runat="server" Text="目前支持百度知道的问题链接。" Font-Size="X-Small" 
        ForeColor="#FF0066" Font-Bold="True" />
     
    
    <asp:Table ID="Table2" runat="server" Width="633px" Visible="false"  >
    
    <asp:TableRow>
    <asp:TableCell Text="错误：" Width="20%"></asp:TableCell>
    <asp:TableCell></asp:TableCell>
    </asp:TableRow>
   
    </asp:Table>

    <div runat="server" id="detail">
    <table cellspacing="0" cellpadding="5" width="1200" border="0">
				<tr>
					<td width="570" valign="top">
						<div class="leftdiv" id="qDetail" runat="server">
							<table cellspacing="0" cellpadding="0" width="100%" border="0">
								<tr>
									<td><asp:label id="jj" runat="server" Font-Bold="True" ForeColor="ForestGreen">问题标题：</asp:label> &nbsp;&nbsp;<samp><b><asp:label id="bt" runat="server"></asp:label></b></samp></td>
								</tr>
								

								<tr>
									<td>
                                                                      
                                    <pre><asp:label id="nr" runat="server"></asp:label></pre>
                                                                        
                                    </td>
								</tr>
                                <tr>
									<td>
                                                                      
                                    
                                    <pre><asp:label id="nr2" runat="server"></asp:label></pre>
                                    
                                    </td>
								</tr>

								<tr>
									<td align="right" ><font color="dimgray">提问者：<asp:label id="zz" runat="server"></asp:label></font>&nbsp;&nbsp;</td>
								</tr>
                                <tr>
									<td align="right"><font color="green" style="font-size:x-small">此问题来自<asp:label id="Label3" runat="server"></asp:label>,原问题中可能含有图片并未在此显示</font><font color="blue" style="font-size:x-small"><asp:HyperLink
                                            ID="HyperLink1" runat="server"  BorderColor="Blue" Target="_blank" >点击查看原问题</asp:HyperLink></font>&nbsp;&nbsp;</td>
								</tr>
								
							</table>
						</div>
						
						<br>
						<div class="leftdiv" id="eqEditor" runat="server">
							<table cellspacing="0" cellpadding="0" width="100%" border="0">
								<tr valign="top">
									<td width="80%" align="center">
                                    <div><a name="reply"></a></div>
									<script type="text/javascript" src="jsfunction/viewshow.js"></script>
									<!-- #include FILE="equation_editor/equationUI.aspx" -->                                            
								    </td>
								</tr>
							</table>
							
							<table cellspacing="0" cellpadding="0" width="90%" border="0">
								<tr>
									<td width="22%">&nbsp;</td>
									<td width="78%"><asp:button id="Button2" runat="server" Text="提交答案" 
                                            onclick="Button2_Click" style="width: 78px"></asp:button>
                                            
                                        </td>
								</tr>
							</table>
						</div>
					</td>
					<td width="180" valign="top"><div class="rightdiv"><table cellpadding="0" cellspacing="0" border="0" width="160">
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
    </div>
    <uc1:buttom id="Buttom1" runat="server" />
    
     


  

    




    </form>
</body>
</html>
