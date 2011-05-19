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
<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/style.css") ?>
<?php /* versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/handheld.css", 'media="handheld"') */ ?>
<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/modernizr-1.7.min.js") ?>
<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/respond.min.js") ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="container">

	<header role="banner">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</header>