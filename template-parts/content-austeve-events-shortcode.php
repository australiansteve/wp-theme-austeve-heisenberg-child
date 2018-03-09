<?php get_template_part( 'template-parts/archive', get_post_type().'-before-block' ); ?>

<div class="post-block" data-post='<?php echo get_the_ID(); ?>'>
<div class="grid-y container" style="height: 20rem;">
	<div class="cell shrink title">
		<?php the_title( '<h1>', '</h1>' ); ?>
	</div>
	<div class="cell auto cell-block-container excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="cell shrink read-more">
		<a href='<?php echo get_permalink();?>' title='Read more'>Read more</a>
	</div>
</div>
</div>

<?php get_template_part( 'template-parts/archive', get_post_type().'-after-block' ); ?>