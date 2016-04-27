<form method="get" class="search-form cf" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="search-form--label">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'ggstyle' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'search', 'placeholder', 'ggstyle' ); ?>" value="<?php get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'ggstyle' ); ?>" />
	</label>
	<input alt="Search Button" class="search-submit" src="<?php echo get_template_directory_uri(); ?>/img/icon__search.png" type="image" />
</form>