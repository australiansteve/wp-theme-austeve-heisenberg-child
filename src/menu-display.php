<?php

	function AUSteve_Menu_Include($courseSlug)
	{

		// WP_Query arguments
		$args = array(
			'post_type'              => array( 'austeve-menuitems' ),
			'post_status'            => array( 'publish' ),
			'tax_query'				=> array(
				'relation' => 'AND',
				array(
					'taxonomy'         => 'menuitem-course',
					'terms'            => $courseSlug,
					'field'            => 'slug',
					'operator'         => 'IN',
					'include_children' => true,
				)
			),
		);

		// The Query
		$menuItemQuery = new WP_Query( $args );
		// The Loop
		if ( have_posts() ) :
			while ( $menuItemQuery->have_posts() ) :
			    $menuItemQuery->the_post();

				switch ($courseSlug):
					case 'meat':
					case 'cheese':
					case 'salads-deli':
						get_template_part( 'template-parts/menu-item-deli' );
						break;
					case 'salads':
						get_template_part( 'template-parts/menu-item-lunch-salad' );
						break;
		    		default:
						get_template_part( 'template-parts/menu-item' );
			    endswitch;
			    
			endwhile;	
		else :
			echo esc_html( 'Sorry, no posts' );
		endif; //have_posts
	}
	
?>