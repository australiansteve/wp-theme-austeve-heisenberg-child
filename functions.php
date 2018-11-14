<?php

require_once __DIR__ . '/src/menu-display.php';

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

    if (is_page_template( 'page-templates/menu-board-1.php' ) ||
			is_page_template( 'page-templates/menu-board-2.php' ) ||
			is_page_template( 'page-templates/menu-board-3.php' ))
    {
		wp_enqueue_script( 'child-menu-board-script',
			get_stylesheet_directory_uri() . '/_dist/js/menu-boards.min.js',
			array( 'jquery' )
		);
    }
});


add_action( 'after_setup_theme', function() {

	/*
	 * Enable supoprt for custom logo
	 * See https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 400,
		'width'       => 600,
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

add_image_size( 'large-banner', 1200, 800, array( 'center', 'center' ) );

// Set ninja forms to be accessible by Editor users
// https://developer.ninjaforms.com/codex/submission-permissions/
// Must use all three filters for this to work properly. 
add_filter( 'ninja_forms_admin_parent_menu_capabilities',   'austeve_nf_subs_capabilities' ); // Parent Menu
add_filter( 'ninja_forms_admin_all_forms_capabilities',     'austeve_nf_subs_capabilities' ); // Forms Submenu
add_filter( 'ninja_forms_admin_submissions_capabilities',   'austeve_nf_subs_capabilities' ); // Submissions Submenu

function austeve_nf_subs_capabilities( $cap ) {
    return 'edit_posts'; // EDIT: User Capability
}
?>