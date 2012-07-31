<?php
add_action('admin_menu', 'bp_extended_settings_plugin_menu');
add_action( 'network_admin_menu', 'bp_extended_settings_plugin_menu' );


function bp_extended_settings_plugin_menu() {
	add_submenu_page( 'bp-general-settings', 'Extended Settings', 'Extended Settings', 'manage_options', 'bp-extended-settings', 'bpes_plugin_options');
	
	//call register settings function
	add_action( 'admin_init', 'bpes_register_settings' );
}

function bpes_register_settings() {
	//register our settings
	register_setting( 'bpes_plugin_options', 'theme-notice' );
	register_setting( 'bpes_plugin_options', 'thumb-size' );
	register_setting( 'bpes_plugin_options', 'avi-size' );
	register_setting( 'bpes_plugin_options', 'avisize' );
	register_setting( 'bpes_plugin_options', 'thumbsize' );
	register_setting( 'bpes_plugin_options', 'max-avisize' );
	register_setting( 'bpes_plugin_options', 'profile-default' );
	register_setting( 'bpes_plugin_options', 'profile-links' );
	register_setting( 'bpes_plugin_options', 'root-profile' );
	register_setting( 'bpes_plugin_options', 'admin-bar' );
	register_setting( 'bpes_plugin_options', 'username-compat' );
	register_setting( 'bpes_plugin_options', 'old-code' );
	register_setting( 'bpes_plugin_options', 'custom-header' );
	register_setting( 'bpes_plugin_options', 'no-gravatar' );
	register_setting( 'bpes_plugin_options', 'switch-tabs' );
	register_setting( 'bpes_plugin_options', 'direct-username' );
	register_setting( 'bpes_plugin_options', 'profile-tab-default' );
	
	register_setting( 'bpes_plugin_options', 'profile-tab' );
	register_setting( 'bpes_plugin_options', 'profile-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'profile-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'activity-tab' );
	register_setting( 'bpes_plugin_options', 'activity-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'activity-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'messages-tab' );
	register_setting( 'bpes_plugin_options', 'messages-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'messages-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'groups-tab' );
	register_setting( 'bpes_plugin_options', 'groups-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'groups-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'settings-tab' );
	register_setting( 'bpes_plugin_options', 'settings-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'settings-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'forums-tab' );
	register_setting( 'bpes_plugin_options', 'forums-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'forums-tab-text' );
	
	register_setting( 'bpes_plugin_options', 'friends-tab' );
	register_setting( 'bpes_plugin_options', 'friends-tab-arrange' );
	register_setting( 'bpes_plugin_options', 'friends-tab-text' );
}

function bpes_plugin_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
				
	}
	
$pluginpath = plugins_url();
$admin_url = site_url('/wp-admin/', 'http');

?>


			<?php if ( !empty( $_GET['updated'] ) ) : ?>
				<div id="message" class="updated">
					<p><strong><?php _e('settings saved.', 'bpes' ); ?></strong></p>
				</div>
			<?php endif; ?>


