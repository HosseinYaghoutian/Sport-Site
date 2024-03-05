<?php

/**
 * Order Customer Details
 */

defined('ABSPATH') || exit;

$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">

  <?php if ($show_shipping) : ?>

    <section class="row">
      <div class="col-lg-6 mb-4">

      <?php endif; ?>

      <h2 class="woocommerce-column__title"><?php esc_html_e('Billing address', 'woocommerce'); ?></h2>

      <address>
        <?php echo wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); ?>

        <?php if ($order->get_billing_phone()) : ?>
          <p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_billing_phone()); ?></p>
        <?php endif; ?>

        <?php if ($order->get_billing_email()) : ?>
          <p class="woocommerce-customer-details--email"><?php echo esc_html($order->get_billing_email()); ?></p>
        <?php endif; ?>
      </address>

      <?php if ($show_shipping) : ?>

      </div><!-- /.col-1 -->

      <div class="col-lg-6 mb-4">
        <h2 class="woocommerce-column__title"><?php esc_html_e('Shipping address', 'woocommerce'); ?></h2>
        <address>
          <?php echo wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce'))); ?>

          <?php if ($order->get_shipping_phone()) : ?>
            <p class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_shipping_phone()); ?></p>
          <?php endif; ?>
        </address>
      </div><!-- /.col-2 -->

    </section><!-- /.col2-set -->

  <?php endif; ?>

  <?php do_action('woocommerce_order_details_after_customer_details', $order); ?>

</section>