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

    <div class="mb-8 lg:mb-16">
      <div class="flex justify-between">
        <?php get_template_part('template-parts/components/heading', '', array()); ?>

        <?php if ($show_select_filter) { ?>
          <div class="flex justify-end">
            <div class="product-filter-dropdown dropdown relative">
              <button class="dropdown-toggle px-8 py-4 bg-white font-medium text-base leading-tight rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap xl:min-w-[300px]" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false" style="color: <?php echo $color_theme ?>">
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
            'posts_per_page' => 6,
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
          //preint_r($products_query);

          echo '<div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:grid-cols-3 xl:gap-12">';

          if ($products_query->have_posts()) {

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
          }
          echo '</div>';
        ?>

          <script type="text/javascript">
            jQuery(document).ready(function($) {
              var count = 2;
              var total = <?php echo $products_query->max_num_pages; ?>;
              console.log(total);
              // $(window).scroll(function() {
              //   if ($(window).scrollTop() == $(document).height() - $(window).height()) {
              //     if (count > total) {
              //       return false;
              //     } else {
              //       loadArticle(count);
              //     }
              //     count++;
              //   }
              // });

              var element_position = $('#inifiniteLoader').offset().top;
              var screen_height = $(window).height();
              var activation_offset = 0.85; //determines how far up the the page the element needs to be before triggering the function
              var activation_point = element_position - (screen_height * activation_offset);
              var max_scroll_height = $('body').height() - screen_height - 5; //-5 for a little bit of buffer

              //Does something when user scrolls to it OR
              //Does it when user has reached the bottom of the page and hasn't triggered the function yet
              $(window).on('scroll', function() {
                var y_scroll_pos = window.pageYOffset;

                var element_in_view = y_scroll_pos > activation_point;
                var has_reached_bottom_of_page = max_scroll_height <= y_scroll_pos && !element_in_view;

                if (element_in_view) {
                  //Do something
                  if (count > total) {
                    return false;
                  } else {
                    loadArticle(count);
                  }
                  count++;
                }
              });

              function loadArticle(pageNumber) {
                $('#inifiniteLoader').show('fast');
                console.log('loaded');
                $.ajax({
                  url: "<?php echo admin_url(); ?>admin-ajax.php",
                  type: 'POST',
                  data: "action=infinite_scroll&page_no=" + pageNumber + '&term_id=<?php echo $term_id ?>&enable_product_link=<?php echo $enable_product_link ?>',
                  success: function(html) {
                    $('#inifiniteLoader').hide('1000');
                    $(".product-cards-grid > .grid").append(html);
                  }
                });
                return false;
              }
            });
          </script>
        <?php
          wp_reset_postdata();
        }
        ?>
      </div>
      <div id="inifiniteLoader">
        <div role="status" class="w-full flex items-center justify-center">
          <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
          </svg>
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <?php
    if ($buttons) {
      echo '<div class="mt-8 md:mt-12 lg:mt-16 xl:mt-24">';
      get_template_part('template-parts/components/button');
      echo '</div>';
    }
    ?>
    <?php echo $loop_overlay_br; ?>
  </div>
</section>