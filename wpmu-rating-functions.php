<?php
// callback functions

function add_lates_jquery() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-2.0.3.min.js', false );
	wp_enqueue_script( 'jquery' );
}

function wp_ratings_scripts() {

	wp_register_style('wpmu-bootstrap', plugins_url( 'css/bootstrap.min.css', __FILE__ ), false );
	wp_enqueue_style('wpmu-bootstrap');

	wp_register_style('wpmu-bootstrap-rating', plugins_url( 'css/star-rating.min.css', __FILE__ ) );
	wp_enqueue_style('wpmu-bootstrap-rating');

	wp_register_style('wpmu-rating', plugins_url( 'css/wpmu-rating.css', __FILE__ ) );
	wp_enqueue_style('wpmu-rating');

	wp_register_script( 'wpmu-script-validator', 'http://jqueryvalidation.org/files/dist/jquery.validate.min.js' );
	wp_enqueue_script( 'wpmu-script-validator' );

	wp_register_script( 'jquery-cookie', plugins_url( 'js/jquery.cookie.js', __FILE__ ) );
	wp_enqueue_script( 'jquery-cookie' );

	wp_register_script( 'wpmu-script-validator-tooltip', plugins_url( 'js/jquery-validation-bootstrap-tooltip.js', __FILE__ ) );
	wp_enqueue_script( 'wpmu-script-validator-tooltip' );

	//load js files in footer
	wp_enqueue_script( 'wp-bootstrap-name', plugins_url( 'js/bootstrap.min.js', __FILE__ ), array(), '1.0.0', true );
	wp_enqueue_script( 'wp-bootstrap-rating',  plugins_url( 'js/star-rating.min.js', __FILE__ ), array('bootstrap-name'), '1.0.0', true );

	wp_enqueue_script( 'wp-custom-rating-name', plugins_url( 'js/custom-rating.js', __FILE__ ), array(), '1.0.0', true );
}

function add_admin_rating_styles() {
	wp_register_style('rating-admin-styles', 'http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css' );
	wp_enqueue_style('rating-admin-styles');
	wp_register_style('wpmu-admin-rating', plugins_url( 'css/wpmu-admin-rating.css', __FILE__ ) );
	wp_enqueue_style('wpmu-admin-rating');
}

function add_admin_rating_script() {   
	wp_register_script( 'datagrid-script', 'http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js' );
	wp_enqueue_script( 'datagrid-script' );
	wp_register_script( 'custom-script-rating', plugins_url( 'js/wpmu-admin-rating.js', __FILE__ ) );
	wp_enqueue_script( 'custom-script-rating' );
}

?>