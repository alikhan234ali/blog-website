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
function medazin_get_instagram_gallery_default() {
	return apply_filters(
		'medazin_get_instagram_gallery_default', json_encode(
			array(
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img1.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_001',
				),
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img2.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_002',
				),
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img3.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_003',
				),
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img4.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_004',
				),
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img5.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_005',
				),
				array(	
					'image_url' => esc_url(get_template_directory_uri() . '/assets/images/gallery-images/img6.jpg'),
					'id'        => 'customizer_repeater_instagram_gallery_006',
				),
				
			)
		)
	);
}
