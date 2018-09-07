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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Antic+Didone|Dancing+Script" rel="stylesheet">

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

			<ul class="dropdown menu show-for-medium" data-dropdown-menu>
				<?php
				$args = [
					'theme_location' 	=> 'primary',
					'container'			=> false,
					'items_wrap' 		=> '%3$s',
					'walker' 			=> new AUSteve_Foundation_Dropdown_Nav_Menu(),
				];
				wp_nav_menu( $args ); ?>
			</ul>

			<div class="grid-x">
				<div class="cell">
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
			</div>

		</header>

		<div id="content" class="site-content" role="main">