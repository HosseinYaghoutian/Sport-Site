<?php

/**
 * Product loop sale flash
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ($product->is_on_sale()) : ?>

	<?php echo apply_filters('woocommerce_sale_flash', '<span class="badge bg-danger sale">%</span>', $post, $product); ?>

<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
