<?php
/* Show Page Template */
/*
add_action('wp_head', 'show_template');
function show_template() {
     global $template;
     $template = '<div id="page_template"><span>Template URL:</span> '.$template.'</div>';
     print_r($template);
}
*/
/* Load  Template Parts and the theme Scripts */
get_template_part('includes/rewrite_rules.php');

/*
 * Force URLs in srcset attributes into HTTPS scheme.
 * This is particularly useful when you're running a Flexible SSL frontend like Cloudflare
 */
function ssl_srcset( $sources ) {
  foreach ( $sources as &$source ) {
    $source['url'] = set_url_scheme( $source['url'], 'https' );
  }

  return $sources;
}
add_filter( 'wp_calculate_image_srcset', 'ssl_srcset' );

/* Upload File Size Limit */
@ini_set( 'upload_max_size' , '24M' );
@ini_set( 'post_max_size', '24M');
@ini_set( 'max_execution_time', '300' );

/* ACF - Options Page Support */
//if( function_exists('acf_add_options_page') ) {
//	acf_add_options_page();
//}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Huddle Options',
        'menu_title' => 'Huddle Options',
        'menu_slug' => 'general',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Admin Dashboard',
        'menu_title' => 'Admin Dashboard',
        'parent_slug' => 'general'


    ));


};

// Logout Bug under Firefox
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

//Buddypress Redirect
function bp_redirect($user) {
    $redirect_url = '/thank-you-for-registering/';
    bp_core_redirect($redirect_url);
}
add_action('bp_core_signup_user', 'bp_redirect', 100, 1);

// Remove Password Reset
function ignore_new_user_autopass() {
	return true;
}
add_filter( 'new_user_approve_bypass_password_reset', 'ignore_new_user_autopass' );

/* Events Hook */
function add_events_button() {
	global $current_user;
	get_currentuserinfo();
	$custom_current_userID = $current_user->ID;
	$custom_current_user = bp_core_get_username($custom_current_userID);
	$event_button = '<li id="events-personal-li-extra"><a id="user-create-events" href="' . home_url() . '/members/' . $custom_current_user . '/events/my-events/edit/?action=edit">&#43;Add New Event</a></li>';
	echo $event_button;	
}
add_filter('bp_member_options_nav', 'add_events_button');

/* Image Link to None by default */
update_option('image_default_link_type','none');

/* Disable Plugin Updates */
function filter_plugin_updates( $value ) {
    //unset( $value->response['events-manager/events-manager.php'] );
    //unset( $value->response['gotowp/gotowp_personal.php'] );
    //unset( $value->response['new-user-approve/new-user-approve.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

/**
 * Redirect non-admin users to home page
 *
 * This function is attached to the 'admin_init' action hook.
 */
function redirect_non_admin_users() {
	if ( ! current_user_can( 'administrator' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] && stripos($_SERVER['REQUEST_URI'],'async-upload.php') == false ) {
		wp_redirect( bp_loggedin_user_domain() );
		exit;
	}
}

/* Is Page or Child of it */
function tree(){
  $class = '';
  if( is_page() ) { 
  global $post;
      /* Get an array of Ancestors and Parents if they exist */
  $parents = get_post_ancestors( $post->ID );
      /* Get the top Level page->ID count base 1, array base 0 so -1 */ 
  $id = ($parents) ? $parents[count($parents)-1]: $post->ID;
     /* Get the parent and set the $class with the page slug (post_name) */
  $parent = get_page( $id );
  $class = $parent->post_name;
}
return $class;
}

/* Is Sub page */
function is_subpage() {
    global $post;                              				// load details about this page
    if ( is_page() && $post->post_parent ) {   	// test to see if the page has a parent
        return $post->post_parent;             		// return the ID of the parent post
    } else {                                  					// there is no parent so ...
        return false;                          				// ... the answer to the question is false
    }
}

/* Post Views */
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//Resources Navigation Short Code
function wpb_list_child_pages() { 
	global $post; 
	if ( is_page() && $post->post_parent )
		$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
	else
		$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );
	if ( $childpages ) {
		$string = '<ul>' . $childpages . '</ul>';
	}
	return $string;
}
add_shortcode('wpb_childpages', 'wpb_list_child_pages');

