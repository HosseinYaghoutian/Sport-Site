<?php
/**
 * functions & definitions
*/

// WooCommerce
  require get_template_directory() . '/woocommerce/woocommerce-functions.php';
// WooCommerce END


// Setup 
  if (!function_exists('setup')) :
    function setup() {
      load_theme_textdomain('sats', get_template_directory() . '/languages');
      add_theme_support('automatic-feed-links');
      add_theme_support('title-tag');
      add_theme_support('post-thumbnails');
      add_theme_support('html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      ));
      add_theme_support('customize-selective-refresh-widgets');
      add_post_type_support('page', 'excerpt');
    }
  endif;
  add_action('after_setup_theme', 'setup');
// 


// require
  /**
   * Custom template tags for this theme.
   */
  require get_template_directory() . '/inc/template-tags.php';
  /**
   * Functions which enhance the theme by hooking into WordPress.
   */
  require get_template_directory() . '/inc/template-functions.php';
  /**
   * Load Jetpack compatibility file.
   */
  if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
  }
// require End


//Enqueue scripts and styles
  function loadfiles() {
    // Get modification time. Enqueue files with modification date to prevent browser from loading cached scripts and styles when file content changes.
    $modificated_styleCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/style.css'));
    if (file_exists(get_template_directory() . '/css/main.css')) {
      $modificated_bootscoreCss = date('YmdHi', filemtime(get_template_directory() . '/css/main.css'));
    } else {
      $modificated_bootscoreCss = 1;
    }
    $modificated_fontawesomeCss = date('YmdHi', filemtime(get_template_directory() . '/fontawesome/css/all.min.css'));

    $modificated_fontCss = date('YmdHi', filemtime(get_template_directory() . '/font/css/font.css'));

    $modificated_bootstrapJs = date('YmdHi', filemtime(get_template_directory() . '/js/lib/bootstrap.bundle.min.js'));

    $modificated_mdbJs = date('YmdHi', filemtime(get_template_directory() . '/js/lib/mdb.min.js'));

    $modificated_themeJs = date('YmdHi', filemtime(get_template_directory() . '/js/theme.js'));

    $modificated_rtlCss = date('YmdHi', filemtime(get_template_directory() . '/rtl.css'));

    // Style CSS
    wp_enqueue_style('bootscore-style', get_stylesheet_uri(), array(), $modificated_styleCss);

    // bootScore
    require_once 'inc/scss-compiler.php';
    bootscore_compile_scss();
    wp_enqueue_style('main', get_template_directory_uri() . '/css/main.css', array(), $modificated_bootscoreCss);

    // Fontawesome
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/fontawesome/css/all.min.css', array(), $modificated_fontawesomeCss);

    // Font
    wp_enqueue_style('font', get_template_directory_uri() . '/font/css/font.css', array(), $modificated_fontCss);

    // Bootstrap JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), $modificated_bootstrapJs, true);

    // mdb JS
    //wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/lib/mdb.min.js', array(), $modificated_mdbJs, true);

    // Theme JS
    wp_enqueue_script('bootscore-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), $modificated_themeJs, true);

    // RTL
    wp_enqueue_style('rtl', get_template_directory_uri() . '/rtl.css', array(), $modificated_rtlCss);

    // IE Warning
    wp_localize_script('bootscore-script', 'bootscore', array(
      'ie_title'                 => __('Internet Explorer detected', 'bootscore'),
      'ie_limited_functionality' => __('This website will offer limited functionality in this browser.', 'bootscore'),
      'ie_modern_browsers_1'     => __('Please use a modern and secure web browser like', 'bootscore'),
      'ie_modern_browsers_2'     => __(' <a href="https://www.mozilla.org/firefox/" target="_blank">Mozilla Firefox</a>, <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a>, <a href="https://www.opera.com/" target="_blank">Opera</a> ', 'bootscore'),
      'ie_modern_browsers_3'     => __('or', 'bootscore'),
      'ie_modern_browsers_4'     => __(' <a href="https://www.microsoft.com/edge" target="_blank">Microsoft Edge</a> ', 'bootscore'),
      'ie_modern_browsers_5'     => __('to display this site correctly.', 'bootscore'),
    ));
    // IE Warning End

    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }
  }
  add_action('wp_enqueue_scripts', 'loadfiles');
//Enqueue scripts and styles END


// Preload Font Awesome
  function bootscore_fa_preload($tag) {
    $tag = preg_replace("/id='fontawesome-css'/", "id='fontawesome-css' online=\"if(media!='all')media='all'\"", $tag);
    return $tag;
  }
  add_filter('style_loader_tag', 'bootscore_fa_preload');
