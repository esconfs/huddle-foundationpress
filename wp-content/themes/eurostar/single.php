<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php  setPostViews(get_the_ID()); ?>
<div id="content_left" class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( is_singular('post') ) { ?>
				<h2 class="entry-title">Blog</h2>
			<?php } elseif ( is_singular('event') ) { ?>
				<h1 class="entry-title">Events</h1>
			<?php } ?>
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
				
				<?php if ( is_singular('resource') ) { 	 ?><a href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true" class="go-bck"><< Go Back</a><?php  } else{  } ?> 
				<div class="content_inner">
				
				<?php if ( is_singular('event') ) { ?>
				<!-- EVENTS ONLY CONTENT --> 
					<div class="event_title">
						<?php 
							$single_month = $EM_Event->output('#_{M}'); 
							$single_day = $EM_Event->output('#_{d}'); 
							$single_title = $EM_Event->output('#_EVENTNAME'); 
							$single_locationname = $EM_Event->output('#_LOCATIONNAME'); 
							$single_locationtown = $EM_Event->output('#_LOCATIONTOWN'); 
							$single_date = $EM_Event->output('#_EVENTDATES'); 
							$single_time = $EM_Event->output('#_EVENTTIMES'); 
						?>
						<div class="date_holder">
							<div class="date_month"><?php echo $single_month; ?></div>
							<div class="date_day"><?php echo $single_day; ?></div>
						</div>
						<h4><?php echo $single_title; ?></h4>
						<div class="event_location"><?php echo $single_locationname; ?>, <?php echo $single_locationtown; ?></div>
						<div class="event_date"><?php echo $single_date; ?>  -  <?php echo $single_time; ?></div>
					</div>
					<div class="clearfix"></div>
					<div class="clear_margin"></div>
					
				
				<?php } elseif ( is_singular('resource') ) { ?>
				<!-- RESOURCES ONLY CONTENT --> 	
					<?php
						$date_now = date("Ymd");
						$date = get_field('upcoming_date');
						$dow = 	date("d/m/Y", strtotime($date)); 			 
										//if( $date > $date_now ) {
										if (strtotime($date_now) < strtotime($date)) {
										        $upcoming = 'Date of Webinar: ' . $dow ;
										    }else{
										        $upcoming = ' ';
										    }
						$attachment_id = get_field('file_upload');
						$file_url = wp_get_attachment_url( $attachment_id );
						$file_name = get_the_title( $attachment_id );
						$file_fullname = basename($file_url);
						$file_type = wp_check_filetype($file_fullname);
						$file_type = $file_type['ext'];
					?>	
					
					<?php $video_type = get_field( "video_type" ); ?>
					
					<?php if( $video_type != 'none' ) { ?>
					
						<?php if( $video_type == 'youtube' ) { ?>
							<iframe width="1280" height="720" src="//www.youtube.com/embed/<?php the_field('youtube_url'); ?>" frameborder="0" allowfullscreen></iframe>
						<?php } else { ?>
							<iframe src="//player.vimeo.com/video/<?php the_field('vimeo_url');?>" width="1280" height="720" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
							<div class="clearfix"></div>
						<?php } ?>
						<?php if ( $attachment_id ) { ?>
							<?php if ( is_user_logged_in() ) { ?>
								<!-- onClick="document.location.href='/resources/thank-you/'" -->
								<a class="resource_download" href="/downloader.php?title=<?php echo $file_name; ?>&file=<?php echo $file_url; ?>&id=<?php echo $attachment_id; ?>" title="<?php echo $file_name; ?>" target="_blank">
									<?php $resource_type=get_field('resource_type'); ?>
										Download <?php echo $resource_type; ?>
								</a>
							<?php } else { ?>
								<a class="resource_download_fail" href="javascript:void(0);" onclick="$('#login_wrapper').slideDown(); $('html, body').animate({ scrollTop: 0 }, 'slow'); $('.download_msg').slideDown();">Download</a>
								<div class="clearfix"></div>
								<p class="download_msg">You need to <a href="/registration/" title="register" target="_blank">register</a> or login to access this content.</p>
							<?php } ?> 
						<?php } ?>	
					
					<?php } else { ?>
						<div class="download_img_wrapper">
						<?php if ( get_field('resource_featured_image') ) { ?>
							<?php 
								$attachment_id = get_field('resource_featured_image');
								$size = "full"; // (thumbnail, medium, large, full or custom size)
								$image = wp_get_attachment_image_src( $attachment_id, $size );
							?>
							<div class="resource_featured_img"><img src="<?php echo $image[0]; ?>" /></div>
						<?php } ?>
						<?php if ( $attachment_id ) { ?>
							<?php if ( is_user_logged_in() ) { ?>
								<!-- onClick="document.location.href='/resources/thank-you/'" -->
								<a class="resource_download" href="/downloader.php?title=<?php echo $file_name; ?>&file=<?php echo $file_url; ?>&id=<?php echo $attachment_id; ?>" title="<?php echo $file_name; ?>" target="_blank">
									<?php $resource_type=get_field('resource_type'); ?>
										Download <?php echo $resource_type; ?>
								</a>
							<?php } else { ?>
								<a class="resource_download_fail" href="javascript:void(0);" onclick="$('#login_wrapper').slideDown(); $('html, body').animate({ scrollTop: 0 }, 'slow'); $('.download_msg').slideDown();">Download</a>
								<div class="clearfix"></div>
								<p class="download_msg">You need to <a href="/registration/" title="register" target="_blank">register</a> or login to access this content.</p>
							<?php } ?> 
						<?php } ?>	
						</div>
					<?php } ?>					
				
					<h1 class="resources_single_title"><?php the_title(); ?></h1>
					<h4 class="green"><?php echo $upcoming; ?> </h4>
				<?php } else { ?>
					<?php if ( has_post_thumbnail() ) {  ?><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="banner-image"><?php the_post_thumbnail('banner-image'); ?></a> <?php  } ?>
					<div><h1 class="blog_title"><?php the_title(); ?> </h1>
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="blog_back">Go Back</a>
					</div>
				<?php } ?>
								
				<?php if ( is_singular('post') ) { 
					
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
						<li class="text">Posted by <span><?php the_author_posts_link(); ?></span></li>
						<li class="text"><?php the_time('d/m/Y'); ?></li>
					</ul>
				
					<div class="clear_margin"></div>
				<?php } ?>
				<div class="the_content"><?php the_content(); ?></div>
							
				<?php if ( is_singular('post') ) { ?>					
				   </div> <!-- End blog_post_container-->
				<?php } ?>
				
				<?php if ( is_singular('resource') ) { ?>
					<!-- RESOURCES ONLY CONTENT --> 
					<?php if ( get_field('editor_content') ): ?>					
						<div class = "author_section">  				
							<?php if ( get_field('editor_image') ): ?><img src="<?php the_field('editor_image') ?>"  alt="Editor's Image" />	<?php endif ?>									
									<h3><?php the_field('editor_title') ?></h3> 
							<p><?php the_field('editor_content') ?></p>
						</div>				
					<?php endif ?>	
				<?php } ?>	
								
								
				<?php if ( is_singular('event') ) { ?>
					<!-- EVENTS ONLY CONTENT --> 
					<div id="event_speakers">
						<h3>Speakers</h3>
						<ul id="event_speakers_list">
							<?php if( get_field( "person_text_01" ) ): ?>
								<li class="<?php if( !get_field( "person_image_01" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_01" ) ): ?><img src="<?php the_field('person_image_01'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_01'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_01'); ?>" title="<?php the_field('person_url_01'); ?>"><?php the_field('person_url_01'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_02" ) ): ?>
								<li class="<?php if( !get_field( "person_image_02" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_02" ) ): ?><img src="<?php the_field('person_image_02'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_02'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_02'); ?>" title="<?php the_field('person_url_02'); ?>"><?php the_field('person_url_02'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_03" ) ): ?>
								<li class="<?php if( !get_field( "person_image_03" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_03" ) ): ?><img src="<?php the_field('person_image_03'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_03'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_03'); ?>" title="<?php the_field('person_url_03'); ?>"><?php the_field('person_url_03'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_04" ) ): ?>
								<li class="<?php if( !get_field( "person_image_04" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_04" ) ): ?><img src="<?php the_field('person_image_04'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_04'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_04'); ?>" title="<?php the_field('person_url_04'); ?>"><?php the_field('person_url_04'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_05" ) ): ?>
								<li class="<?php if( !get_field( "person_image_05" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_05" ) ): ?><img src="<?php the_field('person_image_05'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_05'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_05'); ?>" title="<?php the_field('person_url_05'); ?>"><?php the_field('person_url_05'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_06" ) ): ?>
								<li class="<?php if( !get_field( "person_image_06" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_06" ) ): ?><img src="<?php the_field('person_image_06'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_06'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_06'); ?>" title="<?php the_field('person_url_06'); ?>"><?php the_field('person_url_06'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_07" ) ): ?>
								<li class="<?php if( !get_field( "person_image_07" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_07" ) ): ?><img src="<?php the_field('person_image_07'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_07'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_07'); ?>" title="<?php the_field('person_url_07'); ?>"><?php the_field('person_url_07'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_08" ) ): ?>
								<li class="<?php if( !get_field( "person_image_08" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_08" ) ): ?><img src="<?php the_field('person_image_08'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_08'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_08'); ?>" title="<?php the_field('person_url_08'); ?>"><?php the_field('person_url_08'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_09" ) ): ?>
								<li class="<?php if( !get_field( "person_image_09" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_09" ) ): ?><img src="<?php the_field('person_image_09'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_09'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_09'); ?>" title="<?php the_field('person_url_09'); ?>"><?php the_field('person_url_09'); ?></a></p>
								</li>
							<?php endif; ?>
							<?php if( get_field( "person_text_10" ) ): ?>
								<li class="<?php if( !get_field( "person_image_10" ) ) {echo 'event_speaker_full';} ?>">
									<?php if( get_field( "person_image_10" ) ): ?><img src="<?php the_field('person_image_10'); ?>" alt="" /><?php endif; ?>
									<p class="event_speakers_text"><?php the_field('person_text_10'); ?></p>
									<p class="event_speakers_url"><a href="<?php the_field('person_url_10'); ?>" title="<?php the_field('person_url_10'); ?>"><?php the_field('person_url_10'); ?></a></p>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				<?php } ?>				
				</div>				
				
				
				<!-- BLOG POSTS ONLY CONTENT --> 
				<?php if ( is_singular('post') ) { ?>
				
					<div class="blog_author_wrapper">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="blog_back_bottom">Go Back</a>
						<h2>Blog Post Added By</h2>
						<div><?php echo get_avatar( get_the_author_meta( 'ID' ), 140 ); ?></div>
						<div class="blog_author_meta">
							<h3><?php the_author_posts_link(); ?></h3>
							<p><?php the_author_description(); ?></p>	
						</div>	
						<h4>Join the discussion!</h4>
						<h4>Share your thoughts on this article by commenting below.</h4>
					
					</div>
								
					<?php comments_template( '', true ); ?>
					<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				
				<?php } elseif ( is_singular('resource') ) { ?>
					<?php comments_template( '', true ); ?>
				<?php } ?>
				
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
