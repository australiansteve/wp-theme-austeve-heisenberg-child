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

			<h1>That page can't be found.</h1>

			<p>It looks like nothing was found at this location. Maybe try a search?</p>
			<?php
			get_search_form(); ?>

		</main>

	</div>

<?php
get_footer();
