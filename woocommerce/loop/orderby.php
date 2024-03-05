<?php

/**
 * Show options for ordering
 */

if (!defined('ABSPATH')) {
  exit;
}

?>

<div class="col-md-6 col-lg-4 col-xxl-3 mb-4">

  <form class="woocommerce-ordering" method="get">
    <select name="orderby" class="orderby custom-select" aria-label="<?php esc_attr_e('Shop order', 'bootscore'); ?>">
      <?php foreach ($catalog_orderby_options as $id => $name) : ?>
        <option value="<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?php echo esc_html($name); ?></option>
      <?php endforeach; ?>
    </select>
    <input type="hidden" name="paged" value="1" />
    <?php wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); ?>
  </form>

</div>
</div><!-- row in result-count-php -->