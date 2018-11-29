<?php
/**
 *  Template Name: Thank you - Resources
 */

get_header(); ?>
<div id="content_left" class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Resources</h1>
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
				<div class="content_inner">
							
				<div class="the_content"><?php the_content(); ?></div>
						
				</div>				
				<div class="social_bar">
					<h6>Share This</h6>
					<span class='st_email_hcount' displayText='Email'></span>
					<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
					<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				</div>
							
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
