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


<?php 

// WP_Query arguments for open applications
$today = date('Y-m-d');
error_log(print_r($today, true));
$args = array(
	'post_type'              => array( 'austeve-grants' ),
	'post_status'            => array( 'publish' ),
	'meta_query' => array(
		'relation' => 'AND',
		array(
			'key'     => 'applications_open',
			'value'   => $today,
			'compare' => '<=',
			'type'    => 'DATE',
		),
		array(
			'key'     => 'applications_close',
			'value'   => $today,
			'compare' => '>=',
			'type'    => 'DATE',
		),
	),
);
error_log(print_r($args, true));

// The Query
$grantsQuery = new WP_Query( $args );

$grantCount = $grantsQuery->post_count;

if ($grantsQuery->have_posts() ) :
?>
			<div class="cell small-12" class="open-grants-highlight">
				<p>The following grants are currently open for applications:</p>
				<ul>
<?php
	// The Loop
	while ( $grantsQuery->have_posts() ) :
	    $grantsQuery->the_post();
	    	the_title('<li>', '</li>');    
	endwhile;
?>
				</ul>
			</div>
<?php
endif;
wp_reset_postdata();

?>

			</div>

			<div class="cell small-12" class="intro">
				<?php the_field('introduction'); ?>
			</div>

			<div class="cell small-12" class="grants">

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

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>