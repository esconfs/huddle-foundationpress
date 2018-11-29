<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
 
get_header(); 
$prant = $post->post_parent;
?>
<div id="content_left" class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php if(get_post_type() == 'forum' OR get_post_type() == 'topic' OR get_post_type() == 'reply') { ?>
				<h1 class="entry-title">Forums</h1>
			<?php } else { ?>
				<?php if ( bp_is_user() ) {?>
					
				<?php } elseif ( is_page() && $post->post_parent ) {
						$parent_title = get_the_title($post->post_parent); ?>
						<h1 class="entry-title"><?php echo $parent_title;  ?></h1>
				<?php } ?>
			<?php } ?>
			
			<div class="entry-content">
			
				<?php if(get_post_type() == 'forum' OR get_post_type() == 'topic' OR get_post_type() == 'reply') { ?>
					<?php bbp_breadcrumb(); ?>
				<?php } else { ?>
					<?php the_breadcrumb(); ?>
				<?php } ?>
				
				<?php if(is_page('most-recent') OR is_page('blog')) { ?>					
					<ul class="blog_short_filter">
						<li class="active"><a href="/blog/most-recent/">Most recent</a></li>
						<li><a href="/blog/most-views/">Most views</a></li>
						<li><a href="/blog/most-comments/">Most comments</a></li>
					</ul>
				<?php } elseif (is_page('most-views')) { ?>
					<ul class="blog_short_filter">
						<li><a href="/blog/most-recent/">Most recent</a></li>
						<li class="active"><a href="/blog/most-views/">Most views</a></li>
						<li><a href="/blog/most-comments/">Most comments</a></li>
					</ul>
				<?php } elseif (is_page('most-comments')) { ?>
					<ul class="blog_short_filter">
						<li><a href="/blog/most-recent/">Most recent</a></li>
						<li><a href="/blog/most-views/">Most views</a></li>
						<li class="active"><a href="/blog/most-comments/">Most comments</a></li>
					</ul>
				<?php } elseif (get_post_type() == 'forum') { ?>
					<?php  if ( get_field('forum_header_advert', 'option') ) { ?>
						<a href="<?php the_field('forum_header_advert_url', 'option'); ?>" title="Forum Header Advert" target="_blank" class="paid_forum_advert">
							<?php 
							$image = get_field('forum_header_advert', 'option');
							$size = 'forum_header_advert';
							if( $image ) {
								echo wp_get_attachment_image( $image, $size, "", array( "class" => "forum_header_advert" ) );
							}
							?>
		           		</a>
		           		<div class="clearfix"></div>
					<?php } ?>
					<h1 class="forum_title"><?php the_title(); ?></h1>
				<?php } elseif (is_page('
				')) { ?>
					<div class="resources_main_title">
						<h3>Categories</h3>
						<p>Use our search categories below to filter your resources.</p>
						<a href="/resources/upload-resource/" class="resources_link">&#43; Upload Resource</a>
					</div>
				<?php } else { ?>
					<h1 class="child_title"><?php the_title(); ?></h1>
				<?php } ?>
								
				<div class="the_content"><?php the_content(); ?></div>
				
				<!-- About Page -->
				<?php if ( is_page('About') ) { ?>
				<div class="clear_border"></div>
				<h1 class="grey">EXPLORE EuroSTAR HUDDLE</h1>
					<ul class="about_links_wrapper">
						<li class="about_links started"><a href="<?php the_field('link_url_01'); ?>" title="<?php the_field('link_text_01'); ?>"><div class="about_links_img"></div><?php the_field('link_text_01'); ?></a></li>
						<li class="about_links faq"><a href="<?php the_field('link_url_02'); ?>" title="<?php the_field('link_text_02'); ?>"><div class="about_links_img"></div><?php the_field('link_text_02'); ?></a></li>
						<li class="about_links history"><a href="<?php the_field('link_url_03'); ?>" title="<?php the_field('link_text_03'); ?>"><div class="about_links_img"></div><?php the_field('link_text_03'); ?></a></li>
						<!-- <li class="about_links webinar"><a href="<?php the_field('link_url_04'); ?>" title="<?php the_field('link_text_04'); ?>"><div class="about_links_img"></div><?php the_field('link_text_04'); ?></a></li> -->
						<li class="about_links events"><a href="<?php the_field('link_url_05'); ?>" title="<?php the_field('link_text_05'); ?>"><div class="about_links_img"></div><?php the_field('link_text_05'); ?></a></li>
					</ul>
				<?php } ?>				
				
				<!-- Login Page -->
				<?php if ( is_page('Login') ) { ?>
					<div class="clear_border"></div>
					<?php if ( ! is_user_logged_in() ) { ?>
					<form name="loginform-custom" id="loginform-page" action="https://huddle.eurostarsoftwaretesting.com/wp-login.php" method="post">
						<label for="user_login">Email address</label>
						<input type="text" name="log" id="user_login" class="input" value="" size="20" />
						<div class="clearfix"></div>
						<label for="user_pass">Password</label>
						<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
						<div class="clearfix"></div>
						<div class="submit">
							<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="LOGIN" />
							<input type="hidden" name="redirect_to" value="https://huddle.eurostarsoftwaretesting.com/wp-admin/" />
						</div>
					</form>	
					<?php } else { ?>
						<?php wp_redirect( home_url() ); ?>
						<!--
<div id="login_page">
							<a class="btn_profile" href="https://huddle.eurostarsoftwaretesting.com/wp-admin/">Dashboard</a>
							<a class="btn_logout" href="https://huddle.eurostarsoftwaretesting.com/wp-login.php?action=logout&#038;redirect_to=<?php the_permalink(); ?>&#038;_wpnonce=67ce2190b0">Log out</a>
						</div>
-->
					<?php } ?>
				<?php } ?>
				
				<!-- Blog Page -->
				<?php if ( is_page('most-recent') OR is_page('blog')  ) { ?>
					
					<ul id="blog_list">
						<?php 
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						
						$the_query = new WP_Query(
							array(
								'post_type' => array('post'/* , 'resource' */), 
								'tag__not_in' => array( 18, 34 ), 
								'posts_per_page' => '10', 
								'order' => 'DESC', 
								'paged' => $paged
							)
						);
						
						while ( $the_query->have_posts() ) : $the_query->the_post(); 
							
							$findingPostAuthor = get_post();
							$author_id =$findingPostAuthor->post_author;
							$author_name = get_userdata($author_id)->display_name
						
						?>
							<li>
								<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="banner-image"><?php the_post_thumbnail('banner-image'); ?></a> <?php  } ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4>	</a>	
								<?php the_excerpt(); ?>
								<ul class="blog_details">
									<li><?php the_time('d/m/Y'); ?></li>
									<li><?php echo getPostViews(get_the_ID());?></li>
									<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
									<li>Posted by <span><?php echo $author_name ?></span></li>
								</ul>
							</li>	
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					
					<nav class="blog_pagination">
						<?php
							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('&lt;'),
								'next_text'    => __('&gt;')
							) );
							?>
					</nav>
					
				<?php } else if ( is_page('most-views') ) { ?>
					
					<ul id="blog_list">
						<?php $views = getPostViews(get_the_ID());?>
						<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
						<?php $the_query = new WP_Query(array('post_type' => array('post', 'resource'), 'tag__not_in' => array( 18, 34 ), 'posts_per_page' => '10', 'order' => 'DESC', 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'paged' => $paged)); while ( $the_query->have_posts() ) : $the_query->the_post(); 
							
							$findingPostAuthor = get_post();
							$author_id =$findingPostAuthor->post_author;
							$author_name = get_userdata($author_id)->display_name
							
						?>
							<li>
								<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="banner-image"><?php the_post_thumbnail('banner-image'); ?></a> <?php  } ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4>	</a>	
								<?php the_excerpt(); ?>
								<ul class="blog_details">
									<li><?php the_time('d/m/Y'); ?></li>
									<li><?php echo getPostViews(get_the_ID());?></li>
									<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
									<li>Posted by <span><?php  echo $author_name ?></span></li>
								</ul>
							</li>	
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					
					<nav class="blog_pagination">
						<?php
							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('&lt;'),
								'next_text'    => __('&gt;')
							) );
							?>
					</nav>
					
				<?php } else if ( is_page('most-comments') ) { ?>
					
					<ul id="blog_list">
						<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
						<?php $the_query = new WP_Query(array('post_type' => array('post', 'resource'), 'tag__not_in' => array( 18, 34 ), 'posts_per_page' => '10', 'order' => 'DESC', 'orderby'=>'comment_count', 'paged' => $paged)); while ( $the_query->have_posts() ) : $the_query->the_post(); 
														
							$findingPostAuthor = get_post();
							$author_id =$findingPostAuthor->post_author;
							$author_name = get_userdata($author_id)->display_name
								
						?>
							<li>
								<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="banner-image"><?php the_post_thumbnail('banner-image'); ?></a> <?php  } ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4>	</a>	
								<?php the_excerpt(); ?>
								<ul class="blog_details">
									<li><?php the_time('d/m/Y'); ?></li>
									<li><?php echo getPostViews(get_the_ID());?></li>
									<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
									<li>Posted by <span><?php echo $author_name ?></span></li>
								</ul>
							</li>	
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
					
					<nav class="blog_pagination">
						<?php
							$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'total' => $the_query->max_num_pages,
								'prev_text'    => __('&lt;'),
								'next_text'    => __('&gt;')
							) );
							?>
					</nav>
					
				<?php } ?>				
				<div class="clear_border"></div>
				
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