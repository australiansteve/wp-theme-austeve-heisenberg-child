<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell medium-8 austeve-event">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', 'event-header' );

					the_title( '<h1>Event: ', '</h1>' );

					get_template_part( 'template-parts/content', 'event-before-content' );

					the_content();

					get_template_part( 'template-parts/content', 'event-after-content' );

				endwhile;

				the_posts_navigation();

			else :

				echo esc_html( 'Sorry, the event could not be found' );

			endif; ?>

		</main>

		<aside class="cell medium-4">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php
get_footer();
