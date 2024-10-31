<?php
function medazin_footer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'medazin'),
		) 
	);
	// Footer Setting Section // 
	$wp_customize->add_section(
        'footer_copy_Section',
        array(
            'title' 		=> __('Below Footer','medazin'),
			'panel'  		=> 'footer_section',
			'priority'      => 4,
		)
    );

	// Image Head // 
	$wp_customize->add_setting(
		'footer_copy_img'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_copy_img',
		array(
			'type' => 'hidden',
			'label' => __('Logo','medazin'),
			'section' => 'footer_copy_Section',
			'priority' => 1,
		)
	);

	
	// footer third text // 
	$medazin_footer_copyright = esc_html__('Copyright &copy; [current_year] [site_title] | Powered by [theme_author]', 'medazin' );
	$wp_customize->add_setting(
    	'footer_third_custom',
    	array(
			'default' => $medazin_footer_copyright,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'medazin_sanitize_html',
		)
	);	

	$wp_customize->add_control( 
		'footer_third_custom',
		array(
		    'label'   		=> __('Copyright','medazin'),
		    'section'		=> 'footer_copy_Section',
			'type' 			=> 'textarea',
			'priority'      => 9,
		)  
	);	
	
	

	// Footer Widget // 
	$wp_customize->add_section(
        'footer_widget',
        array(
            'title' 		=> __('Footer Widget Area','medazin'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );
	
}
add_action( 'customize_register', 'medazin_footer' );
// Footer selective refresh
function medazin_footer_partials( $wp_customize ){		
	// footer_third_custom
	$wp_customize->selective_refresh->add_partial( 'footer_third_custom', array(
		'selector'            => '.footer-copyright .copyright-text',
		'settings'            => 'footer_third_custom',
		'render_callback'  => 'medazin_footer_third_custom_render_callback',
	) );
	
	//footer_widget_middle_content
	$wp_customize->selective_refresh->add_partial( 'footer_widget_middle_content', array(
		'selector'            => '.footer-main .footer-info-overwrap',
		'settings'            => 'footer_widget_middle_content',
		'render_callback'  => 'medazin_footer_widget_middle_content_render_callback',
	) );
	}

add_action( 'customize_register', 'medazin_footer_partials' );


// copyright_content
function medazin_footer_third_custom_render_callback() {
	return get_theme_mod( 'footer_third_custom' );
}

// footer_widget_middle_content
function medazin_footer_widget_middle_content_render_callback() {
	return get_theme_mod( 'footer_widget_middle_content' );
}