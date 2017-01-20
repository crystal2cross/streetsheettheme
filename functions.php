<?php
/* Just in case...
update_option( 'siteurl', 'http://localhost:8888' );
update_option( 'home', 'http://localhost:8888m' );
*/

/**
 * Street Sheet Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Street_Sheet_Theme
 */

if ( ! function_exists( 'streetsheettheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function streetsheettheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Street Sheet Theme, use a find and replace
	 * to change 'streetsheettheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'streetsheettheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
        add_image_size( 'custom_thumb', 9999, 9999, false);
        
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'streetsheettheme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'streetsheettheme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'streetsheettheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function streetsheettheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'streetsheettheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'streetsheettheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function streetsheettheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'streetsheettheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'streetsheettheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'streetsheettheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function streetsheettheme_scripts() {
	wp_enqueue_style( 'streetsheettheme-style', get_stylesheet_uri() );
        
        // Add local fonts: Fira Sans and Merriweather
        wp_enqueue_style( 'streetsheettheme-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css' );
        
        // Add FontAwesome
        wp_enqueue_style( 'streetsheettheme-fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css' );
        
        wp_enqueue_script( 'streetsheettheme-back-to-top', get_template_directory_uri() . '/js/back-to-top.js', array( 'jquery'), '20151215', true );
        
	wp_enqueue_script( 'streetsheettheme-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );
        wp_localize_script( 'streetsheettheme-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'streetsheet' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'streetsheet' ) . '</span>',
	) );
        
	wp_enqueue_script( 'streetsheettheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array( 'jquery' ), '20151215', true );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'streetsheettheme_scripts' );

function streetsheet_excerpt_thumbnail( $excerpt ){
    if( is_single() ) return $excerpt;
    global $post;
    if ( has_post_thumbnail() ) {
        $img = '<div class="post-thumbnail"><a href="'. get_permalink( $post->ID ) .'">'. get_the_post_thumbnail( $post->ID, 'custom_thumb' ) .'</a></div>';
    } else {
        $img = '';
    }
    return $img . '<div class="post-text">' . $excerpt . '</div>';
}
add_filter( 'the_excerpt', 'streetsheet_excerpt_thumbnail' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// FLEXSLIDER

function streetsheet_flexslider() {
	if (!is_admin()) {

		// Enqueue FlexSlider JavaScript
		wp_register_script('jquery_flexslider', get_template_directory_uri(). '/js/jquery.flexslider-min.js', array('jquery') );
		wp_enqueue_script('jquery_flexslider');

		// Enqueue FlexSlider Stylesheet		
		wp_register_style( 'flexslider-style', get_template_directory_uri() . '/compiled/flexslider.css', 'all' );
		wp_enqueue_style( 'flexslider-style' );
		
		// FlexSlider custom settings		
		add_action('wp_footer', 'streetsheet_flexslider_settings');
		
		function streetsheet_flexslider_settings() { ?>			
			<script>
				jQuery(document).ready(function($){

					$('.flexslider').flexslider();
				});
			</script>
		<?php 
		}

	}
}

add_action('init', 'streetsheet_flexslider');

function my_limit_archives( $args ) {
    //$args['limit'] = 4;
    return $args;
}
 
add_filter( 'widget_archives_args', 'my_limit_archives' );
add_filter( 'widget_archives_dropdown_args', 'my_limit_archives' );

add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );
 
function guest_author_name( $name ) {
    global $post;
    $author = get_post_meta( $post->ID, 'author', true );
    if ( $author )
    $name = $author;
    return $name;
}

function streetsheet_filter_pre_get_posts( $query ) {
    if ( ! is_singular() && $query->is_main_query() ) {
        $query->set( 'post__not_in', array( 2385, 2388, 2390, 2392 ) );
    }
}
add_action( 'pre_get_posts', 'streetsheet_filter_pre_get_posts' );