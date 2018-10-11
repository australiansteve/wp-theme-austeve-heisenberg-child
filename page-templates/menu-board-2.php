<?php
/**
 * Template Name: Menu Board 2
 *
 * @package Heisenberg
 */
get_header(); ?>

	<div id="menu-board-2" class="menu-board">
	
		<div class="background">
		</div>

		<div class="menu-board-content">

			<div class="grid-x grid-margin-x">
				
				<div class="cell small-6">

					<div class="container">

						<div class="grid-y" style="">

							<div class="cell small-2">

								<div class="heading">

									<h1>Signature Sandwiches</h1>
									<div class="tagline">Served with Kettle Chips and a Dill Pickle</div>
								</div>

							</div>

							<div class="cell small-8">

								<div class="body" id="signature-sandwiches">
									<?php
										$courseSlug = 'signature-sandwiches';								
										AUSteve_Menu_Include($courseSlug, 'menu-board');
									?>

								</div>

							</div>

							<div class="cell small-2">

								<div class="highlight">

									<h2>Make it a Meal</h2>
									<div class="tagline">Add soup or pasta salad to your sandwich for +$3.29</div>
									<div class="asterisk">*Prices do not include tax</div>

								</div>

							</div>

						</div>

					</div>

				</div>

				<div class="cell small-6">
					
					<div class="container">

						<div class="heading">

							<h1>Classic Sandwiches</h1>
							<div class="tagline">Old Favourites - Served with Cheese</div>
							<div class="asterisk">Add Kettle Chips and a Dill Pickle for $1.25</div>

						</div>

						<div class="body" id="classic-sandwiches">
							<?php
								$courseSlug = 'classic-sandwiches';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

						</div>

						<div class="heading">

							<h1>Side Dishes</h1>

						</div>

						<div class="body">
							<?php
								$courseSlug = 'side-dishes';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
<?php
