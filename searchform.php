<form action="<?php echo site_url('/funds/');?>" method="get" class="search-form">
	<div class="grid-x align-right">
		<div class="cell shrink">
		    <input type="text" name="fund-name" id="search" value="<?php the_search_query(); ?>" />
		</div>
		<div class="cell small-2">
		    <input type="submit" value="go" id="submit"></input>
		</div>
	</div>
</form>