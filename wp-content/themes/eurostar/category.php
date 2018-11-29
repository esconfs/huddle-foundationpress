<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */


get_header(); 
$current_cat = get_cat_id( single_cat_title("",false) );
?>
<div id="content_left" class="edit_content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Categories</h1>
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
					<h3>
						<?php
							printf( __( 'Category Archives: %s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );
						?>
					</h3>
					<p>
						<?php
							$category_description = category_description();
							if ( ! empty( $category_description ) )
							echo '' . $category_description . ''; 
						?>
					</p>
					<ul id="blog_list">
						<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>
						<?php $the_query = new WP_Query(array('post_type' => array('post'), 'cat' => $current_cat, 'posts_per_page' => '10', 'order' => 'DESC', 'orderby' => 'date', 'paged' => $paged)); ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php //if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<li>
								<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="banner-image"><?php the_post_thumbnail('banner-image'); ?></a> <?php  } ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4>	</a>	
								<?php the_excerpt(); ?>
								<ul class="blog_details">
									<li><?php the_time('d/m/Y'); ?></li>
									<li><?php echo getPostViews(get_the_ID());?></li>
									<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li>
									<li>Posted by <span><?php echo get_the_author_link(); ?></span></li>
								</ul>
							</li>				
						<?php endwhile; ?>
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
				<div class="clear_border"></div>
				<div class="social_bar">
					<h6>Share This</h6>
					<span class='st_email_hcount' displayText='Email'></span>
					<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
					<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				</div>
				
				<?php //wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>