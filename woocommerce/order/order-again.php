<?php

/**
 * Order again button
 */

defined('ABSPATH') || exit;
?>

<p class="order-again">
  <a href="<?php echo esc_url($order_again_url); ?>" class="btn btn-primary"><?php esc_html_e('Order again', 'woocommerce'); ?></a>
</p>