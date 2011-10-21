<%@ Page Language="C#" AutoEventWireup="true" CodeFile="LinkData.aspx.cs" Inherits="LinkData" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">

    <script language="JavaScript" type="text/javascript">
<!--　
        /** 说明：将指定下拉列表的选项值清空　
        * @param {String || Object]} selectObj 目标下拉选框的名称或对象，必须　
        */
        function removeOptions(selectObj)
        {
            if (typeof selectObj != 'object')
            {
                selectObj = document.getElementById(selectObj);
            } // 原有选项计数　　
            var len = selectObj.options.length;
            for (var i = 0; i < len; i++)
            {
                // 移除当前选项　　　　
                selectObj.options[0] = null;
            } 
        }
        /** 说明：设置传入的选项值到指定的下拉列表中　
        * @param {String || Object]} selectObj 目标下拉选框的名称或对象，必须　
        * @param {Array} optionList 选项值设置 格式：[{txt:'北京', val:'010'},
        * {txt:'上海', val:'020'}] ，必须
        * @param {String} firstOption第一个选项值，如：“请选择”，可选，值为空
        * @param {String} selected 默认选中值，可选　
        */
        function setSelectOption(selectObj, optionList, firstOption, selected) 
        {
               if (typeof selectObj != 'object') 
            {
                selectObj = document.getElementById(selectObj);
            } // 清空选项　　
            removeOptions(selectObj); // 选项计数　　
            
            var start = 0; // 如果需要添加第一个选项　　
            if (firstOption) 
            {
                selectObj.options[0] = new Option(firstOption, ''); // 选项计数从 1 开始　　　　
                start++;
            }
            
            var len = optionList.length;

            for (var i = 0; i < len; i++) 
             {
                // 设置 option　　　　
                selectObj.options[start] = new Option(optionList[i].txt, optionList[i].val);
                // 选中项　　　　
                if (selected == optionList[i].val) 
                {
                    selectObj.options[start].selected = true;
                }
                // 计数加 1　　　　
                start++;
             }
        }　//-->
</script>


    <div>

    <script language="JavaScript" type="text/javascript">　
        var cityArr = [];
        cityArr['江苏省'] = [
{ txt: '南京', val: '南京' },
{ txt: '无锡', val: '无锡' },
{ txt: '徐州', val: '徐州' },
{ txt: '苏州', val: '苏州' },
{ txt: '南通', val: '南通' },
{ txt: '淮阴', val: '淮阴' },
{ txt: '扬州', val: '扬州' },
{ txt: '镇江', val: '镇江' },
{ txt: '常州', val: '常州' }
];
        cityArr['浙江省'] = [
{ txt: '杭州', val: '杭州' },
{ txt: '宁波', val: '宁波' },
{ txt: '温州', val: '温州' },
{ txt: '湖州', val: '湖州' }
];
        function setCity(province) {
            setSelectOption('city', cityArr[province], '-请选择-');
           
        }

        function setInfo(info) {

            document.getElementById("kkk").innerHTML = info;
        }
</script>　


<select name="province" id="province" onchange="setCity(this.options[this.selectedIndex].value);">　　
<option value="">-请选择-</option>　　
<option value="江苏省">江苏省</option>　　
<option value="浙江省">浙江省</option>
</select>
省　
<select name="city" id="city" onchange="setInfo(this.options[this.selectedIndex].value);">　　
<option value="" >-请选择-</option>
</select>
<div id="kkk"></div>

    
    </div>
    </form>
</body>
</html>
