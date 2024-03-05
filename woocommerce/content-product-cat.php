<?php

/**
 * The template for displaying product category thumbnails within loops
 */

if (!defined('ABSPATH')) {
  exit;
}
?>
<div <?php wc_product_cat_class('col-md-6 col-lg-4 col-xxl-3 mb-4', $category); ?>>

  <div class="card h-100">

    <?php
    /**
     * The woocommerce_before_subcategory hook.
     *
     * @hooked woocommerce_template_loop_category_link_open - 10
     */
    do_action('woocommerce_before_subcategory', $category);

    /**
     * The woocommerce_before_subcategory_title hook.
     *
     * @hooked woocommerce_subcategory_thumbnail - 10
     */
    do_action('woocommerce_before_subcategory_title', $category);

    ?>
    <div class="card-body d-flex flex-column">
      <?php

      /**
       * The woocommerce_shop_loop_subcategory_title hook.
       *
       * @hooked woocommerce_template_loop_category_title - 10
       */
      do_action('woocommerce_shop_loop_subcategory_title', $category);

      /**
       * The woocommerce_after_subcategory_title hook.
       */
      do_action('woocommerce_after_subcategory_title', $category);

      /**
       * The woocommerce_after_subcategory hook.
       *
       * @hooked woocommerce_template_loop_category_link_close - 10
       */
      do_action('woocommerce_after_subcategory', $category);
      ?>
    </div>
  </div>

</div>