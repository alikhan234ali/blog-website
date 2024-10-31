<?php

class Medazin_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $medazin_deactivate_button_label;
	
	
	private $config;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Medazin_Customizer_Notify ) ) {
			self::$instance = new Medazin_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $medazin_customizer_notify_recommended_plugins;
		global $medazin_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $medazin_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$medazin_customizer_notify_recommended_plugins = array();
		$medazin_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$medazin_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$medazin_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$medazin_deactivate_button_label = isset( $this->config['medazin_deactivate_button_label'] ) ? $this->config['medazin_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'medazin_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'medazin_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'medazin_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'medazin_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function medazin_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'medazin-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/medazin-customizer-notify.css', array());

		wp_enqueue_style( 'medazin-plugin-install' );
		wp_enqueue_script( 'medazin-plugin-install' );
		wp_add_inline_script( 'medazin-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'medazin-updates' );

		wp_enqueue_script( 'medazin-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/medazin-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'medazin-customizer-notify-js', 'MedazinCustomizercompanionObject', array(
				'medazin_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'medazin_template_directory' => esc_url(get_template_directory_uri()),
				'medazin_base_path'          => esc_url(admin_url()),
				'medazin_activating_string'  => __( 'Activating', 'medazin' ),
			)
		);

	}

	
	public function medazin_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/inc/customizer-notify/medazin-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Medazin_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Medazin_Customizer_Notify_Section(
				$wp_customize,
				'Medazin-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function medazin_customizer_notify_dismiss_recommended_action_callback() {

		global $medazin_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {
			
			if ( get_theme_mod( 'medazin_customizer_notify_show' ) ) {

				$medazin_customizer_notify_show_recommended_actions = get_theme_mod( 'medazin_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$medazin_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$medazin_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($medazin_customizer_notify_show_recommended_actions);
				
			} else {
				$medazin_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $medazin_customizer_notify_recommended_actions ) ) {
					foreach ( $medazin_customizer_notify_recommended_actions as $medazin_lite_customizer_notify_recommended_action ) {
						if ( $medazin_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$medazin_customizer_notify_show_recommended_actions[ $medazin_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$medazin_customizer_notify_show_recommended_actions[ $medazin_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($medazin_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function medazin_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {
		// Get the list of dismissed plugin IDs from the options table
        $dismissed_plugins = get_option( 'medazin_customizer_notify_dismissed_plugins', array() );		

			switch ( $_GET['todo'] ) {
            case 'add':
                // Remove the plugin ID from the dismissed list when re-added
                if ( isset( $dismissed_plugins[ $action_id ] ) ) {
                    unset( $dismissed_plugins[ $action_id ] );
                    update_option( 'medazin_customizer_notify_dismissed_plugins', $dismissed_plugins );
                }
                break;
            case 'dismiss':
                // Add the plugin ID to the dismissed list
                if ( ! isset( $dismissed_plugins[ $action_id ] ) ) {
                    $dismissed_plugins[ $action_id ] = true;
                    update_option( 'medazin_customizer_notify_dismissed_plugins', $dismissed_plugins );
                }
                break;
			}
		}
		die(); 
	}
}
