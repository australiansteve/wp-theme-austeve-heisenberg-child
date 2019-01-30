<?php
?>
<div class="grid-x">
	<div class="cell small-12 grant">

		<?php the_title('<h3>', '</h3>'); ?>
		
		<div class="description">
			<?php the_field('short_description'); ?>
		</div>

		<div class="action">		
			<a class="button" href="<?php the_permalink();?>">READ MORE</a>
		</div>

	</div>
</div>
