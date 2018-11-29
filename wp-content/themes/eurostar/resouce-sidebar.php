<?php
/**
 * The Resorces Tabed Sidebar.
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * @by Cathal - 1.0
 */
?>
<?php
										$format_in = 'Ymd'; // the format your value is saved in (set in the field options)
										$format_out = 'd-m-Y'; // the format you want to end up with
										
										
										 
										 
										$date_now = date("Ymd");
										//$date = date_create("01/02/2016");
										
										
										//$dateecho = DateTime::createFromFormat($format_in, get_field('upcoming_date'));
										
										//echo $dateecho ->format( $format_out );
										
									?>
<div class="resouce-home">     
	 				<ul id="resources_filter">						
							<li class="ebook active" >Latest eBooks</li>
							<li class="webinar-2" >Latest Webinars</li>					
					</ul>
					<ul class="ebook-list">	
					<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '6', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  18)); ?>	
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="resource-list-item">
								<li>								
									<div class="resource_title"><?php the_title(); ?></div>	
									<div class="resource_type">#<?php 	echo get_field('resource_subject_matter') ;	?></div>								
								</li>
								</a>
						<?php endwhile; ?>				
	 				</ul>
	 				<ul class="webinar-list hidden">
	 				<?php $the_query = new WP_Query(array('post_type' => array('resource'), 'posts_per_page' => '6', 'order' => 'DESC', 'order_by' => 'date', 'tag_id' =>  34)); ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="isotope-item 
								<?php
									$posttags = get_the_tags();
									if ($posttags) {
									  foreach($posttags as $tag) {
										echo '' . $tag->slug . ' '; 
									  }
									}
								 ?>">
								<li>								
									<div class="resource_title"><?php the_title(); ?></div>
									<?php
										$date = get_field('upcoming_date');
										 
										//if( $date > $date_now ) {
										if (strtotime($date_now) < strtotime($date)) {
										        $upcoming = '#Upcoming!';
										    }else{
										        $upcoming = ' ';
										    }
									?>									
									<div class="resource_type"><span class="green"><?php echo $upcoming; ?> </span>  &nbsp; &nbsp; #<?php 	echo get_field('resource_subject_matter') ;	?></div>	
								</li>
								</a>
						<?php endwhile; ?>		
	 				</ul>
 				</div>
	<?php		 ?>	