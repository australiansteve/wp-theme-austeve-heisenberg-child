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

		<main class="small-12 columns" style="max-width: 600px; margin: auto;">

			<h1>Oops! That page can't be found.</h1>

			<p><a href="<?php echo site_url(); ?>" style="color: black">Take me home</a></p>

		</main>

	</div>

<?php
get_footer();
