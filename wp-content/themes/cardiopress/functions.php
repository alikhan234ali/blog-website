<?php
/**
	* Define Theme Version
 */
define( 'CARDIOPRESS_THEME_VERSION', '2.8' );	
	
function cardiopress_css() {
	$parent_style = 'medazin-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'cardiopress-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('cardiopress-color-default',get_stylesheet_directory_uri() .'/assets/css/color/default.css');
	wp_dequeue_style('medazin-default');
	
	wp_dequeue_style('medazin-media-query');
	wp_dequeue_style('medazin-fonts');
}
add_action( 'wp_enqueue_scripts', 'cardiopress_css',999);
   	
if ( ! function_exists( 'cardiopress_setup' ) ) :
function cardiopress_setup()	{	
	add_editor_style( array( 'assets/css/editor-style.css', cardiopress_google_font() ) );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
}
endif;
add_action( 'after_setup_theme', 'cardiopress_setup' );
	
/**
 * Register Google fonts for CardioPress.
 */
function cardiopress_google_font() {
	
   $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $get_fonts_url;
}

function cardiopress_scripts_styles() {
    wp_enqueue_style( 'cardiopress-fonts', cardiopress_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'cardiopress_scripts_styles' );


/**
 * Called all the Customize file.
 */
require( get_stylesheet_directory() . '/inc/customize/cardiopress-premium.php');

/**
 * Import Options From Parent Theme
 *
 */
function cardiopress_parent_theme_options() {
	$medazin_mods = get_option( 'theme_mods_axtria' );
	if ( ! empty( $medazin_mods ) ) {
		foreach ( $medazin_mods as $medazin_mod_k => $medazin_mod_v ) {
			set_theme_mod( $medazin_mod_k, $medazin_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'cardiopress_parent_theme_options' );

require_once get_stylesheet_directory() . '/inc/extras.php';