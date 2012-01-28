<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */

get_header(); ?>

<div id="main" role="main" class="page">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <article class="post" id="post-<?php the_ID(); ?>">
    <header>
      <h2><?php the_title(); ?></h2>
    </header>
  
    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  	<div style="clear:both"></div>
  </article>
  <?php endwhile; endif; ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
