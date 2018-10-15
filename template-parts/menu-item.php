<?php
	#Template part for menu items
?>
<div class='menu-item'>
	<div class='grid-x grid-padding-x'>
		<div class="cell small-9">
			<h2 class='title'>
				<?php echo get_the_title( ); ?>
			</h2>
		</div>
		<div class="cell small-3 price">
			<p class='price'>
				<?php echo get_field('price');?>
			</p>
		</div>
	</div>
	<div class='grid-x grid-padding-x'>
		<div class="cell small-10">
			<p class='description'>
				<?php echo get_field('description'); ?>
			</p>
		</div>
	</div>
</div>