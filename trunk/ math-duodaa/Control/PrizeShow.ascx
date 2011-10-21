<%@ Control Language="C#" AutoEventWireup="true" CodeFile="PrizeShow.ascx.cs" Inherits="Control_PrizeShow" EnableViewState="False" %>

<div style="border-width: 0px; width: 160px; vertical-align: middle; text-align:left">



<table>
<tr>
<td ><asp:Image ID="ImgShow" runat="server" /></td>


</tr>

<tr>

<td ><asp:Label runat="server" ID="PrName"></asp:Label></td>

</tr>
<tr>
<td><asp:RadioButtonList ID="AmountChoice" runat="server">
    </asp:RadioButtonList>
</td>


</tr>

<tr>
<td>
<asp:ImageButton runat="server" ID="confirmButton" ImageUrl="\images\prizeimg\confirmbutton.jpg" />
</td>
</tr>
</table>

</div>

