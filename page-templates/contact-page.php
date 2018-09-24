<?php
/**
 * Template Name: Contact page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="grid-x grid-padding-x align-middle" id="contact-page">
	
		<main class="cell small-12 medium-8">

			<div class="grid-x">
			
				<div class="cell small-12">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; endif; ?>
					
				</div>

			</div>
		
		</main>

		<aside class="cell small-12 medium-4">

			<?php the_field('sidebar_text'); ?>

		</aside>

	</div>

<?php
get_footer();
