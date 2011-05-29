<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 *
 * This displays all issues for a year, from a /yyyy URL
 *
 **/
?>

<?php query_posts($query_string . '&category_name=featured&meta_key=order&order_by=date&order=ASC'); ?>
<?php if (have_posts()) : $isNewMonth = false; $lastMonth = false; $isFirst = true; ?>
	<div class="year-month">
		<?php while (have_posts()) : the_post(); ?>	
			<?php
				$isNewMonth = ($lastMonth != get_the_date('Y-m'));
				$lastMonth = get_the_date('Y-m');
			?>
			
			<?php if($isNewMonth) : ?>
				<?php if(!$isFirst) : ?></div><div class="year-month"><?php endif; $isFirst = false; ?>
					<?php /* Issue Header goes here... */ ?>
			<?php endif; ?>
			
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>"><h2><a href="<?php echo get_the_date('/Y/m/d'); ?>" rel="bookmark"><?php echo get_the_date('F jS'); ?> issue featuring <?php the_title(); ?></a> by <?php echo get_the_author(); ?></h2></article>	
			
		<?php endwhile;?>
	</div>
<?php endif; ?>