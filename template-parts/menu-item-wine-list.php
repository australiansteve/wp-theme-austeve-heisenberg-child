<?php
	#Template part for menu items
?>
<div class='menu-item wine-list'>
	<div class='grid-x grid-padding-x'>
		<div class="cell small-12 medium-8">
			<span class='title'><?php echo get_the_title( ); ?></span> <span class="description"><?php echo get_field('description'); ?></span>
		</div>
		<div class="cell medium-1 price show-for-medium">
			<?php echo get_field('price');?>
		</div>
		<div class="cell medium-1 price show-for-medium">
			<?php echo get_field('price_2');?>
		</div>
		<div class="cell medium-2 price show-for-medium">
			<?php echo get_field('price_3');?>
		</div>
	</div>
	
</div>