<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Saxon
 */

get_header();

// Count view
if (function_exists('saxon_setPostViews')) {
	saxon_setPostViews(get_the_ID());
}

?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', 'single' ); ?>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
