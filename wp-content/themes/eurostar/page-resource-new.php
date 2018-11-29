<?php /* Template Name: Resource Sections */
get_header();
?>
<div class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( is_page() && $post->post_parent ) {
					$parent_title = get_the_title($post->post_parent); ?>
					<!--  <h1 class="entry-title"><?php echo $parent_title;  ?></h1> -->
			<?php } else { ?>
					<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
			<?php } ?>
			<div class="entry-content">

				<?php the_breadcrumb(); ?>
				<?php if ( is_page('Resources') ) { ?>
				<div class="the_content"><?php the_content(); ?>
					<div class="green-bar"></div>
				</div>
					<ul id="resources_list" >
						<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '250', 'order' => 'DESC')); while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
								<div class="resource_right">
									<div class="resource_title"><?php if (strlen($post->post_title) > 100) {
																		echo substr(the_title($before = '', $after = '', FALSE), 0, 100) . '...'; } else {
																		the_title();
																		} ?></div>
									<?php $resource_type = get_field('resource_type'); ?>
									<?php $resource_type = str_replace('_', ' ', $resource_type); ?>
									<div class="resource_type">
									<?php
										if ( 'post' == get_post_type() ) {
											echo '<h3>BLOG</h3>';
										} else {
											echo '<h3>' . $resource_type . '</h3>';
											echo '<h3>'. get_field('resource_subject_matter') .'</h3>';
										}
									?>
									</div>
									<!-- Bootom Section -->
									<div class="bottom">Continue reading...</div>
									<div class="icon">
										<?php $resource_type = str_replace(' ', '-', $resource_type); ?>
										<div class="<?php echo $resource_type ?>" style="color: white;"></div>
									</div>
								</div>
							</li>
							</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					<!-- END Main Resources Page -->
				<?php } else {?>
					<!-- Child Resources Page -->
					<div class="the_content"><?php the_content(); ?></div>
					<ul id="resources_filter">
						<li class="all active" data-filter="*">All</li>
						<?php
						if ( is_page('test-automation') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,114))); // 114-Case Study 122-Podcast
						} elseif ( is_page('people-skills') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,122)));
						} elseif ( is_page('mobile-testing') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,122)));
						} elseif ( is_page('test-management') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34)));
						} elseif ( is_page('agile-testing') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34)));
						} elseif ( is_page('functional-testing') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34)));
						} elseif ( is_page('non-functional-testing') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34)));
						} elseif ( is_page('cloud-testing') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,122)));
						} elseif ( is_page('artificial-intelligence') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,114,122)));
						} elseif ( is_page('other') ) {
							$tags = get_tags(array('hide_empty' => false, 'include' => array(18,34,114,122)));
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

					<?php  $tag_resources = 0;
					    // Assign Resources Tagto page
						 if ( is_page('automation') ) { $tag_resources = 175; } elseif ( is_page('people-skills') ) { $tag_resources = 99; } elseif ( is_page('webinars') ) { $tag_resources = 122; } ?>

					<ul id="resources_list">

						<?php if ( is_page('test-automation') ) {
							  	$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  50)); // LIVE
						 		} elseif ( is_page('people-skills') ) {
							  	$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  266)); // 176
						 		} elseif ( is_page('agile-testing') ) {
							  	$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  97)); // 97
							 	} elseif ( is_page('mobile-testing') ) {
							 		$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  154)); // LIVE
						  	} elseif ( is_page('other') ) {
									$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  146)); // LIVE
						 		} elseif ( is_page('functional-testing') ) {
									$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  267)); // 267
						 		} elseif ( is_page('non-functional-testing') ) {
							  	$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  271)); // 271
							 	} elseif ( is_page('test-management') ) {
								  $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  51)); // 51
								} elseif ( is_page('artificial-intelligence') ) {
									$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  344,349)); // 344 			
								} elseif ( is_page('cloud-testing') ) {
									$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '199', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  257)); // 257
								} else {
									$the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '8', 'order' => 'DESC', 'order_by' => 'date' ));
						 		} ?>

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
								<div class="resource_right">
									<div class="resource_title"><?php if (strlen($post->post_title) > 100) {
																	echo substr(the_title($before = '', $after = '', FALSE), 0, 100) . '...'; } else {
																		//echo substr(the_content(), 0, 10) . '...';
																	the_title();
																	} ?>
									</div>
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
									<!-- Bootom Section -->
									<div class="bottom">Continue reading...</div>
									<div class="icon">
										<?php $resource_type = str_replace(' ', '-', $resource_type); ?>
										<div class="<?php echo $resource_type ?>" style="color: white;"></div>
									</div>
								</div>
							</li>
							</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					<?php } // END  Child page section?>
				<div class="clear_border"></div>

				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			<!-- .entry-content -->
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
