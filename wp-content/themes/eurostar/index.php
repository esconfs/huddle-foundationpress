<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

 get_header('header1'); ?>

  <div class="outer-slider">	
  	<div id="content" class="top-content">
  		<div class="left">
	  		<?php if(get_field('tag_line_repeater', 'option')): ?>
	  			<h1>European Software Testing Community  <?php if ( ! is_user_logged_in() ) { ?>
				
				<?php } ?>
				<span class="btn_login">
					<?php if ( ! is_user_logged_in() ) { ?>
						<a href="javascript:void(0)">Login</a>
					<?php } else { ?>
						<a href="javascript:void(0)">Profile</a>
					<?php } ?>
				</span>  </h1>
	  			<ul class="tag-list">		
				<?php while(has_sub_field('tag_line_repeater', 'option')): ?>
					<li><a href="<?php the_sub_field('tag_line_url'); ?>" title="<?php the_sub_field('tag_line'); ?>" class="">
						<?php the_sub_field('tag_line'); ?>
					</a></li>
				<?php endwhile; ?>		
			<?php endif; ?>	
		</div>
  		<div class="right">  			
			<!-- Right hand side Advertising -->
			<?php if ( get_field('top_panel_ad', 'option') ) { ?>
				<a href="<?php the_field('top_ad_img_url', 'option'); ?>" title="<?php the_field('top_ad_img_title', 'option'); ?>" target="_blank" class="top_right_ad">
					<?php 
					$image = get_field('top_ad_img', 'option');
					$size = 'full';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } else {				
				 get_sidebar(); 				
			}?>
		</div>
  	</div>
  </div>
<div class="grey-bg">
  <div class="outer-slider">	
	<!-- SLIDER -->
	 <section class="regular slider">
	<?php if(get_field('slider_repeater', 'option')): ?>
		<?php if ( is_user_logged_in() ) { } else { ?>
		<!-- BANNER -->		
			<a href="<?php the_field('homepage_link', '268'); ?>" class="">
				<div>
					<img src="<?php the_field('homepage_image', '268'); ?>" title="Register" />
				</div>
			</a>		
		<?php } ?>
		<?php while(has_sub_field('slider_repeater', 'option')): ?>
			<?php $image = get_sub_field('slide_image'); ?>
			<a href="<?php the_sub_field('slide_url'); ?>" title="<?php the_sub_field('slide_title'); ?>" class="">
				<div>					
					<img  src="<?php echo $image; ?>" alt="<?php the_sub_field('slide_title'); ?> Huddle"/>					
					<?php if( get_sub_field('slide_title') ): ?>
						<h2><?php the_sub_field('slide_title'); ?></h2>
					<?php endif; ?>						
				</div>
			</a>
		<?php endwhile; ?>		
	<?php endif; ?>	
	</section>
  </div>
</div>
<div id="content">
	<div id="content_left">
		<div id="tabs">
		    <ul class="nav">
		      <li><a href="#tab-1">Latest Discussions</a></li>
		      <li><a href="#tab-2">Editor's Pick</a></li>
		      <li><a href="#tab-3"><?php if ( is_user_logged_in() ) { ?>Ask A Question <?php } else { ?>Forums <?php } ?></a></li>
		    </ul>
		    <div id="tab-1" class="tab">
		    	<ul class="topic header-list"><li>&nbsp;</li><li>Thread</li><li >Replies</li><li >Latest reply</li><li >Replied by</li></ul>
		    	 <?php echo do_shortcode('[bbp-topic-index]'); ?>
		         <?php //echo do_shortcode('[bbp-forum-index]'); ?>
		        </div>
		    <div id="tab-2" class="tab">   
		    	<ul class="header-list"><li>&nbsp;</li><li>Thread</li><li >Replies</li><li >Latest reply</li><li >Replied by</li></ul>     
		          <?php echo do_shortcode('[bbp-topic-index]'); ?>
		    </div>
		
			<div id="tab-3" class="tab">
			
				<?php if ( is_user_logged_in() ) { echo do_shortcode('[bbp-topic-form] ');  } else { 		  		
					echo do_shortcode('[bbp-topic-form] ');   				
					echo do_shortcode('[bbp-forum-index] '); 				
			  }
			  ?>
			  
			
			  
			  
		</div>
	
		</div>	
			
	</div>
	
		
	<div id="content_right">
		 <?php get_template_part( 'resouce-sidebar' ); ?>
		
 				<div style="overflow:hidden; height: 280px; margin: 20px 0 8px 0;">
 				  <a class="twitter-timeline" 
		            data-height="330" 
		            data-dnt="true" 
		            data-link-color="#ADC05D" 
		            href="https://twitter.com/TESTHuddle"
		            >Tweets by @TESTHuddle</a> 
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>		
			</div>
			
			<a href="https://twitter.com/intent/tweet?screen_name=TESTHuddle" class="twitter-mention-button" data-show-count="false">Tweet to @TESTHuddle</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
			
			
	</div>

<?php get_footer(); ?>
