<?php
/**
 * The Header theme.
 *
 * @package WordPress
 * @subpackage Ebow_Responsive
 */
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<!--[if lt IE 9]>
     <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<head>
	<!-- Optimizely 
	<script src="//cdn.optimizely.com/js/2141860758.js"></script>
	-->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"> 
	<meta name="google-site-verification" content="SXfjw-EorQgMf-Z1dhd5ysCo2QKtubxf15_ubaKiYkg" />
	<meta name="msvalidate.01" content="ACF29699F78D99D5CCD8C8F8F6D3A83A" />
	<!-- <title><?php //wp_title( '|', true, 'right' ); ?></title> Reskin2016-test-->
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<!-- Stylesheets -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/chosen.min.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/functions.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css?v=4" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/migrate.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flaticon.css?v=1" />
	
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css?v=1" />
	<link href='https://fonts.googleapis.com/css?family=Raleway:600,800,500' rel='stylesheet' type='text/css'>
	<!--[if IE ]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" /><![endif]-->
		
	<!-- Scripts -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.3.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/chosen.jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
	<script type="text/javascript">var switchTo5x=true;</script>

	<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
	<!--
	<script type="text/javascript">stLight.options({publisher: "ur-266cb03b-d7ee-fcf0-7815-953178abd9dc", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>
	[if (gte IE 6)&(lte IE 8)]>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
	  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
	<![endif]-->
		
<?php wp_head(); ?>
<script type="text/javascript">
	setTimeout(function(){var a=document.createElement("script");
	var b=document.getElementsByTagName("script")[0];
	a.src=document.location.protocol+"//script.crazyegg.com/pages/scripts/0037/1820.js?"+Math.floor(new Date().getTime()/3600000);
	a.async=true;a.type="text/javascript";b.parentNode.insertBefore(a,b)}, 1);
</script> 
<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	document,'script','https://connect.facebook.net/en_US/fbevents.js');
	
	fbq('init', '1563456953964372');
	fbq('track', "PageView");</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=1563456953964372&ev=PageView&noscript=1"
	/></noscript>
<!-- End Facebook Pixel Code -->

<!-- REMOVE WRONG ANALYTICS Code 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56353490-1', {
	  'cookieName': 'gaCookie',
	  'cookieDomain': 'conference.eurostarsoftwaretesting.com/',
	  'cookieExpires': 60 * 60 * 24 * 28  // Time in seconds.
	});
  ga('send', 'pageview');

</script>
-->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<!-- End Google Tag Manager -->
<div id="wrapper">
<!-- Upload Popup -->
<div class="upload_bg">
	<div class="upload_success_wrapper">
		<div class="upload_success">
			<div class="close"></div>
			<div>Thank you.</div>
			<p>Your uploaded files are waiting for moderation.</p>
			<a href="javascript:void(0)" title="Resources">CLOSE</a>
		</div>
	</div>
</div>
<!-- Search -->
<div id="search">
	<div id="search_inner">
		<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			<div>
				<input type="text" value="" name="s" id="s" placeholder="Enter your search" value="Enter your search" onfocus="if(this.value == 'Enter your search') { this.value = ''; }" onblur="if(this.value=='') { this.value='Enter your search'; }"/>
				<input type="submit" id="searchsubmit" value="Search" />
			</div>
		</form>
	</div>
</div>

<header role="banner">
	<div id="header_top_wrapper">
		<div id="header_top">
			<nav id="top_menu" role="navigation">
				<?php wp_nav_menu( array( 'container_class' => 'menu-top', 'menu' => 'Top Menu', ) ); ?>
			</nav>
			<ul id="top_buttons">
				<?php if ( ! is_user_logged_in() ) { ?>
				<li class="btn_register"><a href="/registration/" target="_blank">Register</a></li>
				<?php } ?>
				<li class="btn_login">
					<?php if ( ! is_user_logged_in() ) { ?>
						<a href="javascript:void(0)">Login</a>
					<?php } else { ?>
						<a href="javascript:void(0)">Profile</a>
					<?php } ?>
				</li>
				<li class="btn_search btn_search_txt">Search</li>
				<li class="btn_search btn_search_img"></li>
			</ul>
		</div>
	</div>
	<div id="header_bottom_wrapper" class="navbar">
		<div id="header_bottom">
			<a id="logo" href="<?php echo home_url(); ?>">EuroSTAR Huddle</a>
			
			<!-- Mobile Only -->
			<div class="hide_on_desktop" id="mobile_menu"></div>
			
			<nav id="main_menu" role="navigation">
				<?php
					if ( is_home() OR is_page(array('Login', 'Contact')) ) {
						$colour = '';
					} elseif ( is_singular(array('forum', 'topic', 'reply')) ) {
						$colour = '';
					} elseif ( is_page(array('blog', 'most-recent', 'most-comments', 'most-views', 'events')) || is_singular(array('post','event')) ) {
						$colour = '';
					} elseif ( is_page(array('resources', 'upload-resource')) || is_singular('resource') ) {
						$colour = '';
					} else {
						$colour = '';
					}
				?>			
				
				<div class="hide_on_desktop colour_<?php echo $colour; ?>" id="mobile_menu_close"></div>
				<?php wp_nav_menu( array( 'container_class' => 'menu-main', 'menu' => 'Main Menu', ) ); ?>
			</nav>
			<div id="login_wrapper">
				<div class="login_close"></div>
				<?php if ( ! is_user_logged_in() ) { ?>
				<form name="loginform-custom" id="loginform-custom" action="/wp-login.php" method="post">
					<?php
						if ( is_home() ) {
							$redirect = home_url();
						} else {
							$redirect = get_permalink();
						}
					?>
					<input type="hidden" name="redirect_to" value="<?php echo $redirect; ?>" />
					<label for="user_login">Email address</label>
					<input type="text" name="log" id="user_login" class="input" value="" size="20" />
					<label for="user_pass">Password</label>
					<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
					<?php do_action('oa_social_login'); ?>
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="LOGIN" />
				</form>	
				<?php } else { ?>
					<a class="btn_profile" href="<?php echo bp_loggedin_user_domain(); ?>">Profile</a>
					<a class="btn_logout" href="<?php echo wp_logout_url( $redirect ); ?>">Log out</a>
				<?php } ?>
				
			</div>
		</div>
	</div>
</header>

<div id="content_wrapper" class="<?php if ( is_page('most-recent') OR is_page('most-views') OR is_page('most-comments') OR is_page('blog') OR is_singular('post') ) { ?>grey_bg<?php } ?>">
	<div id="content">
