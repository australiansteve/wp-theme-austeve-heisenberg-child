<?php

require_once __DIR__ . '/ajax-actions.php';

add_action( 'wp_enqueue_scripts', function() {

    $min_ext = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    $parent_style = 'heisenberg-style';

    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/_dist/css/app.css' );
    wp_enqueue_style( $parent_style.'-login', get_template_directory_uri() . '/_dist/css/login.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/_dist/css/app.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

	// Add our child app js file
	wp_enqueue_script(
		'heisenbergchild_appjs',
		get_stylesheet_directory_uri() ."/_dist/js/app{$min_ext}.js",
		array( 'jquery' ),
		wp_get_theme()->get('Version')
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

	register_sidebar( array(
	    'id'          => 'left-footer-widget-area',
	    'name'        => __( 'Left Footer Area', 'heisenberg'),
	    'description' => __( 'Displays in the left side of the footer', 'heisenberg'),
	    'before_widget' => '<div class="left-sidebar-box">',
        'after_widget' => '</div>',
	) );

	register_sidebar( array(
	    'id'          => 'center-footer-widget-area',
	    'name'        => __( 'Center Footer Area', 'heisenberg'),
	    'description' => __( 'Displays in the center of the footer', 'heisenberg'),
	    'before_widget' => '<div class="center-sidebar-box">',
        'after_widget' => '</div>',
	) );

	register_sidebar( array(
	    'id'          => 'right-footer-widget-area',
	    'name'        => __( 'Right Footer Area', 'heisenberg'),
	    'description' => __( 'DO NOT USE - Edit the \'Social\' menu instead', 'heisenberg'),
	    'before_widget' => '<div class="right-sidebar-box">',
        'after_widget' => '</div>',
	) );

});


/**
 * Add categories and tags to Pages too
 *
 */
add_action( 'init', function () {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
} );
	
add_action( 'pre_get_posts', function ( $wp_query ) {
	if ( ! is_admin() ) {
		$my_post_array = array('post','page');

		if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
			$wp_query->set( 'post_type', $my_post_array );

		if ( $wp_query->get( 'tag' ) )
			$wp_query->set( 'post_type', $my_post_array );
	} 
});


add_shortcode( 'austeve-resources-categories', function() {

	ob_start();
	get_template_part( 'template-parts/archive', 'austeve-resources-categories' );
	return ob_get_clean();

});

?>