// Preload Font Awesome END


// Nav Walker
  if (!function_exists('register_navwalker')) :
    function register_navwalker() {
      require_once('inc/class-bootstrap-5-navwalker.php');
      // Register Menus
      register_nav_menu('main-menu', 'جایگاه سربرگ اصلی');
      register_nav_menu('footer-menu', 'جایگاه پاورقی اصلی');
    }
  endif;
  add_action('after_setup_theme', 'register_navwalker');

  function get_menu_args_header() {
    $args = array(
        'theme_location' => 'main-menu',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => 'sats_default_menu',
        'items_wrap' => '<ul id="bootscore-navbar" class="navbar-nav ms-auto %2$s">%3$s</ul>',
        'depth' => 2,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
    );
    return $args;
  }

  function get_menu_args_footer() {
      $args = array(
        'theme_location' => 'footer-menu',
        'container' => false,
        'menu_class' => '',
        'fallback_cb' => 'sats_default_menu',
        'items_wrap' => '<ul id="footer-menu" class="nav %2$s">%3$s</ul>',
        'depth' => 1,
        'walker' => new bootstrap_5_wp_nav_menu_walker()
      );
      return $args;
  }

  function sats_default_menu() { 
    ?>   
      <a class="text-dark" href="<?php echo admin_url('nav-menus.php'); ?>">منو را تنظیم کنید</a>
    <?php
  }  
// Nav Walker END


// Widgets
  if (!function_exists('register_widgets')) :
    function register_widgets() {
      // Top Nav
        register_sidebar(array(
          'name'          => esc_html__('نوار ناوبری بالایی'),
          'id'            => 'top-nav',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="ms-3">',
          'after_widget'  => '</div>',
          'before_title'  => '<div class="widget-title d-none">',
          'after_title'   => '</div>'
        ));
      // Top Nav End

      // Top Nav Search
        register_sidebar(array(
          'name'          => esc_html__('نوار جست‌وجوی بالایی'),
          'id'            => 'top-nav-search',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="top-nav-search">',
          'after_widget'  => '</div>',
          'before_title'  => '<div class="widget-title d-none">',
          'after_title'   => '</div>'
        ));
      // Top Nav Search End

      // Sidebar-1
        register_sidebar(array(
          'name'          => esc_html__('نوار کناری محصول'),
          'id'            => 'sidebar-1',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
          'after_widget'  => '</section>',
          'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
          'after_title'   => '</h2>',
        ));
      // Sidebar-1 End

      // Sidebar-2
        register_sidebar(array(
          'name'          => esc_html__('نوار کناری نوشته'),
          'id'            => 'sidebar-2',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<section id="%1$s" class="widget %2$s card card-body mb-4 bg-light border-0">',
          'after_widget'  => '</section>',
          'before_title'  => '<h2 class="widget-title card-title border-bottom py-2">',
          'after_title'   => '</h2>',
        ));
      // Sidebar-2 End
      
      // Top Footer
        register_sidebar(array(
            'name'          => esc_html__('پاورقی بالایی'),
            'id'            => 'top-footer',
            'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
            'before_widget' => '<div class="footer_widget mb-5">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>'
        ));
      // Top Footer End

      // Footer 1
        register_sidebar(array(
          'name'          => esc_html__('پاورقی ۱'),
          'id'            => 'footer-1',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="footer_widget mb-4">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2 class="widget-title h4">',
          'after_title'   => '</h2>'
        ));
      // Footer 1 End

      // Footer 2
        register_sidebar(array(
          'name'          => esc_html__('پاورقی ۲'),
          'id'            => 'footer-2',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="footer_widget mb-4">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2 class="widget-title h4">',
          'after_title'   => '</h2>'
        ));
      // Footer 2 End

      // Footer 3
        register_sidebar(array(
          'name'          => esc_html__('پاورقی ۳'),
          'id'            => 'footer-3',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="footer_widget mb-4">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2 class="widget-title h4">',
          'after_title'   => '</h2>'
        ));
      // Footer 3 End

      // Footer 4
        register_sidebar(array(
          'name'          => esc_html__('پاورقی ۴'),
          'id'            => 'footer-4',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="footer_widget mb-4">',
          'after_widget'  => '</div>',
          'before_title'  => '<h2 class="widget-title h4">',
          'after_title'   => '</h2>'
        ));
      // Footer 4 End

      // 404 Page
        register_sidebar(array(
          'name'          => esc_html__('صفحه ۴۰۴'),
          'id'            => '404-page',
          'description'   => esc_html__('ابزارک‌ها را این‌جا اضافه کنید'),
          'before_widget' => '<div class="mb-4">',
          'after_widget'  => '</div>',
          'before_title'  => '<h1 class="widget-title">',
          'after_title'   => '</h1>'
        ));
      // 404 Page End

    }
    add_action('widgets_init', 'register_widgets');
  endif;
