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


add_image_size( 'header-image-size', 2048, 1462 );

/* Finds and replace PRAM colours when saving embed fields */

function austeve_update_bandcamp_colors( $value, $post_id, $field  ) {
	
	error_log("bandcamp embed before:". $value);
	
	$startBgCol = strpos($value, 'bgcol=');
	if ($startBgCol !== false)
	{
		$endBgCol = strpos($value, '/', $startBgCol);
		$newValue = substr ($value , 0, $startBgCol);
		$newValue .= 'bgcol=333333';
		$newValue .= substr ($value, $endBgCol);
		$value = $newValue;
	}

	$startLinkCol = strpos($value, 'linkcol=');
	if ($startLinkCol !== false)
	{
		$endLinkCol = strpos($value, '/', $startLinkCol);
		$newValue = substr ($value , 0, $startLinkCol);
		$newValue .= 'linkcol=e80e8b';
		$newValue .= substr ($value, $endLinkCol);
		$value = $newValue;
	}
	
	error_log("bandcamp embed AFTER:". $newValue);
	// return
    return $value;
    
}

add_filter('acf/update_value/name=bandcamp_embed', 'austeve_update_bandcamp_colors', 10, 3);

function austeve_update_soundcloud_colors( $value, $post_id, $field  ) {
	
	error_log("soundcloud embed before:". $value);

	$startLinkCol = strpos($value, 'color=%23');
	if ($startLinkCol !== false)
	{
		$endLinkCol = strpos($value, '&', $startLinkCol);
		$newValue = substr ($value , 0, $startLinkCol);
		$newValue .= 'color=%23e80e8b';
		$newValue .= substr ($value, $endLinkCol);
		$value = $newValue;
	}
	
	error_log("soundcloud embed AFTER:". $newValue);
	// return
    return $value;
    
}

add_filter('acf/update_value/name=soundcloud_embed_code', 'austeve_update_soundcloud_colors', 10, 3);
?>