/* Advanced Custom Fields */
function my_pre_save_post( $post_id )
{
    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }
    // Create a new post
    $resource_type = $_POST['fields']['field_52a09c27846f9'];
    $resource_cat = $_POST['fields']['field_52fa1b9ca797b'];
    
    $post = array(
        'post_status'  => 'draft' ,
        'post_title'  =>  $_POST['acf']['field_52a056c4133f9'],
        'post_content'  =>  $_POST['acf']['field_52a056e0133fa'],
        'tags_input'	=> array($resource_type, $resource_cat),
        'post_type'  => 'resource' ,
    );  
    // insert the post
    $post_id = wp_insert_post( $post ); 
    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] ); 
    // return the new ID
    return $post_id;
}
add_filter('acf/pre_save_post' , 'my_pre_save_post' );

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
 
function my_deregister_styles() {
	wp_deregister_style( 'wp-admin' );
}

/* Is Tree */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

/* Breadcrumbs */
function the_breadcrumb() {
     if (!is_home()) {
          echo '<div class="breadcrumb_wrapper';
          echo '"><a href="';
          echo get_option('home');
          echo '">Home</a> &#47; ';
          if ( is_tree(164) ) {
          		echo '<a href="/events/" title="">Events</a>';
                if ( is_page('categories') ) {
                	echo " &#47; "; echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'; 
                } else { 
                	echo " &#47; "; echo '<a href="/events/categories/">Categories</a>'; echo " &#47; "; echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'; 
                }
            } elseif ( is_singular('resource') ) {
          		echo '<a href="/resources/" title="">Resources</a>';
                echo " &#47; ";
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            } elseif ( bp_is_member() ) {
          		echo '<a href="/members/" title="">Members</a>';
                echo " &#47; ";
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            } elseif ( is_singular('post') ) {
          		echo '<a href="/blog/most-recent/" title="">Blog</a>';
                echo " &#47; ";
                echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
        	} elseif (is_subpage()) {
        		global $post; 
        		$parent_title = get_the_title($post->post_parent);
        		$parent_link = get_permalink($post->post_parent);
               	echo '<a href="'. $parent_link .'">'.$parent_title.'</a>';
               	echo " &#47; ";
               	echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            } elseif (is_page()) {
            	echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
            }
          echo '</div>';
     }
}

/**
* Add @mentionname after bbpress forum author details
*/

add_action( 'bbp_theme_after_reply_author_details', 'mentionname_to_bbpress' );
function mentionname_to_bbpress () {
$user = get_userdata( bbp_get_reply_author_id() );
if ( !empty( $user->user_nicename ) ) {
$user_nicename = $user->user_nicename;
echo "<div class='user_nicename'>@".$user_nicename."</div>";
}
}


/** Format the time when displaying our latest Tweets */
function ago($time){
   $periods = array("second", "minute", "hour", "day", "week", "month", "year");
   $lengths = array("60","60","24","7","4.35","12","10");
   $now = time();
   $difference = $now - $time;
   $tense = "ago";
   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
   }
   $difference = round($difference);
   if($difference != 1) {
        $periods[$j].= "s";
   }
   return "$difference $periods[$j] ago ";
}

