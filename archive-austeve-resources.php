<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell medium-12 resources archive">
			<?php
			if ( have_posts() ) :
			?>
			<div class="grid-x grid-padding-x small-up-2 medium-up-2 large-up-3" data-equalizer data-equalize-on="medium">

				<?php 

				while ( have_posts() ) :

					the_post();

					?>
					<div class="cell resource">
					<?php
						get_template_part( 'template-parts/content', 'resource-archive' );
					?>
					</div>
					<?php

				endwhile;

				?>
			</div>

			<?php
			else :

				echo esc_html( 'Sorry, no posts' );

			endif; ?>

		</main>

	</div>

<?php
get_footer();
