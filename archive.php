<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell small-12">
<?php
$colors = array("#bc5298", "#7fb955", "#6abfdb", "#e68f52", "#e4e164");

if ( have_posts() ) :
	$counter = 0;
	while ( have_posts() ) : 
		the_post();

		$colorIndex = $counter < count($colors) ? $counter : $counter % count($colors);
		$highlightColor = $colors[$colorIndex];
?>
	<div class="grid-x archive-post" style="margin-bottom: 1em; border-bottom: 3px solid <?php echo $highlightColor;?>; padding-bottom: 1em;">

		<div class="cell small-12 medium-4 large-3 image">
<?php
		
		if (has_post_thumbnail()):
			the_post_thumbnail('feature-pic-size');
		else :
			echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full' );
		endif;
?>
		</div>
		<div class="cell small-12 medium-8 large-9 content">
			<a href="<?php echo get_the_permalink()?>">
<?php
		the_title( '<h1 style="color: '.$highlightColor.';">', '</h1>' );
?>
			</a>
<?php
		the_excerpt();
?>
		</div>
	</div>
<?php
		$counter++;
	endwhile;

	posts_nav_link( );
else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>

		</main>

	</div>

<?php
get_footer();
