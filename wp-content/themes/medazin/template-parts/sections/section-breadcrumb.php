<?php 
	$hs_breadcrumb					= get_theme_mod('hs_breadcrumb','1');
	$breadcrumb_title_enable		= get_theme_mod('breadcrumb_title_enable','1');
	$breadcrumb_path_enable			= get_theme_mod('breadcrumb_path_enable','1');
	$breadcrumb_effect_enable		= get_theme_mod('breadcrumb_effect_enable','1');
	$breadcrumb_bg_img				= get_theme_mod('breadcrumb_bg_img',esc_url(get_template_directory_uri() .'/assets/images/breadcrumb/breadcrumb.jpg'));
	$breadcrumb_back_attach			= get_theme_mod('breadcrumb_back_attach','scroll'); 
	
	$effect_class = ($breadcrumb_effect_enable=='1')?'ripple-area':'';
if($hs_breadcrumb == '1') {	
?>
<!-- =================== Breadcrumb Section =================-->

    <section id="breadcrumb-section" class="breadcrumb-section <?php echo esc_attr($effect_class); ?>" style="position: relative; background:<?php echo esc_attr($breadcrumb_bg_img); ?>;">
        <div class="breadcrumb-footer wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-content">
                            <div class="breadcrumb-heading">
                                <?php if($breadcrumb_title_enable == '1') { ?>	
									<h1>
										<?php 
											if ( is_home() || is_front_page()):

												single_post_title();
										
											elseif ( is_day() ) : 
											
												printf( __( 'Daily Archives: %s', 'medazin' ), get_the_date() );
											
											elseif ( is_month() ) :
											
												printf( __( 'Monthly Archives: %s', 'medazin' ), (get_the_date( 'F Y' ) ));
												
											elseif ( is_year() ) :
											
												printf( __( 'Yearly Archives: %s', 'medazin' ), (get_the_date( 'Y' ) ) );
												
											elseif ( is_category() ) :
											
												printf( __( 'Category Archives: %s', 'medazin' ), (single_cat_title( '', false ) ));

											elseif ( is_tag() ) :
											
												printf( __( 'Tag Archives: %s', 'medazin' ), (single_tag_title( '', false ) ));
												
											elseif ( is_404() ) :

												printf( __( 'Error 404', 'medazin' ));
												
											elseif ( is_author() ) :
											
												printf( __( 'Author: %s', 'medazin' ), (get_the_author( '', false ) ));		
											
											elseif ( is_tax( 'portfolio_categories' ) ) :

												printf( __( 'Portfolio Categories: %s', 'medazin' ), (single_term_title( '', false ) ));	
												
											elseif ( is_tax( 'pricing_categories' ) ) :

												printf( __( 'Pricing Categories: %s', 'medazin' ), (single_term_title( '', false ) ));	
												
											elseif ( class_exists( 'woocommerce' ) ) : 
												
												if ( is_shop() ) {
													woocommerce_page_title();
												}
												
												elseif ( is_cart() ) {
													the_title();
												}
												
												elseif ( is_checkout() ) {
													the_title();
												}
												
												else {
													the_title('');
												}
											else :
													the_title();
													
											endif;
												
										?>
									</h1>
								<?php } ?>
                            </div>
							<?php if($breadcrumb_path_enable == '1') { ?>
								<ol class="breadcrumb-list">
									<?php if (function_exists('medazin_breadcrumbs')) medazin_breadcrumbs();?>
								</ol>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========================== End =========================== -->
<?php } ?>	