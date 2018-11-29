<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
<div class="clearfix"></div>
</div><!-- content -->
<div class="clearfix"></div>
</div><!-- content wrapper -->

<div id="push"></div>
<div class="clearfix"></div>
</div><!-- wrapper -->
<footer role="contentinfo" class="menu-footer menu2">
	<div id="footer_top_wrapper">
		<div id="footer_top">
			<a href="<?php echo home_url(); ?>" id="footer_logo">Test Huddle</a>
			<nav id="footer_menu" role="navigation">
				<div class="menu-footer">
					<ul id="menu-footer-menu" class="menu ">
						<li id="menu-item-2761" class="menu-item menu-item-type-post"><a href="privacy-statement/">Privacy Statement</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div id="footer_bottom_wrapper">
		<div id="footer_bottom">
			<p class="footer_link_left">
				&copy; <?php echo date('Y');?> TEST Huddle. All rights reserved.
			</p>
			
		</div>
	</div>
</footer>
<?php if ( !is_user_logged_in() ){ ?>
	<style>
		html {margin-top:0 !important;}
		#wpadminbar{ display:none; }
	</style>
<?php } ?>

<?php wp_footer(); ?>
</body>
</html>