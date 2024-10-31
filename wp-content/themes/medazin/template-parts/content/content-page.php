<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medazin
 */
$categories = get_the_category();
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('post-item active'); ?>>
		<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-image ">
				<a href="<?php echo esc_url(get_permalink()); ?>" class="icon "><i class="fas fa-link"></i></a>
				<?php the_post_thumbnail('large'); ?>
				
				<?php if ( ! empty( $categories ) ) { ?>
					<ul class="post-categories ">
						<li>
							<a href="<?php echo esc_url(esc_url( get_category_link( $categories[0]->term_id ) ));?>"><i class="fa fa-folder-open"></i> <?php echo esc_html( $categories[0]->name ); ?></a>
						</li>
					</ul>
				<?php } ?>
				
				<span class="posted-on ">
					<a href="# "> <i class="far fa-calendar-alt"></i><span class="post-date"> <a href="<?php echo esc_url(the_date('Y/m/d')); ?>"><span><?php echo esc_html(get_the_date('j')); ?></span><?php echo esc_html(get_the_date('M, Y')); ?></a> </span></a>
				</span>
			</figure>
		<?php } ?>
		
		<div class="post-content ">
			<div class="post-meta up ">
				<span class="author-name ">
					<img src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ))) ?>" alt="<?php echo esc_attr__('Author Image','medazin'); ?>">
					<a href="javascript:void(0);"><i class="fas fa-user"></i></a>
					<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?> </a>
				</span>

				<span class="post-tag">
					<?php the_tags('<i class="fas fa-tag"></i> ',',',''); ?>
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