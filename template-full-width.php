<?php
/*
Template Name: Without container
Template Post Type: page
*/

get_header();
?>

<h1>
	<?php echo get_the_title(); ?>
</h1>

<?php the_content(); ?>

<?php
get_footer();