<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
get_header(); ?>

<div id="main" role="main" class="category">
	<?php 
		query_posts( 
			array(  
				'posts_per_page' => '-1',
            	'order'     => 'ASC',
            	'meta_key' => 'authorSort',
            	'orderby'   => 'meta_value'
    		) 
    	); ?>
	<?php if (have_posts()) : ?>  	
      
  		<div <?php post_class('spacer') ?>>
			<article id="featured-authors">
	  			<header>
	    			<h2><?php single_cat_title(); ?></h2>
	  			</header>
	  			
				<?php while (have_posts()) : the_post(); ?>
				
					<?php include('include/author.php') ?>
					
				<?php endwhile; ?>
	  			
	  			<div style="clear:both;"></div>
			</article>
		</div>
	
		<div style="clear:both;"></div>
	
	<?php else : ?>

    	<h2>Not Found</h2>
    	<p>Sorry, but you are looking for something that isn't here.</p>
    	<?php get_search_form(); ?>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>


