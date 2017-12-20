<?php

?>
<div class="grid-x grid-padding-x align-center page-resources">

	<?php
	//Municipal Regulations
	$regulations = get_field('municipal_regulations');
	if ($regulations) : 
	?>
		<div class="cell medium-4 resource-link">
			<a href='<?php echo $regulations;?>' target='_blank' title='Municipal Regulations'>Municipal Regulations</a>
		</div>
	<?php
	endif;
	?>

	<?php
	//Provincial Regulations
	$regulations = get_field('provincial_regulations');
	if ($regulations) : 
	?>
		<div class="cell medium-4 resource-link">
			<a href='<?php echo $regulations;?>' target='_blank' title='Provincial Regulations'>Provincial Regulations</a>
		</div>
	<?php
	endif;
	?>

	<?php
	//Federal Regulations
	$regulations = get_field('federal_regulations');
	if ($regulations) : 
	?>
		<div class="cell medium-4 resource-link">
			<a href='<?php echo $regulations;?>' target='_blank' title='Fedreal Regulations'>Federal Regulations</a>
		</div>
	<?php
	endif;
	?>
</div>
