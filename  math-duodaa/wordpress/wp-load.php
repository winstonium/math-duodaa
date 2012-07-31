<?php
/**
 * Bootstrap file for setting the ABSPATH constant
 * and loading the wp-config.php file. The wp-config.php
 * file will then load the wp-settings.php file, which
 * will then set up the WordPress environment.
 *
 * If the wp-config.php file is not found then an error
 * will be displayed asking the visitor to set up the
 * wp-config.php file.
 *
 * Will also search for wp-config.php in WordPress' parent
 * directory to allow the WordPress directory to remain
 * untouched.
 *
 * @internal This file must be parsable by PHP4.
 *
 * @package WordPress
 */

/** Define ABSPATH as this file's directory */
define( 'ABSPATH', dirname(__FILE__) . '/' );

error_reporting( E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING | E_RECOVERABLE_ERROR );

if ( file_exists( ABSPATH . 'wp-config.php') ) {

	/** The config file resides in ABSPATH */
	require_once( ABSPATH . 'wp-config.php' );

} elseif ( file_exists( dirname(ABSPATH) . '/wp-config.php' ) && ! file_exists( dirname(ABSPATH) . '/wp-settings.php' ) ) {

	/** The config file resides one level above ABSPATH but is not part of another install */
	require_once( dirname(ABSPATH) . '/wp-config.php' );

} else {

	// A config file doesn't exist

	// Set a path for the link to the installer
	if ( strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false )
		$path = 'setup-config.php';
	else
		$path = 'wp-admin/setup-config.php';

	define( 'WPINC', 'wp-includes' );
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
	require_once( ABSPATH . WPINC . '/load.php' );
	require_once( ABSPATH . WPINC . '/version.php' );

	wp_load_translations_early();
	wp_check_php_mysql_versions();

	// Die with an error message
	$die  = __( "There doesn't seem to be a <code>wp-config.php</code> file. I need this before we can get started." ) . '</p>';
	$die .= '<p>' . __( "Need more help? <a href='http://codex.wordpress.org/Editing_wp-config.php'>We got it</a>." ) . '</p>';
	$die .= '<p>' . __( "You can create a <code>wp-config.php</code> file through a web interface, but this doesn't work for all server setups. The safest way is to manually create the file." ) . '</p>';
	$die .= '<p><a href="' . $path . '" class="button">' . __( "Create a Configuration File" ) . '</a>';

	wp_die( $die, __( 'WordPress &rsaquo; Error' ) );
}

/**如果没有登录，就跳回首页 **/
 	
//if(!is_user_logged_in()){wp_redirect('http://'.$_SERVER['HTTP_HOST']);exit;}

	if(true)
	{
	//添加整合Question2Answer的引用
		
	require_once $_SERVER['DOCUMENT_ROOT'].'/qa-include/qa-base.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/qa-include/qa-app-users.php';
	
	if(!qa_is_logged_in())
	{
	wp_redirect('http://'.$_SERVER['HTTP_HOST'].'?qa=login&to=wordpress');	
	exit;
	}
	
	elseif(!is_user_logged_in())
	{   
		$useremail=qa_get_logged_in_email();
		$userhandle=qa_get_logged_in_handle();
		//echo '<script>alert("'.$useremail.'");</script>';
		

		if(email_exists($useremail))
	    {
	    	$qa_user = get_user_by('email', $useremail);
	    	wp_set_auth_cookie($qa_user->ID, true, false);
	        do_action('wp_login', $qa_user->user_login, $qa_user);
	        
	        echo '<script>window.location.reload(); </script>';
	        exit;
	    	//var_dump($qa_user);
	    	//wp_set_current_user(null,$userhandle);
	        //echo '<script>alert("'.is_user_logged_in().'0");</script>';
	    }
	    else 
	    {   
	    	//wp_generate_password(12,false);
	    	wp_create_user($userhandle,wp_generate_password(12,false)  ,$useremail);
	        
	    	$qa_user = get_user_by('email', $useremail);
	    	wp_set_auth_cookie($qa_user->ID, true, false);
	        do_action('wp_login', $qa_user->user_login, $qa_user);
	        
	        echo '<script>window.location.reload(); </script>';
	        exit;
	    	//wp_set_current_user(null,$userhandle);
	        //echo '<script>alert("'.$useremail.'1");</script>';
	    }
	
	}
	else 
	{
		wp_get_current_user();
		if(qa_get_logged_in_email()!=$current_user->user_email)
		{
		echo '空间激活错误。';
		exit;
		};
		//wp_redirect('http://'.$_SERVER['HTTP_HOST'].'?qa=login&to=wordpress');	
	    //exit;
	}
	}