/** Display out latest Tweets using the Twitter 1.1 API */
function display_latest_tweets($no_tweets){
     @require_once 'twitteroauth/twitteroauth.php';
      $twitterConnection = new TwitterOAuth(
          'AgXJeAo5PnzgXQzNcHuwQ',     // Consumer Key
          'eWNntPaZmZTGihDFtAUYHJEa39Aj2BjbVnxCHTGxo', // Consumer secret
          '177701324-Lmfr77QEtSco9NkIvJU140qWjwGDEoqFR2J2LmpX',     // Access token
          'NQxa4zDuL3DcwxMlSl8X7c8EbEPc9kFCSH4vqqmE8nTgm'    // Access token secret
          );
     $twitterData = $twitterConnection->get(
          'statuses/user_timeline',
            array(
               'screen_name'     => 'testhuddle',      // Your Twitter Username
               'count'           => $no_tweets,           // Number of Tweets to display
               'exclude_replies' => true
            )
          );    
          if($twitterData && is_array($twitterData)) {
          ?>
            <div id="tweets_list">
                <ul>
                    <?php foreach($twitterData as $tweet): ?>
                    <li>
                        <span>
                        <p class="tweet_comp">&#64;testhuddle</p>
                        <?php
                        $latestTweet = $tweet->text;
                        $latestTweet = preg_replace('/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="https://$1" target="_blank">https://$1</a>', $latestTweet);
               echo $latestTweet;
                        ?>
                        </span>
                        <?php
                        $twitterTime = strtotime($tweet->created_at);
                        $timeAgo = ago($twitterTime);
                        ?>
                        <div class="meta"><a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>/statuses/<?php echo $tweet->id_str; ?>" class="jtwt_date"><?php echo $timeAgo; ?></a></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
     <?php
     }
}

