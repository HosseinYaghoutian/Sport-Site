<?php

/**
 * Loop Price
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}

global $product;
?>

<?php if ($price_html = $product->get_price_html()) : ?>
  <div class="price mb-3"><?php echo $price_html; ?></div>
<?php endif; ?>