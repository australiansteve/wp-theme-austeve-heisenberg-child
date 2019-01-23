<?php
/***
  * Template Name: FAQ Page
  */

get_header(); 

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x" id="contact-page">

		<?php while ( have_posts() ) : the_post(); 

			$terms = get_terms('austeve-faqs-category');
			error_log("Terms: ".print_r($terms, true));
			?>

			<div class="cell small-12" class="page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="cell small-12" class="page-content">
				<?php the_content(); ?>
			</div>

			<div class="cell small-12" class="faq-category-links">
				<?php 
					foreach($terms as $term) { 
				?>
					<a class="change-faqs" href="" data-name="<?php echo $term->name; ?>" data-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></a><br/>
				<?php
					}
				?>
			</div>

			<div class="cell small-12 faqs-container">

				<h2><span class='category-name'><?php echo array_values($terms)[0]->name;?></span> FAQs</h2>

				<?php 
				$terms = get_terms('austeve-faqs-category');

				$slugs = "";
				foreach($terms as $term) { 
					$slugs .= $term->slug.",";
				?>

				<?php //do_shortcode("[austeve_faqs include_category='".$term->slug."']"); ?>

				<?php } //end foreach
				$endsWithComma = substr_compare( $slugs, ',', -strlen( ',' ) ) === 0;
				if ($endsWithComma)
					$slugs = substr($slugs, 0, strlen($slugs) - 1);
				 ?>

				<?php do_shortcode("[austeve_faqs include_category='".$slugs."']"); ?>
				
			</div>

		<?php endwhile; // End of the loop. ?>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>