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
<footer role="contentinfo" class="outer">
	<div id="footer_top_wrapper">
		<div id="footer_top">
			<a href="<?php echo home_url(); ?>" id="footer_logo">Test Huddle</a>
			<nav id="footer_menu" role="navigation">
				
				<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'menu' => 'Footer Menu - 1', ) ); ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'menu' => 'Footer Menu - 2', ) ); ?>
				<div class="menu-footer">
					<a href="/contact/"><h4>Contact Us<span class="line"></span></h4></a>
					<div itemscope itemtype="http://schema.org/Organization">
						<ul class="sub-menu">						
							<li>							
	  							<span itemprop="name">
	  								Huddle - <br />
  									EuroSTAR Software Testing
  								</span>
  									<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
  									  <span itemprop="streetAddress"> IDA Business Park, Dangan</span> 
								      <span itemprop="postalCode">H91 P2DK </span> 
								      <span itemprop="addressLocality">Galway, Ireland</span>
								  </div>
	  													
							</li>
							<li>							
								Tel:<a href="tel:+35391514470"><span itemprop="telephone">+353 (091) 514 470</span></a>							
							</li>
							<li>							
								E-mail: <a href="mailto:hello@testhuddle.com?subject=Website%20Enquiry"><span itemprop="email">hello@testhuddle.com</span></a>							
							</li>
						</ul>
						<?php wp_nav_menu( array( 'container_class' => 'social_nav', 'menu' => 'Footer Menu - 3', ) ); ?>
					</div>	
				</div>
			</nav>
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