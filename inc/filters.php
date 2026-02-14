<?php

function filter_faqs()
{

  $term_id = get_queried_object()->term_id;
  if ($term_id) {
    $the_id = 'term_' . $term_id;
  } else {
    $the_id = get_the_ID();
  }
  $color_theme = get_field('color_theme', $the_id);

  $catID = $_POST['category'];

  $ajaxposts = new WP_Query([
    'post_type' => 'faq',
    'tax_query' => array(
      array(
        'taxonomy' => 'faq_topic',
        'field'    => 'term_id',
        'terms'    => $catID,
      ),
    ),
  ]);

  $response = '';

  if ($ajaxposts->have_posts()) {

    $uniqueid = uniqid('accordion-');
    $response .= '<div class="accordion" id="' . $uniqueid . '">';
    $row_index = 0;
    $state_class = '';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      //$response .= get_template_part('templates/_components/project-list-item');
      $response .=         '<div class="accordion-item bg-gray-100 border border-gray-300 mb-6 rounded-lg">
      <h2 class="accordion-header mb-0" id="heading-' . $row_index . '">
        <button class="accordion-button relative flex justify-between w-full py-4 px-5 text-2xl font-bold text-gray-500 leading-tight text-left bg-white border-0 focus:outline-none rounded-lg lg:py-5 lg:pl-8 lg:pr-6 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-' . $row_index . '" aria-expanded="true" aria-controls="collapse-' . $row_index . '">
          ' . get_the_title() . '
          <svg style="color: ' . $color_theme . '" class="collapsed-arrow flex-none ml-4 xl:ml-8" xmlns="http://www.w3.org/2000/svg" width="27.455" height="27.456" viewBox="0 0 27.455 27.456">
            <g id="Group_2008" data-name="Group 2008" transform="translate(13.728 1) rotate(45)">
              <line id="Line_9" data-name="Line 9" x1="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
              <line id="Line_10" data-name="Line 10" x2="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
            </g>
          </svg>
          <svg style="color: ' . $color_theme . '" class="not-collapsed-arrow flex-none ml-4 xl:ml-8" xmlns="http://www.w3.org/2000/svg" width="27.455" height="27.456" viewBox="0 0 27.455 27.456">
            <g id="Group_2009" data-name="Group 2009" transform="translate(13.728 1) rotate(45)">
              <line id="Line_9" data-name="Line 9" x1="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
            </g>
          </svg>
        </button>
      </h2>
      <div id="collapse-' . $row_index . '" class="accordion-collapse collapse <?php echo $state_class ?>" aria-labelledby="heading-' . $row_index . '" data-bs-parent="#' . $uniqueid . '">
        <div class="accordion-body py-4 px-5 lg:px-8 lg:py-8">
          <div class="prose">
            ' . get_the_content() . '
          </div>
        </div>
      </div>
    </div>';
    endwhile;

    $response .= '</div>';
  } else {
    $response = '<div class="text-center">No FAQs found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_faqs', 'filter_faqs');
add_action('wp_ajax_nopriv_filter_faqs', 'filter_faqs');


function filter_cases()
{
  $country = $_POST['country'];
  $category = $_POST['category'];
  $perpage = $_POST['perpage'];
  if (!$perpage) {
    $perpage = '-1';
  }

  if ($category) {
    if ($country == 'all') {
      $ajaxposts = new WP_Query([
        'post_type' => 'case-studies',
        'posts_per_page' => $perpage,
        'tax_query' => array(
          array(
            'taxonomy' => 'case_category',
            'field'    => 'term_id',
            'terms'    => $category,
          ),
        ),
      ]);
    } else {
      $ajaxposts = new WP_Query([
        'post_type' => 'case-studies',
        'posts_per_page' => $perpage,
        'relation' => 'AND',
        'tax_query' => array(
          array(
            'taxonomy' => 'case_category',
            'field'    => 'term_id',
            'terms'    => $category,
          ),
          array(
            'taxonomy' => 'case_country',
            'field'    => 'term_id',
            'terms'    => $country,
          ),
        ),
      ]);
    }
  } else {
    if ($country == 'all') {
      $ajaxposts = new WP_Query([
        'post_type' => 'case-studies',
        'posts_per_page' => $perpage,
      ]);
    } else {
      $ajaxposts = new WP_Query([
        'post_type' => 'case-studies',
        'posts_per_page' => $perpage,
        'tax_query' => array(
          array(
            'taxonomy' => 'case_country',
            'field'    => 'term_id',
            'terms'    => $country,
          ),
        ),
      ]);
    }
  }

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:gap-12">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 12, $more = null);
      $atts = array(
        'img_src' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'title' => get_the_title(),
        'excerpt' => $excerpt,
        'link' => get_the_permalink(),
        'plus_sign' => false,
        'object_fit' => 'cover',
        'border' => true
      );
      $response .= cl_card($atts);
    endwhile;

    $response .= '</div>';
  } else {
    $response .= '<div class="text-center">No Case Studies found</div>';
  }
  $response .= '<div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>';

  echo $response;
  exit;
}
add_action('wp_ajax_filter_cases', 'filter_cases');
add_action('wp_ajax_nopriv_filter_cases', 'filter_cases');

function filter_products()
{
  $category = $_POST['category'];
  $industry = $_POST['industry'];
  $enable_product_link = $_POST['product_link'];

  if ($industry == 'all') {
    $ajaxposts = new WP_Query([
      'post_type' => 'products-services',
      'posts_per_page' => 12,
      'tax_query' => array(
        array(
          'taxonomy' => 'product_category',
          'field'    => 'term_id',
          'terms'    => $category,
        ),
      ),
    ]);
  } else {
    $ajaxposts = new WP_Query([
      'post_type' => 'products-services',
      'posts_per_page' => 12,
      'relation' => 'AND',
      'tax_query' => array(
        array(
          'taxonomy' => 'product_category',
          'field'    => 'term_id',
          'terms'    => $category,
        ),
        array(
          'taxonomy' => 'industry_application',
          'field'    => 'term_id',
          'terms'    => $industry,
        ),
      ),
    ]);
  }

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-2 gap-2 -mx-2 md:grid-cols-2 md:gap-6 md:mx-auto lg:grid-cols-3 xl:gap-12">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $title = get_field('product_title');
      $img_src = get_the_post_thumbnail_url(get_the_ID(), 'medium');
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

      $response .= cl_card($product_args);
    endwhile;

    $response .= '</div>';
  } else {
    $response = '<div class="text-center">No Products Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');

function filter_blog()
{
  $catID = $_POST['category'];
  $perpage = $_POST['perpage'];
  if (!$perpage) {
    $perpage = '-1';
  }

  if ($catID == 'all') {
    $ajaxposts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => $perpage,
    ]);
  } else {
    $ajaxposts = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => $perpage,
      'tax_query' => array(
        array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => $catID,
        ),
      ),
    ]);
  }

  $response = '';

  if ($ajaxposts->have_posts()) {

    $response .= '<div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-6 lg:grid-cols-3 lg:mt-6 xl:gap-12 xl:mt-12">';

    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 12, $more = null);
      $atts = array(
        'img_src' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
        'title' => get_the_title(),
        'excerpt' => $excerpt,
        'link' => get_the_permalink(),
        'plus_sign' => false,
        'object_fit' => 'cover',
        'border' => true
      );
      $response .= cl_card($atts);
    endwhile;

    $response .= '</div>';
  } else {
    $response = '<div class="text-center">No Posts Found</div>';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_blog', 'filter_blog');
add_action('wp_ajax_nopriv_filter_blog', 'filter_blog');
