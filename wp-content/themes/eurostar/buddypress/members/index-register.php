<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ){$register_post = get_post(3842);} ?>
<div id="content_left" class="edit_content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) {
					$parent_title = get_the_title($post->post_parent); ?>
					<h1 class="entry-title"><?php echo $register_post->post_title;  ?></h1>
				<?php } else { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } 	?>
			
			<div class="entry-content">
				<?php the_breadcrumb(); ?>
				<!-- <h2 class="child_title"><?php the_title(); ?></h2> -->
				

			<?php do_action( 'bp_before_register_page' ); ?>

			<div class="page" id="register-page">
			<form action="" name="signup_form" id="signup_form" class="standard-form" method="post" enctype="multipart/form-data">

			<?php if ( 'registration-disabled' == bp_get_current_signup_step() ) : ?>
				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_disabled' ); ?>

					<p><?php _e( 'User registration is currently not allowed.', 'buddypress' ); ?></p>

				<?php do_action( 'bp_after_registration_disabled' ); ?>
			<?php endif; // registration-disabled signup setp ?>

			<?php if ( 'request-details' == bp_get_current_signup_step() ) : ?>

				<?php do_action( 'template_notices' ); ?>

				<p><?php _e( 'Become a member of Europe’s &#35;1 software testing community by providing your details below.', 'buddypress' ); ?></p>

				<?php do_action( 'bp_before_account_details_fields' ); ?>

				<div class="register-section" id="basic-details-section">
					
					<?php do_action( 'bp_signup_username_errors' ); ?>
					<div class="clearfix"></div>
					<label for="signup_username"><?php _e( 'Username', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
					<input type="text" name="signup_username" id="signup_username" value="<?php bp_signup_username_value(); ?>" />
					<div class="clearfix"></div>
					
					<?php do_action( 'bp_signup_email_errors' ); ?>
					<div class="clearfix"></div>
					<label for="signup_email"><?php _e( 'Email Address', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
					<input type="text" name="signup_email" id="signup_email" value="<?php bp_signup_email_value(); ?>" />
					<div class="clearfix"></div>
					
					<?php do_action( 'bp_signup_password_errors' ); ?>
					<div class="clearfix"></div>
					<label for="signup_password"><?php _e( 'Choose a Password', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
					<input type="password" name="signup_password" id="signup_password" value="" />
					<div class="clearfix"></div>

					<?php do_action( 'bp_signup_password_confirm_errors' ); ?>
					<div class="clearfix"></div>
					<label for="signup_password_confirm"><?php _e( 'Confirm Password', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
					<input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" />
					<div class="clearfix"></div>
					<div class="profile_field_loop">
				<?php do_action( 'bp_after_account_details_fields' ); ?>

				<?php /***** Extra Profile Details ******/ ?>

				<?php if ( bp_is_active( 'xprofile' ) ) : ?>

					<?php do_action( 'bp_before_signup_profile_fields' ); ?>


						<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
						<?php if ( bp_is_active( 'xprofile' ) ) : if ( bp_has_profile( 'profile_group_id=1' ) ) : while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

								<?php if ( 'textbox' == bp_get_the_profile_field_type() ) : ?>

									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<label class="<?php bp_the_profile_field_input_name(); ?>" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></label>
									<input  class="<?php bp_the_profile_field_input_name(); ?>" type="text" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" value="<?php bp_the_profile_field_edit_value(); ?>" />
									<div class="clearfix"></div>
									
								<?php endif; ?>

								<?php if ( 'textarea' == bp_get_the_profile_field_type() ) : ?>
									
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></label>
									<textarea rows="5" cols="40" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_edit_value(); ?></textarea>
									<div class="clearfix"></div>
									
								<?php endif; ?>

								<?php if ( 'selectbox' == bp_get_the_profile_field_type() ) : ?>
									
									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<label class="<?php bp_the_profile_field_input_name(); ?>" for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></label>
									<select class="<?php bp_the_profile_field_input_name(); ?>" name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>">
										<?php bp_the_profile_field_options(); ?>
									</select>
									<div class="clearfix"></div>
									
								<?php endif; ?>

								<?php if ( 'multiselectbox' == bp_get_the_profile_field_type() ) : ?>

									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<label for="<?php bp_the_profile_field_input_name(); ?>"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></label>
									<select name="<?php bp_the_profile_field_input_name(); ?>" id="<?php bp_the_profile_field_input_name(); ?>" multiple="multiple">
										<?php bp_the_profile_field_options(); ?>
									</select>
									<div class="clearfix"></div>

								<?php endif; ?>

								<?php if ( 'radio' == bp_get_the_profile_field_type() ) : ?>

									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<div class="radio">
										<span class="label"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></span>

										<?php bp_the_profile_field_options(); ?>

										<?php if ( !bp_get_the_profile_field_is_required() ) : ?>
											<a class="clear-value" href="javascript:clear( '<?php bp_the_profile_field_input_name(); ?>' );"><?php _e( 'Clear', 'buddypress' ); ?></a>
										<?php endif; ?>
									</div>
									<div class="clearfix"></div>

								<?php endif; ?>

								<?php if ( 'checkbox' == bp_get_the_profile_field_type() ) : ?>

									<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
									<div class="clearfix"></div>
									<div class="checkbox">
										<span class="label"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></span>

										<?php bp_the_profile_field_options(); ?>
									</div>
									<div class="clearfix"></div>

								<?php endif; ?>

								<?php if ( 'datebox' == bp_get_the_profile_field_type() ) : ?>

									<div class="datebox">
										<?php do_action( bp_get_the_profile_field_errors_action() ); ?>
										<div class="clearfix"></div>
										<label for="<?php bp_the_profile_field_input_name(); ?>_day"><?php bp_the_profile_field_name(); ?> <?php if ( bp_get_the_profile_field_is_required() ) : ?><?php _e( '&#42;', 'buddypress' ); ?><?php endif; ?></label>

										<select name="<?php bp_the_profile_field_input_name(); ?>_day" id="<?php bp_the_profile_field_input_name(); ?>_day">
											<?php bp_the_profile_field_options( 'type=day' ); ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name(); ?>_month" id="<?php bp_the_profile_field_input_name(); ?>_month">
											<?php bp_the_profile_field_options( 'type=month' ); ?>
										</select>

										<select name="<?php bp_the_profile_field_input_name(); ?>_year" id="<?php bp_the_profile_field_input_name(); ?>_year">
											<?php bp_the_profile_field_options( 'type=year' ); ?>
										</select>
									</div>
									<div class="clearfix"></div>

								<?php endif; ?>

								<?php do_action( 'bp_custom_profile_edit_fields_pre_visibility' ); ?>

								<?php if ( bp_current_user_can( 'bp_xprofile_change_field_visibility' ) ) : ?>
									<p class="field-visibility-settings-toggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
										<?php printf( __( 'This field can be seen by: <span class="current-visibility-level">%s</span>', 'buddypress' ), bp_get_the_profile_field_visibility_level_label() ) ?> <a href="#" class="visibility-toggle-link"><?php _ex( 'Change', 'Change profile field visibility level', 'buddypress' ); ?></a>
									</p>

									<div class="field-visibility-settings" id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
										<fieldset>
											<legend><?php _e( 'Who can see this field?', 'buddypress' ) ?></legend>

											<?php bp_profile_visibility_radio_buttons() ?>

										</fieldset>
										<a class="field-visibility-settings-close" href="#"><?php _e( 'Close', 'buddypress' ) ?></a>

									</div>
								<?php else : ?>
									<p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
										<?php printf( __( 'This field can be seen by: <span class="current-visibility-level">%s</span>', 'buddypress' ), bp_get_the_profile_field_visibility_level_label() ) ?>
									</p>
								<?php endif ?>

								<?php do_action( 'bp_custom_profile_edit_fields' ); ?>

								<p class="description"><?php bp_the_profile_field_description(); ?></p>

							

						<?php endwhile; ?>

						<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_group_field_ids(); ?>" />

						<?php endwhile; endif; endif; ?>

					

					<?php do_action( 'bp_after_signup_profile_fields' ); ?>

				<?php endif; ?>

				<?php if ( bp_get_blog_signup_allowed() ) : ?>

					<?php do_action( 'bp_before_blog_details_fields' ); ?>

					<?php /***** Blog Creation Details ******/ ?>

					<div class="register-section" id="blog-details-section">

						<h4><?php _e( 'Blog Details', 'buddypress' ); ?></h4>

						<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'buddypress' ); ?></p>

						<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

							<label for="signup_blog_url"><?php _e( 'Blog URL', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
							<?php do_action( 'bp_signup_blog_url_errors' ); ?>

							<?php if ( is_subdomain_install() ) : ?>
								http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_blogs_subdomain_base(); ?>
							<?php else : ?>
								<?php echo home_url( '/' ); ?> <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
							<?php endif; ?>

							<?php do_action( 'bp_signup_blog_title_errors' ); ?>
							<label for="signup_blog_title"><?php _e( 'Site Title', 'buddypress' ); ?> <?php _e( '&#42;', 'buddypress' ); ?></label>
							<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />

							<span class="label"><?php _e( 'I would like my site to appear in search engines, and in public listings around this network.', 'buddypress' ); ?>:</span>
							<?php do_action( 'bp_signup_blog_privacy_errors' ); ?>

							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'buddypress' ); ?></label>
							<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'buddypress' ); ?></label>

						</div>

					</div><!-- #blog-details-section -->

					<?php do_action( 'bp_after_blog_details_fields' ); ?>

				<?php endif; ?>

				<?php do_action( 'bp_before_registration_submit_buttons' ); ?>

				<div class="submit">
					<input type="submit" name="signup_submit" id="signup_submit" value="<?php _e( 'Register Today', 'buddypress' ); ?>" />
					<p>Already registered? <a href="/login/">Login here</a></p>
				</div>

				<?php do_action( 'bp_after_registration_submit_buttons' ); ?>

				<?php wp_nonce_field( 'bp_new_signup' ); ?>

			<?php endif; // request-details signup step ?>

			<?php if ( 'completed-confirmation' == bp_get_current_signup_step() ) : ?>

				<?php echo $register_post->post_content; ?>

				<?php do_action( 'template_notices' ); ?>
				<?php do_action( 'bp_before_registration_confirmed' ); ?>

				<?php do_action( 'bp_after_registration_confirmed' ); ?>

					<?php endif; // completed-confirmation signup step ?>

					<?php do_action( 'bp_custom_signup_steps' ); ?>

				</form>
					</div>
				</div>

				<?php do_action( 'bp_after_register_page' ); ?>
				
				
				<div class="clear_border"></div>
				<div class="social_bar">
					<h6>Share This</h6>
					<span class='st_email_hcount' displayText='Email'></span>
					<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
					<span class='st_twitter_hcount' displayText='Tweet'></span>
					<span class='st_fblike_hcount' displayText='Facebook Like'></span>
				</div>
				<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
	<?php endwhile; ?>
</div>

<div id="content_right">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>