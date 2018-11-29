/* TEST Huddle jQuery */
jQuery('.home-page  select#bbp_forum_id').live('change', function(){
			
          var fileName = $("#bbp_forum_id option:selected").val();
          if ($("#bbp_forum_id option:selected").val()=='')
            {				 
                $('.home-page .bbp-submit-wrapper  #bbp_topic_submit').attr('disabled', 'disabled'); 
                $(".home-page .bbp-submit-wrapper #bbp_topic_submit").html('No Forum Selected'); 
            }
            else
            {
				$('.home-page .bbp-submit-wrapper #bbp_topic_submit').removeAttr('disabled');
                $(".home-page .bbp-submit-wrapper #bbp_topic_submit").html('Submit');
            }
        });	


$(window).load(function(){
	if ($("#bbp_forum_id option:selected").val()=='')
            {				 
                $('.home-page .bbp-submit-wrapper  #bbp_topic_submit').attr('disabled', 'disabled'); 
                $(".home-page .bbp-submit-wrapper #bbp_topic_submit").html('No Forum Selected'); 
            }
           
	var columns;
	// set column number
	setColumns();
	// rerun function when window is resized 
	$(window).on('resize', function() {
	  setColumns();
	});
	// the function to decide the number of columns
	function setColumns() {
		var screen = $(window).width();
	  	if( screen <= 710 && screen >= 481) {
			columns = 3;
	  	} else if (screen <= 480) {
			columns = 2;
	  	} else {
			columns = 4;
	  	}
	}

	// Isotopte
	var $container = $('#resources_list');
	// initialize Isotope
	$container.isotope({
	  // options...
	  resizable: false, // disable normal resizing
	  // set columnWidth to a percentage of container width
	  masonry: { columnWidth: $container.width() / columns }
	});
	
	$(window).smartresize(function(){
	  $container.isotope({
		// update columnWidth to a percentage of container width
		masonry: { columnWidth: $container.width() / columns }
	  });
	});
	
	$('#resources_filter li').click(function(){
	  var selector = $(this).attr('data-filter');
	  $container.isotope({ filter: selector });
	  return false;
	});
});

