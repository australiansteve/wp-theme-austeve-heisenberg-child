<?php
	$image = get_field('cover_image');
	$size = 'large'; // (thumbnail, medium, large, full or custom size)

	if( $image ): 

		$large_image_url = wp_get_attachment_image_src( $image, $size );
?>

	<div class="grid-x">

		<div class="cell align-middle">

			<img class="cover-image" src="<?php echo $large_image_url[0]; ?>" alt="<? echo get_the_title();?>" title="<? echo get_the_title();?>"/>

		</div>

	</div>

<?php endif; ?>

