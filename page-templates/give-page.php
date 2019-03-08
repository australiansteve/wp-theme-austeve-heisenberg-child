<?php
/***
  * Template Name: Give Page
  */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="give-page">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="cell small-12" class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" class="page-content">
				<?php the_content(); ?>
			</div>

			<div class="cell small-12" class="featured-funds">
				<h2>Featured Funds</h2>
			</div>

			<div class="cell small-12" class="otherwise">
				<?php the_field('otherwise_text'); ?>
			</div>

			<div class="cell small-12" class="reasons">

<?php 
	// check if the repeater field has rows of data
	if( have_rows('reasons_to_give') ):

		echo "<h2>Reasons to Give</h2>";
		$reasonNum = 0;
?>
				<div class="grid-x">
<?php
		// loop through the rows of data
		while ( have_rows('reasons_to_give') ) : the_row();
?>

					<div class="cell small-6 medium-2 reason-image <?php echo ($reasonNum == 0) ? 'active' : ''?>">

<?php
			$image = get_sub_field('reason_image');

			if( !empty($image) ): 
				// vars
				$alt = $image['alt'];

				// thumbnail
				$size = 'thumbnail';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
?>
						<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php the_sub_field('reason_name'); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-id="<?php echo $reasonNum;?>"/>
						<div class="reason-name"><?php the_sub_field('reason_name'); ?></div>
						<div class="active-arrow"></div>

						<div class="hidden reason-bio" style="display:none" data-id="<?php echo $reasonNum;?>"><?php the_sub_field('reason_bio'); ?></div>
	 								
<?php
			endif;
?>
					</div>		
<?php
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
						
<?php
	endif;
?>

			</div>

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>