// Widgets END
  

//widget
    function register_custom_widget() {
        $args1 = array(
            'id'          => 'widget-sidebar',
            'name'          => 'نوار کناری',
        ); 

        register_sidebar( $args1 );

        register_widget( 'Blog' );
    }
    add_action( 'widgets_init', 'register_custom_widget' );  


    class Blog extends WP_Widget {
        public function __construct() {
            $widget_ops = array( 
                'classname' => 'blog',
                'description' => 'ساخته شده توسط ویانا استدیو',
            );
            parent::__construct( 'blog', 'بلاگ اختصاصی', $widget_ops );
        }

        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );

            ?>
            <aside class="sidebar-blog">
                <div class="related-blogs">

                    <h5 class="related-blogs__title">
                    <?php echo $title;?>
                    </h5>

                    <?php $category = get_the_category()[0]->cat_ID;?>
                    <?php $posts = new WP_Query(get_post_args('post', $posts_per_page = 3, $offset=0, $category)); ?>
                    <?php if ( $posts->have_posts() ) : ?>
                        <?php while ( $posts->have_posts() ) : ?>
                            <?php $posts->the_post(); ?>

                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <div class="related-blog" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>)"  >
                                    <h5 class="related-blog__title"> <?php the_title(); ?></h5>
                                </div>
                            </a>

                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </aside>
            <?php
        }

        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', 'wpb_widget_domain' );
            }
            // Widget admin form
            ?>
                <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
                </p>
            <?php 
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    }
//widget END


//post_retrieving_loop
    function get_post_args( $post_type, $posts_per_page, $offset) {
        $args = array(
            'post_type'        => $post_type,

            'posts_per_page'   => $posts_per_page,
            'offset'           => $offset,

            'orderby'          => 'post_date',
            'order'            => 'DESC',
        );

        return $args;
    }
//


// Comment List
  if (!function_exists('register_comment_list')) :
    function register_comment_list() {
      require_once('inc/comment-list.php');
    }
  endif;
  add_action('after_setup_theme', 'register_comment_list');
// Comment List END


// Shortcode in HTML-Widget
  add_filter('widget_text', 'do_shortcode');
// Shortcode in HTML-Widget End


// Amount of posts/products in category
if (!function_exists('wpsites_query')) :

  function wpsites_query($query) {
    if ($query->is_archive() && $query->is_main_query() && !is_admin()) {
      $query->set('posts_per_page', 24);
    }
  }
  add_action('pre_get_posts', 'wpsites_query');

endif;
// Amount of posts/products in category END


// Pagination Categories
  if (!function_exists('pagination')) :
    function pagination($pages = '', $range = 2) {
      $showitems = ($range * 2) + 1;
      global $paged;
      // default page to one if not provided
      if(empty($paged)) $paged = 1;
      if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if (!$pages)
          $pages = 1;
      }

      if (1 != $pages) {
        echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs mb-4">';


        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
          echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(1) . '" aria-label="First Page">&laquo;</a></li>';

        if ($paged > 1 && $showitems < $pages)
          echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($paged - 1) . '" aria-label="Previous Page">&lsaquo;</a></li>';

        for ($i = 1; $i <= $pages; $i++) {
          if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
            echo ($paged == $i) ? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>' . $i . '</span></li>' : '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($i) . '"><span class="sr-only">Page </span>' . $i . '</a></li>';
        }

        if ($paged < $pages && $showitems < $pages)
          echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link(($paged === 0 ? 1 : $paged) + 1) . '" aria-label="Next Page">&rsaquo;</a></li>';

        if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages)
          echo '<li class="page-item"><a class="page-link" href="' . get_pagenum_link($pages) . '" aria-label="Last Page">&raquo;</a></li>';

        echo '</ul>';
        echo '</nav>';
        // Uncomment this if you want to show [Page 2 of 30]
        // echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';	 	
      }
    }

  endif;
//Pagination Categories END


