<?php

/**
 * Show error messages
 */

if (!defined('ABSPATH')) {
  exit;
}

if (!$notices) {
  return;
}

?>

<?php foreach ($notices as $notice) : ?>
  <div class="woocommerce-message alert alert-danger" <?php echo wc_get_notice_data_attr($notice); ?>>
    <?php echo wc_kses_notice($notice['notice']); ?>
  </div>
<?php endforeach; ?>