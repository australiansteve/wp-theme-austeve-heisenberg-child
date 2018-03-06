<?php
	$image = get_field('cover_image');
	$size = 'large'; // (thumbnail, medium, large, full or custom size)

	if( $image ): 

		$large_image_url = wp_get_attachment_image_src( $image, $size );
?>
		<div class="post-block-background" style="background-image: url(<?php echo $large_image_url[0]; ?>);">

<?php endif; ?>