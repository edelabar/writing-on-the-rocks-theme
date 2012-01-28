<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
 
if (have_posts()) {
	/* Get the date of the latest post. */
	$post = $posts[0]; // Hack. Set $post so that get_the_date() works.
	$year = get_the_date('Y');
	$month = get_the_date('n');
	$day = get_the_date('j');
	$canonical = get_the_date('/Y/m/d');
	$issue = get_the_date('F jS, Y');
	$thisPub = $year . '-' . $month . '-' . $day;
	$lastPub = "";
}

get_header(); ?>

<div id="main" role="main" class="home">
  <?php if (have_posts()) : ?>  	
  	<?php if ( is_home() ) {
  		// Exclude "Upcoming" posts from the Home page flow… (WotR artifact)
		query_posts($query_string . '&cat='.RSS_EXCLUDE);
	}
	?>
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


