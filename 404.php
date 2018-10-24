<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Heisenberg
 */

get_header(); ?>

	<div class="row">

		<main class="small-12 columns">

			<h1>Lost?</h1>

			<p>We couldn't find the page you're looking for.</p>

			<a href="<?php echo site_url();?>">Let's go home</a>

		</main>

	</div>

<?php
get_footer();
