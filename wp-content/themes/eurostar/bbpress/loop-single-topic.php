<?php

/**
 * Topics Loop - Single
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

	<li class="forum_left">
		<div class="author_img_wrapper">
			<div class="author_img_cover"></div>	
			<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>
				<span class="bbp-topic-started-by"><?php bbp_reply_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 60, 'type' => 'avatar' ) ); ?></span>
			<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>
		</div>
	</li>
	
	<li class="forum_right">
		<div class="forum_title"><a class="bbp-topic-permalink" href="<?php bbp_topic_permalink(); ?>"><?php bbp_topic_title(); ?></a></div>
		<ul class="forum_desc">
			<li>Voices <span><?php bbp_topic_voice_count(); ?></span></li>
			<li>Replies <span><?php bbp_show_lead_topic() ? bbp_topic_reply_count() : bbp_topic_post_count(); ?></span></li>
			<li>Last post <?php bbp_topic_freshness_link(); ?></li>
			<li>By <?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'size' => 50, 'type' => 'name' ) ); ?></li>
			<?php $value = bbp_get_forum_last_active_id(); ?>
			<?php $user_info = get_userdata( $value );  // echo $user_info->display_name; ?>
		</ul>
	</li>

</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?> -->