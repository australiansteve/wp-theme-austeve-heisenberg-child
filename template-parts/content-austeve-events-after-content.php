<?php
?>
<div class='tickets'>
	<?php 
	$eventLink = get_field('eventbrite_link');
	if ($eventLink)
	{
		?>
		<a href='<?php echo $eventLink;?>' class='button event-link' target='_blank'><?php echo get_field('eventbrite_button_text')?></a>
		<?php
	}
	?>
</div>
