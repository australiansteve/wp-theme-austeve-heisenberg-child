<?php

?>
<div class="grid-x">

	<div class="cell medium-4 logo">
		<?php
		$image = get_field('logo');

		// vars
		$url = $image['url'];
		$title = $image['title'];
		$alt = $image['alt'];

		// medium
		$size = 'medium';
		$image_url = $image['sizes'][ $size ];
		$width = $image['sizes'][ $size . '-width' ];
		$height = $image['sizes'][ $size . '-height' ];

		if (!empty($image)) : ?>
			
			<img src="<?php echo $image_url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />

		<?php endif; ?>
	</div>

	<div class="cell medium-8"> 
	<?php
		the_title( '<h2>', '</h2>' );

		the_content();
	?>
	</div>

</div>