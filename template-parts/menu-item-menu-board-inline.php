<?php
	#Template part for menu items
?>
<div class='menu-item'>
	<p class='title'>
		<?php echo get_the_title( ); ?> <?php if (get_field('price')): ?><span class='divider'>-</span> <span class='price'><?php echo get_field('price');?></span><?php endif; ?><?php if (get_field('description')): ?><span class='divider'>-</span> <span class='description'><?php echo get_field('description');?></span><?php endif; ?>
	</p>
</div>