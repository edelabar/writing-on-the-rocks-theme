<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
  <header>
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    <time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
    <span class="author">by <?php the_author() ?></span>
  </header>
  <?php the_content('Read the rest of this entry &raquo;'); ?>
  <footer>
    <?php the_tags('Tags: ', ', ', '<br />'); ?> 
    Posted in <?php the_category(', ') ?>
    | <?php edit_post_link('Edit', '', ' | '); ?>
    <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
  </footer>
</article>