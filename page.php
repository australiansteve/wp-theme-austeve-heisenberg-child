<?php
get_header(); ?>

	<div class="grid-x">

		<main class="medium-12 cell page">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h1>', '</h1>' );

					if (has_category('resources'))
						get_template_part( 'template-parts/content', 'page-resource-links' );

					the_content();

				endwhile;

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			else :

				echo esc_html( 'Sorry, no posts' );

			endif; ?>

		</main>

	</div>

<?php
get_footer();
