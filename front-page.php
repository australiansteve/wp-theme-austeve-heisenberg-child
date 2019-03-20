<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		$image = get_field('cover_photo');

		if( !empty($image) ): ?>

			<div class="grid-x grid-margin-x" id="cover-photo">

				<div class="cell">

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				</div>

			</div>

		<?php endif; ?>

	<div class="grid-x">

		<div class="cell" id="page-content">
			<?php the_content(); ?>
		</div>

	</div>

	<div class="grid-x">
		<div class="cell small-12">
			<h2 class="title featured-funds">Featured Funds</h2>
		</div>	
	</div>

	<div class="grid-x" id="featured-funds">

<?php
$featuredFundsArgs = array(
	'post_type'				=> array( 'austeve-funds' ),
	'post_status'           => array( 'publish' ),
	'tax_query'				=> array(
		'relation' => 'AND',
		array(
			'taxonomy'         => 'austeve-funds-category',
			'terms'            => 'featured',
			'field'            => 'slug',
			'operator'         => 'IN',
			'include_children' => false,
		),
	),
	'posts_per_page'		=> 2
);
//error_log(print_r($featuredFundsArgs, true));

// The Query
$featuredFundsQuery = new WP_Query( $featuredFundsArgs );
if ( $featuredFundsQuery->have_posts() ) :
	while ( $featuredFundsQuery->have_posts() ) : 
		$featuredFundsQuery->the_post();
		get_template_part( 'template-parts/austeve-funds', 'featured' );
	endwhile; 
endif;
wp_reset_postdata();
?>			
	</div>

<?php
	$bgColor = get_field('featured_post_background_color', 'option');
	if(!$bgColor):
		$bgColor = '#7fb955';
	endif;
	?>
	<div class="grid-x align-middle" id="featured-post" style="background-color:<?php echo $bgColor;?>">
<?php

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
	while ( $featuredFPostsQuery->have_posts() ) : 
		$featuredFPostsQuery->the_post();
		get_template_part( 'template-parts/post', 'featured' );
	endwhile; 
endif;
wp_reset_postdata();
?>	
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
