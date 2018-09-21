<?php
get_header(); ?>

	<div class="row">

		<main class="small-12 columns">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h1>', '</h1>' );

					the_content();

				endwhile;

				the_posts_navigation();

			else :

				echo esc_html( 'Sorry, no posts' );

			endif; ?>

		</main>

	</div>

<?php
get_footer();
