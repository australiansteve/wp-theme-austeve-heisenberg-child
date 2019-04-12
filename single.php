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

?>
			<div class="grid-x align-center" id="story-navigation">
<?php
			if( $prev_post = get_previous_post() ): 
?>
				<div class="cell small-12 medium-4 prev-post">
<?php 
				$prevpost = get_the_post_thumbnail( $prev_post->ID, 'medium', array('class' => 'pagination-previous')); 
				previous_post_link( '%link',"$prevpost  <h3>%title</h3>" ); 
?>
				</div>
<?php
			endif; 

			if( $next_post = get_next_post() ): 
?>
				<div class="cell small-12 medium-4 next-post">
<?php 
				$nextpost = get_the_post_thumbnail( $next_post->ID, 'medium', array('class' => 'pagination-next')); 
				next_post_link( '%link',"$nextpost  <h3>%title</h3>" ); 
?>
				</div>
<?php
			endif; 
?>
				<div class="cell small-12 medium-4">
					<div class="container">
						<a class="button" href="/stories">All stories</a>
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
