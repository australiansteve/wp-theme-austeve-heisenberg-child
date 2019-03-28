<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell small-12">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					the_title( '<h1>', '</h1>' );

					the_content();

					//If parent page is the 'Give' page we want to display the common Give info like the featured funds and links to other Give sub pages
					if ($post->post_parent != 0)
					{
						if (strpos(get_page_template_slug($post->post_parent), 'give-page.php') !== false)
						{
							get_template_part('template-parts/austeve-give-page', 'common');
						}
					}

				endwhile;

				the_posts_navigation();

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
