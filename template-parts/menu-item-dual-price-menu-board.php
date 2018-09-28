<?php
	#Template part for menu items
?>
<div class='menu-item dual-price'>

	<p class='title'>
		<?php echo get_the_title( ); ?> <?php if (get_field('price_1')): ?><span class='divider'>-</span> <span class='price'><?php echo get_field('price_1');?></span><?php endif; ?> <?php if (get_field('price_2')): ?><span class='divider'>,</span> <span class='price'><?php echo get_field('price_2');?></span><?php endif; ?>
	</p>

	<p class='description'><?php echo get_field('description'); ?></p>

</div>