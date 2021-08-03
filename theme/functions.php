<?php
/**
 * spoppin's functions and definitions
 *
 * @package spoppin
 * @since spoppin 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Core Constants.
define( 'SPOPPIN_THEME_DIR', get_template_directory() );
define( 'SPOPPIN_THEME_URI', get_template_directory_uri() );
 
/**
 * First, let's set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 1300; /* pixels */
 
if ( ! function_exists( 'spoppin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function spoppin_setup() {
 
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    // load_theme_textdomain( 'spoppin', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'spoppin' ),
        'secondary' => __('Secondary Menu', 'spoppin' ),
		'footer' => __('Footer Menu', 'spoppin' )
    ) );
 
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

}
endif; // spoppin_setup
add_action( 'after_setup_theme', 'spoppin_setup' );

function SPOPPIN_styles_method() {  

	// CSS Styles
	wp_enqueue_style( 'plugins-css', get_template_directory_uri().'/assets/src/css/plugins.css');  
	wp_enqueue_style( 'spoppinblue', get_template_directory_uri().'/assets/src/css/theme/blue.css');  
	wp_enqueue_style( 'spoppinthibi', get_template_directory_uri().'/assets/src/css/font/thicccboi.css');
	
	// JS Styles
	wp_enqueue_script('spoppin-jquery', get_template_directory_uri() . '/assets/cdn/ajax/libs/jquery/3.6.0/jquery.min.js', array('jquery'));
	wp_enqueue_script('spoppin-bootstrap-bundle', get_template_directory_uri() . '/assets/cdn/npm/bootstrap/dist/js/bootstrap.bundle.min.js', array ( 'jquery' ) );
	wp_enqueue_script('spoppin-plugins', get_template_directory_uri() . '/assets/src/js/plugins.js');
	wp_enqueue_script('spoppin-scripts', get_template_directory_uri() . '/assets/src/js/scripts.js');

}  
add_action( 'wp_enqueue_scripts', 'SPOPPIN_styles_method' ); 

