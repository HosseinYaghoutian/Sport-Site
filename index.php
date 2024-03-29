<?php
  /*
    Template Name: بلاگ
  */
?>

<?php
  get_header();
?>

<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>
    <div class="row">
      <div class="col">
      
        <main id="main" class="site-main">

        

          <!-- Title & Description -->
          <header class="page-header mb-4">
            <h1><?php the_archive_title(); ?></h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
          </header>

          <!-- Grid Layout -->
          <?php
            $args = array(get_post_args($post_type, $posts_per_page=6, $offset=0));
            $the_query = new WP_Query($args);
          ?>  
          <?php if (have_posts()) : ?>

            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
              <div class="card horizontal mb-4">
                <div class="row">
                  <!-- Featured Image-->
                  <?php if (has_post_thumbnail())
                    echo '<div class="card-img-left-md col-lg-5">' . get_the_post_thumbnail(null, 'medium') . '</div>';
                  ?>
                  <div class="col">
                    <div class="card-body">

                      <?php bootscore_category_badge(); ?>

                      <!-- Title -->
                      <h2 class="blog-post-title">
                        <a href="<?php the_permalink(); ?>">
                          <?php the_title(); ?>
                        </a>
                      </h2>
                      <!-- Meta -->
                      <?php if ('post' === get_post_type()) : ?>
                        <small class="text-muted mb-2">
                          <?php
                          bootscore_date();
                          bootscore_author();
                          bootscore_comments();
                          bootscore_edit();
                          ?>
                        </small>
                      <?php endif; ?>
                      <!-- Excerpt & Read more -->
                      <div class="card-text mt-auto">
                        <?php the_excerpt(); ?> <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('ادامه مطلب »'); ?></a>
                      </div>
                      <!-- Tags -->
                      <?php bootscore_tags(); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            
            <?php wp_reset_postdata(); ?> 

          <?php endif; ?>
          <?php wp_reset_postdata();?>            
          <!-- Pagination -->
          <div>
            <?php bootscore_pagination(); ?>
          </div>

        </main><!-- #main -->

      </div><!-- col -->

      <?php get_sidebar('2'); ?>
    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->


<?php


get_footer();


