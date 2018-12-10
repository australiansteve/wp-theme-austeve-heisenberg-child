<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heisenberg
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$svg_sprite = file_get_contents( get_template_directory() . '/_dist/sprite/sprite.svg' );
if ( file_exists( $svg_sprite ) ) {
	echo $svg_sprite;
} 

$pageClasses = is_home() ? "homepage" : "";
?>
	
	<div id="page" class="<?php echo $pageClasses; ?>">

		<header id="masthead">

			<div class="grid-x grid-margin-x">

				<div class="cell small-11 medium-6">

					<?php 
						if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
							the_custom_logo();
						}
						else {
					?>
							<h1 class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
								</a>
							</h1>
							<h2 class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></h2>
					<?php 
						}
					?>

				</div>


				<div class="cell medium-6 show-for-medium">
					
					<div class="grid-x grid-margin-x" id="main-menu">

						<div class="cell medium-8">
							<?php get_search_form( true ); ?>
						</div>

						<div class="cell medium-4">
							<a href="/donate" class="button">Donate Now</a>
						</div>

					</div>

					<div class="grid-x grid-margin-x" id="main-menu">

						<div class="cell medium-12">

							<ul class="dropdown menu" data-dropdown-menu>
								<?php
								$args = [
									'theme_location' 	=> 'primary',
									'container'			=> false,
									'items_wrap' 		=> '%3$s',
									'walker' 			=> new AUSteve_Foundation_Dropdown_Nav_Menu(),
								];
								wp_nav_menu( $args ); ?>
							</ul>

						</div>

					</div>

				</div>

				<div class="cell small-1 show-for-small-only" id="hamburger-menu">

					<div class="off-canvas-content" data-off-canvas-content>
							<a href="#" data-toggle="offCanvasLeft"><i class="fas fa-bars"></i></a>
					</div>

				</div>

			</div>

			

		</header>

		<div class="off-canvas-wrapper">

			<div class="off-canvas-absolute position-left" id="offCanvasLeft" data-off-canvas>
				
				<ul class="vertical menu">
					<?php
					$args = [
						'theme_location' 	=> 'primary',
						'container'			=> false,
						'items_wrap' 		=> '%3$s',
						'walker' 			=> new AUSteve_Foundation_Dropdown_Nav_Menu(),
					];
					wp_nav_menu( $args ); ?>
				</ul>

				<div class="off-canvas-logo">
					<?php
					if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
						the_custom_logo();
					}
					?>
				</div>
			</div>

			<div id="content" class="site-content" role="main">