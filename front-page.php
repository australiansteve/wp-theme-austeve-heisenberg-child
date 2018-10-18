<?php
get_header(); ?>

	<div class="row">

		<main class="small-12 columns">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :
					the_post();

				?>

				<h1 class="hide-for-medium text-center">Welcome to East Coast Bistro</h1>

				<!-- Cover image section -->
				<?php
				$cover_image = get_field('cover_image');
				
				if( $cover_image ):
				?>

					<div class="row cover-image-section">

						<div class="small-12 columns">

							<div class="container flex-image" data-flex-ratio="0.67" style="background-image:url(<?php echo $cover_image['url']; ?>)">				

								<div class="content top text-center show-for-medium">
									<h1>Welcome to East Coast Bistro</h1>
								</div>

								<div class="content bottom text-center">
									<a class="button" href="<?php the_field('link_url');?>"><?php the_field('link_text');?></a>
								</div>

							</div>

						</div>
		
						<div class="small-12 columns">
							<div class="intro-content text-center">
								<p><?php the_field('text');?></p>
								<img class="content-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/_dist/img/ECB-logo-no-title.png" alt-text="East Coast Bistro"/>
								
							</div>
						</div>

					</div>
				<?php
				endif;
				?>

			<!-- Call To Action section -->
			<div class="row call-to-action-section text-center">

				<div class="small-12 medium-6 columns align-middle" id="cta1" >
					<div class="container flex-image" data-flex-ratio="1" style="background-image:url(<?php echo get_field('cta1_image')['url']; ?>)">
						<?php if (get_field('cta1_link_text')) : ?>
						<div class="content bottom">
							<a class="button" href="<?php the_field('cta1_link_url');?>"><?php the_field('cta1_link_text');?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>


				<div class="small-12 medium-6 columns align-middle" id="cta2">			
					<div class="container flex-image" data-flex-ratio="1" style="background-image:url(<?php echo get_field('cta2_image')['url']; ?>)">		
						<?php if (get_field('cta2_link_text')) : ?>
						<div class="content bottom">
							<a class="button" href="<?php the_field('cta2_link_url');?>"><?php the_field('cta2_link_text');?></a>
						</div>
						<?php endif; ?>
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
