<?php
/***
  * Template Name: Reports Page
  */

get_header(); 

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="about-reports-page">

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="cell small-12" class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" class="page-content">
				<?php the_content(); ?>
			</div>

			<div class="cell small-12" class="report-types">

			<?php 
				// check if the repeater field has rows of data
				if( have_rows('report_type') ):

				 	// loop through the rows of data
				    while ( have_rows('report_type') ) : the_row();
				    	error_log("Report Type: ".print_r(get_sub_field('name'), true));
			?>
					<h2><?php the_sub_field('name');?></h2>
					<div class="grid-x" id="report-type report-type-<?php echo austeve_clean_string(get_sub_field('name')); ?>">
					<?php 
						// check if the repeater field has rows of data
						if( have_rows('reports') ):

							while ( have_rows('reports') ) : the_row();
								error_log(print_r(get_sub_field('report'), true));
								$report = get_sub_field('report');
							?>
								<div class="cell small-2 text-center" class="report">
									<a href="<?php echo $report['url'];?>" target="_blank"><i class="far fa-file-pdf fa-4x"></i><br/><?php echo $report['title'];?></a>
								</div>
							<?php
							endwhile;

						else:
							echo "No reports found";
						endif;

					?>
					</div>				        
			<?php
				    endwhile;

				endif;
			?>

			</div>

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>