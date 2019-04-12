<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heisenberg
 */
?>
		</div><!-- #content -->
		
	</div><!-- .off-canvas-wrapper -->

</div><!-- #page -->

<footer id="colophon" class="site-footer">

	<div class="grid-x" id="footer">

		<div class="cell small-12 medium-4 left-column">

			<div class="container">
				<strong>Street address</strong>
				<p class="street-address">
					<?php the_field('street_address', 'option'); ?>
				</p>
			</div>

			<div class="container">
				<strong>Mailing address</strong>
				<p class="mailing-address">
					<?php the_field('mailing_address', 'option'); ?>
				</p>
			</div>

		</div>

		<div class="cell small-12 medium-4 center-column">

			<div class="container">
				<strong>Contact</strong>
				<p class="contact">
					<?php the_field('contact', 'option'); ?>
				</p>
			</div>

<?php 
if( have_rows('page_links', 'option') ):
?>
			<div class="container page-links">
<?php
	// loop through the rows of data
    while ( have_rows('page_links', 'option') ) : the_row();
		$post_id = get_sub_field('page', false, false);

		// check 
		if( $post_id ): 
?>
			<p><a href="<?php echo get_the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></p>
<?php 	
		endif; 
	endwhile;
?>
			</div>
<?php
endif;
?>

			<div class="container">
				
				<div class="find-us-on">
					<strong>
					<?php 
					$findUsOn = get_field('find_us_on', 'option'); 
					if( have_rows('find_us_on', 'option') ):

					 	// loop through the rows of data
					    while ( have_rows('find_us_on', 'option') ) : the_row();

					        // display a sub field value
					        $url = get_sub_field('footer_find_us_link', 'option');

					        if ($url)
					        {
					        	echo "<p><a href='".$url."' target='blank'>";
					        	
								if( have_rows('footer_find_us_logo', 'option') ):

									// loop through the rows of data
									while ( have_rows('footer_find_us_logo', 'option') ) : the_row();

										if( get_row_layout() == 'html' ):

											the_sub_field('html');

										elseif( get_row_layout() == 'image' ): 

											error_log("Need to output images here");

										endif;

									endwhile;

								endif;

								if (get_sub_field('footer_find_us_text', 'option')) :

									the_sub_field('footer_find_us_text', 'option');

								endif;

					        	echo "</a></p>";
					        }

					    endwhile;

					else :

					    // no rows found

					endif;

					?>
					</strong>
				</div>

			</div>
		</div>


		<div class="cell small-12 medium-4 right-column">

			<div class="container">
				<strong>A member of</strong>
				<p class="a-member-of">
<?php
if( have_rows('a_member_of', 'option') ):

	// loop through the rows of data
	while ( have_rows('a_member_of', 'option') ) : the_row();

		$image = get_sub_field('image', 'option');

		if( !empty($image) ): 
			$linkTo = get_sub_field('link_to', 'option');
			if (!empty($linkTo)) :
				echo "<a href='".$linkTo."' target='blank'>";
			endif;
?>
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
<?php 
			if (!empty($linkTo)) :
				echo "</a>";
			endif;
		endif; 
?>
<?php
	endwhile;
endif;
?>
				</p>
			</div>

		</div>
	</div><!-- .grid-x -->

</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
