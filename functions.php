<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array(  ) );
        wp_enqueue_style( 'flebox-grid', "https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css", array(  ) );
        wp_enqueue_style( 'custom-style', trailingslashit( get_stylesheet_directory_uri() ) . '/assets/css/main.css', array(  ) );
        wp_enqueue_style( 'slick-style', trailingslashit( get_stylesheet_directory_uri() ) . '/slick/slick.css', array(  ) );
        wp_enqueue_style( 'slick-theme', trailingslashit( get_stylesheet_directory_uri() ) . '/slick/slick-theme.css', array(  ) );

        wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery','slick-js' ),'',true );
        wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/slick/slick.min.js', array( 'jquery' ),'',true );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


require_once "inc/helpers.php";

// CUSTOM POST TYPES
require_once "inc/custom-post-types/cpt_podcast.php";

function add_my_post_types_to_query( $query ) {
	if ( (is_single() || is_home() || is_category() ) && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'product', 'podcast' ) );

	return $query;
}

// CUSTOM TAXONOMIES
require_once "inc/custom-taxonomies/tax_serie_podcast.php";
//require_once "inc/custom-taxonomies/tax_temporada_podcast.php";

//SHORTCODES
require_once "inc/shortcodes/sc_carousel_podcast.php";
require_once "inc/shortcodes/sc_grid_series.php";
require_once "inc/shortcodes/sc_grid_podcast.php";

require_once "inc/register-sidebar.php";