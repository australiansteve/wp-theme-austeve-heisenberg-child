<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

				?>

					<div class="grid-x <?php echo get_post_type(); ?>">

						<div class="cell medium-4 text-right image">
							<?php get_template_part( 'template-parts/archive', get_post_type().'-image' ); ?>
						</div>

						<div class="cell medium-8 detail" id='post-<?php echo get_the_ID(); ?>'>

							<div class="grid-y container">
								<div class="cell title">
									<?php the_title( '<h2>', '</h2>' ); ?>
								</div>
								<div class="cell before-content">
									<?php get_template_part( 'template-parts/content', get_post_type().'-before-content' ); ?>
									
								</div>
								<div class="cell the-content">
									<?php the_content(); ?>
									
								</div>
								<div class="cell after-content">
									<?php get_template_part( 'template-parts/content', get_post_type().'-after-content' ); ?>
									
								</div>
							</div>

						</div>

					</div>

				<?php
				endwhile;

				the_posts_navigation();

			else :

				echo esc_html( 'Sorry, the post could not be found' );

			endif; ?>

		</main>

	</div>

<?php
get_footer();
