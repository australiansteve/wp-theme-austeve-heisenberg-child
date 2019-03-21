<?php
$terms = get_the_terms($post, 'austeve-funds-category' );
error_log("terms for post ".$post->ID.": ".print_r($terms, true));

$bgColor = "#00000f"; //Default color
global $categoryBgColors;
error_log(print_r($categoryBgColors, true));
foreach($terms as $term)
{
	if (array_key_exists($term->term_id, $categoryBgColors))
	{
		$bgColor = $categoryBgColors[$term->term_id];
	}
}
// if(!$bgColor)
// {
// 	$bgColor = '#bc5298';
// }

?>
<div class="cell small-6 medium-4 fund">
	<div class="container">
		<div class="bg-image" style="background-image:url(<?php the_post_thumbnail_url();?>)"></div>
		<div class="bg-color" style="background-color:<?php echo $bgColor; ?>"></div>

		<div class="grid-x align-middle archive-content" data-equalizer-watch="fund">
			<div class="cell small-12">

				<?php the_title('<h4>', '</h3>'); ?>

				<div class="action">		
					<a class="button" href="<?php the_permalink();?>">DONATE NOW</a>
				</div>

			</div>
		</div>
	</div>
</div>
