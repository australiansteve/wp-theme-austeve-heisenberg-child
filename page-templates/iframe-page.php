<?php
/**
 * Template Name: Embedded Content page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="grid-x grid-padding-x align-middle" id="iframe-page">
	
		<main class="cell small-12">

			<iframe src="<?php echo get_field('url');?>"></iframe>

		</main>

	</div>

<?php
get_footer();
