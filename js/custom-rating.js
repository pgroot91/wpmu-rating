jQuery( document ).ready(function( $ ) {
	
	jQuery("#input-1").rating({
		starCaptions: {1: "Very Poor", 2: "Poor", 3: "Ok", 4: "Good", 5: "Very Good"},
		starCaptionClasses: {1: "text-danger", 2: "text-warning", 3: "text-info", 4: "text-primary", 5: "text-success"},
	});

	jQuery('#input-1').on('rating.change', function(event, value, caption) {
    	jQuery('.rating_numbers').val(value);
	});

	jQuery('#input-1').on('rating.reset', function(event) {
    	jQuery('.rating_numbers').val(0);
    	jQuery(".load").css("display","none");
    	jQuery('.error_msg').html('');
    });
 	
	if( jQuery.cookie('cookieReviews') !=  null) {
		jQuery('.div-reviews').html(jQuery.cookie('cookieReviews'));
	}

    jQuery('.submit_reviews').on('click', function(e){
		if ( jQuery( ".form_validator" ).valid() ){
			var review_name = jQuery('.review_name').val();
			var review_email = jQuery('.review_email').val();
			var blog_id  = jQuery('.rating_blog_id').val();
			var commet_reviews =  jQuery('.commet_reviews').val();
			var rating_points = jQuery('.rating_numbers').val();
			var plugin_path = jQuery(".plugin_url").val();
			if ( rating_points == '0' ) {
				jQuery('.error_msg').html('Select Rating star');
				e.preventDefault;
			} else {
				jQuery(".load").css("display","block");
				jQuery.ajax({
					type: 'POST',
					url: plugin_path,
					data: 'review_name='+review_name + '&review_email=' + review_email+ '&blog_id=' + blog_id+
							 '&rating_points=' +rating_points+'&commet_reviews=' +commet_reviews,
					success: function( data ) {
						jQuery(".load").css("display","none");
						
						if ( data != 'Opps! something went wrong. Please try again later.') {
							var CookieSet = jQuery.cookie('cookieReviews', data);
							jQuery('.div-reviews').html(data);
						} else {
							jQuery('.div-reviews .error-msg').html(data);
						}
				   }
				});
			}
		}	
	});
	
});