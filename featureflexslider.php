<?php 

// Custom loop for featured items in the slider on the front page. 
// Slider will show up to 6 posts marked as "sticky"

?>
					
<div class="flexslider">
	<ul class="slides">
						
		<?php 
		// Get all sticky posts, but only sticky posts
		$sticky = get_option( 'sticky_posts' );
		$args = array( 
			'numberposts' => 6, // Display up to 6 posts. Change at will
			'post__in'  => $sticky
		);
		$postQuery = get_posts($args);
							
		foreach( $postQuery as $post ) : setup_postdata($post);

			if ( has_post_thumbnail() ) { ?>
				<li>
					<?php the_post_thumbnail('feature-slider'); ?>
					<div class="flex-caption" style="text-align:center"><?php the_title();?></div>
				</li>
			<?php 
			}
		endforeach; ?>
							
	</ul>
</div>