<?php
/**
 * Medazin Theme Customizer.
 *
 * @package Medazin
 */

 if ( ! class_exists( 'Medazin_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Medazin_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'medazin_customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'medazin_customizer_script' ) );
			add_action( 'after_setup_theme',                       array( $this, 'medazin_customizer_settings' ) );
			add_action( 'customize_register',                      array( $this, 'medazin_customizer_register' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function medazin_customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';

			/**
			 * Helper files
			 */
			require MEDAZIN_PARENT_INC_DIR . '/custom-controls/font-control.php';
			require MEDAZIN_PARENT_INC_DIR . '/sanitization.php';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function medazin_customize_preview_js() {
			wp_enqueue_script( 'medazin-customizer', MEDAZIN_PARENT_URI . '/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}
		
		function medazin_customizer_script() {
			 wp_enqueue_script( 'medazin-customizer-section', MEDAZIN_PARENT_URI .'/assets/js/customizer-section.js', array("jquery"),'', true  );	
		}

		// Include customizer customizer settings.
			
		function medazin_customizer_settings() {
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-header.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-blog.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-footer.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-general.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/customizer_recommended_plugin.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/customizer_import_data.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-customize-base-control.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-radio-image.php';
				require MEDAZIN_PARENT_INC_DIR . '/customizer/medazin-premium.php';
		}

	}
}// End if().

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Medazin_Customizer::get_instance();