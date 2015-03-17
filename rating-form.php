<?php
if( !function_exists( 'show_rating_form' ) ) {
	function show_rating_form( $blog_id ) {
		$result = '';
		$result .= '<div class = "div-reviews .col-md-3 .col-md-offset-3">';
		$result .= '<form class="form-group form_validator" role="search">';
		$result .= '<div class = "error-msg"></div>';
		$result .= '<input type="text" name = "review_name" class="form-control review_name required" placeholder="Name"><br/>';
		$result .= '<input type="email" name = "review_email required" class="form-control review_email required" placeholder="Email"><br/>';
		$result .= '<textarea class="form-control commet_reviews required" placeholder="Message" name = "commet_reviews"></textarea><br/>';
		$result .= '<input id="input-1" data-size="sm" class="rating" data-min="0" data-max="5" data-step="0.5"><br/>';
		$result .= '<input type = "hidden" class = "rating_numbers required" value = "0" >';
		$result .= '<input type = "hidden" class = "rating_blog_id" value = "'.$blog_id.'" >';
		$result .= '<input type="hidden" class = "plugin_url" value="'.plugins_url('ajax-submit-reviews.php', __FILE__ ).'" />';
		$result .= '<div class = "error_msg"></div>';
		$result .= '<div class = "successful_msg"></div>';
		$result .= '<div class = "load" style ="display:none;" >
                <img src = "'.plugins_url().'/wpmu-ratings/image/ajax-loader.gif" />
            </div>';
		$result .= '<input type="button" class="btn btn-red btn-default submit_reviews" value = "Submit" name = "submit_rev_btn"/>
						<button type="reset" class="btn btn-red btn-default">Reset</button><br/>';

		$result .= '</form>';
		$result .= '</div>';
		$result .= '<div class = "clear"></div>';
		return $result;
	}
}
?>