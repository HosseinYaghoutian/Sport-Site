<?php

/**
 * Review Comments Template
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">

  <div id="comment-<?php comment_ID(); ?>" class="comment-body mt-4 d-flex">

    <div class="flex-shrink-0 me-3">
      <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'img-thumbnail rounded-circle')); ?>
    </div>

    <div class="comment-content">
      <div class="card">
        <div class="card-body">

          <?php
          /**
           * The woocommerce_review_before_comment_meta hook.
           *
           * @hooked woocommerce_review_display_rating - 10
           */
          do_action('woocommerce_review_before_comment_meta', $comment);

          /**
           * The woocommerce_review_meta hook.
           *
           * @hooked woocommerce_review_display_meta - 10
           */
          do_action('woocommerce_review_meta', $comment);

          do_action('woocommerce_review_before_comment_text', $comment);

          /**
           * The woocommerce_review_comment_text hook
           *
           * @hooked woocommerce_review_display_comment_text - 10
           */
          do_action('woocommerce_review_comment_text', $comment);

          do_action('woocommerce_review_after_comment_text', $comment);
          ?>
        </div>
      </div>
    </div>

  </div>