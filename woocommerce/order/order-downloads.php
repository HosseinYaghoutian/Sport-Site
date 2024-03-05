<?php

/**
 * Order Downloads
 */

if (!defined('ABSPATH')) {
  exit;
}
?>
<section class="woocommerce-order-downloads">
  <?php if (isset($show_title)) : ?>
    <h2 class="woocommerce-order-downloads__title"><?php esc_html_e('Downloads', 'woocommerce'); ?></h2>
  <?php endif; ?>

  <table class="rounded woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
    <thead>
      <tr>
        <?php foreach (wc_get_account_downloads_columns() as $column_id => $column_name) : ?>
          <th class="<?php echo esc_attr($column_id); ?>"><span class="nobr"><?php echo esc_html($column_name); ?></span></th>
        <?php endforeach; ?>
      </tr>
    </thead>

    <?php foreach ($downloads as $download) : ?>
      <tr>
        <?php foreach (wc_get_account_downloads_columns() as $column_id => $column_name) : ?>
          <td class="<?php echo esc_attr($column_id); ?>" data-title="<?php echo esc_attr($column_name); ?>">
            <?php
            if (has_action('woocommerce_account_downloads_column_' . $column_id)) {
              do_action('woocommerce_account_downloads_column_' . $column_id, $download);
            } else {
              switch ($column_id) {
                case 'download-product':
                  if ($download['product_url']) {
                    echo '<a href="' . esc_url($download['product_url']) . '">' . esc_html($download['product_name']) . '</a>';
                  } else {
                    echo esc_html($download['product_name']);
                  }
                  break;
                case 'download-file':
                  echo '<a href="' . esc_url($download['download_url']) . '" class="woocommerce-MyAccount-downloads-file btn btn-outline-primary btn-sm">' . esc_html($download['download_name']) . '</a>';
                  break;
                case 'download-remaining':
                  echo is_numeric($download['downloads_remaining']) ? esc_html($download['downloads_remaining']) : esc_html__('&infin;', 'woocommerce');
                  break;
                case 'download-expires':
                  if (!empty($download['access_expires'])) {
                    echo '<time datetime="' . esc_attr(date('Y-m-d', strtotime($download['access_expires']))) . '" title="' . esc_attr(strtotime($download['access_expires'])) . '">' . esc_html(date_i18n(get_option('date_format'), strtotime($download['access_expires']))) . '</time>';
                  } else {
                    esc_html_e('Never', 'woocommerce');
                  }
                  break;
              }
            }
            ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </table>
</section>