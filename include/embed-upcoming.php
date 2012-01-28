<?php
	$q = 'category_name=upcoming&post_status=publish&posts_per_page=1&'.$dateString;
	$my_upcoming_query = new WP_Query($q);
?>
<?php while ($my_upcoming_query->have_posts()) : $my_upcoming_query->the_post(); ?>
	<div class="embedUpcoming">
		<?php include('upcoming.php') ?>
	</div>
<?php endwhile; ?>