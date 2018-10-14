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
				<img src="<?php echo $image[0];?>" width="1000px" height="600px"/>
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

				else:
					//All other menu pages are the same

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

				endif;

			endif; //$courseId

			?>

		</main>

	</div>

<?php
get_footer();
