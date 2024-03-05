<?php

/**
 * Loop Add to Cart
 */

if (!defined('ABSPATH')) {
  exit;
}

global $product;

echo apply_filters(
  'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
  sprintf(
    '<div class="add-to-cart-container mt-auto"><a href="%s" data-quantity="%s" class="%s product_type_%s single_add_to_cart_button btn btn-primary d-block %s" %s> %s</a></div>',
    esc_url($product->add_to_cart_url()),
    esc_attr(isset($args['quantity']) ? $args['quantity'] : 1),
    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
    esc_attr($product->get_type()),
    $product->get_type() == 'simple' ? 'ajax_add_to_cart' : '',
    isset($args['attributes']) ? wc_implode_html_attributes($args['attributes']) : '',
    esc_html($product->add_to_cart_text())
  ),
  $product,
  $args
);
