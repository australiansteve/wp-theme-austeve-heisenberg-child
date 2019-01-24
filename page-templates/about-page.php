<?php
/***
  * Template Name: About Page
  */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="about-page">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="cell small-12" class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" class="page-content">
				<?php the_content(); ?>
			</div>

			<div class="cell small-12" class="highlights">
				<div class="grid-x">
					<div class="cell small-12 medium-6" class="highlight">
						<h3><?php the_field('highlight_1_title'); ?></h3>
						<p><?php the_field('highlight_1_text'); ?></p>
					</div>

					<div class="cell small-12 medium-6" class="highlight">
						<h3><?php the_field('highlight_2_title'); ?></h3>
						<p><?php the_field('highlight_2_text'); ?></p>
					</div>
				</div>
			</div>

			<div class="cell small-12" class="links">
				<div class="grid-x">
					<div class="cell small-12 medium-6" class="link">
						<a href="<?php the_field('link_1_destination'); ?>"><?php the_field('link_1_text'); ?></a>
					</div>

					<div class="cell small-12 medium-6" class="link">
						<a href="<?php the_field('link_2_destination'); ?>"><?php the_field('link_2_text'); ?></a>
					</div>
				</div>
			</div>

			<div class="cell small-12" class="team">

<?php 
	// check if the repeater field has rows of data
	if( have_rows('team_members') ):

		echo "<h2>Team</h2>";

	 	// loop through the rows of data
	    while ( have_rows('team_members') ) : the_row();
?>
				<div class="grid-x">

					<div class="cell small-12 medium-3" class="team-member-image">
<?php
			$image = get_sub_field('team_member_image');

			if( !empty($image) ): 
				// vars
				$alt = $image['alt'];

				// thumbnail
				$size = 'bio-pic-size';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
?>
						<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php the_sub_field('team_member_name'); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
 <?php
			endif;
?>
					</div>
					<div class="cell small-12 medium-9" class="team-member-bio"><?php the_sub_field('team_member_bio'); ?></div>
				</div>					        
<?php
    	endwhile;

	endif;
?>

			</div>

			<div class="cell small-12" class="board">

<?php 
	// check if the repeater field has rows of data
	if( have_rows('board_of_directors') ):

		echo "<h2>Board of Directors</h2>";
		$b = 0;
?>
				<div class="grid-x">
<?php
		// loop through the rows of data
		while ( have_rows('board_of_directors') ) : the_row();
?>

					<div class="cell small-4 medium-2 bod-image <?php echo ($b == 0) ? 'active' : ''?>">

<?php
			$image = get_sub_field('bod_image');

			if( !empty($image) ): 
				// vars
				$alt = $image['alt'];

				// thumbnail
				$size = 'thumbnail';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ];
?>
						<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php the_sub_field('bod_name'); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" data-id="<?php echo $b;?>"/>
						<div class="hidden bod-bio" style="display:none" data-id="<?php echo $b;?>"><?php the_sub_field('bod_bio'); ?></div>
	 								
<?php
			endif;
?>
					</div>		
<?php
			$b++;

			if ($b % 3 == 0 || $b == count(get_field('board_of_directors')))
			{
				echo "<div class='bio-display cell small-12 hide-for-medium'></div>";
			}
			if ($b % 6 == 0 || $b == count(get_field('board_of_directors')))
			{
				echo "<div class='bio-display cell small-12 show-for-medium'></div>";
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