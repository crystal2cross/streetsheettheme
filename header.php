<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Street_Sheet_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<div class="streetsheet-header-links">
    <!--<div class="streetsheet-read-issue-link">
        <a href="http://www.streetsheet.org/?page_id=2367">
            <img style="width:130px;height:130px;margin-top:1.3em;" src="http://www.streetsheet.org/wp-content/uploads/2017/01/issues-icon.png">
        </a>
    </div>-->
    <div class="streetsheet-social-media-links">
        <a href="https://www.facebook.com/streetsheetsf/ " target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
        <a href="https://twitter.com/TheCoalitionSF" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
        <a href="https://www.instagram.com/coalitiononhomelessness/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
    </div>
</div>

<body <?php body_class(); ?>>
    
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'streetsheettheme' ); ?></a>
        
        <?php if ( get_header_image() ) { ?>
            <header id="masthead" class="site-header" style="background-image: url( <?php header_image() ?>) " role="banner">
        <?php } else { ?>
            <header id="masthead" class="site-header" role="banner">
        <?php } ?>
                
		<div class="site-branding">
			<?php
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

                <?php // Display site logo ?>
		<div class="site-logo">
			<?php $site_title = get_bloginfo( 'name' ); ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<div class="screen-reader-text">
					<?php printf( esc_html__('Go to the home page of %1$s', 'Street Sheet'), $site_title ); ?>
				</div>
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} ?>
			</a>
		</div>
                
                <div class="streetsheet-social-media-links-mobile">
                    <a href="https://www.facebook.com/streetsheetsf/ " target="_blank"><i class="fa fa-facebook-square fa-lg" aria-hidden="true" style="margin-right:.2em"></i></a>
                    <a href="https://twitter.com/TheCoalitionSF" target="_blank"><i class="fa fa-twitter-square fa-lg" aria-hidden="true" style="margin-right:.2em"></i></a>
                    <a href="https://www.instagram.com/coalitiononhomelessness/" target="_blank"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a>
                </div>
                
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'streetsheettheme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
                
	</header><!-- #masthead -->

        <div class="after-header" style="position: relative">
            <div class="streetsheet-search-bar">
                <?php get_search_form(); ?>
            </div>

            <?php // Check if this is the front page and that it is not page 2 or higher
            if ( is_front_page() && !is_paged() ) {
                // Add featured content slider
                get_template_part( 'featureflexslider' );
            } ?>
        </div>

	<div id="content" class="site-content">
            
        <a href="#" class="back-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>
        
        <div class="streetsheet-breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
            <?php if(!is_front_page() && !is_home() && function_exists('bcn_display'))
            {
                ?>
                <a  href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> Home</a>
                <?php
                bcn_display();
            }?>
        </div>