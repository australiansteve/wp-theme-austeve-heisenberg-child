<?php
/**
 * Template Name: About page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="row">
	
		<div class="small-12 columns austeve-about-header-image text-center">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large-banner'); ?>
				<img src="<?php echo $image[0];?>" width="1000px" height="600px"/>
			<?php endif; ?>
			
		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-about-title">

			<?php echo the_title('<h1>', '</h1>') ?>
			
		</div>

	</div>

	<div class="row">

		<main class="small-12 columns austeve-teammembers">
			<?php
			
			// WP_Query arguments
			$args = array(
				'post_type'              => array( 'austeve-team' ),
				'post_status'            => array( 'publish' ),
			);

			// The Query
			$teamMemberQuery = new WP_Query( $args );

			// The Loop
			if ( have_posts() ) :
				while ( $teamMemberQuery->have_posts() ) :
				    $teamMemberQuery->the_post();
				    
				    get_template_part( 'template-parts/team-member' );

				endwhile;	
			else :

				echo esc_html( 'Sorry, no posts' );

			endif; //have_posts

			?>

		</main>

	</div>

<?php
get_footer();
