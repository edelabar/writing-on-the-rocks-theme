<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 *
 * This displays all issues for a month, from a /yyyy/mm URL
 *
 **/
?>

<?php query_posts($query_string . '&category_name=interview,review,soapbox&meta_key=order&order_by=meta_value_num&order=ASC'); ?>
<?php if (have_posts()) : $isNewDay = false; $lastDate = false; $isFirst = true; ?>
	<div class="month-day">
		<?php while (have_posts()) : the_post(); ?>	
			<?php
				$isNewDay = ($lastDate != get_the_date('Y-m-d'));
				$lastDate = get_the_date('Y-m-d');
			?>
			
			<?php if($isNewDay) : ?>
				<?php if(!$isFirst) : ?></div><div class="month-day"><?php endif; $isFirst = false; ?>
					<?php /* Issue Header goes here... */ ?>
					<h1><?php echo get_the_date('Y-m-d'); ?></h1>
			<?php endif; ?>
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>"><h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2></article>	
			
		<?php endwhile;?>
	</div>
<?php endif; ?>