<div id="buddypress">

	<?php do_action( 'bp_before_activation_page' ); ?>

	<div class="page" id="activate-page">
		
		<?php if ( ! is_user_logged_in() ) { ?>
			<div class="social_bar ">
				<form name="loginform-custom" id="loginform-custom" action="/wp-login.php" method="post">
					<?php
						if ( is_home() ) {
							$redirect = home_url();
						} else {
							$redirect = get_permalink();
						}
					?>
				<div class="login-details">
					<input type="hidden" name="redirect_to" value="<?php echo $redirect; ?>" />
					<label for="user_login">Email address</label>
					<input type="text" name="log" id="user_login" class="input" value="" size="20" />
				</div>
				<div class="login-details">
					<label for="user_pass">Password</label>
					<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
				</div>	
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="LOGIN" />
				</form>	
			</div>	
				<?php } else { ?>
					<a class="btn_profile" href="<?php echo bp_loggedin_user_domain(); ?>">Profile</a>
					<a class="btn_logout" href="<?php echo wp_logout_url( $redirect ); ?>">Log out</a>
				<?php } ?>	

		<?php do_action( 'template_notices' ); ?>

		<?php do_action( 'bp_before_activate_content' ); ?>

		<?php if ( bp_account_was_activated() ) : ?>

			<?php if ( isset( $_GET['e'] ) ) : ?>
				<!-- <p><?php _e( 'Your account was activated successfully! Your account details have been sent to you in a separate email.', 'buddypress' ); ?></p> -->
			<?php else : ?>
				<p>Your account was activated successfully! You can now <a href="<?php echo home_url() . '/login/'; ?>">log in</a> with the username and password you provided when you signed up</p>
				<!-- <p><?php printf( __( 'Your account was activated successfully! You can now <a href="%s">log in</a> with the username and password you provided when you signed up.', 'buddypress' ), wp_login_url( bp_get_root_domain() ) ); ?></p> -->
			<?php endif; ?>
			
			<?php the_field('page_content', 'option'); ?>

		<?php else : ?>

			<p><?php _e( 'Please provide a valid activation key.', 'buddypress' ); ?></p>

			<form action="" method="post" class="standard-form" id="activation-form">

				<label for="key"><?php _e( 'Activation Key:', 'buddypress' ); ?></label>
				<input type="text" name="key" id="key" value="<?php echo esc_attr( bp_get_current_activation_key() ); ?>" />

				<p class="submit">
					<input type="submit" name="submit" value="<?php esc_attr_e( 'Activate', 'buddypress' ); ?>" />
				</p>

			</form>
			
			<?php the_field('page_content', 'option'); ?>

		<?php endif; ?>
		
		
			
		<?php do_action( 'bp_after_activate_content' ); ?>

	</div><!-- .page -->

	<?php do_action( 'bp_after_activation_page' ); ?>

</div><!-- #buddypress -->