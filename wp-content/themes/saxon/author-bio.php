<?php
/*
*	Posts Author biography template
*/
?>
<div class="author-bio" <?php saxon_add_aos(); ?>>
	<div class="author-image">
		<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php echo get_avatar( get_the_author_meta('email'), '170', '200' ); ?></a>
	</div>
	<div class="author-info">
		<h5><?php esc_html_e( 'About author', 'saxon' ); ?></h5>
		<h3><?php the_author_posts_link();?></h3>
		<div class="author-description"><?php the_author_meta('description'); ?></div>
		<div class="author-social">
			<ul class="author-social-icons">
				<?php
					$social_array = array('facebook', 'twitter', 'vk', 'google-plus', 'behance', 'linkedin', 'pinterest', 'deviantart', 'dribbble',  'flickr', 'instagram', 'skype', 'tumblr', 'twitch', 'vimeo-square', 'youtube', 'medium');

					$social_array = saxon_author_social_services_list();

					foreach ($social_array as $social_profile => $value) {
						$$social_profile = get_the_author_meta( $social_profile.'_profile' );

						if ( $$social_profile && $$social_profile != '' ) {
							echo '<li class="author-social-link-'.$social_profile.'"><a href="' . esc_url($$social_profile) . '" target="_blank"><i class="fa fa-'.$social_profile.'"></i></a></li>';
						}
					}
				?>
			</ul>
		</div>
	</div>
	<div class="clear"></div>
</div>
