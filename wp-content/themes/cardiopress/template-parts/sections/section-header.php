<!-- ================ Header Section ===================== -->
    <header class="header header-2 header-3">
        <!-- ======================== Naviagtion =========================== -->
        <div class="navigation-wrapper">
            <!--===// Start: Main Desktop Navigation
            =================================-->
            <div class="main-navigation-area d-none d-lg-block">
                <div class="main-navigation <?php echo esc_attr(medazin_sticky_menu()); ?>">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-3 logo-element-1">
								<div class="logo">
									<?php do_action('medazin_logo_content'); ?>
								</div>
								<span class="logo-element-2"></span>
                            </div>
                            <div class="col-lg-9">
                                <nav class="navbar-area">
                                    <div class="main-navbar">
                                       <?php do_action('medazin_primary_navigation');	?>
									</div>
                                    <div class="main-menu-right">
                                        <ul class="menu-right-list">
                                            <?php 
												$hide_show_search 	= get_theme_mod( 'hide_show_search','1'); 
												if($hide_show_search=='1'):	
											?>
												<li class="search-button">
													<a href="javascript:void(0)" id="view-search-btn" class="header-search-toggle"><i class="fa fa-search"></i></a>
													<!-- Quik search -->
													<div class="view-search-btn header-search-popup">

														<form  method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( 'Site Search', 'medazin-pro' ); ?>"> <input type="search" class="search-form-control header-search-field" placeholder="<?php echo esc_attr( 'Type To Search', 'medazin-pro' ); ?>" name="s" id="search">
															<i class="fa fa-search"></i>
															<a href="javascript:void(0)" class="close-style header-search-close"></a>
														</form>
													</div>
												</li>
											<?php endif; ?>
											
										
                                         
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===// End:  Main Desktop Navigation
            =================================-->


            <!--===// Start: Main Mobile Navigation
            =================================-->
            <div class="main-mobile-nav  <?php echo esc_attr(medazin_sticky_menu()); ?> d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-mobile-menu">
                                <div class="mobile-logo">
                                    <?php do_action('medazin_logo_content'); ?>
                                </div>
                                <div class="menu-collapse-wrap">
                                    <div class="hamburger-menu">
                                        <button type="button" class="menu-collapsed" aria-label="Menu Collaped">
                                            <span class="top-bun"></span>
                                            <span class="meat"></span>
                                            <span class="bottom-bun"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="main-mobile-wrapper">
                                    <div id="mobile-menu-build" class="main-mobile-build">
                                        <button type="button" class="header-close-menu close-style" aria-label="Header Close Menu"></button>
                                       <?php do_action('medazin_primary_navigation');	?>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===// End: Main Mobile Navigation
            =================================-->
        </div>
        <!--  ================= End  ====================== -->

    </header>

	<?php
	if ( !is_page_template( 'templates/template-homepage.php' ) ) {
	medazin_breadcrumbs_style();  
	}	