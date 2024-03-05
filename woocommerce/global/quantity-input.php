<?php

/**
 * Product quantity inputs
 */

defined('ABSPATH') || exit;

if ($max_value && $min_value === $max_value) {
?>
  <div class="quantity hidden">
    <input type="hidden" id="<?php echo esc_attr($input_id); ?>" class="qty" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($min_value); ?>" />
  </div>
<?php
} else {
  /* translators: %s: Quantity. */
  $label = !empty($args['product_name']) ? sprintf(esc_html__('%s quantity', 'woocommerce'), wp_strip_all_tags($args['product_name'])) : esc_html__('Quantity', 'woocommerce');
?>
  <div class="quantity input-group">
    <?php do_action('woocommerce_before_quantity_input_field'); ?>
    <button type="button" class="input-group-text qty_button minus">-</button>
    <label class="screen-reader-text" for="<?php echo esc_attr($input_id); ?>"><?php esc_html_e('Quantity', 'woocommerce'); ?></label>
    <input type="number" id="<?php echo esc_attr($input_id); ?>" class="input-text qty text form-control" step="<?php echo esc_attr($step); ?>" min="<?php echo esc_attr($min_value); ?>" max="<?php echo esc_attr(0 < $max_value ? $max_value : ''); ?>" name="<?php echo esc_attr($input_name); ?>" value="<?php echo esc_attr($input_value); ?>" title="<?php echo esc_attr_x('Qty', 'Product quantity input tooltip', 'woocommerce'); ?>" size="4" pattern="<?php echo esc_attr($pattern); ?>" inputmode="<?php echo esc_attr($inputmode); ?>" />
    <button type="button" class="input-group-text qty_button plus">+</button>
    <?php do_action('woocommerce_after_quantity_input_field'); ?>
  </div>
<?php
}
