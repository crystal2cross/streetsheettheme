<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Street_Sheet_Theme
 */
get_header();
include "wp-load.php"; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    
                <?php
                    // Check if this is the front page and that it is not page 2 or higher
                    if ( is_front_page() && !is_paged() ) {
                            // Add featured content slider
                            get_template_part( 'featureflexslider' );
                    }
                    
                    $paged = max(1, get_query_var('paged'));
                    
                    $args = array(
                        'posts_per_page' => 10,
                        'ignore_sticky_posts' => true,
                        'post__not_in' => get_option( 'sticky_posts' ),
                        'paged' => $paged
                    );
                    
                    $the_query = new WP_Query( $args );
                ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php
					// Is this the first post of the front page?
					$first_post = $wp_query->current_post == 0 && !is_paged() && is_front_page();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if ( $first_post == true ) {
						get_template_part( 'template-parts/content', 'single' );
					} else {
						get_template_part( 'template-parts/content', get_post_format() );
					}
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>