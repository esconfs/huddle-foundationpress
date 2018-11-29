<?php /* Template Name: Upload */ 
acf_form_head();
get_header(); 
the_post(); 
?>
<div id="content_left" class="edit_content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Resources</h1>
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
				
				<div id="upload_title">
					<h3><?php the_title(); ?></h3>
					<p>Please use the form below to upload your resource.</p>
					<a href="#" onclick="javascript:window.history.back(-1);return false;" class="upload_back">Go Back</a>
				</div>
				
				<div id="upload_form">
 				<!-- 12869 - takes care of the content block -->
 				<?php if ( is_user_logged_in() ) { ?>
					<?php 
					$args = array(
						'post_id' => 'new',						
						'field_groups' => array(12869,12872,12874),
						'submit_value' => 'Upload',
						'return' => add_query_arg( 'uploaded', 'true', get_permalink(get_page_by_title( "Thank You For Sharing" )) ),
						'updated_message' => false
					);
					acf_form( $args ); 
					?>
 				<?php } else { ?>
 					You need to be logged in to upload your resource.
 					<div class="clear_margin"></div>
 				<?php } ?>
				</div><!-- #upload_form -->
				
				<div class="clear_border"></div>
				
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>