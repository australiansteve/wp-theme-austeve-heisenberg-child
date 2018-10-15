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

			<div class="row columns">
				<footer id="colophon" class="site-footer">

					<div class="column row">

						<p class="text-center">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/_dist/img/ecb-logo-footer.png" />
						</p>

						<p class="footer-address">
							<span class="name">East Coast Bistro</span><br/>
							60 Prince William St<br/>
							Saint John, NB E2L 2B1
						</p>						
						<!--
						<p class="footer-signup">
							<a href="mailchimp.com" target="_blank">sign up for our newsletter</a>
						</p>
						-->
						<p class="footer-social">
							<a href="https://www.instagram.com/eastcoastbistr0" target="_blank"><i class="fab fa-instagram fa-2x"></i></a><a href="https://www.facebook.com/EastCoastBistro" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
						</p>

					</div><!-- .column.row -->

				</footer><!-- #colophon -->
			</div>

		</div><!-- #content -->
		
	</div><!-- .off-canvas-wrapper -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
