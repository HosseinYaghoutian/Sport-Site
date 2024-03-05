<?php

/**
 * Checkout coupon form
 */

defined('ABSPATH') || exit;

if (!wc_coupons_enabled()) { // @codingStandardsIgnoreLine.
  return;
}

?>
<div class="woocommerce-form-coupon-toggle">
  <?php wc_print_notice(apply_filters('woocommerce_checkout_coupon_message', esc_html__('Have a coupon?', 'woocommerce') . ' <a href="#" class="showcoupon">' . esc_html__('Click here to enter your code', 'woocommerce') . '</a>'), 'notice'); ?>
</div>

<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

  <div class="card">

    <div class="card-body">

      <p><?php esc_html_e('If you have a coupon code, please apply it below.', 'woocommerce'); ?></p>

      <div class="input-group">
        <input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e('Coupon code', 'woocommerce'); ?>" />
        <button type="submit" class="input-group-text btn btn-outline-primary" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>"><?php esc_attr_e('Apply coupon', 'woocommerce'); ?></button>
        <?php do_action('woocommerce_cart_coupon'); ?>
      </div>

      <div class="clear"></div>

    </div><!-- card-body -->

  </div><!-- card -->

</form>