<?php
/*
 * Single Blog
 */

get_template_part('template-parts/layout/page-header');

get_template_part('template-parts/page-builder');

?>

<?php
$post_type = get_post_type();
$terms = get_the_terms($post->ID, 'category');
$terms_array = array(join(', ', wp_list_pluck($terms, 'slug')));
$args = array(
  'post_type' => 'post',
  'posts_per_page' => '6',
);
$the_query = new WP_Query($args);
$related_posts = get_field('related_posts');
if ($the_query->have_posts() || $related_posts) {
  $color_theme = get_field('color_theme', get_the_ID());
  $swiper_id = 'swiper_' . uniqid();
  $swiper_nav_style = 'background-color: #ffffff';
  if ($color_theme) {
    $swiper_nav_style = 'background-color: ' . $color_theme . ';';
  }
}

if ($related_posts) {
?>
  <section id="more-blogs" class="bg-[#EDF1F5]">
    <div class="container mx-auto relative pt-12 md:pt-20 lg:pt-36">
      <h2 class="font-bold leading[1.1em] text-4xl mb-8 text-left" style="color: #1AAD90">More blogs</h2>
    </div>
    <div class="relative pb-36">
      <div class="mt-8 container mx-auto">
        <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/3 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-12 md:w-8 lg:w-12 lg:h-16 -translate-y-1/2 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
          <svg class="rotate-180 -ml-0.5 w-2 md:w-3 h-auto" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
            <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
          </svg>
        </div>
        <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/3 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-12 md:w-8 lg:w-12 lg:h-16 -translate-y-1/2 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
          <svg class="w-2 ml-0.5 md:w-3 h-auto" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
            <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
          </svg>
        </div>
        <div id="<?php echo $swiper_id ?>" class="swiper">
          <div class="swiper-wrapper">
            <?php
            foreach ($related_posts as $post) :
              $excerpt = wp_trim_words(get_the_excerpt($post->ID), $num_words = 12, $more = null);
              $args = array(
                'img_src' => wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'large'),
                'title' => get_the_title($post->ID),
                'excerpt' => $excerpt,
                'plus_sign' => false,
                'link' => get_the_permalink($post->ID),
              );
              echo '<div class="swiper-slide">';
              echo '<div class="max-w-[420px] mx-auto h-full">';
              echo cl_card($args);
              echo '</div>';
              echo '</div>';
            endforeach;
            ?>

          </div>
        </div>
        <script>
          var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
            slidesPerView: 'auto',
            spaceBetween: 16,
            watchOverflow: true,
            centerInsufficientSlides: false,
            autoHeight: true,
            breakpoints: {
              768: {
                slidesPerView: 2,
                spaceBetween: 24
              },
              1280: {
                slidesPerView: 3,
                spaceBetween: 36
              }
            },
            navigation: {
              nextEl: ".<?php echo $swiper_id ?>_button_next",
              prevEl: ".<?php echo $swiper_id ?>_button_prev",
            },
          });
        </script>
      </div>
    </div>
  </section>
  <?php
} else {
  if ($the_query->have_posts()) {
  ?>
    <section id="more-blogs" class="bg-[#EDF1F5]">
      <div class="container mx-auto relative pt-12 md:pt-20 lg:pt-36">
        <h2 class="font-bold leading[1.1em] text-4xl mb-8 text-left" style="color: #1AAD90">More blogs</h2>
      </div>
      <div class="relative pb-36">
        <div class="mt-8 container mx-auto">
          <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/3 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-12 md:w-8 lg:w-12 lg:h-16 -translate-y-1/2 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
            <svg class="rotate-180 -ml-0.5 w-2 md:w-3 h-auto" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
              <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
            </svg>
          </div>
          <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/3 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-12 md:w-8 lg:w-12 lg:h-16 -translate-y-1/2 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
            <svg class="w-2 ml-0.5 md:w-3 h-auto" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
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
              slidesPerView: 'auto',
              spaceBetween: 16,
              watchOverflow: true,
              centerInsufficientSlides: false,
              autoHeight: true,
              breakpoints: {
                768: {
                  slidesPerView: 2,
                  spaceBetween: 24
                },
                1280: {
                  slidesPerView: 3,
                  spaceBetween: 36,
                }
              },
              navigation: {
                nextEl: ".<?php echo $swiper_id ?>_button_next",
                prevEl: ".<?php echo $swiper_id ?>_button_prev",
              },
            });
          </script>
        </div>
      </div>
    </section>
<?php
  }
  wp_reset_postdata();
}
?>
<?php
get_footer();
