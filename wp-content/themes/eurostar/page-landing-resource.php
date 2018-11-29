<?php /* Template Name: Gravity Forms - Landing Page */
 get_header('header2'); 
?>
<div class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
			
			<div class="entry-content landing-page">			
				
			<div class="container-full ">
				<h1><?php the_title(); ?></h1>	
			</div>
			<div class="container-full">
				<div class="gravity_form_left">
					<div class="top-container">
						<div class = "main_image">  
							<img src="<?php the_field('main_image') ?>"  alt="Gravity Form first image" />
						</div>			
						<div class="the_content">						
							<?php the_content(); ?>
						</div>
					</div>				
					<div class = "author_section">  
				
						<img src="<?php the_field('editor_image') ?>"  alt="Editor's Image" />
						<?php if ( get_field('editor_description') ): ?>					
								<h3>The Author</h3>  				
							<?php endif ?>
						<p>
						<?php the_field('editor_description') ?></p>
					</div>
				</div>
				<div  class="gravity_form_right green-bg">
					 <div> 
					<?php the_field('add_form_code') ?>
				   </div>	
				</div>
			</div>
			
				
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>


<?php get_footer('footer2'); ?>