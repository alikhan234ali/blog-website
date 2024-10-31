<?php
function medazin_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'medazin_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'medazin' ),
		)
	);
	
	
	/*=========================================
	Background Elements
	=========================================*/
	$wp_customize->add_section(
		'bg_elements', array(
			'title' => esc_html__( 'Background Elements', 'medazin' ),
			'priority' => 1,
			'panel' => 'medazin_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_bg_elements' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'medazin_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_bg_elements', 
		array(
			'label'	      => esc_html__( 'Hide / Show Background Elements', 'medazin' ),
			'section'     => 'bg_elements',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Scroller
	=========================================*/
	$wp_customize->add_section(
		'top_scroller', array(
			'title' => esc_html__( 'Scroller', 'medazin' ),
			'priority' => 4,
			'panel' => 'medazin_general',
		)
	);
	
	$wp_customize->add_setting( 
		'hs_scroller' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'medazin_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 1,
		) 
	);
	
	$wp_customize->add_control(
	'hs_scroller', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroller', 'medazin' ),
			'section'     => 'top_scroller',
			'type'        => 'checkbox'
		) 
	);
	
	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb', 'medazin' ),
			'priority' => 12,
			'panel' => 'medazin_general',
		)
	);
	
	// Settings
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','medazin'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'medazin_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'medazin' ),
			'section'     => 'breadcrumb_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// enable Effect
	$wp_customize->add_setting(
		'breadcrumb_effect_enable'
			,array(
			'default' => '1',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_checkbox',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_effect_enable',
		array(
			'type' => 'checkbox',
			'label' => __('Enable Water Effect on Breadcrumb?','medazin'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	
		
	// Background // 
	$wp_customize->add_setting(
		'breadcrumb_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','medazin'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Background Image // 
    $wp_customize->add_setting( 
    	'breadcrumb_bg_img' , 
    	array(
			'default' 			=> esc_url(get_template_directory_uri() .'/assets/images/breadcrumb/breadcrumb.jpg'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_url',	
			'priority' => 10,
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'breadcrumb_bg_img' ,
		array(
			'label'          => esc_html__( 'Background Image', 'medazin'),
			'section'        => 'breadcrumb_setting',
		) 
	));
	
	// Background Attachment // 
	$wp_customize->add_setting( 
		'breadcrumb_back_attach' , 
			array(
			'default' => 'scroll',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_select',
			'priority'  => 10,
		) 
	);
	
	$wp_customize->add_control(
	'breadcrumb_back_attach' , 
		array(
			'label'          => __( 'Background Attachment', 'medazin' ),
			'section'        => 'breadcrumb_setting',
			'type'           => 'select',
			'choices'        => 
			array(
				'inherit' => __( 'Inherit', 'medazin' ),
				'scroll' => __( 'Scroll', 'medazin' ),
				'fixed'   => __( 'Fixed', 'medazin' )
			) 
		) 
	);
	
	/*=========================================
	Medazin Container
	=========================================*/
	$wp_customize->add_section(
        'medazin_container',
        array(
        	'priority'      => 2,
            'title' 		=> __('Container','medazin'),
			'panel'  		=> 'medazin_general',
		)
    );
	
	if ( class_exists( 'Cleverfox_Customizer_Range_Slider_Control' ) ) {
		//container width
		$wp_customize->add_setting(
			'medazin_site_cntnr_width',
			array(
				'default'			=> '1200',
				'capability'     	=> 'edit_theme_options',
				'sanitize_callback' => 'medazin_sanitize_range_value',
				'transport'         => 'postMessage',
				'priority'      => 1,
			)
		);
		$wp_customize->add_control( 
		new Cleverfox_Customizer_Range_Slider_Control( $wp_customize, 'medazin_site_cntnr_width', 
			array(
				'label'      => __( 'Container Width', 'medazin' ),
				'section'  => 'medazin_container',
				'input_attrs' => array(
					 'min'           => 768,
					'max'           => 2000,
					'step'          => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
	}
}

add_action( 'customize_register', 'medazin_general_setting' );
