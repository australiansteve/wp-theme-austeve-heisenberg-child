<?php
get_header(); 

function austeve_resource_meta_walk($val, $key, &$new_array){
    $pair = explode('=',$val);
    $new_array[$pair[0]] = $pair[1];
}
?>
	<div class="grid-x">
		<?php 
		echo "<h1 class='page-title'><a href=".home_url('resources').">Resources</a></h1>";
		?>
	</div>

	<div class="grid-x">

		<main class="cell medium-12 resource-category-archive">

			<?php get_template_part( 'template-parts/archive', 'austeve-resources-categories' ); ?>

			<h2><?php echo print_r(get_queried_object()->name, true); ?></h2>
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
				?>
				<div class="grid-x <?php echo get_post_type(); ?>">

					<div class="cell medium-4 text-right image">
						<div class="solid-bg">
							<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
								the_custom_logo();
							}?>
						</div>	
					</div>

					<div class="cell medium-8 detail" id='austeve-resource-<?php echo get_the_ID(); ?>'>

						<div class="grid-y container">
							<div class="cell title">
								<h2>Your organization here</h2>
							</div>
							<div class="cell info">
								Do you belong here? 
							</div>
							<div class="cell web-site">
								<a class="web-site button" href="<?php echo home_url('contact-us');?>">Contact us</a>
							</div>
							
						</div>

					</div>

				</div>
				<?php
			else: 
				echo esc_html( "No resources in this category!" );
			endif;
			?>

		</main>

	</div>

<?php
get_footer();
