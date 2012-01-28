<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
get_header(); ?>

<div id="main" role="main" class="books">
  <?php query_posts($query_string . '&nopaging=true&order_by=post_name&order=ASC'); ?>
  <?php if (have_posts()) : ?>  	
    <?php while (have_posts()) : the_post(); ?>
	
      <?php include('include/book.php') ?>
		
	<?php endwhile; ?>
	
	<div style="clear:both;"></div>
	
  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


