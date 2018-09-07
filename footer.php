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
			<footer id="colophon" class="site-footer">

				<div class="row align-bottom">

					<div class="columns small-12 medium-4 logo">
					</div>

					<div class="columns small-12 medium-4 logo">
						<?php 
							if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							}
						?>
					</div>
					<div class="columns small-12 medium-4 info">

						<p class="footer-social">
							<a href="https://www.instagram.com/zesty_lemon_sj/" target="_blank"><i class="fab fa-instagram fa-2x"></i></a><a href="https://www.facebook.com/The-Zesty-Lemon-SJ-209976466486220/" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
						</p>

						<p class="footer-info">
							535 Somerset Street<br/>Saint John, NB E2K4X2
						</p>

					</div>
					
					<div class="cell website-credit">
						<a href="https://weavercrawford.com">&copy; <?php echo date("Y"); ?> Weaver Crawford Creative</a>
					</div>

				</div>

			</footer><!-- #colophon -->

		</div><!-- #content -->

	</div><!-- .off-canvas-wrapper -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
