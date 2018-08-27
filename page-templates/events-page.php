<?php
/**
 * Template Name: Events page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="row">
	
		<div class="small-12 columns austeve-events-header-image text-center">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large-banner'); ?>
				<img src="<?php echo $image[0];?>" width="1000px" height="600px"/>
			<?php endif; ?>
			
		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-events-title">

			<?php echo the_title('<h1>', '</h1>') ?>
			
		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-events-about text-center">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
			
		</div>

	</div>

	<div class="row">

		<main class="small-12 columns austeve-events">
			<?php
			
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'post' ),
				'post_status'            => array( 'publish' ),
				'tax_query' => array( 
			        array(
			            'taxonomy' => 'category', // Taxonomy, in my case I need default post categories
			            'field'    => 'slug',
			            'terms'    => 'events', // Your category slug (I have a category 'events')
			        )),
			);

			// The Query
			$eventQuery = new WP_Query( $args );

			// The Loop
			if ( have_posts() ) :
				while ( $eventQuery->have_posts() ) :
				    $eventQuery->the_post();
				    
				    get_template_part( 'template-parts/event' );

				endwhile;	
			else :

				echo esc_html( 'Sorry, no posts' );

			endif; //have_posts

			?>

		</main>

	</div>

<?php
get_footer();
