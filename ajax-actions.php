<?php

function child_austeve_get_post_ajax() {
	check_ajax_referer( "austevegetpost" );
	if( $_POST[ 'postId' ] !== 'undefined' )
	{
		$postId = $_POST[ 'postId' ];
		global $post; 
		$post = get_post($postId); 
		setup_postdata($post);

		get_template_part( 'template-parts/content', get_post_type().'-header' );

		echo the_title( '<h1>', '</h1>' );

		get_template_part( 'template-parts/content', get_post_type().'-before-content' );

		echo apply_filters('the_content', get_post_field('post_content'));

		get_template_part( 'template-parts/content', get_post_type().'-after-content' );


		die();
	}
	echo "ERROR: There was a problem retrieving the post. Please refresh and try again.";
	die();
}
add_action( 'wp_ajax_austeve_get_post', 'child_austeve_get_post_ajax' );
add_action( 'wp_ajax_nopriv_austeve_get_post', 'child_austeve_get_post_ajax' );

?>