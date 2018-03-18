<?php
	$image = get_field('logo');
	$size = 'large'; // (thumbnail, medium, large, full or custom size)
	error_log("Resource Image: ".print_r($image, true));
	if( $image ): 

		$sized_image_url = wp_get_attachment_image_src( $image, $size );
		error_log(print_r($sized_image_url, true));
?>
		<div class="solid-bg">
			<img src="<?php echo $sized_image_url[0]; ?>" >
		</div>

<?php endif; ?>