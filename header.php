<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 ieLte8 ieLte7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 ieLte8 ieLte7" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 ieLte8" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."style.css") ?>
<script type="text/javascript" src="http://use.typekit.com/are0cfr.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/modernizr-1.7.min.js") ?>
<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/respond.min.js") ?>
<?php global $canonical, $issue; ?>
<?php if( isset($canonical) ): ?><link rel="canonical" href="<?php echo get_option('home') . $canonical; ?>"/><?php endif; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=247952161881471";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="container">

	<header role="banner" id="banner">
		<div class="bannerWrapper">
			<a href="<?php echo get_option('home'); ?>/" class="logo"><h1><span class="writing">Writing</span> <span class="onthe">on the</span> <span class="rocks">Rocks</span></h1></a>
			<div class="bubble">
				<p class="description"><?php bloginfo('description'); ?></p>				 	
		  	<ul class="social">
		  		<li><a href="http://writingontherocks.com/feed/rss"><img src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"].'img/rss.png' ?>" alt="RSS"/></a></li>
		  		<li><a href="https://www.facebook.com/KarenDeLabarWriter"><img src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"].'img/facebook.png' ?>" alt="Facebook"/></a></li>
		  		<li><a href="http://twitter.com/KarenDeLabar"><img src="<?php echo $GLOBALS["TEMPLATE_RELATIVE_URL"].'img/twitter.png' ?>" alt="Twitter"/></a></li>
		  	</ul>
	  	</div>
		</div>
	  <nav role="navigation">
	  	<h2 class="visuallyhidden">Main Navigation</h2>
	  	<ul>
	  		<li><a href="http://writingontherocks.com/">Home</a></li>
	  		<li><a href="http://writingontherocks.com/category/blog">Blog</a></li>
	  		<li><a href="http://writingontherocks.com/category/review">Reviews</a></li>
	  		<li><a href="http://writingontherocks.com/category/interview">Interviews</a></li>
	  		<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
	  	</ul> 
	  </nav>
	</header>