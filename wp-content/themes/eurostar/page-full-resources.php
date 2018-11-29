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
					
						<?php the_content(); ?>			
					
										<style>
					    ul.custom_cat_list {
					        list-style: none;
					    }
					    ul.custom_cat_list li {
					        width: 25%;
					        float: left;
					    }
					</style>
					
					<ul class="custom_cat_list">
					    <?php $categories = get_categories('taxonomy=resource_type&post_type=resource'); ?>
					        <?php foreach ($categories as $category) : ?>
					            <li><a href="<?php echo get_category_link($category->cat_ID); ?>"><?php echo $category->name; ?></a></li>
					    <?php endforeach; ?>
					<ul>
						
						
							<?php 
				
				echo $term_slug . '<br>';							
				print_r($current_term);
				
							
				
				if ( $taxonomyName == 'resource_type' ) { ?>
				
					<ul id="resources_filter" >
						<li class="all active" data-filter="*">All</li>
						<?php $tags = get_tags(array('hide_empty' => false, 'include' => array(54,50,53,85,86,52,51,55,34,18,122)));
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
				
					<ul id="resources_list" >
						<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '999', 'order' => 'DESC')); while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
								<?php 
									// $bottom_tags = get_the_tags();
// 									if ($bottom_tags) {
// 									  foreach($bottom_tags as $bottom_tag) {
// 									  	if ( 'post' == get_post_type() ) { 
// 									  		echo '<h3>BLOG</h3>'; 
// 									  	} else { 
// 									  		echo '<h3>' . $resource_type . '</h3>';
// 									  		echo '<h3 class="' . $bottom_tag->slug . '">' . $bottom_tag->name . '</h3> '; 
// 									  		echo '<h3>'. get_field('resource_subtitle') .'</h3>'; 
// 									  	}
// 									  }
// 									}
								?>
								</div>
								
							</li>
							</a>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>			
				<?php } ?>		
						
						
				</div><!-- END PAGE CONTENT -->
			</div><!-- inner ends -->
		<?php endwhile; ?>
	<div class="clearfix"></div>
</div><!-- content ends -->


<?php get_footer('footer2'); ?>