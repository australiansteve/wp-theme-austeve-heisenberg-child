<?php

add_action( 'wp_enqueue_scripts', function() {

    $parent_style = 'heisenberg-style';

	wp_enqueue_style( 'jquery-ui-css', 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/_dist/css/app.css' );
    wp_enqueue_style( $parent_style.'-login', get_template_directory_uri() . '/_dist/css/login.min.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/_dist/css/app.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_script( 'child-script',
        get_stylesheet_directory_uri() . '/_dist/js/app.min.js',
        array( 'jquery-ui-accordion', 'jquery' )
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
		'page_title' 	=> 'Canada Helps Settings',
		'menu_title' 	=> 'Canada Helps',
		'parent_slug' 	=> $parent['menu_slug'],
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
		$query->set('posts_per_page', '-1');
		$query->set('meta_key', 'stripped_name');
		$query->set('orderby', 'meta_value');
		$query->set('order'	, 'ASC');

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
		//error_log(print_r($query, true));

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



function austeve_populate_fund_selector_values($field) {

	//Only get list of funds when admin page (ie. A fund) is being edited in the backend
	if (is_admin())
	{
		// reset choices
		$field['choices'] = array();

		// get the textarea value from options page without any formatting
		$url = get_field('canada_helps_webservice_url', 'option');

		//$args = array( 'timeout' => 120, 'httpversion' => '1.1' );
		$response = wp_remote_get( $url );
		//error_log("Canada Helps page response: ".print_r($response, true));

		$field['choices']["NO_FUND"] = "Select fund";

		if ( is_array( $response ) ) {
			$header = $response['headers']; // array of http header lines
			$body = $response['body']; // use the content

			$jsonResponse = json_decode($body);

			if ($jsonResponse->CharityFunds)
			{
				$funds = $jsonResponse->CharityFunds;

				if (count($funds) == 0)
				{
					$field['choices']["ERROR03"] = "ERROR03: No funds could be found in the response from CanadaHelps. Reload page to try again. Contact steve@weavercrawford.com if the problem persists";

				}

				foreach($funds as $fund)
				{
					//error_log("Fund: ".print_r($fund, true));
			 		$field['choices'][$fund->FundID] = $fund->FundDescription;
				}
			}
			else
			{
				$field['choices']["ERROR02"] = "ERROR02: Could not get Funds from CanadaHelps. Reload page to try again. Contact steve@weavercrawford.com if the problem persists";
			}
		}
		else
		{
			$field['choices']["ERROR01"] = "ERROR01: Could not retrieve response from CanadaHelps. Reload page to try again";
		}

		//error_log("Choices: ".print_r($field['choices'], true));
	}

	return $field;
}
add_filter('acf/load_field/name=canada_helps_fund_id', 'austeve_populate_fund_selector_values');
add_filter('acf/load_field/name=canada_helps_default_fund', 'austeve_populate_fund_selector_values');

function austeve_populate_color_selector_values($field) {

	//Only get list of funds when admin page is being edited in the backend
	if (is_admin())
	{
		// reset choices
		$field['choices'] = array(
			'#bc5298' => 'Pink',
			'#7fb955' => 'Green',
			'#e68f52' => 'Orange',
			'#e4e164' => 'Yellow',
			'#6abfdb' => 'Blue',
			'#6cc2dd' => 'Bright Blue',
		);
	}

	return $field;
}

add_filter('acf/load_field/name=color', 'austeve_populate_color_selector_values');
add_filter('acf/load_field/name=featured_post_background_color', 'austeve_populate_color_selector_values');
add_filter('acf/load_field/name=default_fund_background_color', 'austeve_populate_color_selector_values');
add_filter('acf/load_field/name=about_sub_page_link_color', 'austeve_populate_color_selector_values');
add_filter('acf/load_field/name=grant_highlight_color', 'austeve_populate_color_selector_values');

function austeve_get_stripped_fund_name($fundName)
{
	$strippedName = $fundName;
	//error_log(strpos(strtolower($fundName), 'the '));
	if (strpos(strtolower($fundName), 'the ') === 0)
	{
		//error_log("Fund name starts with 'the'");
		$strippedName = substr($fundName, 4);
	}
	//error_log('Updating stripped_name attribute of fund: '.$strippedName);
	return $strippedName;
}

function austeve_set_post_stripped_name($post_id, $post, $update) {
	//error_log('Fund has been saved: '.$post->post_title);
	$strippedName = austeve_get_stripped_fund_name($post->post_title);
	update_field('stripped_name', $strippedName, $post_id);
}

add_action( 'save_post_austeve-funds', 'austeve_set_post_stripped_name', 10,3 );

function austeve_populate_fund_stripped_name( $plugin, $network_activation ) {
	error_log(print_r($plugin, true));

	if (strpos($plugin, 'austeve-funds') === 0)
	{
		error_log("Activating funds plugins. Setting stripped_name for existing funds");

		// WP_Query arguments
		$args = array(
			'post_type'	=> array( 'austeve-funds' ),
			'posts_per_page' => '-1',
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				error_log(get_the_title());
				update_field('stripped_name', austeve_get_stripped_fund_name(get_the_title()), get_the_ID());
				error_log('--->'.get_field('stripped_name', get_the_ID()));
			}
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata();

	}
}
add_action( 'activated_plugin', 'austeve_populate_fund_stripped_name', 10, 2 );

add_filter('next_posts_link_attributes', 'austeve_posts_link_attributes');
add_filter('previous_posts_link_attributes', 'austeve_posts_link_attributes');

function austeve_posts_link_attributes() {
    return 'class="button"';
}

function austeve_get_one_post_at_a_time($query) {
	$query->set('posts_per_page', 1);
	return $query;
}
//add_action('pre_get_posts','austeve_get_one_post_at_a_time');

?>