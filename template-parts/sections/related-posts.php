<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>
<!-- Related Posts -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php get_template_part('template-parts/components/heading', '', array()); ?>
    <div class="flex flex-wrap lg:flex-nowrap">
      <div class="w-full lg:w-3/5">
        <?php
        get_template_part('template-parts/components/description');
        ?>
      </div>
    </div>
  </div>
  <div class="relative <?php echo $padding_bottom ?>">
    <?php
    $post_type = get_post_type();
    if ($post_type == 'case-studies') {
      $taxonomy = 'case_category';
    } else {
      $taxonomy = 'category';
    }
    $terms = get_the_terms($post->ID, $taxonomy);
    //preint_r(wp_list_pluck($terms, 'slug'));

    //$terms_array = array(join(', ', wp_list_pluck($terms, 'slug')));
    $terms_array = wp_list_pluck($terms, 'slug');
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => '6',
      'post__not_in' => array(get_the_ID()),
      'tax_query' => array(
        array(
          'taxonomy' => $taxonomy,
          'field'    => 'slug',
          'terms'    => $terms_array,
        ),
      ),
    );
    $the_query = new WP_Query($args);

    //preint_r($the_query);
    if ($the_query->have_posts()) {
      $color_theme = get_field('color_theme', get_the_ID());
      $swiper_id = 'swiper_' . uniqid();
      $swiper_nav_style = 'background-color: #ffffff';
      if ($color_theme) {
        $swiper_nav_style = 'background-color: ' . $color_theme . ';';
      }
    ?>
      <div class="mt-8 container mx-auto">
        <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/3 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-1/2 flex justify-center items-center md:w-12 md:h-16" style="<?php echo $swiper_nav_style ?>">
          <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
            <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
          </svg>
        </div>
        <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/3 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-1/2 flex justify-center items-center md:w-12 md:h-16" style="<?php echo $swiper_nav_style ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
            <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
          </svg>
        </div>
        <div id="<?php echo $swiper_id ?>" class="swiper">
          <div class="swiper-wrapper">
            <?php
            while ($the_query->have_posts()) {
              $the_query->the_post();

              //preint_r($the_query);

              $excerpt = wp_trim_words(get_the_excerpt(), $num_words = 12, $more = null);
              $args = array(
                'img_src' => wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()), 'large'),
                'title' => get_the_title(),
                'excerpt' => $excerpt,
                'plus_sign' => false,
                'link' => get_the_permalink(),
              );
              echo '<div class="swiper-slide">';
              echo '<div class="max-w-[420px] mx-auto h-full">';
              echo cl_card($args);
              //echo get_the_ID();
              echo '</div>';
              echo '</div>';
            }
            ?>
          </div>
        </div>
        <script>
          var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
            slidesPerView: 1,
            spaceBetween: 16,
            watchOverflow: true,
            centerInsufficientSlides: true,
            navigation: {
              nextEl: ".<?php echo $swiper_id ?>_button_next",
              prevEl: ".<?php echo $swiper_id ?>_button_prev",
            },
            breakpoints: {
              768: {
                slidesPerView: 2,
                spaceBetween: 24
              },
              1280: {
                slidesPerView: 3,
                spaceBetween: 32
              }
            }
          });
        </script>
      </div>
    <?php
    }
    wp_reset_postdata();
    ?>
    <?php echo $loop_overlay_br; ?>
  </div>
</section>