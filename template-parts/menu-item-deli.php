<?php
	#Template part for menu items
?>
<div class='menu-item deli'>

	<div class="grid-x">
		<div class="cell medium-6">
			<p class='title'>
				<?php echo get_the_title( ); ?> 
			</p>
		</div>
		<div class="cell small-6 medium-3">
			<p class='price'>
				<?php echo get_field('price_1');?> 
			</p>
		</div>
		<div class="cell small-6 medium-3">
			<p class='price'>
				<?php echo get_field('price_2'); ?> 
			</p>
		</div>
	</div>

</div>