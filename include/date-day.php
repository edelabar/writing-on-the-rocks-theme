<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 *
 * This displays a single issue, from a /yyyy/mm/dd URL
 *
 **/
?>

<?php query_posts($query_string . '&meta_key=order&orderby=meta_value_num&order=ASC'); ?>

<?php if (have_posts()) : ?>

	<?php 
		/* Get the date of the current post. */
		$post = $posts[0]; // Hack. Set $post so that get_the_date() works.
  	$current = get_the_date('Y-m-d');
	?>
	
	<?php
	/**
	 *
	 * This is the primary Article Loop
	 *
	 **/
	?>
	<?php while (have_posts()) : the_post(); ?>
  	
		<?php /* Main Articles for this date */ ?>
    <?php include('article.php') ?>
		
  <?php endwhile; ?>
  
	<?php
	/**
	 *
	 * This determines and displays the "previous" link
	 *
	 **/
	?>
	<?php
		function filter_prev_where( $where = '' ) {
			global $current;
			$where .= " AND post_date < '$current'";
			return $where;
		}
		add_filter( 'posts_where', 'filter_prev_where' );
	?>
	<?php $my_query = new WP_Query('posts_per_page=1&orderby=date&order=DESC'); ?>
	<?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
  	<?php 
  		/* Get the date of the current post. */
			$lastPub = get_the_date('Y/m/d');
  	?>
		<p class="previous"><a href="/<?php echo($lastPub) ?>">&laquo; Previous Edition</a></p>
	<?php endif; ?>
	<?php remove_filter( 'posts_where', 'filter_prev_where' ); ?>
	
	<?php
	/**
	 *
	 * This determines and displays the "next" link
	 *
	 **/
	?>
	<?php /* Next Link */ 
		function filter_next_where( $where = '' ) {
			global $current;
			$where .= " AND post_date > '$current 23:59:59.999999'";
			return $where;
		}
		add_filter( 'posts_where', 'filter_next_where' );
	?>
	<?php $my_query = new WP_Query('posts_per_page=1&orderby=date&order=ASC'); ?>
	<?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
  	<?php 
  		/* Get the date of the current post. */
			$lastPub = get_the_date('Y/m/d');
  	?>
		<p class="next"><a href="/<?php echo($lastPub) ?>">Next Edition &raquo;</a></p>
	<?php endif; ?>
	<?php remove_filter( 'posts_where', 'filter_next_where' ); ?>
	<div style="clear:both;"></div>

<?php else : ?>

  <h2>Not Found</h2>
  <p>Sorry, but you are looking for something that isn't here.</p>
	
<?php endif; ?>