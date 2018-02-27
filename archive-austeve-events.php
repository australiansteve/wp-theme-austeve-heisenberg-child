<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell medium-4 austeve-event">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) :

					the_post();

				?>
					<div class="grid-x">

						<div class="cell align-middle">

				<?php			
					$image = get_field('cover_image');

					if( !empty($image) ): ?>

						<div class="event-block-background" style="background-image: url(<?php echo $image['url']; ?>);">

					<?php endif; ?>


				<div class="event-block" data-post='<?php echo get_the_ID(); ?>'>
				<div class="grid-y container" style="height: 20rem;">
					<div class="cell small-4 title">
						<?php the_title( '<h1>', '</h1>' ); ?>
					</div>
					<div class="cell small-4 excerpt align-middle">
						<?php the_content(); ?>
					</div>
					<div class="cell small-4 read-more">
						Read more
					</div>
				</div>
				</div>

				<?php
				if( !empty($image) ): ?>

					</div>

				<?php endif; ?>


						</div>

					</div>

				<?php
				endwhile;

				the_posts_navigation();

				
			    $nonce_post = wp_create_nonce( 'austevegetpost' );
?>
<script>
			    function get_post( postId ) {
		            console.log("Get post: " + postId);
		            jQuery.ajax({
		                type: "post", 
		                url: '<?php echo admin_url("admin-ajax.php"); ?>', 
		                data: { 
		                    action: 'austeve_get_post', 
		                    postId: postId, 
		                    _ajax_nonce: '<?php echo $nonce_post; ?>' 
		                },
		                beforeSend: function() {
		                    jQuery("#current-post").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>");
		                },
		                error: function( jqXHR, textStatus, errorThrown) {
		                    jQuery("#current-post").html("<h2>Error</h2><p>There was an error retreiving the post, if this error persists please <a href='<?php echo site_url('contact');?>'>contact us</a></p><p>"+errorThrown+"</p>");
		                },
		                success: function(html){ //so, if data is retrieved, store it in html
		                    jQuery("#current-post").html(html);
		                    //jQuery(document).foundation();
		                }
		            }); //close jQuery.ajax(
        		}


		        jQuery(".event-block").on('click', function() {
		            var postId = jQuery(this).attr("data-post");
		            get_post( postId );
		        });

    </script>

			    <?php


			else :

				echo esc_html( 'Sorry, the event could not be found' );

			endif; ?>

		</main>

		<aside class="cell medium-8" id="current-post">

			#Content

		</aside>

	</div>

<?php
get_footer();
