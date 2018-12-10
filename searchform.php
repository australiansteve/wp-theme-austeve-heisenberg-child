<form action="/" method="get">
	<div class="grid-x grid-margin-x">
		<div class="cell small-10">
		    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		</div>
		<div class="cell small-2">
		    <input type="submit" value="go"></input>
		</div>
	</div>
</form>