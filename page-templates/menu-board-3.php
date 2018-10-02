<?php
/**
 * Template Name: Menu Board 3
 *
 * @package Heisenberg
 */
get_header(); ?>

	<div id="menu-board-3" class="menu-board">
	
		<div class="background">
		</div>

		<div class="menu-board-content">

			<div class="container">

				<div class="grid-y" style="">

					<div class="cell small-2">

						<div class="grid-x">
					
							<div class="cell">

								<div class="heading">
									<h1><?php echo get_field('main_title'); ?></h1>
								</div>

							</div>

						</div>

					</div>
					
					<div class="cell auto">
					
						<div class="grid-x grid-margin-x" id="salad-how-to">

							<div class="cell small-3 step">

								<div class="container">

									<div class="title">

										<div class="number">1</div>
										<h2><?php echo get_field('step_1_title'); ?></h2>

									</div>

									<div class="body">
										<?php echo get_field('step_1'); ?>
									</div>

								</div>
								
							</div>

							<div class="cell small-3 step">

								<div class="container">

									<div class="title">

										<div class="number">2</div>
										<h2><?php echo get_field('step_2_title'); ?></h2>

									</div>

									<div class="body">
										<?php echo get_field('step_2'); ?>
									</div>

								</div>
								
							</div>

							<div class="cell small-3 step">

								<div class="container">

									<div class="title">

										<div class="number">3</div>
										<h2><?php echo get_field('step_3_title'); ?></h2>

									</div>

									<div class="body">
										<?php echo get_field('step_3'); ?>
									</div>

								</div>
								
							</div>

							<div class="cell small-3 step">

								<div class="container">

									<div class="title">

										<div class="number">4</div>
										<h2><?php echo get_field('step_4_title'); ?></h2>

									</div>

									<div class="body">
										<?php echo get_field('step_4'); ?>
									</div>

								</div>
								
							</div>

						</div>

					</div>
					<div class="cell small-2">
				
						<div class="grid-x grid-margin-x">
							
							<div class="cell small-6">

								<div class="highlight">

									<h2>Caesar Salad</h2>

									Regular - $7.50 / Family - $9.50

								</div>
							
							</div>

							<div class="cell small-6">

								<div class="highlight">

									<h2>We cater too!</h2>

									Visit us at www.thezestylemon.ca<br/>or ask us for a catering menu

								</div>
							
							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>
<?php