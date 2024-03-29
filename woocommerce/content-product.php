<?php

/**
 * The template for displaying product content within loops
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
  return;
}
?>

<div class="col-md-6 col-lg-4 col-xxl-3 mb-4">
  <div <?php wc_product_class('card h-100 d-flex text-center', $product); ?>>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10
     */
    do_action('woocommerce_before_shop_loop_item');

    /**
     * Hook: woocommerce_before_shop_loop_item_title.
     *
     * @hooked woocommerce_show_product_loop_sale_flash - 10
     * @hooked woocommerce_template_loop_product_thumbnail - 10
     */
    do_action('woocommerce_before_shop_loop_item_title');

    ?>
    <div class="card-body d-flex flex-column">
      <?php
      /**
       * Hook: woocommerce_shop_loop_item_title.
       *
       * @hooked woocommerce_template_loop_product_title - 10
       */
      do_action('woocommerce_shop_loop_item_title');

      /**
       * Hook: woocommerce_after_shop_loop_item_title.
       *
       * @hooked woocommerce_template_loop_rating - 5
       * @hooked woocommerce_template_loop_price - 10
       */
      do_action('woocommerce_after_shop_loop_item_title');

      /**
       * Hook: woocommerce_after_shop_loop_item.
       *
       * @hooked woocommerce_template_loop_product_link_close - 5
       * @hooked woocommerce_template_loop_add_to_cart - 10
       */
      do_action('woocommerce_after_shop_loop_item');
      ?>
    </div>
  </div>
</div>