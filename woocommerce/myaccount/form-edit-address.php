<?php

/**
 * Edit address form
 */

defined('ABSPATH') || exit;

$page_title = ('billing' === $load_address) ? __('Billing address', 'woocommerce') : __('Shipping address', 'woocommerce');

do_action('woocommerce_before_edit_account_address_form'); ?>

<?php if (!$load_address) : ?>
  <?php wc_get_template('myaccount/my-address.php'); ?>
<?php else : ?>

  <form method="post">

    <h3><?php echo apply_filters('woocommerce_my_account_edit_address_title', $page_title, $load_address); ?></h3><?php // @codingStandardsIgnoreLine 
                                                                                                                  ?>

    <div class="woocommerce-address-fields">
      <?php do_action("woocommerce_before_edit_address_form_{$load_address}"); ?>

      <div class="woocommerce-address-fields__field-wrapper">
        <?php
        foreach ($address as $key => $field) {
          woocommerce_form_field($key, $field, wc_get_post_data_by_key($key, $field['value']));
        }
        ?>
      </div>

      <?php do_action("woocommerce_after_edit_address_form_{$load_address}"); ?>

      <p>
        <button type="submit" class="btn btn-outline-primary" name="save_address" value="<?php esc_attr_e('Save address', 'woocommerce'); ?>"><?php esc_html_e('Save address', 'woocommerce'); ?></button>
        <?php wp_nonce_field('woocommerce-edit_address', 'woocommerce-edit-address-nonce'); ?>
        <input type="hidden" name="action" value="edit_address" />
      </p>
    </div>

  </form>

<?php endif; ?>

<?php do_action('woocommerce_after_edit_account_address_form'); ?>