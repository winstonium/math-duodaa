<?php
$thumb_size = get_option('thumb-size');
$avi_size = get_option('avi-size');
$max_avi_size = get_option('max-avisize');
$default_profile_tab = get_option('profile-tab-default');

//ignore old code
if (get_option('old-code')==1){
define ( 'BP_IGNORE_DEPRECATED', true );
}

// root profiles
if (get_option('root-profile')==1){
define ( 'BP_ENABLE_ROOT_PROFILES', true );
}

// turn off gravatar
if (get_option('no-gravatar')==1){
add_filter( 'bp_core_fetch_avatar_no_grav', '__return_true' );
}

//thumbnail sizes
if (get_option('thumbsize')==1){
define ( 'BP_AVATAR_THUMB_WIDTH', $thumb_size );
define ( 'BP_AVATAR_THUMB_HEIGHT', $thumb_size );
}

// avatar sizes
if (get_option('avisize')==1){
define ( 'BP_AVATAR_FULL_WIDTH', $avi_size );
define ( 'BP_AVATAR_FULL_HEIGHT', $avi_size );
}

// maximum avatar size
if (get_option('max-avisize')==1){
define ( 'BP_AVATAR_ORIGINAL_MAX_WIDTH', $max_avi_size );
}

//allows special characters in usernames
if (get_option('username-compat')==1){
define( 'BP_ENABLE_USERNAME_COMPATIBILITY_MODE', true );
}

// silences nagging theme notice
if (get_option('theme-notice')==1){
define( 'BP_SILENCE_THEME_NOTICE', true );
}

// remove custom header option
if (get_option('custom-header')==1){
define( 'BP_DTHEME_DISABLE_CUSTOM_HEADER', true );
}

// uses profile as default profile tab
if (get_option('profile-default')==1 && get_option('profile-tab-default')== true){
define( 'BP_DEFAULT_COMPONENT', $default_profile_tab );
//define ( 'BP_XPROFILE_SLUG', 'info' );

}

// remove profile field links
if (get_option('profile-links')==1){
function remove_xprofile_links() {
remove_filter( 'bp_get_the_profile_field_value', 'xprofile_filter_link_profile_data', 9, 2 );
}
add_action( 'bp_init', 'remove_xprofile_links' );
}

//remove admin bar
if (get_option('admin-bar')==1){
add_filter( 'show_admin_bar', 'hide_admin_bar' );
}


function bpse_change_profile_tab_order() {
	global $bp;
	
	if (get_option('profile-tab-arrange') == true){
		$bp->bp_nav['profile']['position'] = get_option('profile-tab');
		
		if (get_option('profile-tab-text') == true){
		$bp->bp_nav['profile']['name'] = get_option('profile-tab-text');
		}
	}
	
	if (get_option('activity-tab-arrange') == true){
		$bp->bp_nav['activity']['position'] = get_option('activity-tab');
		
		if (get_option('activity-tab-text') == true){
		$bp->bp_nav['activity']['name'] = get_option('activity-tab-text');
		}
	}
	
	if (get_option('messages-tab-arrange') == true){
		$bp->bp_nav['messages']['position'] = get_option('messages-tab');
		
		if (get_option('messages-tab-text') == true){
		$bp->bp_nav['messages']['name'] = get_option('messages-tab-text');
		}
	}
	
	if (get_option('groups-tab-arrange') == true){
		$bp->bp_nav['groups']['position'] = get_option('groups-tab');
		
		if (get_option('groups-tab-text') == true){
		$bp->bp_nav['groups']['name'] = get_option('groups-tab-text');
		}
	}
	
	if (get_option('friends-tab-arrange') == true){
		$bp->bp_nav['friends']['position'] = get_option('friends-tab');
		
		if (get_option('friends-tab-text') == true){
		$bp->bp_nav['friends']['name'] = get_option('friends-tab-text');
		}
	}
	
	if (get_option('settings-tab-arrange') == true){
		$bp->bp_nav['settings']['position'] = get_option('settings-tab');
		
		if (get_option('settings-tab-text') == true){
		$bp->bp_nav['settings']['name'] = get_option('settings-tab-text');
		}
	}
	
	if (get_option('forums-tab-arrange') == true){
		$bp->bp_nav['forum']['position'] = get_option('forums-tab');
		
		if (get_option('forums-tab-text') == true){
		$bp->bp_nav['forum']['name'] = get_option('forums-tab-text');
		}
	}
}
add_action( 'bp_init', 'bpse_change_profile_tab_order', 999 );


// display username in member directory
if (get_option('direct-username')==1){
	function bpse_member_username() {
		global $members_template;
		return $members_template->member->user_login;
	}
	add_filter('bp_member_name','bpse_member_username');
}

?>