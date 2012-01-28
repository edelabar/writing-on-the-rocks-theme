<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<?php 
	$networks = array(
		"twitter" => "Twitter",
		"facebook" => "Facebook",
		"website" => "Website",
		"goodreads" => "Goodreads",
		"googleplus" => "Google+",
		"linkedin" => "LinkedIn",
		"blog" => "Blog"
	);
	
	$customNetworks = get_post_custom();
?>
<div class="author">
	<h3 id="<?php echo $customNetworks['authorSort'][0]; ?>"><?php the_title(); ?></h3>
	<?php the_content(); ?>
	<ul class="social">
		<?php foreach ( $customNetworks as $key => $value ) { ?>
			<?php if( !preg_match( '/^(_|authorSort)/', $key ) ) { ?>
				<li class="<?php echo $key?>"><a href="<?php echo $value[0] ?>"><span><?php echo $networks[$key] ?></span></a></li>
			<?php } ?>
		<?php } ?>
	</ul>
</div>
<div style="clear:both"></div>