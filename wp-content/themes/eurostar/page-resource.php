<?php /* Template Name: Resources - Ebooks & Webinars */
get_header(); 
?>
<div id="content_left" class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>		
			<?php if ( is_page() && $post->post_parent ) {
					$parent_title = get_the_title($post->post_parent); ?>
					<h1 class="entry-title"><?php echo $parent_title;  ?></h1>
			<?php } else { ?>
					<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
			<?php } ?>
			<div class="entry-content"> 
			
				<?php the_breadcrumb(); ?>
				
				<div class="resources_main_title">
					<h3>Categories</h3>
					<p>Use our search categories below to filter your resources.</p>
					<a href="/resources/upload-resource/" class="resources_link">&#43; Upload Resource</a>
				</div>
								
				<div class="the_content"><?php the_content(); ?></div>
								
					<ul id="resources_filter">
						<li class="all active" data-filter="*">All</li>
						<?php 
						if ( is_page('Ebooks') ) { 
							$tags = get_tags(array('hide_empty' => false, 'include' => array(54,50,53,74,75,52,55)));
						} elseif ( is_page('webinars') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(54,50,53,74,75,52,51,55)));
						} elseif ( is_page('sound-filepodcast') ) {	
							$tags = get_tags(array('hide_empty' => false, 'include' => array(54,74,75,52,55)));
						}
							if ($tags) {
								foreach ($tags as $tag) {
									$tag_name = $tag->name;
									$tag_slug = $tag->slug;
									echo '<li class="' . $tag_slug . '" data-filter=".' . $tag_slug . '">';
									$tag_name = str_replace('_', ' ', $tag_name);
									echo $tag_name;
									echo '</li>';
								}
						} ?>
					</ul>
					
					<?php  $tag_resources = 0; ?>
					
					<?php if ( is_page('Ebooks') ) { $tag_resources = 18; } elseif ( is_page('webinars') ) { $tag_resources = 34; } elseif ( is_page('webinars') ) { $tag_resources = 122; } ?>
										
					<ul id="resources_list">
					
						<?php if ( is_page('Ebooks') ) { ?>
							<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '999', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  18)); ?>
						<?php } elseif ( is_page('webinars') ) { ?>
							<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '999', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  34)); ?>
						<?php } elseif ( is_page('sound-filepodcast') ) { ?>
							<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '999', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  122)); ?>
						<?php } else { ?>
							<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '999', 'order' => 'DESC', 'order_by' => 'date' )); ?>
						<?php } ?>
						
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="isotope-item 
							<?php
								$posttags = get_the_tags();
								if ($posttags) {
								  foreach($posttags as $tag) {
									echo '' . $tag->slug . ' '; 
								  }
								}
							 ?>">
							<li>
								<div class="resource_img">
									<?php if ( has_post_thumbnail() ) { ?>
										<div class="resource_featured_img"><?php the_post_thumbnail('resources_img'); ?></div>
									<?php } else { ?>
										<?php if ( get_field('resource_featured_image') ) { ?>
											<?php 
												$attachment_id = get_field('resource_featured_image');
												$size = "resources_img"; // (thumbnail, medium, large, full or custom size)
												$image = wp_get_attachment_image_src( $attachment_id, $size );
											?>
											<div class="resource_featured_img"><img src="<?php echo $image[0]; ?>" /></div>
										<?php } ?>
									<?php } ?>
								</div>
								<div class="resource_title"><?php the_title(); ?></div>
								<?php $resource_type = get_field('resource_type'); ?>
								<?php $resource_type = str_replace('_', ' ', $resource_type); ?>
								<div class="resource_type">
								<?php
									if ( 'post' == get_post_type() ) { 
										echo '<h3>BLOG</h3>'; 
									} else { 
										echo '<h3>' . $resource_type . '</h3>';
										// echo '<h3 class="' . $bottom_tag->slug . '">' . $bottom_tag->name . '</h3> '; 
										echo '<h3>'. get_field('resource_subject_matter') .'</h3>'; 
									}
								?>
								</div>
								
							</li>
							</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>			
				
				<div class="clear_border"></div>
				<div class="social_bar">
					<h6>Share This</h6>
					<span class='st_email_hcount' displayText='Email'></span>
					<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
					<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				</div>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			<!-- .entry-content -->
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>