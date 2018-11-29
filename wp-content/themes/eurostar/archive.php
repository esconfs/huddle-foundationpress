<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div id="content_left" class="edit_content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title">Archives</h1>
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
					<h3>
						<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'boilerplate' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'boilerplate' ), get_the_date('F Y') );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'boilerplate' ), get_the_date('Y') );
						else :
							_e( 'Blog Archives', 'boilerplate' );
						endif;
						?>
					</h3>
					<ul id="blog_list">
						<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<li>
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
					<?php wpbeginner_numeric_posts_nav(); ?>
																		
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
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>