<?php
	if( isset( $custom['_embedAuthor'][0] ) ) {
		$embedAuthor = $custom['_embedAuthor'][0];
		$my_query = new WP_Query('name='.$embedAuthor);
?>
	<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="embedAuthor">
				<h2>About the Author</h2>
				<?php include('author.php') ?>
			</div>
	<?php endwhile; ?>
<?php 
	}
?>