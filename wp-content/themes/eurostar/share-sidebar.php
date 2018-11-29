<?php
/**
 * The Resorces Tabed Sidebar.
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * @by Cathal - 1.0
 */
 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
 
 if ( is_singular('post') ) { 
					
					/* Social Sharing */
					
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL;
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
		$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
 
		// Add sharing button at the end of page/page content
					
					
					?>
		
		<li class="widget share_sidebar">	
			<p class="sidebar_title">Share this!</p>	
				<!-- BLOG POSTS ONLY CONTENT -->					
				   <div class="blog_post_container">	 
					<ul class="blog_details">
						<!-- <li><?php echo getPostViews(get_the_ID());?></li> 
						<li><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></li> -->
						<li><a class="crunchify-link crunchify-twitter" href="<?php  echo $twitterURL; ?>" target="_blank"><i class="icon-2x icon-twitter "></i></a></li>
						<li><a class="crunchify-link crunchify-facebook" href="<?php  echo $facebookURL; ?>" target="_blank"><i class="icon-2x icon-facebook "></i></a></li>
						<li><a class="crunchify-link crunchify-googleplus" href="<?php  echo $googleURL; ?>" target="_blank"><i class="icon-2x icon-google-plus "></i></a></li>
						<li><a class="crunchify-link crunchify-linkedin" href="<?php  echo $linkedInURL; ?>" target="_blank"><i class="icon-2x icon-linkedin "></i></a></li>
						<li><a class="crunchify-link crunchify-pinterest" href="<?php  echo $pinterestURL; ?>" target="_blank"><i class="icon-2x icon-pinterest "></i></a></li>
						<li><a href="<?php get_permalink() ?>">.</a></li>
					</ul>		
		</li>	
	<?php 
			$crunchifyURL = "";
		} 

		?>
		
<?php endwhile; else: ?> 
<p><?php
_e('Sorry, no posts matched your criteria.'); ?></p> 
<?php endif; ?>