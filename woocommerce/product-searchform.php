<?php

/**
 * The template for displaying product search form
 */

if (!defined('ABSPATH')) {
  exit;
}

?>
<form role="search" method="get" class="searchform woocommerce-product-search" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="input-group">
    <input class="form-control" type="search" id="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>" class="search-field field form-control" placeholder="<?php echo esc_attr__('Search products...', 'woocommerce'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    <label class="visually-hidden-focusable" for="woocommerce-product-search-field-<?php echo isset($index) ? absint($index) : 0; ?>"><?php esc_html_e('Search for:', 'woocommerce'); ?></label>
    <input type="hidden" name="post_type" value="product" />
    <button class="input-group-text btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i><span class="visually-hidden-focusable">Search</span></button>
  </div>
</form>