<?php
/***
  * Archive page for AUSteve-Funds CPT
  */

get_header(); 

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="grid-x archive" id="funds-page">

			<div class="cell small-12" id="page-title" >
				<?php the_archive_title('<h1>', '</h1>'); ?>
			</div>

			<div class="cell small-12" id="page-introduction" >
				<?php the_field('funds_introduction', 'options'); ?>
			</div>

			<div class="cell small-12">

				<div class="grid-x">

					<div class="cell small-12 medium-3" id="filter-sidebar">

						<form method="GET" action="#" id="search-filters" onsubmit="return validateSearch()">
							<input type="hidden" name="austeve-funds-archive" value="true"/>
							<div class="grid-x align-right">
								<div class="cell shrink">
								    <input type="text" name="fund-name" id="fund-name" data-filter="fund-name" class="filter" value="<?php echo (isset($_GET['fund-name']) ? $_GET['fund-name'] : ''); ?>" />
								</div>
								<div class="cell small-2">
								    <input type="submit" value="go" id="submit"></input>
								</div>
							</div>
							<div class="grid-x align-right">
<?php
$terms = get_terms( 'austeve-funds-category', array(
    'hide_empty' => false,
) );

foreach($terms as $term):
	$checked = "";
	if (isset($_GET['fund-category'])) {
		$values = explode(',', $_GET['fund-category']);
		if (in_array($term->slug, $values))
		{
			$checked = "checked='checked'";
		}
	}
?>
								<div class="cell small-1">
									<input type="checkbox" name="fund-category" id="fund-category" data-filter="fund-category" value="<?php echo $term->slug;?>" <?php echo $checked; ?>/>
								</div>
								<div class="cell small-11">
								    <?php echo $term->name;?> 
								</div>
<?php endforeach;?>
							</div>
						</form>

					</div>

					<div class="cell small-12 medium-9" id="filter-results">

						<div class="grid-x" data-equalizer="fund">

<?php 

global $categoryBgColors; 
$savedBgColors = get_field('fund_category_background_colors', 'options');
error_log(print_r($savedBgColors, true));
foreach($savedBgColors as $color)
{
	$categoryBgColors[$color['category']] = $color['color'];
}
error_log(print_r($categoryBgColors, true));


if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part('template-parts/austeve-funds', 'archive');
 	endwhile; // End of the loop. 
else: ?>
							<div class="cell small-12" class="fund-title">
								No funds found. Please try a broader search
							</div>
<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

<?php
global $wp;
$home_url = home_url();
$current_url = home_url(add_query_arg(array(),$wp->request));
$afterhome = strlen($current_url) - strlen($home_url);
$request_url = substr($current_url, - ($afterhome-1));
?>

			<script type="text/javascript">
				jQuery("input[name='fund-category']").on('click', function(){
					console.log(jQuery(this).val());
					validateSearch();
				});

				function validateSearch() {
					// vars
					var url = "<?php echo home_url( $request_url ); ?>";
					var args = {};
					
					// loop over filters
					jQuery('#search-filters .filter').each(function(){
						
						// vars
						var filter = jQuery(this).data('filter'),
							vals = [ jQuery(this).val()];
						
						// append to args
						args[ filter ] = vals.join(',');
						
					});
					
					var diffVals = [];
					jQuery('#search-filters input[name=fund-category]').each(function(){
						//console.log(jQuery(this).val() + " " + jQuery(this).attr('checked'))
						if (jQuery(this).attr('checked') == 'checked')
							diffVals.push(jQuery(this).val());
					});
					// append to args
					args[ 'fund-category' ] = diffVals.join(',');

					// update url
					url += '?';
					
					
					// loop over args
					jQuery.each(args, function( name, value ){	
						if (value.length > 0)		
							url += name + '=' + value + '&';			
					});
					
					
					// remove last &
					url = url.slice(0, -1);
					// reload page
					window.location.replace( url );
					//console.log(url);
					return false;
				}
			</script>

		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>