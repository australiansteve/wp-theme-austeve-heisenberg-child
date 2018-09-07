<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell">

			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

					?>
					<div class="grid-x section align-middle" id="about">

						<div class="cell">
							<h3><?php echo get_field('about_tagline'); ?></h3>
							<p><?php echo get_field('about_description'); ?></p>

							<a class="button" href="<?php echo get_field('about_link_1_url'); ?>"><?php echo get_field('about_link_1_text'); ?></a>
							<a class="button" href="<?php echo get_field('about_link_2_url'); ?>"><?php echo get_field('about_link_2_text'); ?></a>
						</div>

					</div>

					<div id="about-image" class="banner-image">
					</div>

					<div class="grid-x section" id="menu">

						<div class="cell">
							<h2 class="section-title">Menu</h2>

							<div class="grid-x">

								<div class="cell small-3 medium-3 menu-link"><a href="#" data-name="menu-breakfast">breakfast</a></div>
								<div class="cell small-3 medium-3 menu-link"><a href="#" data-name="menu-bakery">bakery</a></div>
								<div class="cell small-3 medium-3 menu-link"><a href="#" data-name="menu-lunch">lunch</a></div>
								<div class="cell small-3 medium-3 menu-link"><a href="#" data-name="menu-deli">deli</a></div>

								<div class="cell">
									<div id="menu-container">

									</div>
								</div>

							</div>

						</div>
					</div>

					<div class="grid-x section align-middle" id="catering">

						<div class="cell">
							<h2 class="section-title">Catering</h2>
							<h3><?php echo get_field('catering_tagline'); ?></h3>
							<p><?php echo get_field('catering_description'); ?></p>

							<a class="button" href="<?php echo get_field('catering_link_1_url'); ?>"><?php echo get_field('catering_link_1_text'); ?></a>
						</div>

					</div>

					<div id="catering-image" class="banner-image">
					</div>

					<div class="grid-x section align-middle" id="contact">

						<div class="cell">
							<h2 class="section-title">Contact Us</h2>
							<p><?php echo get_field('contact_description'); ?></p>

							<div id="contact-form">
								<?php echo do_shortcode("[ninja_form id='".get_field('contact_form_id')."']"); ?>
							</div>
						</div>

					</div>

					<?php

				endwhile;

				the_posts_navigation();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			else :

				echo esc_html( 'Sorry, no posts' );

			endif; ?>

		</main>

	</div>

	<!-- Hidden menu segments -->

	<div class="hidden-menu" name="menu-breakfast">

		<div class="x-grid" id="menu-breakfast">
			<div class="cell">

				<div class="header">
					<h3>Breakfast</h3>
					<p class="tagline">Breakfast is Served from 7am-11am</p>
				</div>

				<div id="breakfast-1-image" class="banner-image">
				</div>

				<div class="menu-course-container">
					<h4>Signature Breakfast</h4>
					<?php
						$courseSlug = 'signature-breakfast';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

				<div id="breakfast-2-image" class="banner-image">
				</div>

				<div class="menu-course-container">
					<h4>Breakfast Classics</h4>
					<?php
						$courseSlug = 'breakfast-classics';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

			</div>

		</div>

	</div>

	<div class="hidden-menu" name="menu-bakery">

		<div class="x-grid" id="menu-bakery">
			<div class="cell">

				<div class="header">
					<h3>Bakery</h3>
					<p class="tagline">Freshly Baked Goods</p>
				</div>
				
				<div id="bakery-1-image" class="banner-image">
				</div>


				<div class="menu-course-container">
					<?php
						$courseSlug = 'bakery';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

			</div>

		</div>

	</div>

	<div class="hidden-menu" name="menu-lunch">

		<div class="x-grid" id="menu-lunch">
			<div class="cell">

				<div class="header">
					<h3>Lunch</h3>
					<p class="tagline"></p>
				</div>
				
				<div id="lunch-1-image" class="banner-image">
				</div>

				<div class="menu-course-container">
					<h4>Signature Sandwiches</h4>
					<?php
						$courseSlug = 'signature-sandwiches';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

				<div id="lunch-2-image" class="banner-image">
				</div>

				<div class="menu-course-container">
					<h4>Classic Sandwiches</h4>
					<?php
						$courseSlug = 'classic-sandwiches';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

				<div id="lunch-3-image" class="banner-image">
				</div>


				<div class="menu-course-container">
					<h4>Salads</h4>
					<?php
						$courseSlug = 'salads';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>


				<div class="menu-course-container">
					<h4>Side Dishes</h4>
					<?php
						$courseSlug = 'side-dishes';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

			</div>

		</div>

	</div>

	<div class="hidden-menu" name="menu-deli">

		<div class="x-grid" id="menu-deli">
			<div class="cell">

				<div class="header">
					<h3>Deli</h3>
					<p class="tagline">Fresh selections to take home</p>
				</div>
				
				<div id="deli-1-image" class="banner-image">
				</div>

				<div class="menu-course-container">
					<h4>Meat</h4>
					<?php
						$courseSlug = 'meat';								
						AUSteve_Menu_Include($courseSlug);
					?>

					<h4>Cheese</h4>
					<?php
						$courseSlug = 'cheese';								
						AUSteve_Menu_Include($courseSlug);
					?>

					<h4>Salads</h4>
					<?php
						$courseSlug = 'salads-deli';								
						AUSteve_Menu_Include($courseSlug);
					?>
				</div>

			</div>

		</div>

	</div>

	<!-- END: Hidden menu segments -->
<?php
get_footer();
