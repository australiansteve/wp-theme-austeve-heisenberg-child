<?php

add_action( 'wp_enqueue_scripts', function() {

    $parent_style = 'heisenberg-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/_dist/css/app.css' );
    wp_enqueue_style( $parent_style.'-login', get_template_directory_uri() . '/_dist/css/login.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/_dist/css/app.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'child-script',
        get_stylesheet_directory_uri() . '/_dist/js/app.min.js',
        array( 'jquery' )
    );
});


add_action( 'after_setup_theme', function() {

	/*
	 * Enable supoprt for custom logo
	 * See https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-height' => false,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

});

/* Enable ACF options page for theme options if ACF is activated */
if( function_exists('acf_add_options_page') ) {

	// add parent
	$parent = acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title' 	=> 'Theme Settings',
		'redirect' 		=> false
	));
	
	
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title' 	=> 'Footer',
		'parent_slug' 	=> $parent['menu_slug'],
	));
}

add_image_size( 'bio-pic-size', 250, 250, array( 'center', 'center' ) ); // Hard crop center
add_image_size( 'feature-pic-size', 600, 350, array( 'center', 'center' ) ); // Hard crop center


function austeve_clean_string($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return strtolower(preg_replace('/[^A-Za-z0-9\-]/', '', $string)); // Removes special chars.
}

function austeve_alter_funds_archive_search($query) {
	if (is_post_type_archive('austeve-funds') && $query->is_main_query()) 
	{
		if(isset($_GET['fund-name']))
		{
			$query->set('s', $_GET['fund-name']);
			//error_log(print_r($query, true));
		}
		if(isset($_GET['fund-category']))
		{
			//error_log(print_r($query, true));
			$tax_query = array(
				'taxonomy' => 'austeve-funds-category',
				'field'    => 'slug',
				'terms' => explode(",", $_GET['fund-category']),
				'operator' => 'IN',
				'include_children' => true
			);

			$query->set( 'tax_query', array(
				'relation' => 'AND',
				$tax_query
			));

			//error_log(print_r($query, true));
		}
		return $query;
	}
	else
	{
		//error_log("This is not a funds archive search");
		return $query;
	}
}
add_action('pre_get_posts','austeve_alter_funds_archive_search');


add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_post_type_archive("austeve-funds") ) {
        $title = post_type_archive_title( '', false );
    }

    return $title;
});


?>