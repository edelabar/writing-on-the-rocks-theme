<?php
/**
 * @package WordPress
 * @subpackage Writing_on_the_Rocks
 */
?>
<aside id="sidebar">
  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

	  <section>
	    <?php get_search_form(); ?>
	  </section>
	  
	  <section>
	  	<div id="socialWrapper">
		  	<div class="facebook">
		  		<div class="fb-like" data-href="https://www.facebook.com/KarenDeLabarWriter" data-send="false" data-width="300" data-show-faces="false" data-colorscheme="dark"></div>
		  	</div>
		  	
		  	<div class="pubwrite">
		  		<a href="http://www.pubwritegroup.com/"><img src="/wp-content/themes/writing-on-the-rocks/img/pubwritenetwork.png" alt="Proud Member of the #pubwrite Network"/></a>
		  	</div>
		  	
		  	<div class="google">
					<!-- Place this tag where you want the +1 button to render -->
					<g:plusone href="http://writingontherocks.com/"></g:plusone>
		  	</div>
	  	</div>
	  </section>

	<?php endif; ?>
</aside>

