<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);
include get_template_directory() . '/template-parts/layout/section-settings.php';

$faq_topic_id = get_sub_field('faq_categories');

$select_style = 'color: ' . $color_theme . ';';
if ($section_background_color == '#ffffff' || !$section_background_color) {
  $select_style .= 'background-color: #edf1f5';
} else {
  $select_style .= 'background-color: #ffffff';
}

?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto max-w-4xl relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>

    <div class="relative">
      <?php get_template_part('template-parts/components/heading', '', array()); ?>

      <?php
      $hide_faq_categories = get_sub_field('hide_faq_categories');
      $term_object = get_term_by('id', $faq_topic_id[0], 'faq_topic');
      $faq_index = $term_object->slug;
      if ($faq_index == 'index') {
        echo '<div class="mx-auto max-w-sm mb-8 lg:mb-14">';
      ?>
        <!-- Desktop Filter -->
        <div class="hidden lg:flex justify-center">
          <div class="faq-dropdown dropdown relative">
            <button class="dropdown-toggle px-8 py-4 bg-white font-medium text-base leading-tight rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap xl:min-w-[360px]" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false" style="<?php echo $select_style ?>">
              <span>Select Service</span>
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
              </svg>
            </button>
            <ul class="dropdown-menu max-h-96 overflow-y-auto min-w-max w-full absolute bg-white text-base z-50 py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownSelect">
              <?php
              $index_array = array('71');
              $hide_desktop_array = $hide_faq_categories['hide_on_desktop'];
              if (!$hide_desktop_array) {
                $hide_desktop_array = array();
              }
              $taxonomies = get_terms(array(
                'taxonomy' => 'faq_topic',
                'hide_empty' => true,
                'exclude' => array_merge($index_array, $hide_desktop_array)
              ));
              if (!empty($taxonomies)) :
                $output = '';
                foreach ($taxonomies as $category) {
                  if ($category->parent == 0) {
                    $output .= '<a class="faq-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#!" data-id="' . esc_attr($subcategory->term_id) . '">' . esc_attr($category->name) . '</a>';
                    foreach ($taxonomies as $subcategory) {
                      if ($subcategory->parent == $category->term_id) {
                        $output .= '<li>
                      <a class="faq-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#!" data-id="' . esc_attr($subcategory->term_id) . '">- ' . esc_html($subcategory->name) . '</a>
                    </li>';
                      }
                    }
                  }
                }
                echo $output;
              endif;
              ?>
            </ul>
          </div>
        </div>
        <!-- Mobile Filter -->
        <div class="flex lg:hidden justify-center">
          <div class="faq-dropdown dropdown relative">
            <button class="dropdown-toggle px-8 py-4 bg-white font-medium text-base leading-tight rounded-full focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap xl:min-w-[360px]" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false" style="<?php echo $select_style ?>">
              <span>Select Service</span>
              <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
              </svg>
            </button>
            <ul class="dropdown-menu max-h-80 overflow-y-auto min-w-max w-full absolute bg-white text-base z-50 py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownSelect">
              <?php
              $index_array = array('71');
              $hide_mobile_array = $hide_faq_categories['hide_on_mobile'];
              if (!$hide_mobile_array) {
                $hide_mobile_array = array();
              }
              $taxonomies = get_terms(array(
                'taxonomy' => 'faq_topic',
                'hide_empty' => true,
                'exclude' => array_merge($index_array, $hide_mobile_array)
              ));
              if (!empty($taxonomies)) :
                $output = '';
                foreach ($taxonomies as $category) {
                  if ($category->parent == 0) {
                    $output .= '<a class="faq-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#!" data-id="' . esc_attr($subcategory->term_id) . '">' . esc_attr($category->name) . '</a>';
                    foreach ($taxonomies as $subcategory) {
                      if ($subcategory->parent == $category->term_id) {
                        $output .= '<li>
                      <a class="faq-dropdown-item text-base py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100" href="#!" data-id="' . esc_attr($subcategory->term_id) . '">- ' . esc_html($subcategory->name) . '</a>
                    </li>';
                      }
                    }
                  }
                }
                echo $output;
              endif;
              ?>
            </ul>
          </div>
        </div>
      <?php
        echo '</div>';
      }
      ?>
      <?php

      echo '<div class="faq-container">';

      $args = array(
        'post_type' => 'faq',
        'tax_query' => array(
          array(
            'taxonomy' => 'faq_topic',
            'field'    => 'term_id',
            'terms'    => $faq_topic_id,
          ),
        ),
      );

      $the_query = new WP_Query($args);

      if ($the_query->have_posts()) {

        $uniqueid = uniqid('accordion-');
        echo '<div class="accordion" id="' . $uniqueid . '">';
        $row_index = 0;
        $state_class = '';

        while ($the_query->have_posts()) {
          $the_query->the_post();

          $row_index++;
          if ($row_index == 1) {
            $state_class = '';
          } else {
            //$state_class = 'collapsed';
            $state_class = '';
          }
      ?>
          <div class="accordion-item bg-gray-100 border border-gray-300 mb-4 rounded-lg lg:mb-6">
            <h2 class="accordion-header mb-0" id="heading-<?php echo $row_index ?>">
              <button class="accordion-button relative flex justify-between w-full py-4 px-4 text-lg font-bold text-gray-500 leading-tight text-left bg-white border-0 focus:outline-none rounded-lg md:text-xl md:py-5 md:pl-6 md:pr-4 lg:text-2xl lg:py-5 lg:pl-8 lg:pr-6 collapsed <?php echo $state_class ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $row_index ?>" aria-expanded="true" aria-controls="collapse-<?php echo $row_index ?>">
                <?php echo get_the_title(); ?>
                <svg style="color: <?php echo $color_theme ?>" class="collapsed-arrow flex-none mt-0.5 ml-4 w-5 h-5 lg:w-7 lg:h-7 xl:ml-8" xmlns="http://www.w3.org/2000/svg" width="27.455" height="27.456" viewBox="0 0 27.455 27.456">
                  <g id="Group_2008" data-name="Group 2008" transform="translate(13.728 1) rotate(45)">
                    <line id="Line_9" data-name="Line 9" x1="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
                    <line id="Line_10" data-name="Line 10" x2="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
                  </g>
                </svg>
                <svg style="color: <?php echo $color_theme ?>" class="not-collapsed-arrow flex-none mt-0.5 ml-4 w-5 h-5 lg:w-7 lg:h-7 xl:ml-8" xmlns="http://www.w3.org/2000/svg" width="27.455" height="27.456" viewBox="0 0 27.455 27.456">
                  <g id="Group_2009" data-name="Group 2009" transform="translate(13.728 1) rotate(45)">
                    <line id="Line_9" data-name="Line 9" x1="18" y2="18" transform="translate(0 0)" fill="none" stroke="currentColor" stroke-width="2" />
                  </g>
                </svg>
              </button>
            </h2>
            <div id="collapse-<?php echo $row_index ?>" class="accordion-collapse collapse <?php echo $state_class ?>" aria-labelledby="heading-<?php echo $row_index ?>" data-bs-parent="#<?php echo $uniqueid ?>">
              <div class="accordion-body py-4 px-5 lg:px-8 lg:py-8">
                <div class="prose">
                  <?php echo get_the_content(); ?>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
        echo '</div>';
      }
      wp_reset_postdata();
      echo '</div>';
      ?>
    </div>
  </div>
</section>