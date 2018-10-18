<?php
/**
 * Template Name: Menu page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="row">

		<div class="large-12 columns austeve-menupage-sub-menu text-center show-for-large">

			<ul class="menu">

				<li><a href="<?php echo home_url('to-start'); ?>" class="<?php if (is_page('to-start')) echo 'active'; ?>">To Start</a></li>
				<li><a href="<?php echo home_url('fresh-from-fundy'); ?>" class="<?php if (is_page('fresh-from-fundy')) echo 'active'; ?>">Fresh From Fundy</a></li>
				<li><a href="<?php echo home_url('main-course'); ?>" class="<?php if (is_page('main-course')) echo 'active'; ?>">Main Courses</a></li>				
				<li><a href="<?php echo home_url('desserts'); ?>" class="<?php if (is_page('desserts')) echo 'active'; ?>">Desserts</a></li>
				<li><a href="<?php echo home_url('cocktails'); ?>" class="<?php if (is_page('cocktails')) echo 'active'; ?>">Cocktails</a></li>
				<li><a href="<?php echo home_url('wine-beer'); ?>" class="<?php if (is_page('wine-beer')) echo 'active'; ?>">Wine + Beer</a></li>

			</ul>

		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-menupage-header-image text-center">

			<?php if (has_post_thumbnail( $post->ID ) ): ?>
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large-banner'); ?>
				<img src="<?php echo $image[0];?>" width="900px" height="600px"/>
			<?php endif; ?>
			
		</div>

	</div>

	<div class="row">
	
		<div class="small-12 columns austeve-menupage-title">

			<?php echo the_title('<h1>', '</h1>') ?>
			
		</div>

	</div>

	<div class="row hide-for-large">

		<div class="small-12 columns austeve-menupage-dropdown">

			<ul class="vertical drilldown menu" data-drilldown data-auto-height="true" data-animate-height="true" data-back-button="<li class='js-drilldown-back'><a>Close</a></li>" data-close-on-click="true">
				<li>
				    <a href="">Select Course:</a>
				    <ul class="menu vertical nested">

						<li class="<?php if (is_page('to-start')) echo 'active'; ?>"><a href="<?php echo home_url('to-start'); ?>">To Start</a></li>
						<li class="<?php if (is_page('fresh-from-fundy')) echo 'active'; ?>"><a href="<?php echo home_url('fresh-from-fundy'); ?>" class="">Fresh From Fundy</a></li>
						<li class="<?php if (is_page('main-course')) echo 'active'; ?>"><a href="<?php echo home_url('main-course'); ?>">Main Courses</a></li>				
						<li class="<?php if (is_page('desserts')) echo 'active'; ?>"><a href="<?php echo home_url('desserts'); ?>">Desserts</a></li>
						<li class="<?php if (is_page('cocktails')) echo 'active'; ?>"><a href="<?php echo home_url('cocktails'); ?>">Cocktails</a></li>
						<li class="<?php if (is_page('wine-beer')) echo 'active'; ?>"><a href="<?php echo home_url('wine-beer'); ?>">Wine + Beer</a></li>

					</ul>
				</li>
			</ul>

		</div>

	</div>

	<div class="row">

		<main class="small-12 columns austeve-menuitems">
			<?php
			$courseId = get_field('menu_course');
			if ($courseId) :
			
				if (get_term($courseId)->slug == 'wine-beer') :
					//Wine & Beer page is different					

					?>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 medium-8 wine-heading">
								<h2>Sparkling, Rose & Cider</h2>
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								5oz
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								½L
							</div>
							<div class="cell medium-2 price-heading show-for-medium">
							  	Bottle
							</div>
						</div>
						<?php
						//Sparkling, Rose & Cider
						$sparkling = get_term_by( 'slug', 'sparkling-rose-cider', 'menuitem-course' );
						austeve_display_menu_course( $sparkling->term_id, 'wine-list' );
						?>
					</div>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 medium-8 wine-heading">
								<h2>White Wine</h2>
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								5oz
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								½L
							</div>
							<div class="cell medium-2  price-heading show-for-medium">
							  	Bottle
							</div>
						</div>
						<?php
						//White Wine
						$whitewine = get_term_by( 'slug', 'white', 'menuitem-course' );
						austeve_display_menu_course( $whitewine->term_id, 'wine-list' );
						?>
					</div>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 medium-8 wine-heading">
								<h2>Red Wine</h2>
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								5oz
							</div>
							<div class="cell medium-1 price-heading show-for-medium">
								½L
							</div>
							<div class="cell medium-2  price-heading show-for-medium">
							  	Bottle
							</div>
						</div>
						<?php
						//Red Wine
						$redwine = get_term_by( 'slug', 'red', 'menuitem-course' );
						austeve_display_menu_course( $redwine->term_id, 'wine-list' );
						?>
					</div>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 wine-heading text-center">
								<h1>Beer</h1>
							</div>
						</div>
						<?php
						//Red Wine
						$beer = get_term_by( 'slug', 'beer', 'menuitem-course' );
						austeve_display_menu_course( $beer->term_id, 'wine-list' );
						?>
					</div>
				<?php

				elseif (get_term($courseId)->slug == 'cocktails') :
					//Cocktails page is different					

					?>
					<div class="wine-list-category">
						<!--Main page heading is Cocktails, so no need to display it again here -->
						<?php
						//Cocktails
						$cocktails = get_term_by( 'slug', 'cocktails', 'menuitem-course' );
						austeve_display_menu_course( $cocktails->term_id );
						?>
					</div>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 wine-heading text-center">
								<h2>Scotch, Port & Ice Wine</h2>
							</div>
							
						</div>
						<?php
						//Scotch Port & Ice Wine
						$scotch = get_term_by( 'slug', 'scotch-port-ice-wine', 'menuitem-course' );
						austeve_display_menu_course( $scotch->term_id );
						?>
					</div>
					<div class="wine-list-category">
						<div class="grid-x grid-padding-x">
							<div class="cell small-12 wine-heading text-center">
								<h2>Specialty Coffee</h2>
							</div>
							
						</div>
						<?php
						//Specialty Coffee
						$coffee = get_term_by( 'slug', 'specialty-coffee', 'menuitem-course' );
						austeve_display_menu_course( $coffee->term_id );
						?>
					</div>
				<?php
				else:
					//All other menu pages are the same	
					austeve_display_menu_course( $courseId );

				endif;

			endif; //$courseId

			?>

		</main>

	</div>

<?php

function austeve_display_menu_course($courseId, $format = null)
{
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
				'include_children' => false,
			)
		),
	);

	// The Query
	$menuItemQuery = new WP_Query( $args );

	// The Loop
	if ( have_posts() ) :
		while ( $menuItemQuery->have_posts() ) :
		    $menuItemQuery->the_post();
		    
		    get_template_part( 'template-parts/menu-item', $format );

		endwhile;	
	else :

		echo esc_html( 'Sorry, no posts' );

	endif; //have_posts
}
get_footer();
