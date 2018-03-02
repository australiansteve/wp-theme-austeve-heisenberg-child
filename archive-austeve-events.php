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

							<div class="event-details">
								<div class="cell show-for-small-only current-post" id="current-post-<?php echo get_the_ID(); ?>" data-post='<?php echo get_the_ID(); ?>'>

								</div>
							</div>

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
		                    jQuery("#current-post .container").html("<i class='fa fa-spinner fa-pulse fa-fw'></i>");
		                    jQuery(".current-post").each(function() {
		                    	jQuery(this).html("");
		                    });
		                    //Delay scrolling to the clicked element by 200ms 
		                    setTimeout(function() {

		                    	//Viewport in em
		                    	var vpem = jQuery(window).width() / parseFloat(jQuery("html").css("font-size"));

		                    	if (vpem < 40)
		                    	{
		                    		//Mobile
		                    		window.scrollTo(0, jQuery(".event-block[data-post="+postId+"]").offset().top);
		                    	}
		                    	else
		                    	{
		                    		//Larger
									var container = jQuery('main.austeve-event');
									//console.log("Containertop:" + container[0].getBoundingClientRect().top);
									if (container[0].getBoundingClientRect().top < 100)
									{
			                    		window.scrollTo(0, container.offset().top - 100);	                    		
			                    	}
									container.scrollTop(0);
									var containerTop = jQuery("main.austeve-event").offset().top;
									var eventTop = jQuery(".event-block[data-post="+postId+"]").offset().top;
									// console.log(containerTop);
									// console.log(eventTop);
									// console.log(eventTop - containerTop);
									container.scrollTop(eventTop - containerTop);
		                    	}

		                    }, 200);
		                    //Remove active class from old post
		                    jQuery(".event-block.active, .current-post.active").each(function(){
		                    	if (postId !== jQuery(this).attr('data-post'))
		                    	{
		                    		jQuery(this).removeClass("active");
								}
							});
		                },
		                error: function( jqXHR, textStatus, errorThrown) {
		                    jQuery("#current-post").html("<h2>Error</h2><p>There was an error retreiving the post, if this error persists please <a href='<?php echo site_url('contact');?>'>contact us</a></p><p>"+errorThrown+"</p>");
		                },
		                success: function(html){ //so, if data is retrieved, store it in html
		                    jQuery("#current-post .container, #current-post-"+postId).each(function() {
		                    	jQuery(this).html(html)
		                    });
		                    jQuery(".event-block[data-post='"+postId+"'], #current-post-"+postId).each(function(){
		                    	jQuery(this).addClass("active");
		                    });
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

		<aside class="cell medium-8 show-for-medium" id="current-post">

			<div class="container">
			</div>

		</aside>

	</div>

<?php
get_footer();
