<?php
// page to delete similar product when user will click on the delete button from similar product page.
require_once '../../../wp-load.php';
global $wpdb;
$review_name    		= isset($_POST['review_name'])?$_POST['review_name']:'1';
$review_email 		  	= isset($_POST['review_email'])?$_POST['review_email']:'';
$blog_id 		  		= isset($_POST['blog_id'])?$_POST['blog_id']:''; 
$rating_points 		  	= isset($_POST['rating_points'])?$_POST['rating_points']:'';
$commet_reviews 		= isset($_POST['commet_reviews'])?$_POST['commet_reviews']:'';
switch_to_blog( 1 );
$table_name = $wpdb->prefix . "wpmu_ratings";
restore_current_blog();
$data = array();
$data['ID'] 			= $wpdb->insert_id;
$data['blog_id'] 		= $blog_id;
$data['email'] 			= $review_email;
$data['name'] 			= $review_name;
$data['rating'] 		= $rating_points;
$data['review_message'] = $commet_reviews;
$data['rating_date']	= date('Y-m-d H:i:s');
$data['status'] 		= 'pending';

$format = array( 
		'%d', 
		'%d',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
		'%s',
	);
$result = $wpdb->insert( $table_name, $data, $format );
$avatar = get_avatar( $review_email, '75');
$response = '';
if ( $result == 1 ) {
	$response .= '<h3><span class="label label-success">Succefully updated. Your review is awaiting moderation</span></h3>';
	$response .=  '<br/>';
	$response .= '<div class = "col-sm-12">';
	$response .= '<div class = "col-sm-2">';
	$response .=  $avatar;
	$response .= '</div>';
	$response .= '<div class = "col-sm-10">';
	$response .=  $review_name.'('.$review_email.')';
	$response .=  '<br/>';
	$response .=  $rating_points.' Star';
	$response .=  '<br/>';
	$response .=  $commet_reviews;
	$response .= '</div>';
	$response .= '</div>';
	echo $response;
} else {
	echo 'Opps! something went wrong. Please try again later.';
}
?>