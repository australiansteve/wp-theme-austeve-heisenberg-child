<?php
	$image = get_field('cover_image');
	$size = 'large'; // (thumbnail, medium, large, full or custom size)

	if( $image ): 

		$sized_image_url = wp_get_attachment_image_src( $image, $size );
		error_log(print_r($sized_image_url, true));
?>
		<img src="<?php echo $sized_image_url[0]; ?>"/>

<?php endif; ?>