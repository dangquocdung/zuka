<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<input autocomplete="off" type="search" class="search-text-box" placeholder="<?php echo esc_attr_x( 'Search entire store&hellip;', 'front-view', 'zuka' ); ?>" value="" name="s" title="<?php echo esc_attr_x( 'Search for:', 'front-view', 'zuka' ); ?>" />
	<button class="search-button" type="submit"><i class="dl-icon-search10"></i></button>
	<input type="hidden" name="post_type" value="product" />
</form>
<!-- .search-form -->