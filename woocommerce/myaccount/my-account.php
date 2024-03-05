<?php

/**
 * My Account page
 */

defined('ABSPATH') || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
do_action('woocommerce_account_navigation'); ?>


<div class="col-md-8">
  <div class="woocommerce-MyAccount-content">
    <?php
    /**
     * My Account content.
     *
     * @since 2.6.0
     */
    do_action('woocommerce_account_content');
    ?>
  </div>
</div>

</div><!-- row navigation.php -->