<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */

// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
  <?php
    return;
  }
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
  <h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

  <nav>
    <div><?php previous_comments_link() ?></div>
    <div><?php next_comments_link() ?></div>
  </nav>

  <ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
  </ol>

  <nav>
    <div><?php previous_comments_link() ?></div>
    <div><?php next_comments_link() ?></div>
  </nav>
  
 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ( comments_open() ) : ?>
    <!-- If comments are open, but there are no comments. -->

   <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
    <p class="nocomments">Comments are closed.</p>

  <?php endif; ?>
  
<?php endif; ?>


<?php if ( comments_open() ) : ?>
	
	<hr/>

	<section id="respond">
	
	  <h3><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>
	
	  <div class="cancel-comment-reply">
	    <small><?php cancel_comment_reply_link(); ?></small>
	  </div>
	
	  <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	  	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	  <?php else : ?>
	
		  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
			  <?php if ( is_user_logged_in() ) : ?>
			
			  	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			
			  <?php else : ?>
			
				  <div>
				    <label for="author">Name<?php if ($req) echo "*"; ?></label>
				    <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				  </div>
				
				  <div>
				    <label for="email">Email<?php if ($req) echo "*"; ?> <span>(will not be displayed)</span></label>
				    <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				  </div>
				
				  <div>
				    <label for="url">Website</label>
				    <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				  </div>
			
			  <?php endif; ?>
			
			  <p id="allowed_tags" style="display: none;"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>
			
			  <div>
				  <label for="comment">Comment*</label>
			  	<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
			  </div>
			
			  <div>
			    <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
			    <?php comment_id_fields(); ?>
			  </div>
			  
			  <?php do_action('comment_form', $post->ID); ?>
		  </form>
	
	  <?php endif; // If registration required and not logged in ?>
	</section>

<?php endif; // if you delete this the sky will fall on your head ?>
