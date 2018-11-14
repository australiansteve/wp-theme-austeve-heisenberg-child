<?php

	function AUSteve_Menu_Include($courseSlug, $format = null, $excludeSlug = null)
	{
		$current_term = get_term_by( 'slug', $courseSlug, 'menuitem-course' );

		if ($current_term)
		{

			if ($format != 'menu-board')
			{
				echo "<p class='course-tagline'>".$current_term->description."</p>";
			}
			
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

			error_log("BEFORE:".print_r($args, true));

			if ($excludeSlug)
			{
				$args['tax_query'][] = array(
					'taxonomy'         => 'menuitem-course',
					'terms'            => $excludeSlug,
					'field'            => 'slug',
					'operator'         => 'NOT IN',
					'include_children' => false,
				);
			}
			error_log("AFTER: ".print_r($args, true));

			// The Query
			$menuItemQuery = new WP_Query( $args );
			// The Loop
			if ( have_posts() ) :
				while ( $menuItemQuery->have_posts() ) :
				    $menuItemQuery->the_post();

					switch ($courseSlug):
						case 'beverages':
						case 'meat':
						case 'cheese':
						case 'salads-deli':
						case 'salads':
							get_template_part( 'template-parts/menu-item-dual-price', $format );
							break;
			    		default:
							get_template_part( 'template-parts/menu-item', $format );
				    endswitch;
				    
				endwhile;	
			else :
				echo esc_html( 'Sorry, no posts' );
			endif; //have_posts
		}
	}
	
?>