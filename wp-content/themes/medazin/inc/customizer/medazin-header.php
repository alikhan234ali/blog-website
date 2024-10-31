<?php
function medazin_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'medazin'),
		) 
	);
	
	/*=========================================
	Medazin Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','medazin'),
			'panel'  		=> 'header_section',
		)
    );

	//Project Documentation Link
	class WP_title_tagline_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

	   function render_content()
	   
	   {
	   ?>
			<h3><?php _e('Section Documentation','medazin'); ?></h3>
			<p><a href="#" target="_blank" style="background-color:#21CDC0; color:#fff;display: flex;align-items: center;justify-content: center;text-decoration: none;   font-weight: 600;padding: 15px 10px;"><?php _e('Click Here','medazin');?></a></p>
			
		<?php
	   }
	}
	
	// Project Doc Link // 
	$wp_customize->add_setting( 
		'title_tagline_doc_link' , 
			array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);

	$wp_customize->add_control(new WP_title_tagline_Customize_Control($wp_customize,
	'title_tagline_doc_link' , 
		array(
			'label'          => __( 'Site identity Documentation Link', 'medazin' ),
			'section'        => 'title_tagline',
			'type'           => 'radio',
			'description'    => __( 'Site identity Documentation Link', 'medazin' ), 
		) 
	) );

	/*=========================================
	Sticky Header
	=========================================*/	
	$wp_customize->add_section(
        'sticky_header_set',
        array(
        	'priority'      => 4,
            'title' 		=> __('Sticky Header','medazin'),
			'panel'  		=> 'header_section',
		)
    );
	
	// Heading //
	$wp_customize->add_setting(
		'sticky_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'sticky_head',
		array(
			'type' => 'hidden',
			'label' => __('Sticky Header','medazin'),
			'section' => 'sticky_header_set',
		)
	);
	$wp_customize->add_setting( 
		'hide_show_sticky' , 
			array(
			// 'default' => '0',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_checkbox',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hide_show_sticky', 
		array(
			'label'	      => esc_html__( 'Hide/Show', 'medazin' ),
			'section'     => 'sticky_header_set',
			'type'        => 'checkbox'
		) 
	);	

}
add_action( 'customize_register', 'medazin_header_settings' );
