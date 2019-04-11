<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();
?>

	<div class="grid-x">

		<div class="cell" id="page-content">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="grid-x">
		<div class="cell small-12">
			<h2 class="title featured-funds">Featured Funds</h2>

			<?php get_template_part( 'template-parts/austeve-funds', 'featured-snippet' ); ?>

		</div>	
	</div>

<?php
	$bgColor = get_field('featured_post_background_color', 'option');
	if(!$bgColor):
		$bgColor = '#7fb955';
	endif;

	$featuredPostsArgs = array(
		'post_type'				=> array( 'post' ),
		'post_status'           => array( 'publish' ),
		'tax_query'				=> array(
			'relation' => 'AND',
			array(
				'taxonomy'         => 'category',
				'terms'            => 'featured',
				'field'            => 'slug',
				'operator'         => 'IN',
				'include_children' => false,
			),
		),
		'posts_per_page'		=> 1
	);

	// The Query
	$featuredFPostsQuery = new WP_Query( $featuredPostsArgs );
	if ( $featuredFPostsQuery->have_posts() ) :
?>
	<h2 class="title featured-post">Featured Story</h2>	
	<div class="grid-x align-middle" id="featured-post" style="background-color:<?php echo $bgColor;?>">
<?php
		while ( $featuredFPostsQuery->have_posts() ) : 
			$featuredFPostsQuery->the_post();
			get_template_part( 'template-parts/post', 'featured' );
		endwhile; 
?>
	</div>
<?php
	endif;
	wp_reset_postdata();
	?>	

	<div class="grid-x" id="more-stories">
		<div class="cell">
			<div class="action">		
				<a class="button" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php the_field('more_stories_button_text')?></a>
			</div>
		</div>
	</div>

	<div class="grid-x" id="what-is-cf">
		<div class="cell small-12">
			<h2 class="title">What is a Community Foundation?</h2>

<?php $image = get_field('what_is_cf_image');

if( !empty($image) ): ?>

	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

<?php endif; ?>

		</div>
	</div>

<?php

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>


<?php
get_footer();
