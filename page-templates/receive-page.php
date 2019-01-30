<?php
/***
  * Template Name: Receive Page
  */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="receive-page">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="cell small-12" class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" class="open-grants-highlight">

				<div class="grid-x">
<?php 

// WP_Query arguments
$args = array(
	'post_type'              => array( 'austeve-grants' ),
	'post_status'            => array( 'publish' ),
);

// The Query
$grantsQuery = new WP_Query( $args );

$grantCount = $grantsQuery->post_count;

// The Loop
while ( $grantsQuery->have_posts() ) :
    $grantsQuery->the_post();
?>
					<div class="cell small-12 medium-<?php echo 12/$grantCount;?>">
<?php		
		get_template_part( 'template-parts/austeve-grants', 'archive' );
?>

					</div>
<?php
    
endwhile;
wp_reset_postdata();

?>

				</div>

			</div>

			<div class="cell small-12" class="intro">
				<?php the_field('introduction'); ?>
			</div>

			<div class="cell small-12" class="grants">

			</div>

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>