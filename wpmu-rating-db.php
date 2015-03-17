<?php 
/*
File to add required tables.
*/

class WPMU_Rating_Table_Class {
	
	protected static $instance;

    public static function init() {
        is_null( self::$instance ) AND self::$instance = new self;
        return self::$instance;
    }

    //function to install required table if don’t already exist.
	public static function istall_wpmu_table() {
	   global $wpdb;

	   $table_name = $wpdb->prefix . "wpmu_ratings"; 

	   $charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		  	`ID` int(8) NOT NULL,
	  		`blog_id` int(8) NOT NULL,
	  		`rating` float NOT NULL,
	  		`name` varchar(50) NOT NULL,
	  		`email` varchar(150) NOT NULL,
	  		`review_message` text NOT NULL,
	  		`rating_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	  		`status` varchar(50) NOT NULL
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

	}

	
	// Delete table in database

	public static function delete_wpmu_table() {

		global $wpdb;
		$table_name = $wpdb->prefix . "wpmu_ratings";

		$wpdb->query( "DROP TABLE IF EXISTS {$table_name}" );
	}

}

?>