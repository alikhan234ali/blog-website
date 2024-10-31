/**
 * Customizer controls toggles
 *
 * @package Medazin
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Trigger hooks
	 */
	MEDAZINControlTrigger = {

	    /**
	     * Trigger a hook.
	     *
	     * @since 1.0.0
	     * @method triggerHook
	     * @param {String} hook The hook to trigger.
	     * @param {Array} args An array of args to pass to the hook.
		 */
	    triggerHook: function( hook, args )
	    {
	    	$( 'body' ).trigger( 'medazin-control-trigger.' + hook, args );
	    },

	    /**
	     * Add a hook.
	     *
	     * @since 1.0.0
	     * @method addHook
	     * @param {String} hook The hook to add.
	     * @param {Function} callback A function to call when the hook is triggered.
	     */
	    addHook: function( hook, callback )
	    {
	    	$( 'body' ).on( 'medazin-control-trigger.' + hook, callback );
	    },

	    /**
	     * Remove a hook.
	     *
	     * @since 1.0.0
	     * @method removeHook
	     * @param {String} hook The hook to remove.
	     * @param {Function} callback The callback function to remove.
	     */
	    removeHook: function( hook, callback )
	    {
		    $( 'body' ).off( 'medazin-control-trigger.' + hook, callback );
	    },
	};

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.0.0
	 * @class MEDAZINCustomizerToggles
	 */
	MEDAZINCustomizerToggles = {
		
		/**
		 *  Mobile Logo
		 */
		'mobile_logo_on' :
		[
			{
				controls: [
					'mobile_logo'
				],
				callback: function( mobile_logo ) {

					var mobile_logo = api( 'mobile_logo_on' ).get();

					if ( '1' == mobile_logo ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_nav_btn
		 */
		'hide_show_nav_btn' :
		[
			{
				controls: [
					'nav_btn_icon',
					'nav_btn_lbl',
					'nav_btn_link'
				],
				callback: function( hide_show_nav_btn ) {

					var hide_show_nav_btn = api( 'hide_show_nav_btn' ).get();

					if ( '1' == hide_show_nav_btn ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_nav_toggle
		 */
		'hs_nav_toggle' :
		[
			{
				controls: [
					'medazin_toggle_content',
				],
				callback: function( hs_nav_toggle ) {

					var hs_nav_toggle = api( 'hs_nav_toggle' ).get();

					if ( '1' == hs_nav_toggle ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_social_icon
		 */
		'hide_show_social_icon' :
		[
			{
				controls: [
					'social_icons',
				],
				callback: function( hide_show_social_icon ) {

					var hide_show_social_icon = api( 'hide_show_social_icon' ).get();

					if ( '1' == hide_show_social_icon ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_cntct_details
		 */
		'hide_show_cntct_details' :
		[
			{
				controls: [
					'tlh_contct_icon',
					'tlh_contact_title',
					'tlh_contact_link',
				],
				callback: function( hide_show_cntct_details ) {

					var hide_show_cntct_details = api( 'hide_show_cntct_details' ).get();

					if ( '1' == hide_show_cntct_details ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hide_show_email_details
		 */
		'hide_show_email_details' :
		[
			{
				controls: [
					'tlh_email_icon',
					'tlh_email_title',
					'tlh_email_link',
				],
				callback: function( hide_show_email_details ) {

					var hide_show_email_details = api( 'hide_show_email_details' ).get();

					if ( '1' == hide_show_email_details ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hide_show_mbl_details
		 */
		'hide_show_mbl_details' :
		[
			{
				controls: [
					'tlh_mobile_icon',
					'tlh_mobile_title',
					'tlh_mobile_link',
				],
				callback: function( hide_show_mbl_details ) {

					var hide_show_mbl_details = api( 'hide_show_mbl_details' ).get();

					if ( '1' == hide_show_mbl_details ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_hdr_icon_menu
		 */
		'hs_hdr_icon_menu' :
		[
			{
				controls: [
					'hdr_top_icon_menu',
				],
				callback: function( hs_hdr_icon_menu ) {

					var hs_hdr_icon_menu = api( 'hs_hdr_icon_menu' ).get();

					if ( '1' == hs_hdr_icon_menu ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  hs_scroller
		 */
		'hs_scroller' :
		[
			{
				controls: [
					'scroller_icon'
				],
				callback: function( hs_scroller ) {

					var hs_scroller = api( 'hs_scroller' ).get();

					if ( '1' == hs_scroller ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_breadcrumb
		 */
		'hs_breadcrumb' :
		[
			{
				controls: [
					'breadcrumb_title_enable',
					'breadcrumb_path_enable',
					'breadcrumb_contents',
					'breadcrumb_seprator',
					'breadcrumb_min_height',
					'breadcrumb_bg_head',
					'breadcrumb_bg_img',
					'breadcrumb_back_attach',
					'breadcrumb_bg_img_opacity',
					'breadcrumb_overlay_color',
					'breadcrumb_typography',
					'breadcrumb_title_size',
					'breadcrumb_content_size',
				],
				callback: function( hs_breadcrumb ) {

					var hs_breadcrumb = api( 'hs_breadcrumb' ).get();

					if ( '1' == hs_breadcrumb ) {
						return true;
					}
					return false;
				}
			}
		],
		
		/**
		 *  Slider
		 */
		'slider_overlay_enable' :
		[
			{
				controls: [
					'slide_overlay_color',
					'slider_opacity'
				],
				callback: function( slider_overlay_enable ) {

					var slider_overlay_enable = api( 'slider_overlay_enable' ).get();

					if ( '1' == slider_overlay_enable ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  Color 
		 */
		'theme_color_enable' :
		[
			{
				controls: [
					'primary_color1',
					'primary_color2',
					'secondary_color1',
					'secondary_color2'
				],
				callback: function( theme_color_enable ) {

					var theme_color_enable = api( 'theme_color_enable' ).get();

					if ( '1' == theme_color_enable ) {
						return true;
					}
					return false;
				}
			}
		],
		
		'footer_bottom_layout' :
		[
			{
				controls: [
					'footer_bottom_1',
					'footer_bottom_2',
					'footer_bottom_3'
				],
				callback: function( footer_bottom_layout ) {

					if ( 'disable' != footer_bottom_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_img',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_1 = api( 'footer_bottom_1' ).get();

					if ( 'disable' != footer_bottom_layout && 'image' == footer_section_1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_2 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_social_icons',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_2 = api( 'footer_bottom_2' ).get();

					if ( 'disable' != footer_bottom_layout && 'social' == footer_section_2 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_third_custom',
				],
				callback: function( footer_bottom_layout ) {

					var footer_section_3 = api( 'footer_bottom_3' ).get();

					if ( 'disable' != footer_bottom_layout && 'custom' == footer_section_3 ) {
						return true;
					}
					return false;
				}
			},
		],
		'footer_bottom_1' :
		[
			{
				controls: [
					'footer_first_custom',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_first_img',
				],
				callback: function( enabled_section_1 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'image' == enabled_section_1 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'footer_bottom_2' :
		[
			{
				controls: [
					'footer_second_custom',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_social_icons',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'social' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		'footer_bottom_3' :
		[
			{
				controls: [
					'footer_third_custom',
				],
				callback: function( enabled_section_2 ) {

					var footer_layout = api( 'footer_bottom_layout' ).get();

					if ( 'custom' == enabled_section_2 && 'disable' != footer_layout ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  medazin_header_type
		 */
		'medazin_header_type' :
		[
			{
				controls: [
					'hdr_nav_cart',
					'hide_show_cart',
					'hdr_nav_btn',
					'hide_show_nav_btn',
					'nav_btn_icon',
					'nav_btn_lbl',
					'nav_btn_link'
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-1' == medazin_header_type  || 'header-4' == medazin_header_type  || 'header-5' == medazin_header_type  || 'header-6' == medazin_header_type  || 'header-7' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			
			{
				controls: [
					'hdr_nav_toggle',
					'hs_nav_toggle',
					'medazin_toggle_content',
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-1' == medazin_header_type  || 'header-4' == medazin_header_type || 'header-6' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_nav_text_content_head',
					'hdr_nav_text_content',
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-4' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			
			{
				controls: [
					'hdr_nav_contact_head',
					'hdr_nav_contact_content',
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-4' == medazin_header_type  || 'header-5' == medazin_header_type || 'header-6' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			
			{
				controls: [ 
					'hdr_top_icon_menu_head',
					'hs_hdr_icon_menu',
					'hdr_top_icon_menu'
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-5' == medazin_header_type  || 'header-7' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_nav_contact_content2'
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-5' == medazin_header_type || 'header-6' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_nav_contact_content3'
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-6' == medazin_header_type) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'hdr_social_head',
					'hide_show_social_icon',
					'social_icons'
				],
				callback: function( medazin_header_type ) {

					var medazin_header_type = api( 'medazin_header_type' ).get();

					if ( 'header-7' !== medazin_header_type) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  enable_post_excerpt
		 */
		'enable_post_excerpt' :
		[
			{
				controls: [
					'medazin_post_excerpt',
					'medazin_blog_excerpt_more',
					'enable_post_btn',
					'read_btn_txt',
				],
				callback: function( enable_post_excerpt ) {

					var enable_post_excerpt = api( 'enable_post_excerpt' ).get();

					if ( '1' == enable_post_excerpt ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  medazin_footer_type
		 */
		'medazin_footer_type' :
		[
			{
				controls: [
					'footer_bg_img',
					'footer_bg_opacity_clr',
					'footer_bg_opacity',
					'footer_widget_middle_content'
				],
				callback: function( medazin_footer_type ) {

					var medazin_footer_type = api( 'medazin_footer_type' ).get();

					if ( 'footer-one' == medazin_footer_type || 'footer-two' == medazin_footer_type ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'footer_bg_color',
				],
				callback: function( medazin_footer_type ) {

					var medazin_footer_type = api( 'medazin_footer_type' ).get();

					if ( 'footer-two' == medazin_footer_type ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		/**
		 *  hs_pg_about
		 */
		'hs_pg_about' :
		[
			{
				controls: [
					'pg_about_left_img',
					'pg_about_left_ttl',
					'pg_about_title',
					'pg_about_subttl',
					'pg_about_content',
					'pg_about_before_data',
					'pg_about_after_data',
				],
				callback: function( hs_pg_about ) {

					var hs_pg_about = api( 'hs_pg_about' ).get();

					if ( '1' == hs_pg_about ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_about_step
		 */
		'hs_pg_about_step' :
		[
			{
				controls: [
					'pg_about_step_ttl',
					'pg_about_step_desc',
					'pg_about_step_contents',
					'pg_about_step_column',
					'pg_about_step_before_data',
					'pg_about_step_after_data'
				],
				callback: function( hs_pg_about_step ) {

					var hs_pg_about_step = api( 'hs_pg_about_step' ).get();

					if ( '1' == hs_pg_about_step ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_timeline
		 */
		'hs_timeline' :
		[
			{
				controls: [
					'timeline_ttl',
					'timeline_desc',
					'timeline_contents',
					'timeline_before_data',
					'timeline_after_data'
				],
				callback: function( hs_timeline ) {

					var hs_timeline = api( 'hs_timeline' ).get();

					if ( '1' == hs_timeline ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_testimonial
		 */
		'hs_testimonial' :
		[
			{
				controls: [
					'testimonial_ttl',
					'testimonial_desc',
					'testimonial_contents',
					'testimonial_before_data',
					'testimonial_after_data'
				],
				callback: function( hs_testimonial ) {

					var hs_testimonial = api( 'hs_testimonial' ).get();

					if ( '1' == hs_testimonial ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_details
		 */
		'hs_details' :
		[
			{
				controls: [
					'details_contents',
					'details_column',
					'details_before_data',
					'details_after_data'
				],
				callback: function( hs_details ) {

					var hs_details = api( 'hs_details' ).get();

					if ( '1' == hs_details ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_skill
		 */
		'hs_skill' :
		[
			{
				controls: [
					'skill_left_img',
					'skill_ttl',
					'skill_subttl',
					'skill_desc',
					'skill_contents',
					'skill_before_data',
					'skill_after_data'
				],
				callback: function( hs_skill ) {

					var hs_skill = api( 'hs_skill' ).get();

					if ( '1' == hs_skill ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_ct_info
		 */
		'hs_pg_ct_info' :
		[
			{
				controls: [
					'pg_ct_info_ttl',
					'pg_ct_info_desc',
					'pg_ct_info_contents',
					'pg_ct_info_column',
					'pg_ct_info_before_data',
					'pg_ct_info_after_data'
				],
				callback: function( hs_pg_ct_info ) {

					var hs_pg_ct_info = api( 'hs_pg_ct_info' ).get();

					if ( '1' == hs_pg_ct_info ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_ct_map_info
		 */
		'hs_pg_ct_map_info' :
		[
			{
				controls: [
					'pg_ct_map_info_contents',
					'pg_ct_map_link',
					'pg_ct_map_info_before_data',
					'pg_ct_map_info_after_data',
				],
				callback: function( hs_pg_ct_map_info ) {

					var hs_pg_ct_map_info = api( 'hs_pg_ct_map_info' ).get();

					if ( '1' == hs_pg_ct_map_info ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  hs_pg_ct_office
		 */
		'hs_pg_ct_office' :
		[
			{
				controls: [
					'pg_ct_office_ttl',
					'pg_ct_office_desc',
					'pg_ct_office_contents',
					'pg_ct_office_column',
					'pg_ct_office_before_data',
					'pg_ct_office_after_data',
				],
				callback: function( hs_pg_ct_office ) {

					var hs_pg_ct_office = api( 'hs_pg_ct_office' ).get();

					if ( '1' == hs_pg_ct_office ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		
		
		/**
		 *  hs_pg_ct_form
		 */
		'hs_pg_ct_form' :
		[
			{
				controls: [
					'pg_ct_form_ttl',
					'pg_ct_form_desc',
					'pg_ct_form_shortcode',
					'pg_ct_form_bg_img',
					'pg_ct_form_before_data',
					'pg_ct_form_after_data',
				],
				callback: function( hs_pg_ct_form ) {

					var hs_pg_ct_form = api( 'hs_pg_ct_form' ).get();

					if ( '1' == hs_pg_ct_form ) {
						return true;
					}
					return false;
				}
			}
		],



		/**
		 *  enable_comming_soon
		 */
		'enable_comming_soon' :
		[
			{
				controls: [
					'enable_comming_soon_form',
					'enable_comming_soon_social',
					'comingsoon_type',
					'comming_soon_head',
					'comming_soon_logo',
					'comming_soon_title',
					'comming_soon_desc',
					'comming_soon_time_head',
					'comming_soon_time',
					'comming_soon_form',
					'comming_soon_shortcode',
					'comming_soon_social',
					'comming_soon_social_icons'
				],
				callback: function( enable_comming_soon ) {

					var enable_comming_soon = api( 'enable_comming_soon' ).get();

					if ( '1' == enable_comming_soon ) {
						return true;
					}
					return false;
				}
			}
		],
		
		
		/**
		 *  custom_color_type
		 */
		'custom_color_type' :
		[
			{
				controls: [
					'theme_color_head',
					'theme_color'
				],
				callback: function( custom_color_type ) {

					var custom_color_type = api( 'custom_color_type' ).get();

					if ( 'prebuilt' == custom_color_type ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'primary_color_head',
					'primary_color1',
					'secondary_color_head',
					'secondary_color1'
				],
				callback: function( custom_color_type ) {

					var custom_color_type = api( 'custom_color_type' ).get();

					if ( 'solid' == custom_color_type) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'primary_color1_loc',
					'primary_color2',
					'primary_color2_loc',
					'primary_color_grad_degree',
					'secondary_color1_loc',
					'secondary_color2',
					'secondary_color2_loc',
					'secondary_color_grad_degree'
				],
				callback: function( custom_color_type ) {

					var custom_color_type = api( 'custom_color_type' ).get();

					if ( 'medazin' == custom_color_type ) {
						return true;
					}
					return false;
				}
			}
		],
	};

} )( jQuery );
