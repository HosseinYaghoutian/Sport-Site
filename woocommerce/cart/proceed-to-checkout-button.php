<?php

/**
 * Proceed to checkout button
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn btn-primary btn-lg d-block">
  <?php esc_html_e('Proceed to checkout', 'woocommerce'); ?>
</a>