$( document ).ready(function() {
	
	$(".super-sticky").addClass('hide');
	$(".sticky").addClass('hide');
	
	$('#tabs ul.nav li:first').addClass('active');
	
	$("#hide-sticky").click(function(){
		
		 $(".sticky").toggle( "fast" );
		 $(".super-sticky").toggle( "fast" );
		  $(".button-text").toggle(  );
	});
			
	// Search
	$('.btn_search').click(function(){
		$('.btn_search').toggleClass('active');
		$('html, body').animate({scrollTop:0}, 'slow');
		$('#search').slideToggle();
		$('#search input').select();
		$('.btn_search_inner').toggleClass('active');
	});
	
	//Remove elements from Profile 
	//$(".the_content #buddypress #edit-personal-li").remove(); 
	//$(".the_content #buddypress #change-avatar-personal-li").remove(); 
	//$(".the_content #buddypress #profile-personal-li").remove(); 
	//$(".the_content #buddypress #capabilities-personal-li").remove(); 
	//$(".the_content #buddypress #account-capabilities-form").remove(); 
	//$(".the_content #buddypress #xprofile-settings-base").remove(); 
	//$(".the_content #buddypress #profile-edit-form").remove(); 
	//$(".the_content #buddypress #avatar-upload-form").remove();
	//$(".the_content #buddypress .bp-avatar-nav").remove();
	//$(".the_content #buddypress .bp-avatar").remove();
	
	// Slider
	jQuery.noConflict();
	
	jQuery(function ($) {
		$("#slider").responsiveSlides({
		  auto: true,             		// Boolean: Animate automatically, true or false
		  speed: 500,            		// Integer: Speed of the transition, in milliseconds
		  timeout: 4000,          	// Integer: Time between slide transitions, in milliseconds
		  nav: true,             		// Boolean: Show navigation, true or false
		  prevText: "Previous",  // String: Text for the "previous" button
		  nextText: "Next",       	// String: Text for the "next" button
		  maxwidth: "620",        // Integer: Max-width of the slideshow, in pixels
		  navContainer: "",       	// Selector: Where controls should be appended to, default is after the 'ul'
		  manualControls: "",    	// Selector: Declare custom pager navigation
		  namespace: "slider", 	// String: Change the default namespace used
		});
	});
	$(".regular").slick({
			lazyLoad: 'ondemand',
	        dots: true,
	        infinite: true,
	        slidesToShow: 3,
	        slidesToScroll: 1,
	        autoplaySpeed:8500,
	  		arrows:true,
	  		prevArrow:'<button type="button" class="slick-prev"></button>',
	  		nextArrow:'<button type="button" class="slick-next"></button>',
	        speed: 1800,
			autoplay: true
	      });
	
	$('.social_nav a').hover (
		function () {	
			 $(this).closest('li').addClass('selected');	
		},	
		function () {	
			$(this).closest('li').removeClass('selected');		
		});
			
	/* Login Dropdown */
	$('.btn_login a').click(function(){
		$('#login_wrapper').slideDown();
	});
	$('#login_wrapper .login_close').click(function(){
		$('#login_wrapper').slideUp();
	});
	
	// Scroll to top
	$('#upload_form .button.add-image').click(function(){
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
	
	// Hide Dropdown clicking outside of it
	$(document).mouseup(function(e) {
		if ($(window).width() < 985) {	
		    var container = $("#menu-main-menu");
		    if (!container.is(e.target) // if the target of the click isn't the container...
		        && container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		        $("#menu-main-menu .sub-menu").hide().removeClass('clicked');
		    }
		    var head_container = $("#login_wrapper");
		    if (!head_container.is(e.target) // if the target of the click isn't the container...
		        && head_container.has(e.target).length === 0) // ... nor a descendant of the container
		    {
		        $('#login_wrapper').hide();
		    }
		  }
	});
	// scroll anchor
	var $root = $('html, body');
	$('a').click(function() {
	    $root.animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);
	    return false;
	});
	
	// Homepage Tabs 
	$('#tabs div.tab').hide();
	$('#tabs div.tab:first').show();
	$('#tabs ul.nav li:first').addClass('active');
	
	$('#tabs ul.nav  li a').click(function(){
	    $('#tabs ul li').removeClass('active');
	    $(this).parent().addClass('active');
	    var currentTab = $(this).attr('href');
	    $('#tabs div.tab').hide();
	    $(currentTab).show();
	    return false;
	});
	
	
	// Search Page Isotope 
	var $container = $('#container');
	// initialize isotope
	$container.isotope({
	  // options...
	});
	
	// Extra Classes
	$('#search_list article.topic').addClass('forum');
	$('#search_list article.reply').addClass('forum');
	
	// filter items when filter link is clicked
	var $container_search = $('#search_list');
	var $checkboxes = $('.search_result_filter li .css-checkbox');
	
	$container_search.isotope({
		itemSelector: '.status-publish'
	});
	
	$checkboxes.change(function(){
		var filters = [];
		// get checked checkboxes values
		$checkboxes.filter(':checked').each(function(){
		  filters.push( this.value );
		});
		// ['.red', '.blue'] -> '.red, .blue'
		if(filters.length == 0){
	    	filters = 'purplemonkyeydishwasher';
		}
		else{
	    	filters = filters.join(', ');
		}
		$container_search.isotope({ filter: filters });
	});
	  
	
	// Home Page Resources
	 $('#content_right #resources_filter .ebook').click(function() {		
	          $(".webinar-list").addClass("hidden");
	          $(".ebook-list").removeClass("hidden");		
	});
	$('#content_right #resources_filter .webinar-2').click(function() {		
			$(".ebook-list").addClass("hidden");
	        $(".webinar-list").removeClass("hidden");		
	});
	
	// Mobile Dropdown
	$('#mobile_menu').click(function(){
		if ($(window).width() < 985) {	
			$('#main_menu').slideDown();
			$('#mobile_menu_close').click(function(){
				$('#main_menu').slideUp();
			});
		}
	});
	
	
	if ($(window).width() < 985) {	
	// Mobile Dropdown Submenu
	
			$('#menu-main-menu > li > a').click(function(){
				var clicked = $(this);
				if ( clicked.hasClass('clicked')) {
					clicked.removeClass('clicked');
					clicked.parent().children('ul').slideUp();
				} else {
					$('#menu-main-menu > li > a').removeClass('clicked');
					$('#menu-main-menu > li > ul').slideUp();
					clicked.parent().children('ul').slideDown();	
					clicked.addClass('clicked');
				}
			});
	
			// Disable Links
			$('#menu-item-452 > a').click(function(e){
				e.preventDefault();
			    return false;
			});
			
			$('#menu-item-460 > a').click(function(e){
				e.preventDefault();
			    return false;
			});
	}
	
	// After Upload
	if(window.location.href.indexOf("https://huddle.eurostarsoftwaretesting.com/resources/?uploaded=true&post_id=") > -1) {
	   $('.upload_bg').fadeIn();
	   $('.upload_bg a').click(function(){$('.upload_bg').fadeOut();});
	}
	
	// Main Menu Current Colours
	if(window.location.href.indexOf("https://huddle.eurostarsoftwaretesting.com/events/") > -1) {
	   $('#menu-item-459').addClass('current-menu-item');
	}
	if(window.location.href.indexOf("https://huddle.eurostarsoftwaretesting.com/resource/") > -1) {
	   $('#menu-item-460').addClass('current-menu-item');
	}
	if(window.location.href.indexOf("https://huddle.eurostarsoftwaretesting.com/forums/") > -1) {
	   $('#menu-item-463').addClass('current-menu-item');
	}
	if(window.location.href.indexOf("https://huddle.eurostarsoftwaretesting.com/blog/") > -1) {
	   $('#menu-item-457').addClass('current-menu-item');
	}
	
	// Responsive Video
	(function ( window, document, undefined ) {
	    var iframes = document.getElementsByTagName( 'iframe' );
	    for ( var i = 0; i < iframes.length; i++ ) {
	        var iframe = iframes[i],
	        players = /www.youtube.com|player.vimeo.com/;
	        if ( iframe.src.search( players ) > 0 ) {
	            var videoRatio        = ( iframe.height / iframe.width ) * 100;
	            iframe.style.position = 'absolute';
	            iframe.style.top      = '0';
	            iframe.style.left     = '0';
	            iframe.width          = '100%';
	            iframe.height         = '100%';
	            var wrap              = document.createElement( 'div' );
	            wrap.className        = 'fluid-vids';
	            wrap.style.width      = '100%';
	            wrap.style.position   = 'relative';
	            wrap.style.paddingTop = videoRatio + '%';
	            var iframeParent      = iframe.parentNode;
	            iframeParent.insertBefore( wrap, iframe );
	            wrap.appendChild( iframe );
	        }
	    }
	})( window, document );
	
	$('#resources_filter li').click(function(){
		$('#resources_filter li').removeClass('active');
		$(this).toggleClass('active');
	});
	
	$('#resources_filter li').each(function(){
		var current = $(this);
		var classes = current.attr('class');
		console.log('The class is: ' + classes);	
	});
	
	$('.resource_right .icon .eBook').removeClass('eBook').addClass('flaticon-book-1');
	$('.resource_right .icon .Webinar').removeClass('Webinar').addClass('flaticon-computer');
	$('.resource_right .icon .Podcast').removeClass('Podcast').addClass('flaticon-podcast');
	$('.resource_right .icon .Other').removeClass('Other').addClass('flaticon-square');
	$('.resource_right .icon .Blog-Post').removeClass('Blog-Post').addClass('flaticon-symbol');
	
	//STICK NAVBAR TO TOP
		$(window).scroll(function () {
			
			if ($(window).width() < 985) {		
				if ($(window).scrollTop() > 50) {
					$('.navbar').addClass('navbar-fixed-top');				
				}
				else {
					$('.navbar').removeClass('navbar-fixed-top');				
				}
			}
			else {				
				if ($(window).scrollTop()) {				
					$('.navbar').removeClass('navbar-fixed-top');
				}
				else {				
					$('.navbar').removeClass('navbar-fixed-top');
				}
				
				if ($(window).scrollTop() > 1620) {
					$('.related_sidebar').addClass('navbar-fixed-top');				
				}
				else {
					$('.related_sidebar').removeClass('navbar-fixed-top');				
				}
				
			}
			if (($(window).scrollTop() > 200) && ($(window).scrollTop() + $(window).height() < $(document).height() - 180)) {
					$('#reply_anchor').addClass('reply-fixed-top');				
				}
				else {
					$('#reply_anchor').removeClass('reply-fixed-top');				
				}
			
			
	});
	
	$("#reply_anchor").click(function() {
	    $('html,body').animate({
	        scrollTop: $("#new-post").offset().top},
	        'slow');
	});
	
	/* Registration Page */
	$('#signup_form select').wrap('<div class="select_wrapper"></div>');
	$('#field_10').parent('div').addClass('bb-see');
	/* Download Popup 
	$('a.resource_download').click(function(){
		$('.download_popup_wrapper').fadeIn();
		$('.download_popup_wrapper').click(function(){
			$(this).fadeOut();
		});
	});
	
	<div class="download_popup_wrapper">
		<div class="download_popup">
			<div class="download_popup_inner">
				<div>Your file is downloading <a href "http://testhuddle.com/#"> Click Here! </a>
	</div>
			</div>
		</div>
	</div>
	
	*/
});