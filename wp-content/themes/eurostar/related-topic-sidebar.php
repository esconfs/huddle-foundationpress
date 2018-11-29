<?php
/**
 * The Related topic Side-bar.
 *
 * @package WordPress
 * @subpackage Default Responsive Theme
 * @by Cathal - 1.0
 */

?>

<?php

// Find Current page Tags
	
$tag_ids = wp_get_post_tags( $wp_query->post->ID, array( 'fields' => 'ids' ) );

foreach ($tag_ids as $key => $value) {

	if (in_array(97, $tag_ids)) {
	    //echo "Agile Testing";
		 if ( get_field('e_a_t_url', 'option') ) { ?>
				<a href="<?php the_field('e_a_t_url', 'option'); ?>" title="Ebook - Agile Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_a_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-AT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_a_t_url', 'option') ) { ?>
				<a href="<?php the_field('w_a_t_url', 'option'); ?>" title="Webinar - Agile Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_a_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-AT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if (in_array(154, $tag_ids)) {
	    //echo "Mobile Testing";
		 if ( get_field('e_m_t_url', 'option') ) { ?>
				<a href="<?php the_field('e_m_t_url', 'option'); ?>" title="Ebook - Mobile Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_m_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-MT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_m_t_url', 'option') ) { ?>
				<a href="<?php the_field('w_m_t_url', 'option'); ?>" title="Mobile Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_m_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-MT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if (in_array(50, $tag_ids)) {
	    //echo "Test Automation";
		 if ( get_field('e_t_a_url', 'option') ) { ?>
				<a href="<?php the_field('e_t_a_url', 'option'); ?>" title="Ebook - Test Automation" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_t_a_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-TA" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_t_a_url', 'option') ) { ?>
				<a href="<?php the_field('w_t_a_url', 'option'); ?>" title="Webinar - Test Automation" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_t_a_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-TA" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if (in_array(266, $tag_ids)) {
	    //echo "People/Skills";
		 if ( get_field('e_p_s_url', 'option') ) { ?>
				<a href="<?php the_field('e_p_s_url', 'option'); ?>" title="Ebook - People Skills" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_p_s_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-PS" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_p_s_url', 'option') ) { ?>
				<a href="<?php the_field('w_p_s_url', 'option'); ?>" title="Webinar - People Skills" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_p_s_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-PS" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if  (in_array(51, $tag_ids)) {
	    //echo "Test Management";
		 if ( get_field('e_t_m_url', 'option') ) { ?>
				<a href="<?php the_field('e_t_m_url', 'option'); ?>" title="Ebook - Test Management" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_t_m_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-TM" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_t_m_url', 'option') ) { ?>
				<a href="<?php the_field('w_t_m_url', 'option'); ?>" title="Webinar - Test Management" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_t_m_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-TM" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if  (in_array(267, $tag_ids)) {
	    //echo "Functional Testing";
		 if ( get_field('e_f_t_url', 'option') ) { ?>
				<a href="<?php the_field('e_f_t_url', 'option'); ?>" title="Ebook - Functional Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_f_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-FT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_f_t_url', 'option') ) { ?>
				<a href="<?php the_field('w_f_t_url', 'option'); ?>" title="Webinar - Functional Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_f_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-FT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if  (in_array(271, $tag_ids)) {
	    //echo "non-Functional Testing";
		 if ( get_field('e_n_f_t_url', 'option') ) { ?>
				<a href="<?php the_field('e_n_f_t_url', 'option'); ?>" title="Ebook - Non-Functional Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_n_f_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-NFT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_n_f_t_url', 'option') ) { ?>
				<a href="<?php the_field('w_n_f_t_url', 'option'); ?>" title="Webinar - Non-Functional Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_n_f_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-NFT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if  (in_array(257, $tag_ids)) {
	    //echo "Cloud Testing";
		 if ( get_field('e_c_t_url', 'option') ) { ?>
				<a href="<?php the_field('e_c_t_url', 'option'); ?>" title="Ebook - Cloud Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_c_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-CT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_c_t_url', 'option') ) { ?>
				<a href="<?php the_field('w_c_t_url', 'option'); ?>" title="Webinar - Cloud Testing" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_c_t_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-CT" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
	if  (in_array(146, $tag_ids)) {
	    //echo "Other";
		 if ( get_field('e_o_url', 'option') ) { ?>
				<a href="<?php the_field('e_o_url', 'option'); ?>" title="Ebook - Other" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('e_o_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "EB-O" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
		 if ( get_field('w_o_url', 'option') ) { ?>
				<a href="<?php the_field('w_o_url', 'option'); ?>" title="Webinar - Other" target="_blank" class="related_ebook_ad">
					<?php 
					$image = get_field('w_o_image', 'option');
					$size = 'related-advert';
					if( $image ) {
						echo wp_get_attachment_image( $image, $size, "", array( "class" => "WB-O" ) );
					}
					?>
           		</a>
           		<div class="clearfix"></div>
			<?php } 
        break;
    }
}
 ?>	