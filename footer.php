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


			<div class="container">
				<strong>Find us on</strong>
				<p class="find-us-on">
					<?php 
					$findUsOn = get_field('find_us_on', 'option'); 
					if( have_rows('find_us_on', 'option') ):

					 	// loop through the rows of data
					    while ( have_rows('find_us_on', 'option') ) : the_row();

					        // display a sub field value
					        $url = get_sub_field('footer_find_us_link', 'option');

					        if ($url)
					        {
					        	echo "<a href='".$url."' target='blank'>";
					        	
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

					        	echo "</a>";
					        }

					    endwhile;

					else :

					    // no rows found

					endif;

					?>
				</p>

			</div>
		</div>


		<div class="cell small-12 medium-4 right-column">

			<div class="container">
				<strong>A member of</strong>
				<p class="a-member-of-address">
					<?php $image = get_field('a_member_of', 'option');

					if( !empty($image) ): ?>
						
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					<?php endif; ?>
				</p>
			</div>

		</div>
	</div><!-- .grid-x -->

</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
