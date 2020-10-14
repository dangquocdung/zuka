<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?><form method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input autocomplete="off" type="search" class="search-text-box" placeholder="<?php echo esc_attr_x( 'Search here&hellip;', 'front-view', 'zuka' ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'front-view', 'zuka' ); ?>" />
	<button class="search-button" type="submit"><i class="dl-icon-search10"></i></button>
</form>
<!-- .search-form -->
