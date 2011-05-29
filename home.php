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
	$thisPub = $year . '-' . $month . '-' . $day;
	$lastPub = "";
}

get_header(); ?>

<div id="main" role="main" class="home">
  <?php if (have_posts()) : ?>  	<?php while (have_posts()) : the_post(); ?>
  		<?php
  			if( $lastPub == "" ) {
  				if( get_the_date('Y-n-j') != $thisPub ) {
  					$lastPub = get_the_date('Y/m/d');
  					break;
  				}
  			}
  		?>
  	<?php endwhile; ?>
  	
    <?php /* echo( '<!--' . $thisPub . ',' . $lastPub . '-->'); */ ?>
    
    <?php /* Get all posts from the last publish date */ ?>
		<?php query_posts('year=' . $year . '&monthnum=' . $month . '&day=' . $day . '&meta_key=order&order_by=meta_value_num&order=ASC'); ?> 
		<?php while (have_posts()) : the_post(); ?>
	
      <?php include('include/article.php') ?>
		
		<?php endwhile; ?>
		
		<p><a href="/<?php echo($lastPub) ?>">Previous Edition</a></p>
		
  <?php else : ?>

    <h2>Not Found</h2>
    <p>Sorry, but you are looking for something that isn't here.</p>
    <?php get_search_form(); ?>

  <?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


