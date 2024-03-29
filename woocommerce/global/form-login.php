<?php

/**
 * Login form
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (is_user_logged_in()) {
  return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ($hidden) ? 'style="display:none;"' : ''; ?>>

  <div class="card mb-3">

    <div class="card-body">

      <?php do_action('woocommerce_login_form_start'); ?>

      <?php echo ($message) ? wpautop(wptexturize($message)) : ''; // @codingStandardsIgnoreLine 
      ?>

      <p class="form-row form-row-first">
        <label for="username"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input type="text" class="input-text form-control" name="username" id="username" autocomplete="username" />
      </p>
      <p class="form-row form-row-last">
        <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
        <input class="input-text form-control" type="password" name="password" id="password" autocomplete="current-password" />
      </p>
      <div class="clear"></div>

      <?php do_action('woocommerce_login_form'); ?>

      <div class="form-check mb-3">
        <input name="rememberme" type="checkbox" class="form-check-input" id="rememberme" value="forever" />
        <label class="form-check-label" for="rememberme"><?php _e('Remember me', 'woocommerce'); ?></label>
      </div>

      <p class="form-row">
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
        <input type="hidden" name="redirect" value="<?php echo esc_url($redirect) ?>" />
        <button type="submit" class="btn btn-outline-primary" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>

      </p>
      <p class="lost_password mt-3 mb-0">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
      </p>

      <div class="clear"></div>

      <?php do_action('woocommerce_login_form_end'); ?>

    </div><!-- card-body -->

  </div><!-- card -->

</form>