/* Widget - Subscribe */
class widget_subscribe extends WP_Widget {
    // Create Widget
    function widget_subscribe() {
        parent::WP_Widget(false, $name = 'Huddle - Subscribe', array('description' => 'Newsletter subscribtion box.'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_subscribe">
				<p class="sidebar_title">Keep in touch with us</p>
				<div class="widget_top">
					<p>Subscribe to our newsletter by submitting your email address below</p>
					<div class="subscribe_wrapper"><?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?></div>
				</div>
				        	
           	</li>
        <?php
     }
}
register_widget('widget_subscribe');

/* Widget - Twitter */
class widget_twitter extends WP_Widget {
    // Create Widget
    function widget_twitter() {
        parent::WP_Widget(false, $name = 'TestHuddle - Twitter', array('description' => 'Twitter Feed for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_twitter">
				<p class="sidebar_title">latest tweets</p>
				<?php echo display_latest_tweets(2); ?>
           	</li>
        <?php
     }
}
register_widget('widget_twitter');

/* Widget - Events - Calendar */
class widget_events extends WP_Widget {
    // Create Widget
    function widget_events() {
        parent::WP_Widget(false, $name = 'Huddle - Events - Calendar', array('description' => 'Events calendar for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_events">
				<p class="sidebar_title">upcoming events</p>
				<?php echo do_shortcode('[events_calendar long_events=1 full=1]'); ?>
           	</li>
        <?php
     }
}
register_widget('widget_events');

/* Widget - Events - Upcoming */
class widget_events_upcoming extends WP_Widget {
    // Create Widget
    function widget_events_upcoming() {
        parent::WP_Widget(false, $name = 'Huddle - Events - Upcoming', array('description' => 'Upcoming events list for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_events_upcoming  <?php if (is_page('events') OR is_singular('event')) { echo 'hide_events'; }?>">
				<p class="sidebar_title">upcoming events</p>
				<ul id="widget_events_list">
					<?php echo do_shortcode('[events_list_grouped mode="daily" limit="2"]
						<li>
							<div class="date_holder">
								<div class="date_month">#_{M}</div>
								<div class="date_day">#_{d}</div>
							</div>
							<div class="event_title">#_EVENTLINK</div>
							<div class="event_disc">#_EVENTEXCERPT{15,...}</div>
						</li>
				[/events_list_grouped]'); ?>
				</ul>
           	</li>
        <?php
     }
}
register_widget('widget_events_upcoming');

/* Widget - Blog */
class widget_blog extends WP_Widget {
    // Create Widget
    function widget_blog() {
        parent::WP_Widget(false, $name = 'Huddle - Blog', array('description' => 'Newest blog posts for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_blog  <?php if (is_page(array('blog', 'most-recent', 'most-views', 'most-comments')) OR is_singular('post')) { echo 'hide_posts'; }?>">
				<p class="sidebar_title">News from our blog</p>
				<ul id="widget_blog_list">
					<?php $the_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '2', 'order' => 'DESC')); while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4></a>	
							<p class="widget_blog_list_exc"><?php the_excerpt(); ?></p>
							<p class="widget_blog_list_time"><?php the_time('d/m/Y'); ?></p>
						</li>				
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
           	</li>
        <?php
     }
}
register_widget('widget_blog');

/* Widget - Comments */
class widget_comments extends WP_Widget {
    // Create Widget
    function widget_comments() {
        parent::WP_Widget(false, $name = 'Huddle - Comments', array('description' => 'Most recent comments for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_comments">
				<p class="sidebar_title">top influencers</p>
				<ol>
					<?php
						$blogusers = get_users('orderby=post_count&count_total=true&number=15');
						foreach ($blogusers as $user) {
							echo '<li><span>' . $user->user_nicename . '</span> ('. count_user_posts( $user->ID ) .')</li>';
						}
					?>
				</ol>
           	</li>
        <?php
     }
}
register_widget('widget_comments');

/* Widget - Blog - Archive */
class widget_blog_archive extends WP_Widget {
    // Create Widget
    function widget_blog_archive() {
        parent::WP_Widget(false, $name = 'Huddle - Blog - Archive', array('description' => 'Blog posts archive for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_blog_archive">
				<p class="sidebar_title">top influencers</p>
           	</li>
        <?php
     }
}
register_widget('widget_blog_archive');

/* Widget - Blog - Categories */
class widget_blog_cat extends WP_Widget {
    // Create Widget
    function widget_blog_cat() {
        parent::WP_Widget(false, $name = 'Huddle - Blog - Categories', array('description' => 'Blog posts categories for Huddle'));
    }
    // Widget Content
    function widget($args, $instance) { 
        extract( $args );
        ?>
           	<li class="widget widget_blog_cat">
				<p class="sidebar_title">top influencers</p>
           	</li>
        <?php
     }
}
register_widget('widget_blog_cat');

/* Add a Favicon to the Site */
add_action( 'wp_head', 'mytheme_add_favicon' );
function mytheme_add_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_stylesheet_directory_uri() . '/favicon.ico" />';
}

/* Disable Admin Bar for users */
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}

/* Custom Login Page */
add_action("login_head", "my_login_head");
function my_login_head() {
     echo "<link rel='stylesheet' href='" . get_template_directory_uri() . "/css/functions.css' />";
}

/* Custom Post Types */
function codex_custom_init() {
  $labels = array(
    'name' => _x('Slider', 'post type general name'),
    'singular_name' => _x('Slider', 'post type singular name'),
    'add_new' => _x('Add New', 'Slider'),
    'add_new_item' => __('Add New Slider'),
    'edit_item' => __('Edit Slider'),
    'new_item' => __('New Slider'),
    'all_items' => __('All Slider'),
    'view_item' => __('View Slider'),
    'search_items' => __('Search Slider'),
    'not_found' =>  __('No Recipe found'),
    'not_found_in_trash' => __('No Slider found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => __('Slider')

  );
  $args = array(
    'labels' => $labels,
    'taxonomies' => array('category', 'post_tag'),
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'exclude_from_search' => true,
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail' )
  );
  register_post_type('slider',$args);
  flush_rewrite_rules();
  
  $labels = array(
    'name' => _x('Resources', 'post type general name'),
    'singular_name' => _x('Resource', 'post type singular name'),
    'add_new' => _x('Add New', 'Resource'),
    'add_new_item' => __('Add New Resource'),
    'edit_item' => __('Edit Resource'),
    'new_item' => __('New Resource'),
    'all_items' => __('All Resources'),
    'view_item' => __('View Resources'),
    'search_items' => __('Search Resources'),
    'not_found' =>  __('No Resource found'),
    'not_found_in_trash' => __('No Resource found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => __('Resources')
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug'=>'resource/%resource_type%', 'with_front' => TRUE), // ##### USED IN CONJUCTION WITH custom-post-type-permalinks PLUGIN #####S
    //'rewrite' => array('slug'=>'resource'),
    'exclude_from_search' => false,
    'capability_type' => 'resource',
    'taxonomies' => array('resource_type', 'post_tag'),
    'map_meta_cap'    => true,
    'has_archive' => false,
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array( 'title', 'thumbnail', 'editor', 'comments', 'author')
  );
  register_post_type('resource',$args);
  flush_rewrite_rules();
}
add_action( 'init', 'codex_custom_init' );

/* Custom Taxonomy */
$labels = array(
        'name' => _x( 'Resources Types', 'taxonomy general name' ),
        'singular_name' => _x( 'Resources Type', 'taxonomy singular name' ),
        'search_items' =>  __( 'SearchResources Types' ),
        'all_items' => __( 'All Resources Types' ),
        'parent_item' => __( 'Parent Resources Type' ),
        'parent_item_colon' => __( 'Parent Resources Type:' ),
        'edit_item' => __( 'Edit Resources Types' ),
        'update_item' => __( 'Update Resources Type' ),
        'add_new_item' => __( 'Add New Resources Type' ),
        'new_item_name' => __( 'New Resources Type Name' )
);
 
$settings = array(
        'hierarchical' => true,
        'capability_type' => 'resource_type',
        'labels' => $labels,
        'capabilities' => array('assign_terms'=>'edit_resources','manage_terms' => 'manage_resource_types','edit_terms' => 'manage_resource_types','delete_terms' => 'manage_resource_types'),
        'show_ui' => true,
        'rewrite' => true,
        'query_var' => true
);
register_taxonomy('resource_type', array('resource'), $settings);

/* Admin Capabilities */
function add_resource_caps() {
$role = get_role( 'administrator' );

$role->add_cap( 'edit_resource' ); 
$role->add_cap( 'edit_resources' ); 
$role->add_cap( 'edit_others_resources' );
$role->add_cap( 'delete_others_resources' ); 
$role->add_cap( 'delete_published_resources' );
$role->add_cap( 'publish_resources' ); 
$role->add_cap( 'read_resource' ); 
$role->add_cap( 'read_private_resources' ); 
$role->add_cap( 'delete_private_resources' ); 
$role->add_cap( 'delete_resource' );
$role->add_cap( 'delete_resources' );
$role->add_cap( 'manage_resource_types' ); 
$role->add_cap( 'delete_resource_types' ); 
$role->add_cap( 'edit_resource_types' ); 
}
add_action( 'admin_init', 'add_resource_caps');

/* Media Uploads Restricktion */
add_filter( 'posts_where', 'devplus_attachments_wpquery_where' );
function devplus_attachments_wpquery_where( $where ){
	global $current_user;
	
	if( is_user_logged_in() ){
		if ($current_user->user_level != 10 ) {
			// we spreken over een ingelogde user
			if( isset( $_POST['action'] ) ){
				// library query
				if( $_POST['action'] == 'query-attachments' ){
					$where .= ' AND post_author='.$current_user->data->ID;
				}
			}
		}
	}
	return $where;
}

/* Custom Post Images */
if (class_exists('MultiPostThumbnails')) {
	new MultiPostThumbnails(
		array(
			'label' => 'Recipe Head Image',
			'id' => 'recipe-head-image',
			'post_type' => 'recipes'
		)
	);
}
if (class_exists('MultiPostThumbnails')) {
	$types = array('post', 'recipes', 'ambassadors','tips');
	foreach($types as $type) {
		new MultiPostThumbnails(array(
			'label' => 'Homepage Slider',
			'id' => 'slider-image',
			'post_type' => $type
			)
		);
	}
}

/* Custom Post Image Sizes */
add_image_size( 'recipe-head-image', 651, 362 );
add_image_size( 'slider', 620, 385, true );
add_image_size( 'resources_img', 145, 9999 );

/**
 * Boilerplate functions and definitions
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

if ( ! function_exists( 'boilerplate_setup' ) ):
	function boilerplate_setup() {
		add_editor_style();
		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'boilerplate', get_template_directory() . '/languages' );
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'boilerplate' ),
		) );
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'custom-background' );
		} else {
			add_custom_background();
		}
		define( 'HEADER_TEXTCOLOR', '' );
		define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'boilerplate_header_image_width', 940 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'boilerplate_header_image_height', 198 ) );
		set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
		define( 'NO_HEADER_TEXT', true );
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'custom-header' );
		} else {
			add_custom_image_header( '', 'boilerplate_admin_header_style' );
		}
		register_default_headers( array(
			'berries' => array(
				'url' => '%s/images/headers/starkers.png',
				'thumbnail_url' => '%s/images/headers/starkers-thumbnail.png',
				/* translators: header image description */
				'description' => __( 'Boilerplate', 'boilerplate' )
			)
		) );
	}
endif;
add_action( 'after_setup_theme', 'boilerplate_setup' );
if ( ! function_exists( 'boilerplate_admin_header_style' ) ) :
	function boilerplate_admin_header_style() {
	?>
	<style type="text/css">
	/* Shows the same border as on front end */
	#headimg {
		border-bottom: 1px solid #000;
		border-top: 4px solid #000;
	}
	</style>
	<?php
	}
endif;

if ( ! function_exists( 'boilerplate_filter_wp_title' ) ) :
	function boilerplate_filter_wp_title( $title, $separator ) {
		if ( is_feed() )
			return $title;
		global $paged, $page;

		if ( is_search() ) {
			$title = sprintf( __( 'Search results for %s', 'boilerplate' ), '"' . get_search_query() . '"' );
			if ( $paged >= 2 )
				$title .= " $separator " . sprintf( __( 'Page %s', 'boilerplate' ), $paged );
			$title .= " $separator " . get_bloginfo( 'name', 'display' );
			return $title;
		}

		$title .= get_bloginfo( 'name', 'display' );

		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $separator " . $site_description;

		if ( $paged >= 2 || $page >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'boilerplate' ), max( $paged, $page ) );

		// Return the new title to wp_title():
		return $title;
	}
endif;
add_filter( 'wp_title', 'boilerplate_filter_wp_title', 10, 2 );

if ( ! function_exists( 'boilerplate_page_menu_args' ) ) :

	function boilerplate_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
endif;
add_filter( 'wp_page_menu_args', 'boilerplate_page_menu_args' );

if ( ! function_exists( 'boilerplate_excerpt_length' ) ) :
   function boilerplate_excerpt_length( $length ) {
	   return 40;
   }
endif;
add_filter( 'excerpt_length', 'boilerplate_excerpt_length' );

if ( ! function_exists( 'boilerplate_continue_reading_link' ) ) :
	
	function boilerplate_continue_reading_link() {
		return ' <a href="'. get_permalink() . '">' . __( '', 'boilerplate' ) . '</a>';
	}
endif;

if ( ! function_exists( 'boilerplate_auto_excerpt_more' ) ) :
	function boilerplate_auto_excerpt_more( $more ) {
		return ' &hellip;' . boilerplate_continue_reading_link();
	}
endif;
add_filter( 'excerpt_more', 'boilerplate_auto_excerpt_more' );

if ( ! function_exists( 'boilerplate_custom_excerpt_more' ) ) :
	function boilerplate_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= boilerplate_continue_reading_link();
		}
		return $output;
	}
endif;
add_filter( 'get_the_excerpt', 'boilerplate_custom_excerpt_more' );

if ( ! function_exists( 'boilerplate_remove_gallery_css' ) ) :
	function boilerplate_remove_gallery_css( $css ) {
		return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
	}
endif;
add_filter( 'gallery_style', 'boilerplate_remove_gallery_css' );

if ( ! function_exists( 'boilerplate_comment' ) ) :

	function boilerplate_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<article id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'boilerplate' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'boilerplate' ); ?></em>
					<br />
				<?php endif; ?>
				<footer class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'boilerplate' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'boilerplate' ), ' ' );
					?>
				</footer><!-- .comment-meta .commentmetadata -->
				<div class="comment-body"><?php comment_text(); ?></div>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
			</article><!-- #comment-##  -->
		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		<li class="post pingback">
			<p><?php _e( 'Pingback:', 'boilerplate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'boilerplate'), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
endif;

if ( ! function_exists( 'boilerplate_widgets_init' ) ) :

	function boilerplate_widgets_init() {
		// Area 1, located at the top of the sidebar.
		register_sidebar( array(
			'name' => __( 'Primary Widget Area', 'boilerplate' ),
			'id' => 'primary-widget-area',
			'description' => __( 'The primary widget area', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		register_sidebar( array(
			'name' => __( 'Forum Widget Area', 'boilerplate' ),
			'id' => 'forum-widget-area',
			'description' => __( 'Widget area for Forums only', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		// Area 3, located in the footer. Empty by default.
		register_sidebar( array(
			'name' => __( 'First Footer Widget Area', 'boilerplate' ),
			'id' => 'first-footer-widget-area',
			'description' => __( 'The first footer widget area', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		// Area 4, located in the footer. Empty by default.
		register_sidebar( array(
			'name' => __( 'Second Footer Widget Area', 'boilerplate' ),
			'id' => 'second-footer-widget-area',
			'description' => __( 'The second footer widget area', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		// Area 5, located in the footer. Empty by default.
		register_sidebar( array(
			'name' => __( 'Third Footer Widget Area', 'boilerplate' ),
			'id' => 'third-footer-widget-area',
			'description' => __( 'The third footer widget area', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );

		// Area 6, located in the footer. Empty by default.
		register_sidebar( array(
			'name' => __( 'Fourth Footer Widget Area', 'boilerplate' ),
			'id' => 'fourth-footer-widget-area',
			'description' => __( 'The fourth footer widget area', 'boilerplate' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
endif;
add_action( 'widgets_init', 'boilerplate_widgets_init' );

if ( ! function_exists( 'boilerplate_remove_recent_comments_style' ) ) :

	function boilerplate_remove_recent_comments_style() {
		global $wp_widget_factory;
		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	}
endif;
add_action( 'widgets_init', 'boilerplate_remove_recent_comments_style' );

if ( ! function_exists( 'boilerplate_posted_on' ) ) :

	function boilerplate_posted_on() {
	
		printf( __( '<span class="%1$s">Posted on</span> <span class="entry-date">%2$s %3$s %4$s</span> <span class="meta-sep">by</span> %5$s', 'boilerplate' ),
			// %1$s = container class
			'meta-prep meta-prep-author',
			// %2$s = month: /yyyy/mm/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'F' )
			),
			// %3$s = day: /yyyy/mm/dd/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/' . get_the_date( 'd' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'j' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'j' )
			),
			// %4$s = year: /yyyy/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'Y' ) ),
				get_the_date( 'Y' )
			),
			// %5$s = author vcard
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'boilerplate' ), get_the_author() ),
				get_the_author()
			)
		);
	}
endif;

if ( ! function_exists( 'boilerplate_posted_in' ) ) :
	function boilerplate_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'boilerplate' );
		}
		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);
	}
endif;
	require_once(get_template_directory() . '/boilerplate-admin/admin-menu.php');

	if ( ! function_exists( 'boilerplate_complete_version_removal' ) ) :
		function boilerplate_complete_version_removal() {
			return '';
		}
	endif;
	add_filter('the_generator', 'boilerplate_complete_version_removal');

	// add thumbnail support
	if ( function_exists( 'add_theme_support' ) ) :
		add_theme_support( 'post-thumbnails' );
	endif;

/*	End Boilerplate */

/*	Archive Pageination added */

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="blog_pagination"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

/*
 * 
 * Gravity Forms
 * Remove labels
 * 
 * */

 add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/* Add emobi and Epub docs to upload list */

function addUploadMimes($mimes) {
    $mimes = array_merge($mimes, array(
        'epub|mobi' => 'application/octet-stream'
    ));
    return $mimes;
}
add_filter('upload_mimes', 'addUploadMimes');


?>
