<?php  
	$medazin_blog_hs 			= get_theme_mod('blog_hs','1');
	$medazin_blog_title 		= get_theme_mod('blog_title');
	$medazin_blog_desc			= get_theme_mod('blog_description');  
	$medazin_blog_display_num	= get_theme_mod('blog_display_num','3'); 
	if($medazin_blog_hs=='1'){
?>	
<section class="blog-section">
	<div class="container">
		<?php if(!empty($medazin_blog_title)  || !empty($medazin_blog_desc)): ?>
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center wow slideInDown">
						<?php if(!empty($medazin_blog_title)): ?>
							<h3><?php echo wp_kses_post($medazin_blog_title); ?></h3>
							<span class="title-element"> <i class="fa fa-heartbeat" aria-hidden="true"></i></span>
						<?php endif; ?>
						<?php if(!empty($medazin_blog_desc)): ?>
							<p><?php echo wp_kses_post($medazin_blog_desc); ?></p>
						<?php endif; ?>	
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row">
			<?php 
			$medazin_blog_args = array( 'post_type' => 'post', 'posts_per_page' => $medazin_blog_display_num,'post__not_in'=>get_option("sticky_posts")) ; 	
					
				$medazin_wp_query = new WP_Query($medazin_blog_args);
					if($medazin_wp_query)
					{	
					 $post_count=0;
					while($medazin_wp_query->have_posts()):$medazin_wp_query->the_post();
					
					$category = get_the_category(); 
					
					?>
					<div class="col-lg-4 col-md-6 col-sm-12 mt-4 wow flipInX">
						<article class="post-item active">
							<?php if ( has_post_thumbnail() ) { ?>
								<figure class="post-image">
									<a href="<?php get_permalink(); ?>" class="icon"><i class="fas fa-link"></i></a>
									<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium'); ?>" alt="<?php the_title(); ?>">
									
									<ul class="post-categories ">
										<li><a href="# " rel="category tag "><i
													class="fa fa-folder-open "></i><?php echo esc_html($category[0]->cat_name);  ?></a>
										</li>
									</ul> 
									<span class="posted-on ">
										<a href="<?php echo esc_url(get_the_date('Y/m/d')); ?>"> <i class="far fa-calendar-alt"></i> <span class="post-date "><?php echo esc_html(get_the_date('j')); ?> </span> <?php echo esc_html(get_the_date('M')); ?><span class="post-date"> <?php echo esc_html(get_the_date('Y')); ?> </span></a>
									</span>
								</figure>
							<?php } ?>
							<div class="post-content">
								<div class="post-meta up ">
									<span class="author-name ">
										<img src="<?php echo esc_url(get_avatar_url(get_the_author_meta( 'ID' ))); ?>" alt=" ">
										<a href="javascript:void(0);"><i class="fas fa-user"></i></a>
										<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php esc_html(the_author()); ?></a>
									</span>

									<span class="post-tag">
										<a href="javascript:void(0);" rel="tag"> <?php the_tags('<i class="fas fa-tag"></i>',', ',''); ?></a>
										
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
					</div>
				<?php 
					endwhile; 
					}
					wp_reset_postdata();
				?>
			</div>
		</div>	
</section>
<?php } ?>