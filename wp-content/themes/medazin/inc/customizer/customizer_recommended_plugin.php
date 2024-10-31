<?php
/* Notifications in customizer */


require get_template_directory() . '/inc/customizer-notify/medazin-customizer-notify.php';
$medazin_config_customizer = array(
	'recommended_plugins'       => array(
		'classic-widgets' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Classic Widget</strong> plugin for taking full advantage of all the features this theme has to offer.', 'medazin')),
		),
		'clever-fox' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Cleverfox</strong> plugin for taking full advantage of all the features this theme has to offer.', 'medazin')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'medazin' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'medazin' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'medazin' ),
	'activate_button_label'     => esc_html__( 'Activate', 'medazin' ),
	'medazin_deactivate_button_label'   => esc_html__( 'Deactivate', 'medazin' ),
);
Medazin_Customizer_Notify::init( apply_filters( 'medazin_customizer_notify_array', $medazin_config_customizer ) );
?>