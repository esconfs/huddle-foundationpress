<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>

<ul id="sidebar">

	<!-- FORUMS ONLY -->
	<?php if ( is_bbpress() ) { ?>
		<!-- Recent Comments -->
		<?php
			$number=2; // number of recent comments desired
			$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
		?>
		<?php if ( $comments ) : ?>
		<li id="recentcomments" class="widget">
			<h3>Test huddle comments</h3>
			<ul>
			<?php foreach ( (array) $comments as $comment) : ?>
				<li class="recentcomments">
					<?php echo get_avatar( $comment, 32 ); ?>
					
					<?php $user = get_user_by( 'email', $comment->comment_author_email );?>
					<?php $the_user_id = $user->ID; ?>
					<a class="bbp-author-name" href="<?php echo bp_core_get_user_domain( $the_user_id )?>"><?php echo $comment->comment_author;?></a>
					
					<div class="clearfix"></div>
					<a class="bbp-forum-title" href="<?php echo get_comment_link($comment->comment_ID); ?>"><?php echo get_the_title($comment->comment_post_ID); ?></a>
					<div class="bbp-forum-time"><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?></div>
				</li>
			<?php endforeach; ?>
			</ul>
		</li>
		<?php endif;?>
		<!-- Dynamic Sidebar -->
		<?php if ( is_active_sidebar( 'forum-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'forum-widget-area' ); ?>
		<?php endif; ?>
	<?php } else { ?>

	<!-- EVENTS ONLY -->
	<?php if ( is_singular('event') ) { ?>
		
		<?php if ( is_user_logged_in() ) { ?>
			<?php 
				global $current_user;
				get_currentuserinfo();
				$custom_current_userID = $current_user->ID;
				$custom_current_user = bp_core_get_username($custom_current_userID);
			?>
			<li class="widget widget_events_create">
				<a id="create_calendar" href="<?php echo home_url();?>/members/<?php echo $custom_current_user; ?>/events/my-events/edit/?action=edit" title="Add new event">Create event</a>
			</li>
		<?php }  else { ?>
			<li class="widget widget_events_create">
				<a id="create_calendar" href="<?php echo home_url();?>/registration/" title="Add new event">Create event</a>
			</li>
		<?php } ?>
		
		<li class="widget widget_events_addto">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
			<?php 
			global $post; $EM_Event = em_get_event($post->ID, 'post_id'); 
			$the_title = get_the_title(); 
			$the_link = get_permalink();
			$the_desc = $EM_Event->output('#_EVENTEXCERPT{30,...}'); 
			$the_location_name = $EM_Event->output('#_LOCATIONNAME'); 
			$the_location_city = $EM_Event->output('#_LOCATIONTOWN'); 
			$the_location = '' . $the_location_name . ', ' . $the_location_city . ''; 
			$the_date_start = $EM_Event->output('#_{Ymd}'); 
			$the_date_ends = $EM_Event->output('#@_{Ymd}'); 
			$the_time_start = $EM_Event->output('#_24HSTARTTIME'); 
			$the_time_start = str_replace(':', '', $the_time_start); 
			$the_time_ends = $EM_Event->output('#_24HENDTIME'); 
			$the_time_ends = str_replace(':', '', $the_time_ends); 
			$when = $EM_Event->output('#_EVENTTIMES'); 
			$full_date_start = '' . $the_date_start . 'T' . $the_time_start . '00Z';
			$full_date_ends = '' . $the_date_ends . 'T' . $the_time_ends . '00Z';
			?>
			<!-- <a id="add_to_calendar" href="http://www.google.com/calendar/event?action=TEMPLATE&text=<?php echo $the_title; ?>&dates=<?php if ($when == 'All Day') { echo '' . $the_date_start . '/' . $the_date_ends . ''; } else { echo '' . $the_date_start . 'T' . $the_time_start . '00Z/' . $the_date_ends . 'T' . $the_time_ends . '00Z'; } ?>&details=<?php echo $the_desc; ?>&location=<?php echo $the_location; ?>&trp=false&sprop=&sprop=name:" target="_blank">&#43; Add Event to Your Calendar</a> -->
			
			<?php endwhile; ?>
	
			<?php echo $EM_Event->output('#_BOOKINGBUTTON');  ?>
	
			<form method="post" action="<?php echo get_template_directory_uri(); ?>/PHPtoICS.php">
			
				<input type="hidden" name="post_title" value="<?php echo $the_title;?>" />
				<input type="hidden" name="post_desc" value="<?php echo $the_desc;?>" />
				<input type="hidden" name="post_link" value="<?php echo $the_link;?>" />
				<input type="hidden" name="post_location" value="<?php echo $the_location;?>" />
				<input type="hidden" name="post_date_start" value="<?php echo $full_date_start;?>" />
				<input type="hidden" name="post_date_ends" value="<?php echo $full_date_ends;?>" />
				
				<input type="submit" value="Add to Your Calendar" id="add_to_calendar"/>
				
			</form>
		</li>
		<li class="li_border"></li>
	
	<?php } ?>
	
	<?php if (is_tree(164) OR is_page('events') ) { ?>
		
		<?php if ( is_user_logged_in() ) { ?>
			<?php 
				global $current_user;
				get_currentuserinfo();
				$custom_current_userID = $current_user->ID;
				$custom_current_user = bp_core_get_username($custom_current_userID);
			?>
			<li class="widget widget_events_create">
				<a id="create_calendar" href="<?php echo home_url();?>/members/<?php echo $custom_current_user; ?>/events/my-events/edit/?action=edit" title="Add new event">Create event</a>
			</li>
		<?php }  else { ?>
			<li class="widget widget_events_create">
				<a id="create_calendar" href="<?php echo home_url();?>/registration/" title="Add new event">Create event</a>
			</li>
		<?php } ?>
		
		<li class="widget widget_events">
			<p class="sidebar_title">Event Calendar</p>
			<?php echo do_shortcode('[events_calendar long_events=1 full=1]'); ?>
		</li>
		<li class="li_border"></li>
	
	<?php }
	if(is_home() ) {		
	 ?>	 
	<li class="widget widget_subscribe">
		<p class="sidebar_title">Keep in touch with us</p>
		<div class="widget_top">
		  <p>Subscribe to our newsletter by submitting your email address below</p>
		  <div class="subscribe_wrapper">
	                  <?php echo do_shortcode('[gravityform id=15 title=false]'); ?>    
	     </div>
	   </div>       	
	</li>
	<?php 
	}
	else{
		if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : endif; // end primary widget area 
	}?>
			
	<?php if ( is_page(array('most-recent', 'most-views', 'most-comments', 'blog')) OR is_singular('post') OR is_category() ) {
		$exclude_slugs      = array( 'eurostar-conferences', 'friday-funny', 'featured-members', 'test-methodologies', 'test-huddle-roundup', 'blogspy', 'how-to', 'software-testing-events', 'software-testing-news', 'software-development-methodologies' );                               
		$exclude_ids        = array();
		
		foreach( $exclude_slugs as $slug ) { 
		    $tmp_term = get_term_by( 'slug', $slug, 'category' );
		
		    if( is_object( $tmp_term ) ) {
		        $exclude_ids[] = $tmp_term->term_id;
		    }
		}
		
		$args = array(
		    'order'            	 => 'DESC',
		    'orderby'            => 'count',
		    'show_count'         => 1, //Use 1 to show the count
		    'taxonomy'           => 'category',
		    'use_desc_for_title' => 0,
		    'echo'               => 1, //Use 0 to not output results
		    'title_li'           => '', //creates an <li> entry with text entered here - can be blank
		    'number'              => 10,
		    'exclude'            => $exclude_ids,
		);
		
		
		 ?>
		<li class="widget">			
		 <?php get_template_part( 'resouce-sidebar' ); ?>
		</li>		
		<li class="widget widget_cat">
			<p class="sidebar_title"><?php _e( 'Blog Categories', 'boilerplate' ); ?></p>
			<ul>
				<?php wp_list_categories($args); ?>
			</ul>
		</li><?php /*
		<li class="widget widget_archive">
			<p class="sidebar_title"><?php _e( 'Blog Archives', 'boilerplate' ); ?></p>
			<ul>
				<?php wp_get_archives( 'type=monthly&show_post_count=true&limit=15' ); ?>
			</ul>
		</li>
		 <?php get_template_part( 'share-sidebar' ); ?>	
		 */ ?>
		 <li class="widget related_sidebar">			
			 <?php get_template_part( 'related-topic-sidebar' ); ?>
		 </li>	
		 
	
	<?php } ?>	
<?php } ?>				
</ul>
	