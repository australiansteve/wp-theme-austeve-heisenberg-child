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

<div class="grid-x grid-x-margin" id="header">

	<div class="cell small-12">

		<div id="header-image">
			<?php
			$image = get_field('header_image', 'option');
			$size = 'header-image-size'; // (thumbnail, medium, large, full or custom size)

			if( $image ) {

				$headerImage = wp_get_attachment_image( $image, $size );
				error_log("Front page image: ".print_r($image, true));

				?>
				<img src="<?php echo $image['sizes']['header-image-size'];?>" width="<?php echo $image['sizes']['header-image-size-width'];?>" height="<?php echo $image['sizes']['header-image-size-height'];?>"/>
				<?php

			}
			?>
		</div>

		<div id="introduction">
			<?php the_field('header_introduction', 'option'); ?>
		</div>

	</div>
	
</div>

<div id="page" class="<?php echo $pageClasses; ?>">

	<div id="content" class="site-content" role="main">
