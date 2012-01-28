<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */

get_header(); ?>

<div id="main" role="main" class="single">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
  <?php include('include/article.php') ?>

<?php endwhile; else: ?>

  <p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div>

<?php get_footer(); ?>
