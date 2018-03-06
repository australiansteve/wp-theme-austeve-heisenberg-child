<?php
get_header(); ?>

	<div class="grid-x">

		<main class="cell medium-cell-block-y medium-4 austeve-post <?php echo get_post_type(); ?>">
			<?php
			if ( have_posts() ) :

				$loadFirstPost = false;

				while ( have_posts() ) :

					the_post();

					if (!$loadFirstPost)
					{
						$loadFirstPost = get_the_ID();
					}
				?>
					<div class="grid-x">

						<div class="cell align-middle">
							
							<?php get_template_part( 'template-parts/archive', get_post_type().'-before-block' ); ?>

							<div class="post-block" data-post='<?php echo get_the_ID(); ?>'>
							<div class="grid-y container" style="height: 20rem;">
								<div class="cell shrink title">
									<?php the_title( '<h1>', '</h1>' ); ?>
								</div>
								<div class="cell auto cell-block-container excerpt">
									<?php the_excerpt(); ?>
								</div>
								<div class="cell shrink read-more">
									Read more
								</div>
							</div>
							</div>

							<?php get_template_part( 'template-parts/archive', get_post_type().'-after-block' ); ?>

							<div class="post-details">
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
		                    		window.scrollTo(0, jQuery(".post-block[data-post="+postId+"]").offset().top);
		                    	}
		                    	else
		                    	{
		                    		//Larger
									var container = jQuery('main.austeve-post');
									//console.log("Containertop:" + container[0].getBoundingClientRect().top);
									if (container[0].getBoundingClientRect().top < 100)
									{
			                    		window.scrollTo(0, container.offset().top - 100);	                    		
			                    	}
									container.scrollTop(0);
									var containerTop = jQuery("main.austeve-post").offset().top;
									var postTop = jQuery(".post-block[data-post="+postId+"]").offset().top;
									// console.log(containerTop);
									// console.log(postTop);
									// console.log(postTop - containerTop);
									container.scrollTop(postTop - containerTop);
		                    	}

		                    }, 200);
		                    //Remove active class from old post
		                    jQuery(".post-block.active, .current-post.active").each(function(){
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
		                    jQuery(".post-block[data-post='"+postId+"'], #current-post-"+postId).each(function(){
		                    	jQuery(this).addClass("active");
		                    });
		                }
		            }); //close jQuery.ajax(
        		}


		        jQuery(".post-block").on('click', function() {
		            var postId = jQuery(this).attr("data-post");
		            get_post( postId );
		        });

		        //Load first post
		        get_post( <?php echo $loadFirstPost; ?> );

    </script>

			    <?php


			else :

				echo esc_html( 'Sorry, the post could not be found' );

			endif; ?>

		</main>

		<aside class="cell medium-cell-block-y medium-8 show-for-medium" id="current-post">

			<div class="container">
			</div>

		</aside>

	</div>

<?php
get_footer();
