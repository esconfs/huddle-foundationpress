<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="bbp-reply-wrapper">

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">

	<div class="bbp-meta">

		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

		<?php if ( bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php _e( 'in reply to: ', 'bbpress' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>

		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>

		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php bbp_reply_admin_links(); ?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>
		
	</div><!-- .bbp-meta -->

</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<div class="author_img_wrapper">
			<div class="author_img_cover"></div>	
			<?php bbp_reply_author_link( array( 'size' => '60', 'sep' => '<br />', 'show_role' => false ) ); ?>
		</div>		

		<?php // if ( bbp_is_user_keymaster() ) : ?>

			<?php // do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<!-- <div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div> -->

			<?php // do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php // endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content conversation-single-topic ms-tl-block">
		<?php if ( is_user_logged_in() ) { ?> 
			 <div class="dropdown">
				  <button class="dropbtn">Translate</button>
				  <div class="dropdown-content">		    
				    <a href="#" class="ms-translate" data-code="ar">Arabic</a>
				    <a href="#" class="ms-translate" data-code="it">Italian</a>
				    <a href="#" class="ms-translate" data-code="bg">Bulgarian</a>
				    <a href="#" class="ms-translate" data-code="ja">Japanese</a>
				    <a href="#" class="ms-translate" data-code="ca">Catalan</a>
				    <a href="#" class="ms-translate" data-code="lv">Latvian</a>
				    <a href="#" class="ms-translate" data-code="zh-CHS">Chinese</a>
				    <a href="#" class="ms-translate" data-code="lt">Lithuanian</a>
				    <a href="#" class="ms-translate" data-code="hr">Croatian</a>
				     <a href="#" class="ms-translate" data-code="no">Norwegian</a>
				    <a href="#" class="ms-translate" data-code="cs">Czech</a>
				    <a href="#" class="ms-translate" data-code="pl">Polish</a>
				    <a href="#" class="ms-translate" data-code="da">Danish</a>
				    <a href="#" class="ms-translate" data-code="pt">Portuguese</a>
				    <a href="#" class="ms-translate" data-code="nl">Dutch</a>
				    <a href="#" class="ms-translate" data-code="ro">Romanian</a>
				    <a href="#" class="ms-translate" data-code="et">Estonian</a>
				    <a href="#" class="ms-translate" data-code="ru">Russian</a>
				    <a href="#" class="ms-translate" data-code="fi">Finnish</a>
				    <a href="#" class="ms-translate" data-code="sk">Slovak</a>
				    <a href="#" class="ms-translate" data-code="fr">French</a>
				    <a href="#" class="ms-translate" data-code="sl">Slovenian</a>
				    <a href="#" class="ms-translate" data-code="de">German</a>
				    <a href="#" class="ms-translate" data-code="es">Spanish</a>
				    <a href="#" class="ms-translate" data-code="he">Hebrew</a>
				    <a href="#" class="ms-translate" data-code="sv">Swedish</a>
				    <a href="#" class="ms-translate" data-code="hi">Hindi</a>	    
				    <a href="#" class="ms-translate" data-code="uk">Ukrainian</a>
				  </div>
			  </div>
	  <?php } else {?> 
	  	<div class="dropdown">
			 <button class="dropbtn" style="background:#bbb">Translate</button>
			 <div class="dropdown-content">Only available when logged in</div>
		  </div>
	  <?php }?>
		<div class="ms-translation-complete"></div>
		
	  <span class="ms-translatable">
		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>
	</span>

	</div><!-- .bbp-reply-content -->

</div><!-- .reply -->

			<!-- 
<div class="bbp-pagination">
				<div class="bbp-pagination-count">
					<?php bbp_topic_pagination_count(); ?>
				</div>
				<div class="bbp-pagination-links">
					<?php bbp_topic_pagination_links(); ?>
				</div>
			</div>
 -->

</div>
