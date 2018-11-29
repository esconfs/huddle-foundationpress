<?php

/**
 * Topics Loop
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_topics_loop' ); ?>

<?php if(strpos($_SERVER['REQUEST_URI'], 'eurostar-2016') !== false && ip_info("Visitor", "Country Code")==="IE"){  /*IE OR DK echo "BINGO!!"; echo ip_info("Visitor", "Country Code");  */ ?>
				<ul id="confs" class="odd"><li><h2 style="text-align: center"><a class="bbp-topic-permalink" href="https://conference.eurostarsoftwaretesting.com/my-esconfs/" style="color: #f78d1e;" ><< Back to Conference App</a></h2></li></ul>
<?php }?>

<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

	<!-- 
<li class="bbp-header">

		<ul class="forum-titles">
			<li class="bbp-topic-title"><?php _e( 'Topic', 'bbpress' ); ?></li>
			<li class="bbp-topic-voice-count"><?php _e( 'Voices', 'bbpress' ); ?></li>
			<li class="bbp-topic-reply-count"><?php bbp_show_lead_topic() ? _e( 'Replies', 'bbpress' ) : _e( 'Posts', 'bbpress' ); ?></li>
			<li class="bbp-topic-freshness"><?php _e( 'Freshness', 'bbpress' ); ?></li>
		</ul>

	</li>
 -->
 
 	<li class="bbp-sticky-header">
		<ul class="forum-titles">
			<li class="topic-title">
				<a href="#" id="hide-sticky">
					<span class="button-text" style="display: none;">Hide </span>
					<span class="button-text" >Show </span>
					Sticky Items 						 
				</a></li>			
		</ul>
	</li>
	<li class="bbp-body">

		<?php while ( bbp_topics() ) : bbp_the_topic(); ?>

			<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

		<?php endwhile; ?>
		
			<div class="bbp-pagination">
				<div class="bbp-pagination-count">
					<?php bbp_forum_pagination_count(); ?>
				</div>
				<div class="bbp-pagination-links">
					<?php bbp_forum_pagination_links(); ?>
				</div>
			</div>

	</li>

	<!-- 
<li class="bbp-footer">

		<div class="tr">
			<p>
				<span class="td colspan<?php echo ( bbp_is_user_home() && ( bbp_is_favorites() || bbp_is_subscriptions() ) ) ? '5' : '4'; ?>">&nbsp;</span>
			</p>
		</div><!~~ .tr ~~>

	</li>
 -->

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->

<?php do_action( 'bbp_template_after_topics_loop' ); ?>
