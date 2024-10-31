<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package medazin
 */

get_header(); 
?>
<section class="blog-section ">
	<div class="container ">
		
		<div class="row justify-content-center ">
				
				<div class="col-lg-8">
				
				<?php 
					$medazin_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
					$args = array( 'post_type' => 'post','paged'=>$medazin_paged );	
				?>
				<div class="row">
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); 
					?>
					<div class="col-lg-6 col-md-6 col-sm-12 mb-4 wow flipInY">
						<?php get_template_part('template-parts/content/content','page'); ?>
					</div>
					<?php endwhile; ?>			
				</div>
					<!-- Pagination -->
						<?php								
						// Previous/next page navigation.
						the_posts_pagination( array(
						'prev_text'          => ' <i class="fas fa-chevron-left"></i>',
						'next_text'          => '<i class="fas fa-chevron-right"></i>',
						) ); ?>
				<!-- Pagination -->	
				
				<?php else: ?>
					<?php get_template_part('template-parts/content/content','none'); ?>
				<?php endif; ?>
			</div>
			<?php  get_sidebar();?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
