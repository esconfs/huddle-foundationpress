<?php

/**
 * Single Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">

	<?php // bbp_breadcrumb(); ?>

	<?php // bbp_forum_subscription_link(); ?>

	<?php do_action( 'bbp_template_before_single_forum' ); ?>

	<?php if ( post_password_required() ) : ?>

		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>

		<?php // bbp_single_forum_description(); ?>

		<?php if ( bbp_has_forums() ) : ?>

			<?php bbp_get_template_part( 'loop', 'forums' ); ?>

		<?php endif; ?>
		
		<?php $user_id = wp_get_current_user()->ID;
		  if(members_can_user_view_post($user_id, bbp_get_forum_id())) {
		?>

		<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>

			<?php // bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'loop',       'topics'    ); ?>

			<?php // bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>
			
		

		<?php elseif ( !bbp_is_forum_category() ) : ?>

			<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

			<?php bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php endif; ?>
		
		<?php } else { ?>
		<div id="bbp-topic-wrapper-<?php bbp_topic_id(); ?>" class="bbp-topic-wrapper">
				<div class="entry-content">
					
					<h2><?php echo get_post_meta( bbp_get_forum_id(), '_members_access_error', true ); ?></h2>

				</div>
			</div>
	<?php } ?>		
	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_forum' ); ?>

</div>
