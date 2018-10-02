<?php
/**
 * Template Name: Menu Board 1
 *
 * @package Heisenberg
 */
get_header(); ?>

	<div id="menu-board-1" class="menu-board">
	
		<div class="background">
		</div>

		<div class="menu-board-content">

			<div class="grid-x grid-margin-x">
				
				<div class="cell small-6">

					<div class="container">

						<div class="heading">

							<h1>Signature Breakfast</h1>
							<div class="tagline">Breakfast is served from 7am-11am</div>

						</div>

						<div class="body">
							<?php
								$courseSlug = 'signature-breakfast';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

							<div class="grid-x" id="classics">

								<div class="cell small-4 title">
									Breakfast Classics -
								</div>

								<div class="cell small-8">
									<?php
										$courseSlug = 'breakfast-classics';								
										AUSteve_Menu_Include($courseSlug, 'menu-board-inline');
									?>
								</div>

							</div>

						</div>

						<div class="highlight">

							<h2>Follow us on Social Media</h2>

							<i class="fab fa-instagram"> </i> <i class="fab fa-facebook-square"> </i> @zesty_lemon_sj

						</div>

					</div>

				</div>

				<div class="cell small-6">
					
					<div class="container">

						<div class="heading">

							<h1>Bakery</h1>
							<div class="tagline">Freshly Baked Goods</div>

						</div>

						<div class="body" id="bakery">
							<?php
								$courseSlug = 'bakery';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

						</div>

						<div class="heading">

							<h1>Beverages</h1>

						</div>

						<div class="body" id="beverages">
							<?php
								$courseSlug = 'beverages';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

						</div>

					</div>

				</div>

			</div>

		</div>


	</div>
<?php