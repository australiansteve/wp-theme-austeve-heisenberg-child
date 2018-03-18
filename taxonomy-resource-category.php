<?php
get_header(); 

function austeve_resource_meta_walk($val, $key, &$new_array){
    $pair = explode('=',$val);
    $new_array[$pair[0]] = $pair[1];
}
?>

	<div class="grid-x">

		<main class="cell medium-12 resource-category-archive">

			<?php get_template_part( 'template-parts/archive', 'austeve-resources-categories' ); ?>


			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();
					?>

					<div class="grid-x <?php echo get_post_type(); ?>">

						<div class="cell medium-4 text-right image">
							<?php get_template_part( 'template-parts/archive', get_post_type().'-image' ); ?>
						</div>

						<div class="cell medium-8 detail" id='austeve-resource-<?php echo get_the_ID(); ?>'>

							<div class="grid-y container">
								<div class="cell title">
									<?php the_title( '<h2>', '</h2>' ); ?>
								</div>
								<div class="cell info">
									<?php the_content(); ?>
								</div>
								<div class="cell web-site">
									<a class="web-site button" href="<?php echo get_field('url');?>" target="_blank">View Website</a>
								</div>
								
							</div>

						</div>

					</div>

				<?php
				endwhile;

			else: 
				echo esc_html( "No resources in this category!" );
			endif;
			?>

		</main>

	</div>

<?php
get_footer();
