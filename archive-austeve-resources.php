<?php
get_header(); 

function austeve_resource_meta_walk($val, $key, &$new_array){
    $pair = explode('=',$val);
    $new_array[$pair[0]] = $pair[1];
}
?>

	<div class="grid-x">

		<main class="cell medium-12 resources archive">

			<?php get_template_part( 'template-parts/archive', 'austeve-resources-categories' ); ?>

		</main>

	</div>

<?php
get_footer();
