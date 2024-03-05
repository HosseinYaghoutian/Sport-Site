<?php

/**
 * Empty cart page
 */

defined('ABSPATH') || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action('woocommerce_cart_is_empty');

if (wc_get_page_id('shop') > 0) : ?>
  <p class="return-to-shop">
    <a class="btn btn-outline-primary" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
      <?php esc_html_e('Return to shop', 'woocommerce'); ?>
    </a>
  </p>
<?php endif; ?>