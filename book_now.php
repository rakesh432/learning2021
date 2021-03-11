<?php
/*
Plugin Name: Book Now
Plugin URI: http://virasatsolutions.com/
description: Make payment in parallel accounts.
Version: 1.0
Author: Virasat Solutions
Author URI: http://virasatsolutions.com/
License: http://virasatsolutions.com/
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
 
// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'classes/*.php' ) as $file ) {
    include_once $file;
}
 
add_action( 'plugins_loaded', 'vs_custom_data' );
/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function vs_custom_data() {
    $plugin = new Submenu( new Submenu_Page() );
    $plugin->init();
}


/* Function to create the DB */
function db_custom_data_install()
{
   	global $wpdb;
	
	$db_name = $wpdb->prefix.'pay';
	if($wpdb->get_var("show tables LIKE '$db_name'") != $db_name) 
	{
		$sql = "CREATE TABLE $db_name (
				  ID int(11) NOT NULL AUTO_INCREMENT,
				  booking_user_id int(11) NOT NULL,
				  booked_user_id int(11) NOT NULL,
				  booked_user_email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  date_from varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  date_to varchar(255) COLLATE utf8_unicode_ci NOT NULL,
				  amount int(11) NOT NULL,
				  request_status int(11) NOT NULL,
				  payment_Status int(11) NOT NULL,
				  PRIMARY KEY id(id)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
 
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
	
	

	
}
register_activation_hook(__FILE__,'db_custom_data_install');