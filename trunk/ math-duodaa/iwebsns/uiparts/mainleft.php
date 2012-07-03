<?php
/*
 * 注意：此文件由tpl_engine编译型模板引擎编译生成。
 * 如果您的模板要进行修改，请修改 templates/duodaa_temp/uiparts/mainleft.html
 * 如果您的模型要进行修改，请修改 models/uiparts/mainleft.php
 *
 * 修改完成之后需要您进入后台重新编译，才会重新生成。
 * 如果您开启了debug模式运行，那么您可以省去上面这一步，但是debug模式每次都会判断程序是否更新，debug模式只适合开发调试。
 * 如果您正式运行此程序时，请切换到service模式运行！
 *
 * 如有您有问题请到官方论坛（http://tech.jooyea.com/bbs/）提问，谢谢您的支持。
 */
?><?php
/*
 * 此段代码由debug模式下生成运行，请勿改动！
 * 如果debug模式下出错不能再次自动编译时，请进入后台手动编译！
 */
/* debug模式运行生成代码 开始 */
if(!function_exists("tpl_engine")) {
	require("foundation/ftpl_compile.php");
}
if(filemtime("templates/duodaa_temp/uiparts/mainleft.html") > filemtime(__file__) || (file_exists("models/uiparts/mainleft.php") && filemtime("models/uiparts/mainleft.php") > filemtime(__file__)) ) {
	tpl_engine("duodaa_temp","uiparts/mainleft.html",1);
	include(__file__);
}else {
/* debug模式运行生成代码 结束 */
?><?php
?><div class="appbar">
    <ul>
        <li class="app_blog"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=blog_list';return false;"  hidefocus="true"><span><?php echo $mn_langpackage->mn_blog;?></span></a></li>
        <li class="app_album"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=album';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_album;?></span></a></li>
        <li class="app_share"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=share_list&m=mine';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_share;?></span></a></li>
        <li class="app_group"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=group';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_group;?></span></a></li>
		<li class="app_event"><a href="javascript:void(0);" onclick="frame_content.location.href='modules.php?app=event';return false;" hidefocus="true"><span><?php echo $ef_langpackage->ef_activity;?></span></a></li>
        <li class="app_vote"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=poll_mine';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_poll;?></span></a></li>
        <li class="app_friend"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=mypals';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_pal;?></span></a></li>
        <li class="app_message"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=msgboard_more';return false;" hidefocus="true"><span><?php echo $mn_langpackage->mn_msg;?></span></a></li>
		<li class="app_ask"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=ask';return false;" hidefocus="true"><span>问吧</span></a></li>
        
        <!-- apps -->
        <?php
            if(count($pluginApps = get_user_apps()) > 0)
            {
              foreach($pluginApps as $ps)
              {?>
                  <li class="app-left">
	                  <img src="<?php echo './plugins/'.$ps['name'].'/'.$ps['image']; ?>" />
	                  <a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=add_app&id=<?php echo $ps['id'];?>';return false;" hidefocus="true"><?php echo $ps['title']?></a>
                  </li>
              <?php }
            }
        ?>       
        <!-- apps end -->
        
        <!-- plugins !-->
        <?php echo isset($plugins['main_left_MENU'])?show_plugins($plugins['main_left_MENU']):'';?>
        <!-- plugins !-->

        <li class="app_set"><a href="javascript:void(0);" onclick="frame_content.location.href='<?php echo $siteDomain;?>modules.php?app=mag_app';return false;" hidefocus="true"><?php echo $mn_langpackage->mn_set_app;?></a></li>
        
        <!-- plugins !-->
        <div class='main_left_menu_bottom'>
        <?php echo isset($plugins['main_left_menu_bottom'])?show_plugins($plugins['main_left_menu_bottom']):'';?>
        </div>
        <!-- plugins !-->

    </ul>
</div>
<?php } ?>