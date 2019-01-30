<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>

	<div class="grid-x">

		<div class="cell small-12 fund-title">
		
			<?php the_title( '<h1>', '</h1>' );?>

		</div>

	</div>

	<div class="grid-x">

	<?php if (!get_field('eligibility')):?>
		<!-- FUND -->
		<div class="cell small-12 medium-8" id="page-content">
			<?php the_content(); ?>
		</div>

		<div class="cell small-12 medium-4" id="donate-now">
			<?php echo get_field('canada_helps_form_url', 'option')."?fundID=".get_field('canada_helps_fund_id'); ?>
			<iframe width="100%" height="800px" src="<?php echo get_field('canada_helps_form_url', 'option')."?fundID=".get_field('canada_helps_fund_id'); ?>"/>
		</div>

	<?php else:?>
		<!-- BURSARY -->
		<div class="cell small-12" id="bursary-content">
			<?php the_content(); ?>
		</div>

		<div class="cell small-12" id="bursary-eligibility">
			<h3>Eligibility</h3>
			<?php the_field('eligibility'); ?>
		</div>

	<?php endif; ?>

	</div>

<?php


	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>


<?php
get_footer();