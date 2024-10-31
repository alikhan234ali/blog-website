<?php
 /**
 * Enqueue scripts and styles.
 */
function medazin_scripts() {
	
	// Styles	
	wp_enqueue_style('animate',get_template_directory_uri().'/assets/css/animate-min.css');
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/all.min.css');
	wp_enqueue_style('bootstrap',get_template_directory_uri().'/assets/css/bootstrap-min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl-carousel-min.css');
	
	wp_enqueue_style('medazin-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	/* wp_enqueue_style('medazin-default', get_template_directory_uri() . '/assets/css/color/default.css'); */

	wp_enqueue_style('medazin-widgets',get_template_directory_uri().'/assets/css/widget-min.css');
	wp_enqueue_style('medazin-widgets',get_template_directory_uri().'/assets/css/widget-block-min.css');
	wp_enqueue_style('medazin-widgets',get_template_directory_uri().'/assets/css/wc-blocks-style-min.css');


	// wp_enqueue_style('magnific-popup-min', get_template_directory_uri() . '/assets/css/magnific-popup-min.css');
	if(is_rtl()){
		wp_enqueue_style('medazin-main', get_template_directory_uri() . '/assets/css/main-rtl.css');
		wp_enqueue_style('medazin-menu', get_template_directory_uri() . '/assets/css/menu-rtl.css');
		wp_enqueue_style('medazin-woocommerce', get_template_directory_uri() . '/assets/css/woo-min.css');
		wp_enqueue_style('medazin-responsive', get_template_directory_uri() . '/assets/css/responsive-rtl.css');
	}else{
		wp_enqueue_style('medazin-main', get_template_directory_uri() . '/assets/css/main.css');
		wp_enqueue_style('medazin-menu', get_template_directory_uri() . '/assets/css/menu.css');
		wp_enqueue_style('medazin-woocommerce', get_template_directory_uri() . '/assets/css/woo-min.css');
		wp_enqueue_style('medazin-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
	}
	
	
	wp_enqueue_style( 'medazin-style', get_stylesheet_uri() );
	
	// Scripts
	wp_enqueue_script( 'jquery' );
	
	// wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/jquery-magnific-popup-min.js', array('jquery'), true);
	
	wp_enqueue_script('owl-carousel-thumb', get_template_directory_uri() . '/assets/js/carousel.js', array('jquery'), true);
	
	// wp_enqueue_script('jscolor', get_template_directory_uri() . '/assets/js/jscolor-min.js', array('jquery'), true);

	// wp_enqueue_script('masonary', get_template_directory_uri() . '/assets/js/masonry-min.js', array('jquery'), true);
	
	// wp_enqueue_script('style-configurator', get_template_directory_uri() . '/assets/js/style-configurator.js', array('jquery'), true);
	
	wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow-min.js', array('jquery'), true);
	
	wp_enqueue_script('medazin-custom-js', get_template_directory_uri() . '/assets/js/custom-min.js', array('jquery'), true);
	
	wp_enqueue_script('jquery-ripples-min', get_template_directory_uri() . '/assets/js/jquery-ripples-min.js', array('jquery'), true);
	
	wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/assets/js/bootstrap-min.js', array('jquery'), false, true);
	
	wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl-carousel-min.js', array('jquery'), false, true);
	
	// wp_enqueue_script('jquery-counterup-min', get_template_directory_uri() . '/assets/js/jquery-counterup-min.js', array('jquery'), false, true);
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'medazin_scripts' );

//Admin Enqueue for Admin
function medazin_admin_enqueue_scripts(){
	wp_enqueue_style('medazin-admin-style', get_template_directory_uri() . '/assets/css/admin-min.css');	
	wp_enqueue_script( 'medazin-admin-script', get_template_directory_uri() . '/assets/js/medazin-admin-script-min.js', array( 'jquery' ), '', true );
	$nonce = wp_create_nonce( 'medazin-ajax-nonce' ); // Generate a nonce and pass it to the JavaScript
    wp_localize_script( 'medazin-admin-script', 'medazin_ajax_object',
		array( 
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'nonce'    => $nonce, 
	));
}
add_action( 'admin_enqueue_scripts', 'medazin_admin_enqueue_scripts' );
?>