<?php
/***
  * Template Name: Give Page
  */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="give-page">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="cell small-12" id="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" id="page-content">
				<?php the_content(); ?>
			</div>

			<?php get_template_part('template-parts/austeve-give-page', 'common'); ?>

<?php 
	// check if the repeater field has rows of data
	if( have_rows('reasons_to_give') ):
?>
			<div class="cell small-12" id="reasons">

				<div class="container">
					<h2>Reasons to Give</h2>
<?php
		$reasonNum = 0;
?>
					<div class="row small-up-2 medium-up-5">
<?php
		// loop through the rows of data
		while ( have_rows('reasons_to_give') ) : the_row();

			get_template_part('template-parts/austeve-give-reason');

			$reasonNum++;

			if ($reasonNum % 2 == 0 || $reasonNum == count(get_field('reasons_to_give')))
			{
				echo "<div class='reason-display cell small-12 hide-for-medium'></div>";
			}
			if ($reasonNum % 5 == 0 || $reasonNum == count(get_field('reasons_to_give')))
			{
				echo "<div class='reason-display cell small-12 show-for-medium'></div>";
			}
		endwhile;
?>
					</div>
				</div>
			</div>			
<?php
	endif;
?>

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>