<?php

$eventbrite_link = get_field('eventbrite_link');

if( !empty($eventbrite_link) ): ?>

	<div class="grid-x">

		<div class="cell">

			<?php
			$button_text = !empty(get_field('eventbrite_button_text')) ? get_field('eventbrite_button_text') : 'View on Eventbrite'; ?>
			<a class="button" href="<?php echo $eventbrite_link;?>" target="_blank" title="Eventbrite event page"><?echo $button_text?></a>

		</div>

	</div>

<?php endif; ?>

