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
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
$svg_sprite = file_get_contents( get_template_directory() . '/_dist/sprite/sprite.svg' );
if ( file_exists( $svg_sprite ) ) {
	echo $svg_sprite;
} 

$fixedBackground = get_theme_mod('austeve_background_fixed', 'fixed');
$backgrounds = get_theme_mod('austeve_backgrounds', 0);
$onlyforhome = get_theme_mod('austeve_background_homeonly', false);
$pageClasses = is_home() ? "homepage" : "";

if ($fixedBackground == 'fixed') 
{
	//Fixed
?>
	<div id="background-div" class="fixed">
<?php
		for ($b = 0; $b < $backgrounds; $b++) {
			if (!$onlyforhome || is_home())
			{
				echo '<div id="bgImage'.($b+1).'" class="bgImage">&nbsp;</div>';
			}
		}
?>
	</div>
	
	<div id="page" class="<?php echo $pageClasses; ?>">

<?php 
}
else
{
	//Scrolling
?>
	<div id="background-div" class="scrolling">
<?php
		for ($b = 0; $b < $backgrounds; $b++) {
			if (!$onlyforhome || is_home())
			{
				echo '<div id="bgImage'.($b+1).'" class="bgImage">&nbsp;</div>';
			}	
		}
?>

		<div id="page" class="<?php echo $pageClasses; ?>">
<?php
}
?>

<header id="masthead">
	<div class="row column">
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
	<div class="row column" id="main-menu">

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
</header>
<div id="content" class="site-content" role="main">