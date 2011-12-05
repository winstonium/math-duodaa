<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="mainlist.aspx.cs" Inherits="download_Default" %>
<%@ Register TagPrefix="uc1" TagName="EquationEditor" Src="~/Control/EquationEditor.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="~/Control/buttom.ascx" %>



<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
资料下载-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
    <link type="text/css" href="./downpages.css" rel="Stylesheet" />
<link type="text/css" href="/duodaainnerpage.css" rel="Stylesheet" />

    
</asp:Content>


<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">




<table class="downclasstab">
<tr >
<td class="titletd" colspan="3" ><a href="3" target="_blank">精彩图书</a></td>
</tr>
<tr>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner,Frank W. Warner,Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Math Analysis</a></li>
    <li class="chinesetitle">数学分析</li>
    <li class="author">陈传璋</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
</tr>

<tr>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">数学分析</a></li>
    <li class="chinesetitle">数学分析</li>
    <li class="author">陈传璋</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
</tr>

<tr>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
<td class="downunittd">
<ul>
    <li><a href="#" target="_blank" class="title">Foundations of Differentiable Manifolds and Lie Groups</a></li>
    <li class="chinesetitle">微分流形及李群初步</li>
    <li class="author">Frank W. Warner(李森生译)</li>
    <li class="isbn-10">ISBN-10： 0521525586</li>
    <li class="isbn-13">ISBN-13： 9780521525589</li>
    <li class="pages">125页</li>
    </ul>

</td>
</tr>

<tr>
<td colspan="3" class="more"><a href="#" target="_blank">更多...</a></td>
</tr>

</table>

</asp:Content>


<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
    <uc1:buttom runat="server"  />
  
</asp:Content>

