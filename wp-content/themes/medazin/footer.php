<?php 
	$footer_get_in_touch_title	= get_theme_mod('footer_get_in_touch_title', '24x7 Call Ambulance');
	$footer_get_in_touch_number	= get_theme_mod('footer_get_in_touch_number', '+12 345 678 90');
	$footer_get_in_touch_icon	= get_theme_mod('footer_get_in_touch_icon', 'fa-ambulance');
	$hs_above_footer			= get_theme_mod('hs_above_footer', '1');
	
	$column_class = ($hs_above_footer == '1')?'4':'6';
?>
	<!-- ======================== Footer Section =======================-->
    <footer class="footer-section wow slideInUp">
        <div class="footer ">
            <div class="container ">
				<?php		
			if(is_active_sidebar( 'medazin-footer-1' )  || is_active_sidebar( 'medazin-footer-2' )  || is_active_sidebar( 'medazin-footer-3' )  || is_active_sidebar( 'medazin-footer-4' )) { 
		?>
			<div class="row">
				<?php if ( is_active_sidebar( 'medazin-footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'medazin-footer-1'); ?>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'medazin-footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'medazin-footer-2'); ?>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'medazin-footer-3' ) ) : ?>
				<?php dynamic_sidebar( 'medazin-footer-3'); ?>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'medazin-footer-4' ) ) : ?>
				<?php dynamic_sidebar( 'medazin-footer-4'); ?>
				<?php endif; ?>
				
			</div>
			<?php } ?>
                <div class="row footer-copyright mt-5 ">
					<?php if($hs_above_footer=='1'){ ?>
						<div class="col-lg-4 col-md-6 col-sm-12 footer-bottom ">
							<aside class="widget widget-contact ">
								<div class="contact-area">
									<?php if(!empty($footer_get_in_touch_icon)){ ?>
										<div class="contact-icon ">
											<i class="fas fa <?php echo esc_attr($footer_get_in_touch_icon);?> "></i>
										</div>
									<?php } ?>
									<div class="contact-info ">
										<?php if(!empty($footer_get_in_touch_number)){ ?>
											<span class="text "> <a href="javascript:void(0);"><?php echo esc_html($footer_get_in_touch_number);?></a></span><br>
										<?php } ?>
										
										<?php if(!empty($footer_get_in_touch_title)){ ?>
											<span class="title "><?php echo esc_html($footer_get_in_touch_title);?></span>
										<?php } ?>
									</div>
								</div>
							</aside>
						</div>
					<?php } ?>
					
                    <div class="col-lg-<?php echo esc_attr($column_class); ?> col-md-6 col-sm-12 footer-bottom ">
					<?php $footer_third_custom 		= get_theme_mod('footer_third_custom','Copyright &copy; [current_year] | Powered by [theme_author]'); ?>
                        <div class="copyright ">
							<?php 	
								$medazin_copyright_allowed_tags = array(
								'[current_year]' => date_i18n('Y', current_time( 'timestamp' )),
								'[site_title]'   => get_bloginfo('name'),
								'[theme_author]' => sprintf(__('<a href="#">Medazin</a>', 'medazin')),
							);
							?>                        
							<p><?php echo apply_filters('medazin_footer_copyright', wp_kses_post(medazin_str_replace_assoc($medazin_copyright_allowed_tags, $footer_third_custom))); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-<?php echo esc_attr($column_class); ?> col-md-6 col-sm-12 footer-bottom ">
                        <aside class="widget widget_payment_methods ">
                            <ul class="payment_methods ">
                                <li>
                                    <a href="# "><i class="fab fa-cc-amex "></i></a>
                                </li>
                                <li>
                                    <a href="# "><i class="fab fa-cc-visa "></i></a>
                                </li>
                                <li>
                                    <a href="# "><i class="fab fa-cc-discover "></i></a>
                                </li>

                                <li>
                                    <a href="# "><i class="fab fa-cc-mastercard "></i></a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </footer>

 <!-- ScrollUp -->
	<?php 
		$hs_scroller 	= get_theme_mod('hs_scroller','1');	
		if($hs_scroller == '1') :
	?>
	<!-- ======== Back to Top =====- -->
    <a href="javascript:void(0);" class="mouse ">
    <span></span>
    </a>
    <!-- ======== End ======== -->
	<?php endif; ?>

<?php 
$front_pallate_enable = get_theme_mod('front_pallate_enable');
	if($front_pallate_enable == '1') :
		get_template_part('index','switcher');
	endif;
	
wp_footer(); ?>
</body>
</html>