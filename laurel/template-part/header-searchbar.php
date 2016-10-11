<div class='search-toggle'>
	<i class='fa fa-search'></i>
</div>
<div class='searchform'>
	<form role='search' method='get' class='search-form' action='<?php echo home_url( '/' ); ?>'>
		<label>
			<span class='screen-reader-text'><?php echo __( 'Search for:', 'laurel' ) ?></span>
			<input type='search' class='search-field' placeholder='<?php echo esc_attr__( 'Search...', 'laurel' ) ?>' value='<?php echo get_search_query() ?>' name='s' title='<?php echo esc_attr_x( 'Search for:', 'label' ) ?>' />
		</label>
	</form>
</div>
