<?php
class medazin_import_dummy_data {

	private static $instance;

	public static function init( ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof medazin_import_dummy_data ) ) {
			self::$instance = new medazin_import_dummy_data;
			self::$instance->medazin_setup_actions();
		}

	}

	/**
	 * Setup the class props based on the config array.
	 */
	

	/**
	 * Setup the actions used for this class.
	 */
	public function medazin_setup_actions() {

		// Enqueue scripts
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'medazin_import_customize_scripts' ), 0 );

	}
	
	

	public function medazin_import_customize_scripts() {

	wp_enqueue_script( 'medazin-import-customizer-js', get_template_directory_uri() . '/assets/js/medazin-import-customizer.js', array( 'customize-controls' ) );
	}
}

$medazin_import_customizers = array(

		'import_data' => array(
			'recommended' => true,
			
		),
);
medazin_import_dummy_data::init( apply_filters( 'medazin_import_customizer', $medazin_import_customizers ) );