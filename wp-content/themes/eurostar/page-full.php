<?php
/**
 * Template Name: Default Template - Full
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * @by Ebow - 1.0
 */
 
 get_header('header2'); 
?>
<div class="edit_content">

<!-- CONTENT ====================================== -->

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			
			<div class="container-full landing-page">	
				<h1><?php the_title(); ?></h1>	
			</div>
			<div class="container-full">
				<!-- PAGE CONTENT -->
				<div class="page_content">
					<?php 
								if ( has_post_thumbnail() ) {
					 ?>	
					<div class="gravity_form_left">
					<?php	
									}
									else{																
						 ?>	
						 <div class="stand_alone">
					<?php		 														
					 } ?>
						<?php the_content(); ?>			
					</div>
					<?php 
								if ( has_post_thumbnail() ) {
					 ?>				
					<div class="gravity_form_right">		
				 		<div class="outer-border">
		  					<div class="inner-grey">	
						<?php 
								
									$values = get_field('side_image_link');			// chck to see if you add a link 				
									if ( $values ){
									 ?>
										<a href ="<?php the_field('side_image_link') ?>" >
												<?php 	the_post_thumbnail("full");  ?>
										</a>	
						<?php	
									}
									else{																
						 ?>	
								<?php 	the_post_thumbnail("full");  ?>
												
						<?php 
									}
								?>
					 		</div>
		 				</div>			
					</div>
					<?php }					
					else{														
					 } ?>
				</div><!-- END PAGE CONTENT -->
			</div><!-- inner ends -->
		<?php endwhile; ?>
	<div class="clearfix"></div>
</div><!-- content ends -->


<?php get_footer('footer2'); ?>