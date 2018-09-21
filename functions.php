<?php

add_action( 'wp_enqueue_scripts', function() {

    $parent_style = 'heisenberg-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/_dist/css/app.css' );
    wp_enqueue_style( $parent_style.'-login', get_template_directory_uri() . '/_dist/css/login.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/_dist/css/app.css?v='.date('YmdHis'),
        array( $parent_style ),
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

});


 add_action( 'pre_get_posts', function($query) {
	//if querying posts, order by the visual order defined by SCPOrder plugin
	if (!is_admin() && is_array($query->get('post_type')) && in_array('post', $query->get('post_type')))
	{
		$query->set('orderby', 'menu_order');
		$query->set('order', 'ASC');
	}
	return $query;
});


add_image_size( 'large-banner', 1000, 600, array( 'center', 'center' ) );
add_image_size( 'medium-square', 400, 400, array( 'center', 'center' ) );

/* Add link at the end of excerpt*/
add_filter( 'excerpt_more', function($more) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'austeve') . '</a>';
} );

add_filter( 'excerpt_length', function($length) {
	return 30;
}, 999 );

?>