<div class="wrap">
	<h2><?php _e('BuddyPress Extended Settings', 'bpes') ?></h2>
	
	<div id="icon-buddypress" class="icon32"><br /></div>
			<h2 class="nav-tab-wrapper" style="margin-bottom: 20px;">
			<a href="<?php $admin_url ?>admin.php?page=bp-components" class="nav-tab">Components</a>
			<a href="<?php $admin_url ?>admin.php?page=bp-page-settings" class="nav-tab">Pages</a>
			<a href="<?php $admin_url ?>admin.php?page=bp-settings" class="nav-tab">Settings</a>
			<a href="<?php $admin_url ?>admin.php?page=bb-forums-setup" class="nav-tab">Forums</a>
			<a href="<?php $admin_url ?>admin.php?page=bp-extended-settings" class="nav-tab nav-tab-active">Extended Settings</a>
			</h2>
	
	<form method="post" action="<?php echo admin_url('options.php');?>">
	<?php wp_nonce_field('update-options'); ?>
	<h2>General Settings</h2>
	<table class="widefat fixed plugins" cellspacing="0"">
	<thead>
		<tr>
			<th width="30px"></th>
			<th width="190px"><?php _e('Setting', 'bpes') ?></th>
			<th><?php _e('Description', 'bpes') ?></th>
		</tr>
	</thead>
	<tbody id="the-list">
	
	<tr>
	<th scope="row"><input type="checkbox" name="theme-notice" value="1" <?php if (get_option('theme-notice')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Theme Notice</strong></td>
	<td>Stop theme notice when using a none BuddyPress Theme</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="old-code" value="1" <?php if (get_option('old-code')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Depricated Code</strong></td>
	<td>Don't load depricated code</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="username-compat" value="1" <?php if (get_option('username-compat')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Username Compatability</strong></td>
	<td>Allow special characters and uppercase letters in usernames</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="custom-header" value="1" <?php if (get_option('custom-header')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Custom Header</strong></td>
	<td>Disable custom header</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="admin-bar" value="1" <?php if (get_option('admin-bar')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Admin Bar</strong></td>
	<td>Disable WordPress admin bar</td>
	</tr>

	<tr>
	<th scope="row"><input type="checkbox" name="no-gravatar" value="1" <?php if (get_option('no-gravatar')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Gravatars</strong></td>
	<td>Turn off Gravatars</td>
	</tr>

	<tr>
	<th scope="row"><input type="checkbox" name="direct-username" value="1" <?php if (get_option('direct-username')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Directory Username</strong></td>
	<td>Show usernames in member directory instead of profile field name</td>
	</tr>

	
	<tr>
	<th scope="row"><input type="checkbox" name="thumbsize" value="1" <?php if (get_option('thumbsize')==1) echo 'checked="checked"'; ?></th>
	<td><strong>Thumbnail Avatar Size</strong></td>
	<td>
		<select name="thumb-size" style="width:100px;">
			<option value="50" <?php if (get_option('avi-size')==50) echo 'selected="selected"'; ?> >Default</option>
			<option value="25" <?php if (get_option('thumb-size')==25) echo 'selected="selected"'; ?> >25px</option>
			<option value="30" <?php if (get_option('thumb-size')==30) echo 'selected="selected"'; ?> >30px</option>
			<option value="33" <?php if (get_option('thumb-size')==35) echo 'selected="selected"'; ?> >35px</option>
			<option value="40" <?php if (get_option('thumb-size')==40) echo 'selected="selected"'; ?> >40px</option>
			<option value="45" <?php if (get_option('thumb-size')==45) echo 'selected="selected"'; ?> >45px</option>
			<option value="50" <?php if (get_option('thumb-size')==50) echo 'selected="selected"'; ?> >50px</option>
			<option value="55" <?php if (get_option('thumb-size')==55) echo 'selected="selected"'; ?> >55px</option>
			<option value="60" <?php if (get_option('thumb-size')==60) echo 'selected="selected"'; ?> >60px</option>
			<option value="65" <?php if (get_option('thumb-size')==65) echo 'selected="selected"'; ?> >65px</option>
		</select>
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="avisize" value="1" <?php if (get_option('avisize')==1) echo 'checked="checked"'; ?></th>
	<td><strong>Avatar Size</strong></td>
	<td>
		<select name="avi-size" style="width:100px;">
			<option value="150" <?php if (get_option('avi-size')==150) echo 'selected="selected"'; ?> >Default</option>
			<option value="25" <?php if (get_option('avi-size')==25) echo 'selected="selected"'; ?> >25px</option>
			<option value="50" <?php if (get_option('avi-size')==50) echo 'selected="selected"'; ?> >50px</option>
			<option value="75" <?php if (get_option('avi-size')==75) echo 'selected="selected"'; ?> >75px</option>
			<option value="100" <?php if (get_option('avi-size')==100) echo 'selected="selected"'; ?> >100px</option>
			<option value="125" <?php if (get_option('avi-size')==125) echo 'selected="selected"'; ?> >125px</option>
			<option value="150" <?php if (get_option('avi-size')==150) echo 'selected="selected"'; ?> >150px</option>
			<option value="175" <?php if (get_option('avi-size')==175) echo 'selected="selected"'; ?> >175px</option>
			<option value="200" <?php if (get_option('avi-size')==200) echo 'selected="selected"'; ?> >200px</option>
			<option value="225" <?php if (get_option('avi-size')==225) echo 'selected="selected"'; ?> >225px</option>	
		</select>
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="max-avisize" value="1" <?php if (get_option('max-avisize')==1) echo 'checked="checked"'; ?></th>
	<td><strong>Max Avatar Size</strong></td>
	<td>
		<select name="avi-size" style="width:100px;">
			<option value="640" <?php if (get_option('max-avisize')==640) echo 'selected="selected"'; ?> >Default</option>
			<option value="150" <?php if (get_option('max-avisize')==150) echo 'selected="selected"'; ?> >150px</option>
			<option value="300" <?php if (get_option('max-avisize')==300) echo 'selected="selected"'; ?> >300px</option>
			<option value="640" <?php if (get_option('max-avisize')==640) echo 'selected="selected"'; ?> >640px</option>	
		</select>
	</td>
	</tr>
	
	</tbody>
	
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</tfoot>
	</table>
	<h2>Profile Settings</h2>
		<table class="widefat fixed plugins" cellspacing="0"">
	<thead>
		<tr>
			<th width="30px"></th>
			<th width="190px"><?php _e('Setting', 'bpes') ?></th>
			<th><?php _e('Description', 'bpes') ?></th>
		</tr>
	</thead>
	<tbody id="the-list">

	<tr>
	<th scope="row"><input type="checkbox" name="profile-links" value="1" <?php if (get_option('profile-links')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Profile Field Links</strong></td>
	<td>Disable auto linking of user profile fields</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="root-profile" value="1" <?php if (get_option('root-profile')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Root Profiles</strong></td>
	<td>Show user profiles at site root url/membername</td>
	</tr>
		
	<tr>
	<th scope="row"><input type="checkbox" name="profile-default" value="1" <?php if (get_option('profile-default')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Default Profile Tab</strong></td>
	<td>
		<select name="profile-tab-default" style="width:100px;">
			<option value="activity" <?php if (get_option('profile-tab-default')=='activity') echo 'selected="selected"'; ?> >Activity</option>
			<option value="profile" <?php if (get_option('profile-tab-default')=='profile') echo 'selected="selected"'; ?> >Profile</option>
			<option value="friends" <?php if (get_option('profile-tab-default')=='friends') echo 'selected="selected"'; ?> >Friends</option>
			<option value="messages" <?php if (get_option('profile-tab-default')=='messages') echo 'selected="selected"'; ?> >Messages</option>
			<option value="groups" <?php if (get_option('profile-tab-default')=='groups') echo 'selected="selected"'; ?> >Groups</option>
			<option value="forums" <?php if (get_option('profile-tab-default')=='forums') echo 'selected="selected"'; ?> >Forums</option>
			<option value="settings" <?php if (get_option('profile-tab-default')=='settings') echo 'selected="selected"'; ?> >Settings</option>
		</select>		
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="profile-tab-arrange" value="1" <?php if (get_option('profile-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Profile Tab</strong></td>
	<td>
		<select name="profile-tab" style="width:100px;">
			<option value="20" <?php if (get_option('profile-tab')==20) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('profile-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('profile-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('profile-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('profile-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('profile-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('profile-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('profile-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="profile-tab-text" placeholder="Tab text" value="<?php if (get_option('profile-tab-text')==true) echo get_option('profile-tab-text'); ?>">
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="activity-tab-arrange" value="1" <?php if (get_option('activity-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Activity Tab</strong></td>
	<td>
		<select name="activity-tab" style="width:100px;">
			<option value="10" <?php if (get_option('activity-tab')==10) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('activity-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('activity-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('activity-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('activity-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('activity-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('activity-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('activity-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="activity-tab-text" placeholder="Tab text" value="<?php if (get_option('activity-tab-text')==true) echo get_option('activity-tab-text'); ?>">
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="messages-tab-arrange" value="1" <?php if (get_option('messages-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Messages Tab</strong></td>
	<td>
		<select name="messages-tab" style="width:100px;">
			<option value="40" <?php if (get_option('messages-tab')==30) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('messages-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('messages-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('messages-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('messages-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('messages-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('messages-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('messages-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="messages-tab-text" placeholder="Tab text" value="<?php if (get_option('messages-tab-text')==true) echo get_option('messages-tab-text'); ?>">
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="friends-tab-arrange" value="1" <?php if (get_option('friends-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Friends Tab</strong></td>
	<td>
		<select name="friends-tab" style="width:100px;">
			<option value="30" <?php if (get_option('friends-tab')==30) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('friends-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('friends-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('friends-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('friends-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('friends-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('friends-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('friends-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="friends-tab-text" placeholder="Tab text" value="<?php if (get_option('friends-tab-text')==true) echo get_option('friends-tab-text'); ?>">
	</td>
	</tr>


	<tr>
	<th scope="row"><input type="checkbox" name="groups-tab-arrange" value="1" <?php if (get_option('groups-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Groups Tab</strong></td>
	<td>
		<select name="groups-tab" style="width:100px;">
			<option value="50" <?php if (get_option('groups-tab')==30) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('groups-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('groups-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('groups-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('groups-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('groups-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('groups-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('groups-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="groups-tab-text" placeholder="Tab text" value="<?php if (get_option('groups-tab-text')==true) echo get_option('groups-tab-text'); ?>">
	</td>
	</tr>
	
	<tr>
	<th scope="row"><input type="checkbox" name="forums-tab-arrange" value="1" <?php if (get_option('forums-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Forums Tab</strong></td>
	<td>
		<select name="forums-tab" style="width:100px;">
			<option value="60" <?php if (get_option('forums-tab')==30) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('forums-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('forums-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('forums-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('forums-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('forums-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('forums-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('forums-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="forums-tab-text" placeholder="Tab text" value="<?php if (get_option('forums-tab-text')==true) echo get_option('forums-tab-text'); ?>">
	</td>
	</tr>

	<tr>
	<th scope="row"><input type="checkbox" name="settings-tab-arrange" value="1" <?php if (get_option('settings-tab-arrange')==1) echo 'checked="checked"'; ?>/></th>
	<td><strong>Settings Tab</strong></td>
	<td>
		<select name="settings-tab" style="width:100px;">
			<option value="70" <?php if (get_option('settings-tab')==30) echo 'selected="selected"'; ?> >Default</option>
			<option value="10" <?php if (get_option('settings-tab')==10) echo 'selected="selected"'; ?> >Position 1</option>
			<option value="20" <?php if (get_option('settings-tab')==20) echo 'selected="selected"'; ?> >Position 2</option>
			<option value="30" <?php if (get_option('settings-tab')==30) echo 'selected="selected"'; ?> >Position 3</option>
			<option value="40" <?php if (get_option('settings-tab')==40) echo 'selected="selected"'; ?> >Position 4</option>
			<option value="50" <?php if (get_option('settings-tab')==50) echo 'selected="selected"'; ?> >Position 5</option>
			<option value="60" <?php if (get_option('settings-tab')==60) echo 'selected="selected"'; ?> >Position 6</option>
			<option value="70" <?php if (get_option('settings-tab')==70) echo 'selected="selected"'; ?> >Position 7</option>
		</select>	
		
		<input type="text" name="settings-tab-text" placeholder="Tab text" value="<?php if (get_option('settings-tab-text')==true) echo get_option('settings-tab-text'); ?>">
	</td>
	</tr>

	
	</tbody>
	
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</tfoot>
	</table>
	
	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="theme-notice,thumb-size,avi-size,avisize,thumbsize,profile-default,profile-links,root-profile,username-compat,old-code,admin-bar,custom-header,max-avisize,no-gravatar,switch-tabs,direct-username,profile-tab,profile-tab-default,profile-tab-arrange,profile-tab-text,activity-tab-arrange,activity-tab-text,activity-tab,messages-tab-arrange,messages-tab-text,messages-tab,groups-tab,groups-tab-arrange,groups-tab-text,settings-tab,settings-tab-arrange,settings-tab-text,forums-tab,forums-tab-arrange,forums-tab-text,friends-tab,friends-tab-arrange,friends-tab-text" />
	
	<p class="submit">
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	</p>
	
	</form>
</div>

<?php
}
?>