<?php

/**
 * My Account navigation
 */

if (!defined('ABSPATH')) {
  exit;
}

do_action('woocommerce_before_account_navigation');
?>


<div class="row mt-3">
  <!-- End in my-account.php -->
  <div class="col-md-4">
    <nav class="woocommerce-MyAccount-navigation" role="navigation">
      <div class="list-group mb-4">
        <?php foreach (wc_get_account_menu_items() as $endpoint => $label) : ?>
          <a href="<?php echo esc_url(wc_get_account_endpoint_url($endpoint)); ?>" class="list-group-item list-group-item-action"><?php echo esc_html($label); ?></a>
        <?php endforeach; ?>
      </div>
    </nav>
  </div>

  <?php do_action('woocommerce_after_account_navigation'); ?>