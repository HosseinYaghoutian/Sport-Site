<?php

/**
 * Single Product tabs
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($product_tabs)) : ?>

  <div class="woocommerce-tabs wc-tabs-wrapper">
    <div class="tab-scroller d-flex overflow-auto">
      <ul class="wc-tabs nav nav-tabs mb-4 flex-grow-1" role="tablist">
        <?php foreach ($product_tabs as $key => $product_tab) : ?>
          <li class="nav-item <?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">
            <a class="nav-link" href="#tab-<?php echo esc_attr($key); ?>">
              <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php foreach ($product_tabs as $key => $product_tab) : ?>
      <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr($key); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
        <?php
        if (isset($product_tab['callback'])) {
          call_user_func($product_tab['callback'], $key, $product_tab);
        }
        ?>
      </div>
    <?php endforeach; ?>

    <?php do_action('woocommerce_product_after_tabs'); ?>
  </div>

<?php endif; ?>