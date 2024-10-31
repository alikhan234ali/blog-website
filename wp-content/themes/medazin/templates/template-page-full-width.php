<?php
/**
Template Name: Fullwidth Page
**/

get_header();
?>
<section class="post-section py-default">
	<div class="container">
		<div class="row wow fadeInUp">
			<div class="col-12  wow fadeInUp">
				<?php 		
					the_post(); the_content(); 
					
					if( $post->comment_status == 'open' ) { 
						 comments_template( '', true ); // show comments 
					}
				?>
			</div>
		</div>
	</div>
</section> 
<?php get_footer(); ?>

