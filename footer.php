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

</div><!-- #page -->

<footer id="colophon" class="site-footer">

	<div class="grid-x">

		<div class="cell text-center medium-4 medium-text-left">
			<?php dynamic_sidebar( 'left-footer-widget-area' ); ?>
		</div>
		<div class="cell text-center medium-4 medium-text-center">
			<?php dynamic_sidebar( 'center-footer-widget-area' ); ?>
		</div>
		<div class="cell text-center medium-4 medium-text-right">
			<?php
			$args = [
				'theme_location' 	=> 'social',
				'container'			=> false,
				'items_wrap' 		=> '%3$s',
			];
			wp_nav_menu( $args ); ?>
		</div>
		
	</div><!-- .grid-x -->

	<div class="grid-x">
		<div class="cell text-center wcc">
			Website by: 
			<br class="show-for-small-only"/><a href="https://weavercrawford.com">Weaver Crawford Creative</a>
			<br class="show-for-small-only"/>&copy; <?php echo date("Y"); ?>
		</div>
	</div>

</footer><!-- #colophon -->

<?php
	$fixedBackground = get_theme_mod('austeve_background_fixed', 'fixed');
	if ($fixedBackground == 'scroll')
	{
		echo '</div><!-- #background-div -->';
	} 
?>
<?php wp_footer(); ?>
</body>
</html>
