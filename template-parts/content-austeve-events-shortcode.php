<?php get_template_part( 'template-parts/archive', get_post_type().'-before-block' ); ?>

<div class="post-block" data-post='<?php echo get_the_ID(); ?>'>
<div class="grid-y container" style="height: 20rem;">
	<div class="cell shrink title">
		<h3><a href="<?php the_permalink();?>"><?php echo get_post()->post_title; ?></a></h3>
	</div>
	<div class="cell auto cell-block-container excerpt">
		<div class='date'><?php echo get_field('event_date'); ?></div>
		<?php the_excerpt(); ?>
	</div>
	<div class="cell shrink read-more">
		<?php get_template_part( 'template-parts/content', get_post_type().'-after-content' ); ?>
		<a class="read-more button" href="<?php the_permalink();?>">Read more</a>
	</div>
</div>
</div>

<?php get_template_part( 'template-parts/archive', get_post_type().'-after-block' ); ?>