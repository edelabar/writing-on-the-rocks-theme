<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>

	<footer>
		<p><?php bloginfo('name'); ?> is Copyright &copy;2011, all rights reserved.</p>
	</footer>
  
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"] ?>js/jquery-1.6.1.min.js">\x3C/script>')</script>
<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/script.js") ?>
<?php wp_footer(); ?>
<script>
var _gaq=[['_setAccount','UA-23355970-1'],['_trackPageview'],['_trackPageLoadTime']];
(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
</body>
</html>