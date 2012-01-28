<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
get_header(); ?>

<div id="main" role="main" class="category">
  <?php if (have_posts()) : ?>  	
    <?php while (have_posts()) : the_post(); ?>
	
      <?php include('include/article.php') ?>
		
	<?php endwhile; ?>
	
	<p class="previous"><?php next_posts_link('Older Entries &raquo;') ?></p>	
	<p class="next"><?php previous_posts_link('&laquo; Newer Entries') ?></p>
	
	<div style="clear:both;"></div>
	
  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


