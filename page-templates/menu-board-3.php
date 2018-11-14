<?php
/**
 * Template Name: Menu Board 2
 *
 * @package Heisenberg
 */
get_header(); ?>

	<div id="menu-board-3" class="menu-board">
	
		<div class="background">
		</div>

		<div class="menu-board-content">

			<div class="grid-x grid-margin-x">
				
				<div class="cell small-6">

					<div class="container">

						<div class="heading">

							<h1>Salads</h1>
							<div class="tagline">Fresh and Healthy Options</div>

						</div>

						<div class="body" id="salads">

							<div class="intro"><?php echo get_field('main_title'); ?></div>

							<div class="grid-x grid-margin-x step">
								<div class="cell small-6">
									<div class="title">1. <?php echo get_field('step_1_title'); ?></div>
								</div>
								<div class="cell small-6">
									<div class="body"><?php echo get_field('step_1'); ?></div>
								</div>
							</div>

							<div class="grid-x grid-margin-x step">
								<div class="cell small-6">
									<div class="title">2. <?php echo get_field('step_2_title'); ?></div>
								</div>
								<div class="cell small-6">
									<div class="body"><?php echo get_field('step_2'); ?></div>
								</div>
							</div>

							<div class="grid-x grid-margin-x step">
								<div class="cell small-12">
									<div class="title">3. <?php echo get_field('step_3_title'); ?></div>
								</div>
								<div class="cell small-12">
									<div class="body"><?php echo get_field('step_3'); ?></div>
								</div>
							</div>

							<div class="grid-x grid-margin-x step">
								<div class="cell small-6">
									<div class="title">4. <?php echo get_field('step_4_title'); ?></div>
								</div>
								<div class="cell small-6">
									<div class="body"><?php echo get_field('step_4'); ?></div>
								</div>
							</div>


							<?php
								$courseSlug = 'salads';							
								$excludeSlug = 'diy';	
								AUSteve_Menu_Include($courseSlug, 'menu-board', $excludeSlug);
							?>

						</div>

						<div class="highlight">

							<h2>We cater too!</h2>
							<div class="tagline">Visit us at thezestylemon.ca or ask us for a catering menu</div>

						</div>

					</div>

				</div>

				<div class="cell small-6">
					
					<div class="container">

						<div class="heading">

							<h1>Side Dishes</h1>
							<div class="tagline">Add a Little Zest to Your Meal</div>

						</div>

						<div class="body" id="side-dishes">
							<?php
								$courseSlug = 'side-dishes';								
								AUSteve_Menu_Include($courseSlug, 'menu-board');
							?>

						</div>

						<div class="heading" id="specials">

							<h1>Specials</h1>
							<div class="tagline">Please check the chalkboard for our daily inspriations</div>

						</div>

						<div class="no-highlight">
							<h2>Follow us on Social Media</h2>

							<i class="fab fa-instagram"></i> <i class="fab fa-facebook"></i> @zesty_lemon_sj<br/>
							or visit us online<br/>
							thezestylemon.ca
						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
<?php
