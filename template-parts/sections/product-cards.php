<?php

include get_template_directory() . '/template-parts/layout/section-settings.php';
$product_category = get_sub_field('product_category');
$template = get_sub_field('template');
$buttons = get_sub_field('buttons');
$enable_product_link = get_sub_field('enable_product_link');
$show_select_filter = get_sub_field('show_select_filter');
$term_id = $product_category->term_id;
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="mb-8 lg:mb-16">
        <div class="flex flex-wrap md:flex-nowrap justify-between">
          <div class="w-full md:w-auto">
            <?php get_template_part('template-parts/components/heading', '', array("class" => "")); ?>
          </div>
          <?php if ($show_select_filter) { ?>
            <div class="w-full md:w-auto flex justify-start md:justify-end">
              <div class="product-filter-dropdown dropdown relative">
                <button class="dropdown-toggle px-4 py-3 bg-white font-medium text-sm leading-tight rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap md:text-base md:px-8 md:py-4 xl:min-w-[300px]" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false" style="color: <?php echo $color_theme ?>">
                  <span class="product-filter-label">Show All</span>
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                    <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                  </svg>
                </button>
                <ul class="dropdown-menu min-w-max w-full absolute bg-white text-base z-50 py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownSelect">

                  <?php
                  $term_id = $product_category->term_id;
                  if ($term_id) {
                    $args = array(
                      'post_type' => 'products-services',
                      'posts_per_page' => -1,
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
                      $application_terms = array();
                      while ($products_query->have_posts()) {
                        $products_query->the_post();
                        $terms = wp_get_post_terms($products_query->post->ID, array('industry_application'));
                        foreach ($terms as $term) {
                          $application_terms[] = $term->term_id;
                        }
                      }
                    }
                    wp_reset_postdata();
                  }
                  $result = array_unique($application_terms);
                  $output = '';
                  foreach ($result as $term) {
                    $term_name = get_term($term, 'industry_application')->name;
                    $output .= '<a class="product-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#" data-category="' . $product_category->term_id . '" data-product-link="' . $enable_product_link . '" data-industry="' . esc_attr($term) . '">' . $term_name . '</a>';
                  }
                  echo $output;
                  ?>
                  <hr class="h-0 my-2 border border-solid border-t-0 border-gray-700 opacity-10" />
                  <li>
                    <a href="#" data-category="<?php echo $product_category->term_id ?>" data-product-link="<?php echo $enable_product_link ?>" data-industry="all" class="product-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100">Show All</a>
                  </li>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="product-cards-container">
        <div class="product-cards-grid">
          <?php
          $term_id = $product_category->term_id;
          if ($term_id) {
            $args = array(
              'post_type' => 'products-services',
              'posts_per_page' => -1,
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

              echo '<div class="grid grid-cols-2 gap-2 -mx-2 md:grid-cols-2 md:gap-6 md:mx-auto lg:grid-cols-3 xl:gap-12">';
              while ($products_query->have_posts()) {

                $products_query->the_post();
                $title = get_field('product_title');
                $img_src = get_the_post_thumbnail_url($post_id, 'medium');
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
              echo '</div>';
            }
            wp_reset_postdata();
          }
          ?>
        </div>
      </div>
      <?php
      if ($buttons) {
        echo '<div class="mt-8 md:mt-12 lg:mt-16 xl:mt-24">';
        get_template_part('template-parts/components/button');
        echo '</div>';
      }
      ?>
    </div>

  </div>
</section>