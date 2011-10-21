<%@ Page Language="C#" AutoEventWireup="true" CodeFile="LaTeX.aspx.cs" Inherits="help_LaTeX" %>
<%@ Register TagPrefix="uc1" TagName="top" Src="Control/top.ascx" %>
<%@ Register TagPrefix="uc1" TagName="buttom" Src="Control/buttom.ascx" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script type="text/javascript" src="MathJax/MathJax.js"></script>
</head>
<body >
<form runat="server">
<uc1:top runat="server" />
    <table width="900">
    
    <tr>
    <td style="font-weight: bold; font-size: larger">
    LeTeX简介
    </td>
    </tr>
    
    <tr>
    <td style="font-size: medium">
    &nbsp;&nbsp;&nbsp;&nbsp;
    LaTeX（$\LaTeX$，音译“拉泰赫”）是一种基于TeX的排版系统，
    由美国计算机学家莱斯利·兰伯特（Leslie Lamport）在20世纪80年代初期开发，利用这种格式，
    即使使用者没有排版和程序设计的知识也可以充分发挥由TeX所提供的强大功能，能在几天，甚至几小时内生成很多具有书籍质量的印刷品。
    对于生成复杂表格和数学公式，这一点表现得尤为突出。因此它非常适用于生成高印刷质量的科技和数学类文档。
    这个系统同样适用于生成从简单的信件到完整书籍的所有其他种类的文档。
    </td>
    </tr>
      <tr>
    <td >
    <hr />
    </td>
    </tr>
    

    </table>


      <table width="900">
    
    <tr>
    <td style="font-weight: bold; font-size: larger">
     常用数学符号的LaTeX表示方法
    </td>
    </tr>
    
    <tr>
    <td style="font-size: medium; ">
        &nbsp;&nbsp;&nbsp;&nbsp;1、 指数、上标和下标可以用^和_后加相应字符来实现。比如：
        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">a_{1}</td>
        <td align="left">$a_{1}$</td>
        </tr>
        <tr>
        <td align="left">x^{2}</td>
        <td align="left">$x^{2}$</td>
        </tr>

        <tr>
        <td align="left">a^{3}_{ij}</td>
        <td align="left">$a^{3}_{ij}$</td>
        </tr>

        <tr>
        <td align="left">^{0}U</td>
        <td align="left">$^{0}U$</td>
        </tr>

        </table></div>

        &nbsp;&nbsp;&nbsp;&nbsp;2、 平方根的输入命令为：\sqrt，n 次方根相应地为: \sqrt[n]。方根符号的大小由LaTeX自动加以调整。比如：
        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">\sqrt{x}</td>
        <td align="left">$\sqrt{x}$</td>
        </tr>
        <tr>
        <td align="left">\sqrt{x^{2}+\sqrt{y}}</td>
        <td align="left">$\sqrt{x^{2}+\sqrt{y}}$</td>
        </tr>

        <tr>
        <td align="left">\sqrt[3]{2}</td>
        <td align="left">$\sqrt[3]{2}$</td>
        </tr>

        </table></div>


        &nbsp;&nbsp;&nbsp;&nbsp;3、 命令\overline 和\underline 在表达式的上、下方画出水平线。比如：
        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">\overline{m+n}</td>
        <td align="left">$\overline{m+n}$</td>
        </tr>
        <tr>
        <td align="left">\underline{m+n}</td>
        <td align="left">$\underline{m+n}$</td>
        </tr>

        </table></div>

        &nbsp;&nbsp;&nbsp;&nbsp;4、命令\overbrace 和\underbrace 在表达式的上、下方给出一水平的大括号。比如：
        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:250px">\underbrace{a+b+c+\cdots+z}_{26}</td>
        <td align="left">$\underbrace{a+b+c+\cdots+z}_{26}$</td>
        </tr>
        <tr>
        <td align="left"> 0.\overbrace{00\cdots 00}^{100个0}1</td>
        <td align="left">$ 0.\overbrace{00\cdots 00}^{100个0}1$</td>
        </tr>

        </table>
        </div>

        &nbsp;&nbsp;&nbsp;&nbsp;5、 向量通常用上方有小箭头的变量表示。这可由\vec 得到。
        另两个命令\overrightarrow 和\overleftarrow在定义从A 到B 的向量时非常有用。比如：

        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">\vec{a}</td>
        <td align="left">$\vec{a}$</td>
        </tr>
        <tr>
        <td align="left">\overrightarrow{AB}</td>
        <td align="left">$\overrightarrow{AB}$</td>
        </tr>
        <tr>
        <td align="left">\overleftarrow{CD}</td>
        <td align="left">$\overleftarrow{CD}$</td>
        </tr>

        </table>
        </div>


         &nbsp;&nbsp;&nbsp;&nbsp;6、 使用\frac或者\cfrac可以用来输入分数。比如：
         <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">\frac{1}{m+n}</td>
        <td align="left">$\frac{1}{m+n}$</td>
        </tr>
        <tr>
        <td align="left">\cfrac{1}{2}</td>
        <td align="left">$\cfrac{1}{2}$</td>
        </tr>

        </table></div>

        &nbsp;&nbsp;&nbsp;&nbsp;7、 输入矩阵的方法有很多，这里介绍一个\begin{matrix}。比如：
        <div style="text-align:center">
        <table style="width:80%">
        <tr>
        <td align="left" style="width:200px">
        <samp>
        \left( <br />
        \begin{matrix} <br />
        1 & 0 & 0\\ <br />
        0 & 1 & 0\\ <br />
        0 & 0 & 1 <br />
        \end{matrix} <br />
        \right)
        </samp>
        </td>
        <td align="left">
        $\left(
        \begin{matrix}
        1 & 0 & 0\\ 
        0 & 1 & 0\\ 
        0 & 0 & 1
        \end{matrix}
        \right)$
        </td>
        </tr>
        
        </table>
        </div>


    </td>
    </tr>
    

    <tr>
    <td><hr /></td>
    </tr>
    </table>
   <uc1:buttom ID="buttom1" runat="server" ></uc1:buttom>
   </form>


  

   
</body>
</html>
