<?php

/* This template gets used to display the blog archive */

get_header(); ?>
	
	<div class="row">

		<main class="small-12 columns">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :
				    
					the_post();

				    ?>

						<div class="row">

							<div class="small-12 medium-6 columns">

									<?php if (has_post_thumbnail( $post->ID ) ): ?>
										<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium-square'); ?>
										<img src="<?php echo $image[0];?>" width="400px" height="400px"/>
									<?php endif; ?>

							</div>

							<div class="small-12 medium-6 columns text-center">

								<h2 class='title'>
									<?php echo get_the_title( ); ?>
								</h2>

								<p class='description'>
									<?php echo the_content(); ?>
								</p>

							</div>

						</div>

				    <?php

				endwhile;	
				
				the_posts_navigation();

			else :

				echo esc_html( 'Sorry, no posts' );

			endif; //have_posts

			?>

		</main>

	</div>

<?php
get_footer();
