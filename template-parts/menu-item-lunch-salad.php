<?php
	#Template part for menu items
?>
<div class='menu-item lunch-salad'>

	<p class='title'>
		<?php echo get_the_title( ); ?>
	</p>

	<p class='description'>
		<?php echo get_field('description'); ?>
	</p>
	<p class='price'>
		<?php echo get_field('price_1');?> 
	</p>
	<p class='price'>
		<?php echo get_field('price_2'); ?> 
	</p>	
	<p class='price'>
		<?php echo get_field('price_3'); ?> 
	</p>	

</div>