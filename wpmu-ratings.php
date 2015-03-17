<?php
/*
Plugin Name: WPMU Ratings
Description: Plugin to add rating functionality for all sub sites.
Author: Saurabh Dixit
Author URI: http://saurabhsirdixit.com
Version: 1.0.0
*/

defined( 'ABSPATH' ) OR exit;

include 'admin-ratings.php';
include 'rating-form.php';
include 'wpmu-rating-db.php';
include 'wpmu-rating-functions.php';

// run install scripts upon plugin activation
if ( function_exists('register_activation_hook') )
	register_activation_hook(   __FILE__, array( 'WPMU_Rating_Table_Class', 'istall_wpmu_table' ) );

if ( function_exists('register_deactivation_hook') )
	register_deactivation_hook( __FILE__, array( 'WPMU_Rating_Table_Class', 'delete_wpmu_table' ) );

if ( function_exists('register_uninstall_hook') )
	register_uninstall_hook(    __FILE__, array( 'WPMU_Rating_Table_Class', 'delete_wpmu_table' ) );

add_action( 'plugins_loaded', array( 'WPMU_Rating_Table_Class', 'init' ) );


// action function for hook
function wp_ratings() {

	// Add a new top-level menu (ill-advised):
	add_menu_page( 
		__('Ratings','ratings'), 
		__('Ratings','ratings'), 
			'manage_options', 'ratings', 
			'ratings', '', 30
	);
}
// Hook for adding admin menus
add_action('admin_menu', 'wp_ratings');




add_action( 'wp_print_scripts ', 'add_lates_jquery' );


// Register the js script for a plugin: 
add_action( 'wp_enqueue_scripts', 'wp_ratings_scripts' );



//Registera the stylesheet for a plugin.
add_action('admin_print_styles', 'add_admin_rating_styles');
	
	
// Register the js script for a plugin: 
add_action( 'admin_init', 'add_admin_rating_script' );