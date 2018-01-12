<?php

?>
<div class="grid-x">

	<div class="cell medium-4 logo align-self-middle" data-equalizer-watch>
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

	<div class="cell medium-8 info"> 
	<?php
		the_title( '<h2>', '</h2>' );

		the_content();

		$url = get_field('url');
		if (!empty($url))
		{
			echo "<p class='resource-website'><a href='".$url."' target='blank'>View website</a></p>";
		}
	?>
	</div>

</div>