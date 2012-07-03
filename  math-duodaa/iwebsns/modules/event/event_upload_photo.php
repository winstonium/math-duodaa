<?php
/*
 * 注意：此文件由tpl_engine编译型模板引擎编译生成。
 * 如果您的模板要进行修改，请修改 templates/default/modules/event/event_upload_photo.html
 * 如果您的模型要进行修改，请修改 models/modules/event/event_upload_photo.php
 *
 * 修改完成之后需要您进入后台重新编译，才会重新生成。
 * 如果您开启了debug模式运行，那么您可以省去上面这一步，但是debug模式每次都会判断程序是否更新，debug模式只适合开发调试。
 * 如果您正式运行此程序时，请切换到service模式运行！
 *
 * 如有您有问题请到官方论坛（http://tech.jooyea.com/bbs/）提问，谢谢您的支持。
 */
?><?php
	require("foundation/auser_mustlogin.php");
	require("api/base_support.php");
	
	//引入语言包
	$ef_langpackage=new event_frontlp;
	
	//限制时间段访问站点
	limit_time($limit_action_time);
	
	//变量取得
	$user_id=get_sess_userid();
	$event_id=intval(get_argg('event_id'));
	$mod=short_check(get_argg('mod'));

	$status=api_proxy("event_member_by_uid","status",$event_id,$user_id);
	$status=$status['status'];
	if(!isset($status)||$status<2){
		echo "<script type='text/javascript'>alert(\"$ef_langpackage->ef_no_permission\");window.history.go(-1);</script>";
		exit();
	}

	//变量定义区
	$t_online = $tablePreStr."online";
	$session_code=md5(rand(0,10000));

	$sess_code_str=$session_code."|".$user_id;

	$dbo = new dbex;
	dbtarget('w',$dbServs);
	$sql="update $t_online set session_code = '$session_code' where user_id=$user_id";
	$dbo->exeUpdate($sql);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<base href='<?php echo $siteDomain;?>' />
<link rel="stylesheet" type="text/css" href="skin/<?php echo $skinUrl;?>/css/iframe.css">
<link rel="stylesheet" type="text/css" href="servtools/flash_mod/history/history.css" />
<script type='text/javascript' src="skin/default/js/jooyea.js"></script>
<script src="servtools/flash_mod/AC_OETags.js" language="javascript"></script>
<script src="servtools/flash_mod/history/history.js" language="javascript"></script>
<script language="JavaScript" type="text/javascript">
	var requiredMajorVersion = 9;
	var requiredMinorVersion = 0;
	var requiredRevision = 28;
</script>
<script type='text/javascript'>

function get_domain_url(){
	var location_site=parent.GET_TOP_URL();
	return location_site.replace(/.[^\/]*$/g,"/");
}
	</script>
</head>

<body id="iframecontent">
<div class="create_button"><a href="javascript:window.history.go(-1)" hidefocus="true"><?php echo $ef_langpackage->ef_back;?></a></div>
<h2 class="app_album"><?php echo $ef_langpackage->ef_activity;?></h2>
<div class="tabs">
	<ul class="menu">
		<li><a href="modules.php?app=event_info&event_id=<?php echo $event_id;?>" hidefocus="true"><?php echo $ef_langpackage->ef_update_activity;?></a></li>
    	<li><a href="modules.php?app=event_member_manager&event_id=<?php echo $event_id;?>" hidefocus="true"><?php echo $ef_langpackage->ef_member_management;?></a></li>
		<li class="active"><a href="modules.php?app=event_upload_photo&event_id=<?php echo $event_id;?>" hidefocus="true"><?php echo $ef_langpackage->ef_upload_photo;?></a></li>
	</ul>
</div>

<table class="form_table">
	<tr>
		<td height="100%">
			<?php echo $ef_langpackage->ef_upload_photo_tips;?>
		</td>
	</tr>
	<tr>
		<td height="100%">
			<div class="album_list" style="height:350px;">
			<script type='text/javascript'>
			function getSessCode(){
				return "<?php echo $sess_code_str;?>";
			}
			
			function getUploadScript(){
				var event_id=<?php echo $event_id;?>;
				if(event_id==0){
					alert("<?php echo $ef_langpackage->ef_not_selecte_up_photos_activity;?>");
					return "null";
				}else{
					var domain_url=get_domain_url();
			  	return domain_url+"do.php?act=event_upload_photo&id="+event_id;
			  }
			}
			
			function getKeepupUrl(){
			  return "modules.php?app=event_upload_photo&event_id=<?php echo $event_id;?>";
			}
			
			function getSuccUrl(){
				return "modules.php?app=event_update_photo&id=<?php echo $event_id;?>";
			}
			
			var hasProductInstall = DetectFlashVer(6, 0, 65);
			
			var hasRequestedVersion = DetectFlashVer(requiredMajorVersion, requiredMinorVersion, requiredRevision);
			
			if ( hasProductInstall && !hasRequestedVersion ) {
				var MMPlayerType = (isIE == true) ? "ActiveX" : "PlugIn";
				var MMredirectURL = window.location;
			    document.title = document.title.slice(0, 47) + " - Flash Player Installation";
			    var MMdoctitle = document.title;
			
				AC_FL_RunContent(
					"src", "servtools/flash_mod/playerProductInstall",
					"FlashVars","MMredirectURL="+MMredirectURL+'&MMplayerType='+MMPlayerType+'&MMdoctitle='+MMdoctitle+"",
					"width", "100%",
					"height", "90%",
					"align", "middle",
					"id", "upl",
					"quality", "high",
					"bgcolor", "#ecfbff",
					"wmode", "transparent",
					"name", "upl",
					"allowScriptAccess","sameDomain",
					"type", "application/x-shockwave-flash",
					"pluginspage", "http://www.adobe.com/go/getflashplayer"
				);
			} else if (hasRequestedVersion) {
				AC_FL_RunContent(
						"src", "servtools/flash_mod/upl",
						"width", "100%",
						"height", "90%",
						"align", "middle",
						"id", "upl",
						"quality", "high",
						"bgcolor", "#ecfbff",
						"wmode", "transparent",
						"name", "upl",
						"allowScriptAccess","sameDomain",
						"type", "application/x-shockwave-flash",
						"pluginspage", "http://www.adobe.com/go/getflashplayer"
				);
			  } else {
			    var alternateContent = 'Alternate HTML content should be placed here. '
			  	+ 'This content requires the Adobe Flash Player. '
			   	+ '<a href=http://www.adobe.com/go/getflash/>Get Flash</a>';
			    document.write(alternateContent);  // insert non-flash content
			  }
				</script>
			<noscript>
			  	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
						id="upl" width="100%" height="60%"
						codebase="http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab">
						<param name="movie" value="upl.swf" />
						<param name="quality" value="high" />
						<param name="bgcolor" value="#869ca7" />
						<param name="allowScriptAccess" value="sameDomain" />
						<param name="wmode" value="transparent" />
						<embed src="servtools/flash_mod/upl.swf" quality="high" bgcolor="#869ca7"
							width="100%" height="90%" name="upl" align="middle"
							play="true"
							loop="false"
							quality="high"
							allowScriptAccess="sameDomain"
							type="application/x-shockwave-flash"
							pluginspage="http://www.adobe.com/go/getflashplayer" wmode="transparent"
							>
						</embed>
				</object>
			</noscript>
			</div>
		</td>
	</tr>
</table>
</body>
</html>