<?php
/**
 * Template Name: Menu page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="row">

		<div class="small-12 columns austeve-menupage-sub-menu text-center">

			<ul class="dropdown menu" data-dropdown-menu>

				<li><a href="<?php echo home_url('main-course'); ?>">Main Courses</a></li>
				<li><a href="<?php echo home_url('starters'); ?>">Starters</a></li>
				<li><a href="<?php echo home_url('desserts'); ?>">Desserts</a></li>
				<li><a href="<?php echo home_url('cocktails'); ?>">Cocktails</a></li>
				<li><a href="<?php echo home_url('beer-wine'); ?>">Beer + Wine</a></li>

			</ul>

		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-menupage-header-image text-center">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
				<img src="<?php echo $image[0];?>" width="100%" height="100%"/>
			<?php endif; ?>
			
		</div>

	</div>

	<div class="row">

		<main class="small-12 columns austeve-menuitems">
			<?php
			$courseId = get_field('menu_course');
			if ($courseId) :
			
				// WP_Query arguments
				$args = array(
					'post_type'              => array( 'austeve-menuitems' ),
					'post_status'            => array( 'publish' ),
					'tax_query'				=> array(
						'relation' => 'AND',
						array(
							'taxonomy'         => 'menuitem-course',
							'terms'            => $courseId,
							'field'            => 'term_id',
							'operator'         => 'IN',
							'include_children' => true,
						)
					),
				);

				// The Query
				$menuItemQuery = new WP_Query( $args );

				// The Loop
				if ( have_posts() ) :
					while ( $menuItemQuery->have_posts() ) :
					    $menuItemQuery->the_post();
					    
					    get_template_part( 'template-parts/menu-item' );

					endwhile;	
				else :

					echo esc_html( 'Sorry, no posts' );

				endif; //have_posts

			endif; //$courseId

			?>

		</main>

	</div>

<?php
get_footer();
