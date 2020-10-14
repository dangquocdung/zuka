<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>
<form method="get" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
    <?php
    $args = array(
        'show_option_all'    => esc_attr_x('All', 'front-view', 'zuka'),
        'name'               => 'cat',
        'id'                 => 'sf_select_category',
        'hierarchical'       => true,
        'value_field'        => 'slug'
    );
    if( function_exists('WC') ) {
        $args['name'] = 'product_cat';
        $args['taxonomy'] = 'product_cat';
    }
    ?>
    <div class="sf-fields">
        <div class="sf-field sf-field-select"><?php wp_dropdown_categories($args); ?></div>
        <div class="sf-field sf-field-input">
            <input autocomplete="off" type="search" class="search-text-box" placeholder="<?php echo esc_attr_x( 'Search here&hellip;', 'front-view', 'zuka' ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'front-view', 'zuka' ); ?>" />
            <?php if(function_exists('WC')): ?>
                <input type="hidden" name="post_type" value="product"/>
            <?php endif; ?>
        </div>
        <button class="search-button" type="submit"><i class="dl-icon-search10"></i></button>
    </div>
</form>
<!-- .search-form -->
