<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medazin
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item-inner wow fadeInUp'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-image">
			<div class="featured-image">
				<a href="javascript:void(0);">
					<?php the_post_thumbnail(); ?>
				</a>
				<div class="post-date-badge">
					<span class="posted-on-page post-date-page">
						<a href="<?php echo esc_url(the_date('Y/m/d')); ?>"> <span class="post-date-badge-1"><span><?php echo esc_html(get_the_date('j')); ?></span></span> <span class="post-badge-2"><span><?php echo esc_html(get_the_date('M, Y')); ?></span></span></a>
					</span>
				</div>
			</div>
		</figure>
	<?php } ?>
	<?php get_template_part('template-parts/content/content','sticky'); ?>
	<div class="post-content-page">
		<div class="post-meta up">
			<span class="author-name">
				<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><i class="fa fa-user"></i> <?php esc_html(the_author()); ?></a>
			</span>
			<span class="comments-link">
				<a href="<?php echo esc_url(get_comments_link( $post->ID )); ?>"><i class="fa fa-commenting-o"></i> <?php echo esc_html(get_comments_number($post->ID)); ?> <?php esc_html_e('Comment','medazin'); ?></a>
			</span>
		</div>
		<?php     
			if ( is_single() ) :
			
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
		?> 
		<?php
			the_content( 
				sprintf( 
					__( '<span>Read More</span><i class="fa fa-plus"></i>', 'medazin' ), 
					'<span class="screen-reader-text">  '.esc_html(get_the_title()).'</span>' 
				) 
			);
		?>
	</div>
</article>