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

	/**
	 * Filter page title to not show 'Homepage' h1 element
	 */
	add_filter( 'the_title', function( $title, $id = null ) {

		//Check if in the loop also to avoid menu items being filtered
	    if ( is_front_page() && in_the_loop() ) {
	        return '';
	    }

	    return $title;
	}, 10, 2 );

});

/* Enable ACF options page for theme options if ACF is activated */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

?>