<?php
function ratings(){
	global $blog_id;
	$blg_id = $blog_id;
	global $wpdb;

	switch_to_blog( 1 );
		$ratings_arr = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'wpmu_ratings WHERE blog_id = '.$blg_id.' ORDER BY ID DESC' );
		$table = $wpdb->prefix . "wpmu_ratings";
	restore_current_blog();
	if ( isset ($_GET['a']) && isset($_GET['id']) ) {
		$approve = $_GET['a'];
		$id = $_GET['id'];
		if ( $approve == 'y') {
			$re_status = 'approve';
		} else {
			$re_status = 'pending';
		}
		$data = array();
		$data['status'] 		= $re_status;
		$result_update = $wpdb->update( $table, $data, array( 'ID' => $id ),array('%s'), array('%d') );
		if ( false !== $result_update ){
			wp_redirect( admin_url('?page=ratings'),301 );
		}
	}


	?>
	<div class='wrap'>
		<h2>Ratings</h2>
		<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Author</th>
                <th>Rating</th>
                <th>Rating Star</th>
                <th>Action</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                 <th>Author</th>
                <th>Rating</th>
                <th>Rating Star</th>
                <th>Action</th>
            </tr>
        </tfoot>
 
        <tbody>
        	<?php 
				foreach ( $ratings_arr as $ratings ) {
				?>
					<tr class="rating-tr status-<?php echo $ratings->status;?>" id="rating-<?php echo $ratings->ID;?>">
						<td class="author column-author">
							<strong><?php echo get_avatar( $ratings->email, '32');?> <?php echo $ratings->name;?></strong>
							<br>
							<a href="mailto:<?php echo $ratings->email;?>"><?php echo $ratings->email;?></a><br>
						</td>
						<td class="comment column-comment">
							<div class="submitted-on">Submitted on 
								<a href="<?php echo site_url();?>/#<?php echo 'rating-'.$ratings->ID;?>"><?php echo $ratings->rating_date;?></a>
							</div>
							<p><?php echo $ratings->review_message;?></p>
						</td>
						<td><?php echo $ratings->rating;?></td>
						<td>
							<?php if ( $ratings->status == 'pending' ) { ?>
								<div class = 'approve_rating'><a href = '?page=ratings&a=y&id=<?php echo $ratings->ID;?>'>Approve</a></div>
							<?php } else { ?>
								<div class = 'unapprove_rating'><a href = '?page=ratings&a=n&id=<?php echo $ratings->ID;?>'>Unapprove</a></div>
							<?php } ?>
						</td>
					</tr>
				<?php 
				} 
				?>
        </tbody>
    </table>
    <?php /*
		<table class="widefat fixed ratings">
			<thead>
				<tr>
					<th style="" class="manage-column column-cb check-column" id="cb" scope="col">
						<label for="cb-select-all-1" class="screen-reader-text">Select All</label>
						<input type="checkbox" id="cb-select-all-1">
					</th>
					<th style="" class="manage-column column-author sortable desc" id="author_reviews" scope="col">
						<span>Author</span>
					</th>
					<th style="" class="manage-column column-comment" id="reviews" scope="col">Rating</th>
				</tr>
			</thead>

			<tbody data-wp-lists="list:comment" id="the-comment-list">
				<?php 
				foreach ( $ratings_arr as $ratings ) {
				?>
					<tr class="comment even thread-even depth-1 <?php echo $ratings->status;?>" id="rating-<?php echo $ratings->ID;?>">
						<th class="check-column" scope="row">
							<label class="screen-reader-text">Select rating</label>
							<input type="checkbox" value="<?php echo $ratings->ID;?>" name="delete_ratings[]" id="cb-select-<?php echo $ratings->ID;?>">
						</th>
						<td class="author column-author">
							<strong><?php echo get_avatar( $ratings->email, '32');?> <?php echo $ratings->name;?></strong>
							<br>
							<a href="mailto:<?php echo $ratings->email;?>"><?php echo $ratings->email;?></a><br>
						</td>
						<td class="comment column-comment">
							<div class="comment-author">
								<strong><?php echo get_avatar( $ratings->email, '32');?> <?php echo $ratings->name;?></strong><br>
								<a href="mailto:<?php echo $ratings->email;?>"><?php echo $ratings->email;?></a><br>
							</div>
							<div class="submitted-on">Submitted on 
								<a href="<?php echo site_url();?>/#<?php echo 'rating-'.$ratings->ID;?>"><?php echo $ratings->rating_date;?></a>
							</div>
							<p><?php echo $ratings->review_message;?></p>
						</td>
					</tr>
				<?php 
				} 
				?>
			</tbody>
		</table>
		*/?>

	</div>
	<?php	
}
?>