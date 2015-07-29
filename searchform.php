<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<div class="row">
		<div class="large-12 columns">
			<input type="text" placeholder="What are you searching for?" value="<?php echo get_search_query(); ?>" name="s" id="s"/>
			<button class="button small"><?php echo esc_attr_x('Search', 'submit button'); ?></button>
		</div>
	</div>
</form>