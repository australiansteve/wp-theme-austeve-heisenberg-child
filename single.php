<?php
get_header(); ?>

	<div class="grid-x single-post">

		<main class="cell small-12">
<?php
if ( have_posts() ) :

	while ( have_posts() ) : 
		the_post();
?>
<?php
		the_title( '<h1>', '</h1>' );

		$video = get_field('post_video'); 
		if ($video) :
?>
			<div class="embed-container" data-equalizer-watch="box">
				<?php echo $video; ?>
			</div>

			<div id="single-post-content">
<?php
		endif;
		if(has_post_thumbnail()):
			the_post_thumbnail('feature-pic-size');
		endif;

		the_content();
?>
			</div>
<?php
		$bgColor = array('#bc5298', '#7fb955', '#6abfdb'); //pink, green, blue
?>
			<h2>More stories</h2>
			<div class="grid-x align-center" id="story-navigation">
<?php
			if( $prev_post = get_previous_post() ): 
?>
				<div class="cell small-12 medium-4 post-nav">
					<div class='container align-middle'>
						<div class="bg-image" style="background-image:url(<?php echo get_the_post_thumbnail_url($prev_post->ID);?>)"></div>
						<div class="bg-color" style="background-color:<?php echo $bgColor[0]; ?>"></div>
						<div class="grid-x align-center-middle content">
							<div class="cell">
<?php 
				previous_post_link( '%link',"<h3>%title</h3>" ); 
?>						
							</div>
						</div>
					</div>
				</div>
<?php
			endif; 

			if( $next_post = get_next_post() ): 
				error_log("Next post:".$next_post->ID);
?>
				<div class="cell small-12 medium-4 post-nav">
					<div class='container align-middle'>
						<div class="bg-image" style="background-image:url(<?php echo get_the_post_thumbnail_url($next_post->ID);?>)"></div>
						<div class="bg-color" style="background-color:<?php echo $bgColor[1]; ?>"></div>
						<div class="grid-x align-center-middle content">
							<div class="cell">
<?php 
				next_post_link( '%link',"<h3>%title</h3>" ); 
?>						
							</div>
						</div>
					</div>
				</div>
<?php
			endif; 
?>
				<div class="cell small-12 medium-4 post-nav">
					<div class='container align-middle'>
						<div class="bg-image" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
						<div class="bg-color" style="background-color:<?php echo $bgColor[2]; ?>"></div>
						<div class="grid-x align-center-middle content">
							<div class="cell">
								<a href="/stories"><h3><?php the_field('more_stories_button_text', get_option( 'page_on_front' ))?></h3></a>						
							</div>
						</div>
					</div>
				</div>
			</div>
<?php

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>

		</main>

	</div>

<?php
get_footer();
