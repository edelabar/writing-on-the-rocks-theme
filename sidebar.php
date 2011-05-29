<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<aside id="sidebar">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	  <section>
	    <?php get_search_form(); ?>
	  </section>

	<?php endif; ?>
</aside>

