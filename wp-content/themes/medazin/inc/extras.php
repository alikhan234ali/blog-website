<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Medazin
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function medazin_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	return $classes;
}
add_filter( 'body_class', 'medazin_body_classes' );



if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Backward compatibility for wp_body_open hook.
	 *
	 * @since 1.0.0
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!function_exists('medazin_str_replace_assoc')) {

    /**
     * medazin_str_replace_assoc
     * @param  array $replace
     * @param  array $subject
     * @return array
     */
    function medazin_str_replace_assoc(array $replace, $subject) {
        return str_replace(array_keys($replace), array_values($replace), $subject);
    }
}

// Medazin Navigation
if ( ! function_exists( 'medazin_primary_navigation' ) ) :
function medazin_primary_navigation() {
	wp_nav_menu( 
		array(  
			'theme_location' => 'primary_menu',
			'container'  => '',
			'menu_class' => 'main-menu',
			'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
			'walker' => new WP_Bootstrap_Navwalker()
			 ) 
		);
	} 
endif;
add_action( 'medazin_primary_navigation', 'medazin_primary_navigation' );



// Medazin Navigation Cart
if ( ! function_exists( 'medazin_navigation_cart' ) ) :
function medazin_navigation_cart() {
	$medazin_hs_cart 	= get_theme_mod( 'hide_show_cart','1'); 
		if($medazin_hs_cart=='1' && class_exists( 'WooCommerce' )):	
	?>
		<li class="cart-wrapper">
			<a href="javascript:void(0);" class="cart-icon-wrap" id="cart" title="<?php esc_attr_e('View your shopping cart','medazin'); ?>">
				<i class="fa fa-shopping-bag"></i>
				<?php 
					if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
						$count = WC()->cart->cart_contents_count;
						$cart_url = wc_get_cart_url();
						
						if ( $count > 0 ) {
						?>
							 <span><?php echo esc_html( $count ); ?></span>
						<?php 
						}
						else {
							?>
							<span><?php echo esc_html_e('0','medazin'); ?></span>
							<?php 
						}
					}
				?>
			</a>
			<!-- Shopping Cart Start -->
			<div class="shopping-cart">
				<?php get_template_part('woocommerce/cart/mini','cart'); ?>3
			</div>
			<!-- Shopping Cart End -->
		</li>
	<?php endif; 
	} 
endif;
add_action( 'medazin_navigation_cart', 'medazin_navigation_cart' );



// Medazin Logo
if ( ! function_exists( 'medazin_logo_content' ) ) :
function medazin_logo_content() {
		if(has_custom_logo())
			{	
				the_custom_logo();
			}
			else { 
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">
				<h4 class="site-title">
					<?php 
						echo esc_html(get_bloginfo('name'));
					?>
				</h4>
			</a>	
		<?php 						
			}
		?>
		<?php
			$medazin_description = get_bloginfo( 'description');
			if ($medazin_description) : ?>
				<p class="site-description"><?php echo esc_html($medazin_description); ?></p>
		<?php endif;
	} 
endif;
add_action( 'medazin_logo_content', 'medazin_logo_content' );



 /**
 * Add WooCommerce Cart Icon With Cart Count (https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header)
 */
function medazin_add_to_cart_fragment( $fragments ) {
	
    ob_start();
    $count = WC()->cart->cart_contents_count; 
    ?> 
	<a href="javascript:void(0);" class="cart-icon-wrap" id="cart" title="<?php esc_attr_e('View your shopping cart','medazin'); ?>">
	<i class="fa fa-shopping-bag"></i>	
	<?php
    if ( $count > 0 ) { 
	?>
        <span><?php echo esc_html( $count ); ?></span>
	<?php            
    } else {
	?>	
		<span><?php echo esc_html_e('0','medazin'); ?></span>
	<?php
	}
    ?></a><?php
 
    $fragments['a.cart-icon-wrap'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'medazin_add_to_cart_fragment' );





/*******************************************************************************
 *  Get Started Notice
 *******************************************************************************/

add_action( 'wp_ajax_medazin_dismissed_notice_handler', 'medazin_ajax_notice_handler' );

/**
 * AJAX handler to store the state of dismissible notices.
 */
function medazin_ajax_notice_handler() {
	// Verify the nonce
    check_ajax_referer( 'medazin-ajax-nonce', 'nonce' );
	
    if ( isset( $_POST['type'] ) ) {
        // Pick up the notice "type" - passed via jQuery (the "data-notice" attribute on the notice)
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        // Store it in the options table
        update_option( 'dismissed-' . $type, TRUE );
    }
	
	// Send a response (you can use wp_send_json_success() or wp_send_json_error())
    wp_send_json_success( 'Notice dismissed!' );
}

function medazin_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
            // Added the class "notice-get-started-class" so jQuery pick it up and pass via AJAX,
            // and added "data-notice" attribute in order to track multiple / different notices
            // multiple dismissible notice states ?>
            <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="medazin-getting-started-notice clearfix">
                    <div class="medazin-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'medazin' ); ?>" />
                    </div><!-- /.medazin-theme-screenshot -->
                    <div class="medazin-theme-notice-content">
                        <h2 class="medazin-notice-h2">
                            <?php
                        printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                            esc_html__( 'Welcome! Thank you for choosing %1$s!', 'medazin' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                        ?>
                        </h2>

                        <p class="plugin-install-notice"><?php printf(__('Install and activate %1$sClever Fox%2$s plugin for taking full advantage of all the features this theme has to offer.', 'medazin'), '<strong>', '</strong>'); ?></p>

                        <a class="medazin-btn-get-started button button-primary button-hero medazin-button-padding" href="#" data-name="" data-slug=""><?php esc_html_e( 'Get started with Medazin', 'medazin' ) ?></a><span class="medazin-push-down">
                        <?php
                            /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                            printf(
                                __('or %1$sCustomize theme%2$s</a></span>','medazin'),
                                '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                                '</a>'
                            );
                        ?>
                    </div><!-- /.medazin-theme-notice-content -->
                </div>
            </div>
        <?php }
}

add_action( 'admin_notices', 'medazin_deprecated_hook_admin_notice' );

/*******************************************************************************
 *  Plugin Installer
 *******************************************************************************/

add_action( 'wp_ajax_install_act_plugin', 'medazin_admin_install_plugin' );

function medazin_admin_install_plugin() {
	 // Verify the nonce
    check_ajax_referer( 'medazin-ajax-nonce', 'nonce' );
	
    /**
     * Install Plugin.
     */
    include_once ABSPATH . '/wp-admin/includes/file.php';
    include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

    if ( ! file_exists( WP_PLUGIN_DIR . '/clever-fox' ) ) {
        $api = plugins_api( 'plugin_information', array(
            'slug'   => sanitize_key( wp_unslash( 'clever-fox' ) ),
            'fields' => array(
                'sections' => false,
            ),
        ) );

        $skin     = new WP_Ajax_Upgrader_Skin();
        $upgrader = new Plugin_Upgrader( $skin );
        $result   = $upgrader->install( $api->download_link );
    }

    // Activate plugin.
    if ( current_user_can( 'activate_plugin' ) ) {
        $result = activate_plugin( 'clever-fox/clever-fox.php' );
    }
	
	 // Return a response if needed
    wp_send_json_success( 'Plugin installed successfully!' );
}