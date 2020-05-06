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

					<?php 
					if (get_field('display_popup_modal_dialog', 'option') && is_front_page()) :
						get_template_part('template-parts/modal'); ?>
						<script type="text/javascript">

							jQuery(document).ready(function($) {
								setTimeout(function() {
									jQuery('#popup-modal').foundation('open');
								}, <?php the_field('modal_display_after_milliseconds', 'option') ?>);
							});

							jQuery("#popup-modal").on('open.zf.reveal', function($) {
								console.log("Change opacity");
								jQuery(this).css("opacity", "1");
								jQuery(".reveal-overlay").css("opacity", "1");

							});
						</script>
					<?php endif; ?>

					</div><!-- #content -->

				</div><!-- .off-canvas-wrapper -->

			</div><!-- #page -->

			<footer id="colophon" class="site-footer">
			<div class="grid-x grid-margin-x">

				<div class="cell small-12 medium-3 medium-text-left footer-contact">

					<h3>Contact</h3>

					<p class="footer-address">
						<?php the_field('address', 'option'); ?>
					</p>				
					<!--
					<p class="footer-signup">
						<a href="mailchimp.com" target="_blank">sign up for our newsletter</a>
					</p>
					-->
					<p class="footer-social">
						<a href="https://www.instagram.com/eastcoastbistr0" target="_blank"><i class="fab fa-instagram fa-2x"></i></a><a href="https://www.facebook.com/EastCoastBistro" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
					</p>

				</div>

				<div class="cell small-12 medium-4 medium-text-left footer-hours">

					<h3>Hours</h3>
					<?php 
						// check if the repeater field has rows of data
					if( have_rows('hours', 'option') ):

						 	// loop through the rows of data
						while ( have_rows('hours', 'option') ) : the_row();
							?>
							<div class="grid-x grid-margin-x">
								<div class="cell auto day text-left"><?php the_sub_field('day'); ?><span class="filler"></span></div>
								<div class="cell shrink times"><?php the_sub_field('times'); ?></div>
							</div>
							<?php
						endwhile;

					endif;
					?>
				</div>	

				<div class="cell small-12 medium-5 medium-text-right">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/_dist/img/ECB-logo-all-gold.png" alt-text="East Coast Bistro"/>

				</div>	

			</div>

		</footer><!-- #colophon -->

		<?php wp_footer(); ?>
	</body>
</html>
