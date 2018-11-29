<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>
	
	<li class="forum_left">
		<div class="author_img_wrapper">
			<div class="author_img_cover"></div>	
			<span class="bbp-topic-freshness-author">
				<?php do_action( 'bbp_theme_before_topic_author' ); ?>
					<?php bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 60, 'type' => 'avatar' ) ); ?>
					<?php // bbp_reply_author_link( array( 'post_id' => bbp_get_topic_last_active_id(bbp_get_forum_last_active_id()), 'size' => 60, 'type' => 'avatar' ) ); ?>
				<?php do_action( 'bbp_theme_after_topic_author' ); ?>
			</span>
		</div>
	</li>
	
	<li class="forum_right">
		<div class="forum_title"><a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></div>
		<div class="forum_desc_text"><p><?php bbp_forum_content(); ?></div>
		<ul class="forum_desc">
			<li>Topics <span><?php bbp_forum_topic_count(); ?></span></li>
			<li>Posts <span><?php bbp_show_lead_topic() ? bbp_forum_reply_count() : bbp_forum_post_count(); ?></span></li>
			<li>Last post <?php bbp_forum_freshness_link(); /*bbp_topic_freshness_link(bbp_get_forum_last_active_id());*/ ?></li>
			<li>By <?php 
				bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id(), 'size' => 50, 'type' => 'name' ) );
				// bbp_reply_author_link( array( 'post_id' => bbp_get_topic_last_active_id(bbp_get_forum_last_active_id()), 'size' => 50, 'type' => 'name' ) ); 
			?></li>
		</ul>
	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
