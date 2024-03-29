<?php

/**
 * Pagination - Show numbered pagination for catalog pages
 */

if (!defined('ABSPATH')) {
  exit;
}

$total   = isset($total) ? $total : wc_get_loop_prop('total_pages');
$current = isset($current) ? $current : wc_get_loop_prop('current_page');
$base    = isset($base) ? $base : esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false))));
$format  = isset($format) ? $format : '';

if ($total <= 1) {
  return;
}
?>
<!-- Pagination -->
<div>
  <?php bootscore_pagination(); ?>
</div>