<?php
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
	
	if( !empty($large_image_url[0]) ): ?>

		<img src="<?php echo $large_image_url[0]; ?>"/>

<?php endif; ?>