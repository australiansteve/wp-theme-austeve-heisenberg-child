<?php
	#Template part for menu items
?>
<div class='menu-item'>
	<h1 class='title'>
		<?php echo get_the_title( ); ?> <span class='divider'>-</span> <span class='price'><?php echo get_field('price');?></span>
	</h1>

	<p class='description'>
		<?php echo get_field('description'); ?>
	</p>
</div>