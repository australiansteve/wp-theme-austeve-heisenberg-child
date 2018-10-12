<?php
get_header(); ?>

	<div class="row">

		<main class="small-12 columns">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :
					the_post();

				?>

				<!-- Cover image section -->
				<?php
				$cover_image = get_field('cover_image');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)

				if( $cover_image ):
				?>

					<div class="row cover-image-section">

						<div class="small-12 columns" style="background-image:url(<?php echo $cover_image['url']; ?>)">
					

							<div class="content text-center">
								<p><?php the_field('text');?></p>

								<a class="button" href="<?php the_field('link_url');?>"><?php the_field('link_text');?></a>
							</div>

						</div>
		
					</div>
				<?php
				endif;
				?>

			<!-- Call To Action section -->
			<div class="row call-to-action-section text-center">

				<div class="small-12 medium-6 columns" id="cta1" >
					<div class="container" style="background-image:url(<?php echo get_field('cta1_image')['url']; ?>)">
						<div class="content">
							<a class="button" href="<?php the_field('cta1_link_url');?>"><?php the_field('cta1_link_text');?></a>
						</div>
					</div>
				</div>


				<div class="small-12 medium-6 columns" id="cta2">			
					<div class="container" style="background-image:url(<?php echo get_field('cta2_image')['url']; ?>)">		
						<div class="content">
							<a class="button" href="<?php the_field('cta2_link_url');?>"><?php the_field('cta2_link_text');?></a>
						</div>
					</div>
				</div>

			</div><!-- Call To Action section -->



			<!-- Content section -->
			<div class="row content-section text-center">

				<div class="small-12 columns">

					<?php

					the_content();

					?>

				</div>

			</div>

			<?php

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