// Pagination Buttons Single Posts
  add_filter('next_post_link', 'post_link_attributes');
  add_filter('previous_post_link', 'post_link_attributes');

  function post_link_attributes($output) {
    $code = 'class="page-link"';
    return str_replace('<a href=', '<a ' . $code . ' href=', $output);
  }
// Pagination Buttons Single Posts END


// Breadcrumb
  if (!function_exists('the_breadcrumb')) :
    function the_breadcrumb() {
      if (!is_home()) {
        echo '<nav class="breadcrumb mb-4 mt-2 bg-light py-2 px-3 small rounded">';
        echo '<a href="' . home_url('/') . '">' . ('<i class="fa-solid fa-house"></i>') . '</a><span class="divider">&nbsp;/&nbsp;</span>';
        if (is_category() || is_single()) {
          the_category(' <span class="divider">&nbsp;/&nbsp;</span> ');
          if (is_single()) {
            echo ' <span class="divider">&nbsp;/&nbsp;</span> ';
            the_title();
          }
        } elseif (is_page()) {
          echo the_title();
        }
        echo '</nav>';
      }
    }
    add_filter('breadcrumbs', 'breadcrumbs');
  endif;
// Breadcrumb END


// Comment Button
  function the_comment_form($args) {
    $args['class_submit'] = 'btn btn-outline-primary'; // since WP 4.1    
    return $args;
  }
  add_filter('comment_form_defaults', 'the_comment_form');
// Comment Button END


// Password protected form
  function bootscore_pw_form() {
    $output = '
        <form action="' . get_option('siteurl') . '/wp-login.php?action=postpass" method="post" class="form-inline">' . "\n"
      . '<input name="post_password" type="password" size="" class="form-control me-2 my-1" placeholder="' . __('Password', 'bootscore') . '"/>' . "\n"
      . '<input type="submit" class="btn btn-outline-primary my-1" name="Submit" value="' . __('Submit', 'bootscore') . '" />' . "\n"
      . '</p>' . "\n"
      . '</form>' . "\n";
    return $output;
  }
  add_filter("the_password_form", "bootscore_pw_form");
// Password protected form END


// Allow HTML in term (category, tag) descriptions
  foreach (array('pre_term_description') as $filter) {
    remove_filter($filter, 'wp_filter_kses');
    if (!current_user_can('unfiltered_html')) {
      add_filter($filter, 'wp_filter_post_kses');
    }
  }

  foreach (array('term_description') as $filter) {
    remove_filter($filter, 'wp_kses_data');
  }
// Allow HTML in term (category, tag) descriptions END


// Allow HTML in author bio
  remove_filter('pre_user_description', 'wp_filter_kses');
  add_filter('pre_user_description', 'wp_filter_post_kses');
// Allow HTML in author bio END


// Hook after #primary
  function bs_after_primary() {
    do_action('bs_after_primary');
  }
// Hook after #primary END


// Open links in comments in new tab
  if (!function_exists('bs_comment_links_in_new_tab')) :
    function bs_comment_links_in_new_tab($text) {
      return str_replace('<a', '<a target="_blank" rel=”nofollow”', $text);
    }
    add_filter('comment_text', 'bs_comment_links_in_new_tab');
  endif;
// Open links in comments in new tab END


// Disable Gutenberg blocks in widgets (WordPress 5.8)
// Disables the block editor from managing widgets in the Gutenberg plugin.
  add_filter('gutenberg_use_widgets_block_editor', '__return_false');
  // Disables the block editor from managing widgets.
  add_filter('use_widgets_block_editor', '__return_false');
// Disable Gutenberg blocks in widgets (WordPress 5.8) END


/**
 * Change a currency symbol
*/

add_filter('woocommerce_currency_symbol', 'add_cw_currency_symbol', 10, 2);
function add_cw_currency_symbol( $custom_currency_symbol, $custom_currency ) {
     switch( $custom_currency ) {
         case 'IRT': $custom_currency_symbol = 'تومانءءء'; break;
     }
     return $custom_currency_symbol;
}



add_filter( 'woocommerce_get_price_html', 'bbloomer_hide_price_if_out_stock_frontend', 9999, 2 );

function bbloomer_hide_price_if_out_stock_frontend( $price, $product ) {
	if ( is_admin() ) return $price; // BAIL IF BACKEND
	if ( ! $product->is_in_stock() ) {
		$price = apply_filters( 'woocommerce_empty_price_html', '', $product );
	}
	return $price;
}



add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );
function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 10;

  return $cols;
}








/**
 * @global int $content_width
 */
function bootscore_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('bootscore_content_width', 640);
}
add_action('after_setup_theme', 'bootscore_content_width', 0);