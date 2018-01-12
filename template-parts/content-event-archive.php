<?php ?>

	<div class="grid-x">

		<main class="cell medium-8 austeve-event">
			
			<?php

				get_template_part( 'template-parts/content', 'event-header' );

				the_title( '<h1>Event: ', '</h1>' );

				get_template_part( 'template-parts/content', 'event-before-content' );

				the_content();

				get_template_part( 'template-parts/content', 'event-after-content' );

			?>

		</main>

	</div>

<?php
