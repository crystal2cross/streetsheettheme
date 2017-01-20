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
    <!--<div class="streetsheet-read-issue-link">READ ISSUE LINK</div>-->
    <div class="streetsheet-social-media-links">
        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
        <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
        <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
        <i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i>
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
                    <i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
                    <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square fa-lg" aria-hidden="true"></i>
                    <i class="fa fa-youtube-square fa-lg" aria-hidden="true"></i>
                </div>
                
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'streetsheettheme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

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