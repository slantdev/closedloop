<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
//$color_theme = get_field('color_theme');

$case_category = get_sub_field('case_category');
$hide_case_studies_filter = get_sub_field('hide_case_studies_filter');
$posts_per_page = get_sub_field('posts_per_page');
//preint_r($posts_per_page);
if (!$posts_per_page) {
  $posts_per_page = '-1';
}

$select_style = 'color: ' . $color_theme . ';';
if ($section_background_color == '#ffffff' || !$section_background_color) {
  $select_style .= 'background-color: #edf1f5';
} else {
  $select_style .= 'background-color: #ffffff';
}

?>
<!-- Case Studies -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="flex flex-wrap lg:flex-nowrap">
        <div class="w-full lg:w-2/3 lg:pr-16">
          <?php get_template_part('template-parts/components/heading', '', array()); ?>
        </div>
      </div>
      <div class="flex flex-wrap lg:flex-nowrap">
        <div class="w-full lg:w-2/3 lg:pr-16">
          <?php get_template_part('template-parts/components/description'); ?>
        </div>
        <?php if (!$hide_case_studies_filter) { ?>
          <div class="w-full text-right lg:w-1/3 lg:pl-16">
            <div class="flex justify-end">
              <div class="dropdown relative mb-4 lg:mb-0">
                <button class="dropdown-toggle px-8 py-3 font-medium text-base leading-tight rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap lg:px-8 lg:py-4 xl:min-w-[300px]" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false" style="<?php echo $select_style ?>">
                  <span class="dropdown-label">Show All</span>
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                  </svg>
                </button>

                <ul class="dropdown-menu min-w-max w-full absolute bg-white text-base z-50 py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownSelect">
                  <?php
                  if ($case_category) {
                    $include_case_category = $case_category;
                  } else {
                    $include_case_category = 'all';
                  }
                  $taxonomies = get_terms(array(
                    'taxonomy' => 'case_country',
                    'hide_empty' => false,
                    'include' => $include_case_category
                  ));
                  if (!empty($taxonomies)) :
                    $output = '';
                    foreach ($taxonomies as $category) {
                      $output .= '<a class="case-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#" data-category="' . $case_category . '" data-country="' . esc_attr($category->term_id) . '" data-perpage="' . $posts_per_page . '">' . esc_attr($category->name) . '</a>';
                    }
                    echo $output;
                  endif;
                  ?>
                  <hr class="h-0 my-2 border border-solid border-t-0 border-gray-700 opacity-10" />
                  <li>
                    <a href="#" data-category="<?php echo $case_category ?>" data-country="all" data-perpage="<?php echo $posts_per_page ?>" class=" case-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Show All</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="case-studies-container">
        <div class="filter-case-study-loader pb-4">
          <div class="flex justify-center items-center">
            <div class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full text-aquamarine opacity-0" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
          </div>
        </div>
        <div class="case-studies-grid relative">
          <?php
          if (is_admin()) {
            if ($case_category) {
              $args = array(
                'post_type' => 'case-studies',
                'posts_per_page' => 3,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'case_category',
                    'field'    => 'term_id',
                    'terms'    => $case_category,
                  ),
                ),
              );
            } else {
              $args = array(
                'post_type' => 'case-studies',
                'posts_per_page' => 3
              );
            }
          } else {
            if ($case_category) {
              $args = array(
                'post_type' => 'case-studies',
                'posts_per_page' => $posts_per_page,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'case_category',
                    'field'    => 'term_id',
                    'terms'    => $case_category,
                  ),
                ),
              );
            } else {
              $args = array(
                'post_type' => 'case-studies',
                'posts_per_page' => $posts_per_page
              );
            }
          }
          $the_query = new WP_Query($args);

          //preint_r($the_query);
          if ($the_query->have_posts()) {

            echo '<div class="grid grid-cols-1 gap-6 md:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:gap-12">';
            while ($the_query->have_posts()) {
              $the_query->the_post();
              $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 12, $more = null);
              $atts = array(
                'img_src' => get_the_post_thumbnail_url($postID, 'large'),
                'title' => get_the_title(),
                'excerpt' => $excerpt,
                'link' => get_the_permalink(),
                'plus_sign' => false,
                'object_fit' => 'cover',
                'border' => true
              );
              echo cl_card($atts);
            }
            echo '</div>';
          }
          wp_reset_postdata();
          ?>
          <div class="blocker absolute inset-0 bg-white bg-opacity-40" style="display: none;"></div>
        </div>
      </div>
    </div>
  </div>
</section>