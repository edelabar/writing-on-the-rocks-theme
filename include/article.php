<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<?php include_once "markdown.php"; ?>
<div <?php post_class('spacer') ?>>
	<article id="post-<?php the_ID(); ?>" class="<?php echo get_post_meta(get_the_ID(), 'pageClass', true); ?>">
		<header>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php if( !in_category( 'upcoming' ) ) { ?>
			<div>
				<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
				<span class="author"><?php if( in_category( 'edited' ) ) { ?>Edited <?php } ?>by <?php the_author() ?></span>
			</div>
			<?php } ?>
		</header>
		
		<?php 
		
		$moreText = 'Read more &raquo;';
		if( in_category( 'interview' ) ) {
		
		$moreText = 'Continue the Interview &raquo;';
		
		} else if( in_category( 'review' ) ) {
		
		$moreText = 'Continue the Review &raquo;';
		
		} else if( in_category( 'soapbox' ) ) {
		
		$moreText = 'Continue the Article &raquo;';
		
		}
		?>
			
			
			<?php 
				$custom = get_post_custom();
				$italic = "";
				if( isset($custom['_italicIntro'][0]) && $custom['_italicIntro'][0] == 'true') {
					$italic = 'italic';
				}
				
				if( isset($custom['_imageUrl'][0]) ) { 
			?>
				
				<img class="alignleft post-image" src="<?php echo $custom['_imageUrl'][0]; ?>" alt="<?php echo $custom['_imageAlt'][0]; ?>"/>
				
			<?php 
				} 
			?>
		
		<section>	
			<?php if( isset($custom['_content'][0]) ) { ?>
				
				<section class="intro <?php echo $italic; ?>">
				
					<?php echo Markdown($custom['_content'][0]); ?>
				
				</section>
				
			<?php } ?>
			
			<?php the_content($moreText); ?>
			
			<?php if( is_single() ) { ?>
				<?php  
					$dateString = 'year=' . get_the_date('Y') . '&monthnum=' . get_the_date('n') . '&day=' . get_the_date('j');
				?>
				<?php include('embed-author.php') ?>
				<?php include('embed-upcoming.php') ?>
			<?php } ?>
		</section>
		
		<div style="clear:both;"></div>
	</article>
	
	<?php if( is_single() ) { ?>
		<div class="comments">
			<?php comments_template(); ?>
		</div>
	<?php } ?>
</div>