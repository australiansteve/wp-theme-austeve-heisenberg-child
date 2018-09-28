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

			<div class="grid-x">
				
				<div class="cell small-6">

					<div class="container">

						<div class="heading">

							<h1>Signature Breakfast</h1>

							Breakfast is served from 7am-11am

						</div>

						<div class="body">
							<?php
								$courseSlug = 'signature-breakfast';								
								AUSteve_Menu_Include($courseSlug);
							?>

							<div class="grid-x">

								<div class="cell small-5 title">
									Breakfast Classics -
								</div>

								<div class="cell small-7">
									<?php
										$courseSlug = 'breakfast-classics';								
										AUSteve_Menu_Include($courseSlug);
									?>
								</div>

							</div>

						</div>

						<div class="highlight">

							Follow us on Social Media

						</div>

					</div>

				</div>

				<div class="cell small-6">
					
					<div class="container">

						<div class="heading">

							<h1>Bakery</h1>

							Freshly Baked Goods

						</div>

						<div class="body">
							<?php
								$courseSlug = 'bakery';								
								AUSteve_Menu_Include($courseSlug);
							?>

						</div>

						<div class="heading">

							<h1>Beverages</h1>

						</div>

						<div class="body">
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