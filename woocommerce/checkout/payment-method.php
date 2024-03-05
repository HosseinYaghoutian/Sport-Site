<?php

/**
 * Output a single payment method
 */

if (!defined('ABSPATH')) {
  exit;
}
?>
<li class="list-unstyled wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">

  <div class="form-check mb-3">
    <input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio form-check-input" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
    <label class="form-check-label" for="payment_method_<?php echo esc_attr($gateway->id); ?>">
      <?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> <?php echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
    </label>
  </div>

  <?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
    <div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (!$gateway->chosen) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;" <?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
      <?php $gateway->payment_fields(); ?>
    </div>
  <?php endif; ?>
</li>