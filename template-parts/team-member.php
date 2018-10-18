<?php
	#Template part for team members
?>

<div class="row team-member">

	<div class="small-12 medium-6 large-4 columns">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium-portrait'); ?>
				<img src="<?php echo $image[0];?>" width="400px" height="600px"/>
			<?php endif; ?>

	</div>

	<div class="small-12 medium-6 large-8 columns text-center">

		<h2 class='title medium-text-left'>
			<?php echo get_the_title( ); ?>
		</h2>

		<p class='description medium-text-left'>
			<?php echo get_field('description'); ?>
		</p>

	</div>

</div>