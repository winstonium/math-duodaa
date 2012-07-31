<?php
/*
Plugin Name: Buddypress Extended Settings
Plugin URI: http://buddypress.org
Description: Extra configuration settings for BuddyPress Admins.
Author: modemlooper
Version: 1.1
Author URI: http://twitter.com/modemlooper
*/


function bp_extended_settings_init() {
	require( dirname( __FILE__ ) . '/includes/bp-settings.php' );
	require( dirname( __FILE__ ) . '/includes/admin.php' );
}
add_action( 'bp_include', 'bp_extended_settings_init' );

?>