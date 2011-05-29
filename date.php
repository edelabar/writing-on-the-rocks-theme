<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */

get_header(); ?>

<div id="main" role="main" class="date">
	<?php if (is_day()) { ?>	  	
		<?php include('include/date-day.php') ?>
	<?php } else if (is_month()) { ?>
		<?php include('include/date-month.php') ?>
	<?php } else if (is_year()) { ?>
		<?php include('include/date-year.php') ?>
	<?php } ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
