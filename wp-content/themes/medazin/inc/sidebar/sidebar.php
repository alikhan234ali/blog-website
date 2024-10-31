<?php	
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package medazin
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function medazin_widgets_init() {	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'medazin' ),
		'id' => 'medazin-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title"><span></span>',
		'after_title' => '</h5>',
	) );
	

	register_sidebar( array(
		'name' => __( 'Footer 1', 'medazin' ),
		'id' => 'medazin-footer-1',
		'description' => __( 'The Footer Widget Area 1', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="%2$s col-lg-3 footer-content-wrap col-md-6">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 2', 'medazin' ),
		'id' => 'medazin-footer-2',
		'description' => __( 'The Footer Widget Area 2', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="%2$s col-lg-3 footer-content-wrap col-md-6">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 3', 'medazin' ),
		'id' => 'medazin-footer-3',
		'description' => __( 'The Footer Widget Area 3', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="%2$s col-lg-3 footer-content-wrap col-md-6">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer 4', 'medazin' ),
		'id' => 'medazin-footer-4',
		'description' => __( 'The Footer Widget Area 4', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="%2$s col-lg-3 footer-content-wrap col-md-6">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'WooCommerce Widget Area', 'medazin' ),
		'id' => 'medazin-woocommerce-sidebar',
		'description' => __( 'This Widget area for WooCommerce Widget', 'medazin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );	
}
add_action( 'widgets_init', 'medazin_widgets_init' );
?>