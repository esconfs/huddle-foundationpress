<?php

/**
 * Single Topic
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

<div class="bbp_single_topic">
	
	<h1 class="entry-title sticky">Forums</h1>
	
	<a href="#" onclick="javascript:window.history.back(-1);return false;" class="forum_back">Go Back</a>
	
	<?php bbp_breadcrumb(); ?>	
	<div class="topic_header">
		<div class="topic_left">
			<div class="author_img_wrapper">
				<div class="author_img_cover"></div>	
				<?php do_action( 'bbp_theme_before_topic_started_by' ); ?>
					<span class="bbp-topic-started-by"><?php printf( __( '%1$s', 'bbpress' ), bbp_get_topic_author_link( array( 'size' => '60' ) ) ); ?></span>
				<?php do_action( 'bbp_theme_after_topic_started_by' ); ?>
			</div>
		</div>
		<div class="topic_right">
			<div class="forum_title"><?php bbp_topic_title(); ?><div class="reply-icon" id="reply_anchor"><a href="#" title="Leave a Comment">Reply</a></div></div>
			<ul class="forum_desc">
				<li>Forum <a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a></li>
				<li>Voices <span><?php bbp_topic_voice_count(); ?></span></li>
				<li>Replies <span><?php bbp_topic_reply_count(); ?></span></li>
				<li>Last activity <?php bbp_topic_freshness_link(); ?></li>
				<li>Last reply from <?php bbp_author_link( array( 'post_id' => bbp_get_topic_last_active_id(), 'type' => 'name' ) ); ?></li>
			</ul>
		</div>
	</div>

	<?php do_action( 'bbp_before_main_content' ); ?>

	<?php do_action( 'bbp_template_notices' ); ?>
	<?php $user_id = wp_get_current_user()->ID;
		  if(members_can_user_view_post($user_id, bbp_get_topic_id())) {
	?>
	<?php if ( bbp_user_can_view_forum( array( 'forum_id' => bbp_get_topic_forum_id() ) ) ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="bbp-topic-wrapper-<?php bbp_topic_id(); ?>" class="bbp-topic-wrapper">
				<div class="entry-content">

					<?php bbp_get_template_part( 'content', 'single-topic' ); ?>

				</div>
			</div><!-- #bbp-topic-wrapper-<?php bbp_topic_id(); ?> -->

		<?php endwhile; ?>

	<?php elseif ( bbp_is_forum_private( bbp_get_topic_forum_id(), false ) ) : ?>

		<?php bbp_get_template_part( 'feedback', 'no-access' ); ?>

	<?php endif; ?>
	<?php } else { ?>
		<div id="bbp-topic-wrapper-<?php bbp_topic_id(); ?>" class="bbp-topic-wrapper">
				
				<div class="wwwp_login entry-content">
					
					<h2><?php echo get_post_meta( bbp_get_topic_id(), '_members_access_error', true ); ?></h2>

				</div>
			</div>
	<?php } ?>
	<?php do_action( 'bbp_after_main_content' ); ?>		
	<!--<?php echo do_shortcode( "[yuzo_related]" ); ?>   Code to add Yuzo Related Tagging Plugin --> 
	<div class="social_bar">
		<h6>Share This</h6>
		<span class='st_email_hcount' displayText='Email'></span>
		<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
		<span class='st_twitter_hcount' displayText='Tweet'></span>
		<span class='st_fblike_hcount' displayText='Facebook Like'></span>
	</div>
	
</div>

<?php get_footer(); ?>
