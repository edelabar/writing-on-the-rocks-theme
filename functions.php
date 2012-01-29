<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */

if( !is_admin() ){ 
	// jQuery is included at the end of the doc, don't let plugins include it.
	wp_deregister_script('jquery');
	wp_deregister_script('l10n');
}

/* Externalize WP_HashCache JavaScript to script.js (prevent from adding to head) */
remove_action('wp_head', 'wphc_posthead');

function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );

function process_bloginfo($text) {
	
	if( get_bloginfo( 'description' ) == $text ) {
		$pattern = '/&amp;/i';
		$replacement = '<span class="amp">&amp;</span>';
		$text = preg_replace($pattern, $replacement, $text);
	
		$pattern = '/{br}/i';
		$replacement = '<br/>';
		$text = preg_replace($pattern, $replacement, $text);
	}
	
	return $text;
}
add_filter('bloginfo', 'process_bloginfo');

// Custom HTML5 Comment Markup
function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
?>
	<li>
  	<article <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<header class="comment-author vcard">
				<?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<em><?php _e('Your comment is awaiting moderation.') ?></em>
				<br />
			<?php endif; ?>
			
			<?php comment_text() ?>
			
			<nav>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</nav>
			
			<footer>
				<time><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a></time>
			</footer>
		</article>
	<!-- </li> is added by wordpress automatically -->
<?php
}

automatic_feed_links();

// Widgetized Sidebar HTML5 Markup
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<section>',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_bloginfo('template_url')."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}

function myFeedExcluder($query) {
 	if ($query->is_feed) {
   		$query->set('cat',RSS_EXCLUDE); // Defined in wp-config.php
 	}
	return $query;
}
add_filter('pre_get_posts','myFeedExcluder');