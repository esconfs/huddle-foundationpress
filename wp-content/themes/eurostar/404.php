<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Ebow_Responsive
 */
get_header(); ?>
<div id="content_left" class="edit_content">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php _e( 'Not Found', 'boilerplate' ); ?></h1>
			<div class="entry-content">
				<?php bbp_breadcrumb(); ?>
												
				<div class="the_content">
				<div class="clear_border"></div>
				
					<form role="search" method="get" class="search-form" id="search_form" action="<?php echo home_url( '/' ); ?>">
						<label>	<span class="screen-reader-text">Search for:</span></label>
						<div class="input_wrapper"><input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:" /></div>
						<div class="search_submit">
							<input type="submit" class="search-submit" value="Search" />
						</div>
					</form>
				
				</div>
								
				<div class="clear_border"></div>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>