<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

?>

	<div class="grid-x">

		<div class="cell small-12 grant-title">
		
			<h1><?php echo get_the_title( ); echo get_field('grant_amount') ? " - ".get_field('grant_amount') : "";?></h1>

		</div>

	</div>

	<div class="grid-x">

		<div class="cell small-12 grant-intro">
		
			<?php the_field( 'information_intro' );?>

		</div>

	</div>

	<div class="grid-x">

		<div class="cell small-12 grant-timeline">
		
			<?php 
			$openDate = get_field( 'applications_open' );
			$closeDate = get_field( 'applications_close' );
			$deliberation = get_field( 'deliberation_period' );
			$notification = get_field( 'applicant_notification' );
			$awarded = get_field( 'grants_awarded' );

			if ($openDate) :
			?>
				<div class="timeline-value open"><span class="title">Applications open: </span><?php echo $openDate; ?></div>
			<?php
			endif;

			if ($closeDate) :
			?>
				<div class="timeline-value close"><span class="title">Applications close: </span><?php echo $closeDate; ?></div>
			<?php
			endif;

			if ($deliberation) :
			?>
				<div class="timeline-value deliberation"><span class="title">Deliberation period: </span><?php echo $deliberation; ?></div>
			<?php
			endif;

			if ($notification) :
			?>
				<div class="timeline-value notification"><span class="title">Applicant notification: </span><?php echo $notification; ?></div>
			<?php
			endif;

			if ($awarded) :
			?>
				<div class="timeline-value awarded"><span class="title">Grants awarded: </span><?php echo $awarded; ?></div>
			<?php
			endif;

			?>

		</div>

	</div>

	<div class="grid-x">

		<div class="cell small-12 grant-closing">
		
			<?php the_field( 'information_closing' );?>

		</div>

	</div>

<?php


	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>


<?php
get_footer();
