<?php

$image = get_field('cover_image');

if( !empty($image) ): ?>

	<div class="grid-x">

		<div class="cell align-middle">

			<img class="cover-image" src="<?php echo $image['url']; ?>" alt="<? echo get_the_title();?>" title="<? echo get_the_title();?>"/>

		</div>

	</div>

<?php endif; ?>

