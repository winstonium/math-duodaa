<%@ Page Title="" Language="C#" MasterPageFile="~/duodaa.master" AutoEventWireup="true" CodeFile="help.aspx.cs" Inherits="help" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>


<asp:Content ID="Content1" ContentPlaceHolderID="titleStr" Runat="Server">
哆嗒网帮助中心-<%=Application["CnWebName"]%>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="linkCss" Runat="Server">
<link type="text/css" href="duodaainnerpage.css" rel="Stylesheet" />
</asp:Content>
<asp:Content ID="Content3" ContentPlaceHolderID="mainContent" Runat="Server">

<!--rightBot start -->
<!--rightBot end -->
<br class="spacer" />
<!--best start -->
<div id="best">
<asp:TextBox ID="_category" runat="server" Visible="false"></asp:TextBox>
<h2><span>帮助中心 </span></h2>

<div style="border:#F4F4F4 solid 4px; width:650px; ">
    <table cellspacing="10 px"; style="width: 100%;">
        <tr>
            <td >
            <a href="help_category_0.html" class="guide_1st"><%=category_1st[0] %></a>  
            </td >

            <td >
            <a href="help_category_1.html" class="guide_1st"><%=category_1st[1] %></a>
            </td>

            <td >
            <a href="help_category_2.html" class="guide_1st"><%=category_1st[2] %></a> 
            </td>
            
            <td >
            <a href="help_category_3.html" class="guide_1st"><%=category_1st[3] %></a> 
            </td>

            <td >
            <a href="help_category_4.html" class="guide_1st"><%=category_1st[4] %></a> 
            </td>
            
        </tr>
        <tr>
            <td >
            <a href="help_category_5.html" class="guide_1st"><%=category_1st[5] %></a>  
            </td >

            <td >
            <a href="help_category_6.html" class="guide_1st"><%=category_1st[6] %></a>
            </td>

            <td >
            <a href="help_category_7.html" class="guide_1st"><%=category_1st[7] %></a> 
            </td>
            
            <td >
            <a href="help_category_8.html" class="guide_1st"><%=category_1st[8] %></a> 
            </td>

            <td >
            <a href="help_category_9.html" class="guide_1st"><%=category_1st[9] %></a> 
            </td>
            
        </tr>



    </table>
    </div>
    <br />

    <div runat="server" id="nr0" visible="false">
    <p class="bestTxt"><%=category_1st[0] %> </p>
    <p class="bestTxt2"><span style="color: #666699"  >1、温馨提示</span></p>
    <p class="bestTxt3">欢迎来到哆嗒网——一个给广大数学学习者，数学爱好者带来帮助，进行学习交流的网络平台。初到哆嗒网，您可以通过搜索，输入您想要了解的数学问题或者资料，以及浏览其它对您有所帮助的信息。
    如果您想在哆嗒网提出或者回答问题，以及享受更加完备的服务，您需要注册并且登录。
    我们提供的所有服务都是免费的，请您放心使用。</p>
    
    </div>
    <div runat="server" id="nr1" visible="false">
    内容正在建设中
    </div>


    <div runat="server" id="nr2" visible="false">
    <p class="bestTxt"><%=category_1st[1] %> </p>
    <p class="bestTxt2"><span style="color: #666699"  >1、进入提问页面</span></p>
    <p class="bestTxt3">
            在哆嗒首页，您将看到下面的版块：<br />
            <img src="images/helpimg/I_Ask.jpg" alt="我要提问" title="我要提问" border="0" /><br />
            如果您已注册，点击“我要提问”，您将进入下面的提问页面，如果您还没注册，系统会跳转到注册页面，必须成为哆嗒成员您才能进行此项操作。<br />
           <img src="images/helpimg/Continue_Ask.jpg" / alt="继续提问" border="0" /> <br />
           在此输入您的问题概述，点击“继续提问”。
        </p>

       <p class="bestTxt2 style4">&nbsp;</p>
    <p class="bestTxt2"><span style="color: #666699"  >2、进入详细提问页面</span></p>
    <p class="bestTxt3">
        <img src="images/helpimg/detail_Ask.jpg" alt="详细提问" border="0" /><br />
            您可以在问题补充说明里进行详细提问，如果有图片说明，还可以在上方的“上传图”里插入图片，这样可以省去文字编辑的麻烦，也给读图题带来巨大方便。
            考虑到由一般输入法数学符号的欠缺给您带来的不便，我们为您提供了强大的数学公式编辑器，就在上传图的上方，它几乎囊括了所有数学符号，查找时，您只要将箭头放在相关符号的位置，将会详尽展开，如下图所示:<br />
        <img src="images/helpimg/Formula_Input.jpg" alt="公式输入" border="0" /><br />
        点击您需要的符号，公式的代码即可出现在您的问题补充说明里。 问题编辑完成之后，请您切切记检查是否填好问题分类。<br />
        <img src="images/helpimg/Class_Ask.jpg" alt="问题类别" border="0" /><br />
        只有填好正确的分类，才能让相关类别的回答者第一时间看到您的提问，使您的提问不错过最佳的解答时间，也给信息的搜索和资料的整理带来方便。<br />
最后记得点击最下方的“提交问题”按钮，这样您就完成了一个提问。

        </p>


    </div>
    <div runat="server" id="nr3" visible="false">内容正在建设中</div>
    <div runat="server" id="nr4" visible="false">内容正在建设中</div>
    <div runat="server" id="nr5" visible="false">内容正在建设中</div>
    <div runat="server" id="nr6" visible="false">内容正在建设中</div>
    <div runat="server" id="nr7" visible="false">内容正在建设中</div>
    <div runat="server" id="nr8" visible="false">内容正在建设中</div>
    <div runat="server" id="nr9" visible="false">内容正在建设中</div>
 

    <br />


    </div>
</asp:Content>
<asp:Content ID="Content4" ContentPlaceHolderID="buttomContent" Runat="Server">
<uc1:buttom runat="server"  />
</asp:Content>

