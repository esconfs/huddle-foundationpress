<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<div id="content_left" class="edit_content search_page">
		<div class="search_wrapper">
			<h1 class="entry-title">Search</h1>
			<div class="entry-content">
				<?php if(get_post_type() == 'forum' OR get_post_type() == 'topic' OR get_post_type() == 'reply') { ?>
					<?php bbp_breadcrumb(); ?>
				<?php } elseif (is_search()) { ?>
					<div class="breadcrumb_wrapper"><a href="http://testhuddle.com">Home</a> &#47; Search Results</div>
				<?php } else { ?>
					<?php the_breadcrumb(); ?>
				<?php } ?>
				<?php if ( have_posts() ) : ?>
				<h3 class="search_result_title">Your search for <?php $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">&#91;'); echo $key; _e('&#93;</span> returned '); _e(' <span> '); echo $count . ' '; _e('</span> results'); wp_reset_query(); ?></h3>
				
				<h3 class="search_result_filter_text">FILTER RESULTS</h3>
				<ul class="search_result_filter custom_checkbox">
					<li>
						<input type="checkbox" data-type="forum" value=".forum" class="css-checkbox forums" id="checkbox_klaus" checked="checked">
						<label for="checkbox_klaus" name="checkbox_klaus_lbl" class="css-label" data-filter="forums">Forums</label>
					</li>
					<!-- 
<li>
						<input type="checkbox" data-type="resource" value=".resource" class="css-checkbox resources" id="checkbox_klaus2" checked="checked">
						<label for="checkbox_klaus2" name="checkbox_klaus_lbl2" class="css-label" data-filter="resources">Resources</label>
					</li>
 -->
					<li>
						<input type="checkbox" data-type="event" value=".event" class="css-checkbox events" id="checkbox_klaus3" checked="checked">
						<label for="checkbox_klaus3" name="checkbox_klaus_lbl3" class="css-label" data-filter="events">Events</label>
					</li>
					<?php
					$tags = get_tags(array('hide_empty' => false, 'include' => array(34,18)));
						$html = '';
						$t = 4;
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id );
							$tag_name = $tag->name;
							$tag_slug = $tag->slug;
							
							$html .= '<li><input type="checkbox" data-type="' . $tag_slug .'" value=".tag-' . $tag_slug .'" class="css-checkbox tags-filter ' . $tag_slug .'" id="checkbox_klaus' . $t . '" checked="checked">';
							$html .= '<label for="checkbox_klaus' . $t . '" name="checkbox_klaus_lbl' . $t . '" class="css-label" data-filter=".tag-' . $tag_slug . ' ">' . $tag_name . '</label></li>';
							$t++;
						}
						$html .= '';
						echo $html;
					?>
				</ul>
				
				<div id="search_list">
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
				</div>
				
				<?php else : ?>
									<h2><?php _e( 'Nothing Found', 'boilerplate' ); ?></h2>
									<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'boilerplate' ); ?></p>
									<?php get_search_form(); ?>
				<?php endif; ?>

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
		</div><!-- #post-## -->
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>



<?php get_footer(); ?>
