<?php

//Infinite Scroll
// Draft --
//https://dev.to/erhankilic/adding-infinite-scroll-without-plugin-to-wordpress-theme-595a
function cl_infinitepaginate()
{
  $loopFile = $_POST['loop_file'];
  $paged = $_POST['page_no'];
  $action = $_POST['what'];
  $value = $_POST['value'];
  $term_id = $_POST['term_id'];
  $enable_product_link = $_POST['enable_product_link'];

  // if ($action == 'product_card') {
  //   $arg = array('author_name' => $value, 'paged' => $paged, 'post_status' => 'publish');
  // } else {
  //   $arg = array('paged' => $paged, 'post_status' => 'publish');
  // }
  # Load the posts
  // query_posts($arg);
  // get_template_part($loopFile);

  if ($term_id) {
    $args = array(
      'post_type' => 'products-services',
      'posts_per_page' => 6,
      'paged' => $paged,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_category',
          'field'    => 'term_id',
          'terms'    => $term_id,
          'include_children' => false,
        ),
      ),
      'orderby' => 'menu_order',
      'order'   => 'ASC',
    );
    $products_query = new WP_Query($args);
    if ($products_query->have_posts()) {

      while ($products_query->have_posts()) {

        $products_query->the_post();
        $title = get_field('product_title');
        $img_src = get_the_post_thumbnail_url($products_query->post->ID, 'medium');
        $excerpt = get_field('product_excerpt');
        $link = get_the_permalink();
        if (!$enable_product_link) {
          $link = 'none';
        }
        $product_args = array(
          'img_src' => $img_src,
          'img_bg_color' => 'bg-gray-100',
          'title' => $title,
          'excerpt' => $excerpt,
          'plus_sign' => false,
          'object_fit' => 'none',
          'border' => true,
          'link' => $link,
        );

        echo cl_card($product_args);
      }
    }
    wp_reset_postdata();
  }

  exit;
}
add_action('wp_ajax_infinite_scroll', 'cl_infinitepaginate'); // for logged in user
add_action('wp_ajax_nopriv_infinite_scroll', 'cl_infinitepaginate'); // if user not logged in