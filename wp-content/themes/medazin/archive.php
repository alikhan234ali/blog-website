<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medazin
 */

get_header();
?>
<section class="blog-section">
	<div class="container">
		<div class="row">	
			 <div class="<?php esc_attr(medazin_post_layout()); ?>">
			
				<?php if( have_posts() ): ?>
				
					<?php while( have_posts() ) : the_post();
					
							get_template_part('template-parts/content/content','page'); 
							
					endwhile; ?>
					
				<?php else: ?>
				
					<?php get_template_part('template-parts/content/content','none'); ?>
					
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
