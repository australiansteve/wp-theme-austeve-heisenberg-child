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
	$openDisplay = new DateTime($openDate);
?>
			<div class="timeline-value open"><span class="title">Applications open: </span><?php echo $openDisplay->format("F jS, Y"); ?></div>
<?php
endif;

if ($closeDate) :
	$closeDisplay = new DateTime($closeDate);
?>
			<div class="timeline-value close"><span class="title">Applications close: </span><?php echo $closeDisplay->format("F jS, Y"); ?></div>
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

	<div class="grid-x">

		<div class="cell small-12 grant-eligibility">
		
<?php 
$eligibility = get_field( 'eligibility' );

if ($eligibility) :
?>
			<h2>Eligibility</h2>
<?php

	$conditions = get_field('conditions', $eligibility);

	//echo print_r($conditions, true);
	if ($conditions) :
		foreach ($conditions as $condition):
?>
				<h3 class="eligibility-condition-title"><?php echo $condition['title'];?> </h3>
				<div class="eligibility-condition-details"><?php echo $condition['details'];?> </div>
<?php
		endforeach;
	endif;

endif;
?>

		</div>

	</div>

<?php

	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; 

get_footer();
