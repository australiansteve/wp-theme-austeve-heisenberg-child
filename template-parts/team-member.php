<?php
	#Template part for team members
?>

<div class="row team-member">

	<div class="small-12 medium-6 large-4 columns">
	</div>

	<div class="small-12 medium-6 large-8 columns text-center">

		<h2 class='title'>
			<?php echo get_the_title( ); ?>
		</h2>

		<p class='description'>
			<?php echo get_field('description'); ?>
		</p>

	</div>

</div>