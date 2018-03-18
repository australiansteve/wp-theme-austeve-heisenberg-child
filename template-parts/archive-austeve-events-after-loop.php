<?php

	if (isset($_GET['past-events']))
	{
		//looking at past events
?>
		<div class='see-more'>
			<a class='button' href='<?php echo home_url('events'); ?>'>See future events</a>
		</div>
<?php
	}	
	else
	{
		//looking at future events
?>
		<div class='see-more'>
			<a class='button' href='<?php echo home_url('events?past-events'); ?>'>See past events</a>
		</div>
<?php
	}	
?>