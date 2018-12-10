<?php
get_header(); 

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		$image = get_field('cover_photo');

		if( !empty($image) ): ?>

			<div class="grid-x grid-margin-x" id="cover-photo">

				<div class="cell">

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

				</div>

			</div>

		<?php endif; ?>

	<div class="grid-x grid-margin-x">

		<div class="cell" id="page-content">
			<?php the_content(); ?>
		</div>

	</div>

<?php


	endwhile;

else :

	echo esc_html( 'Sorry, no posts' );

endif; ?>


<?php
get_footer();
