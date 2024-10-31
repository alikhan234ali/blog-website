<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Medazin
 */

get_header();
?>
	<!-- =========================== 404 Section ======================= -->

    <section class="error-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mx-auto">
                    <div class="error-box">	
						<h1><?php esc_html_e('4','medazin'); ?> <span class="icon-box"><i class="fas fa-plus"></i></span> <?php esc_html_e('4','medazin'); ?></h1>    
						<h4><?php esc_html_e('Something Went Wrong','medazin'); ?></h4>
						<h4><span class="highlight"><?php esc_html_e('404 Error:','medazin'); ?></span><?php esc_html_e('The Page Doesn\'t Exist','medazin'); ?></h4>
							
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="main-button active"><span><?php esc_html_e('Go Back To Home','medazin'); ?></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================  End ====================== -->
<?php get_footer(); ?>
