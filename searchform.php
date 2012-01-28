<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<div>
		<label class="screen-reader-text" for="s">Search Writing on the Rocks:</label>
		<input type="search" value="<?php the_search_query(); ?>" name="s" id="s" class="searchfield" results="5"/>
		<input type="submit" id="searchsubmit" value="Search" class="searchbutton btn"/>
	</div>
</form