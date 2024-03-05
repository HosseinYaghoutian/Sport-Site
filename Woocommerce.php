<?php
  /*
    * Template Name: فروشگاه
  */
?>

<?php 
  get_header('woocommerce');
?>

<div id="content" class="site-content container py-5 mt-4">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">

      <!-- Breadcrumb -->
      <?php woocommerce_breadcrumb(); ?>
      <div class="row">
        <div class="col">
          <?php woocommerce_content(); ?>
        </div>
        <!-- sidebar -->
        <?php get_sidebar(); ?>
        <!-- row -->
      </div>
    </main><!-- #main -->
  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
