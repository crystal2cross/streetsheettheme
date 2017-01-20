<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Street_Sheet_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
            	<?php
                if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php streetsheettheme_post_date() ?>
		</div><!-- .entry-meta -->
                <?php
		endif;
            
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php 
                if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php streetsheettheme_post_author() ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
        
        <div class="streetsheet-social-links-container">
            <div class="streetsheet-social-links-label">Share this:</div>
            <?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
        </div>

	<footer class="entry-footer">
		<?php streetsheettheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
