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
	<meta name="robots" content="noindex, nofollow" />
	<!-- <title><?php //wp_title( '|', true, 'right' ); ?></title> -->
	<title><?php wp_title(''); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/chosen.min.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/functions.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?v=1" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flaticon.css?v=1" />
	<link href='https://fonts.googleapis.com/css?family=Raleway:600,800,500' rel='stylesheet' type='text/css'>
	<!--[if IE ]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" /><![endif]-->
		
	<!-- Scripts -->
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js"></script>
	<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/responsiveslides.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/respond.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/chosen.jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
	<script type="text/javascript">var switchTo5x=true;</script>
	
	<script type="text/javascript">stLight.options({publisher: "ur-266cb03b-d7ee-fcf0-7815-953178abd9dc", doNotHash: true, doNotCopy: true, hashAddressBar: false});</script>
	<!--[if (gte IE 6)&(lte IE 8)]>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
	  <noscript><link rel="stylesheet" href="[fallback css]" /></noscript>
	<![endif]-->
		
<?php wp_head(); ?>
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
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
<div id="wrapper-landing">
<header role="banner">
	<div id="header_bottom_wrapper" class="navbar">
		<div id="gravity_header">
			<a id="logo" href="<?php echo home_url(); ?>">Test Huddle</a>			
		</div>
	</div>
</header>

<div id="content_wrapper">
	<div id="gravity_content">
