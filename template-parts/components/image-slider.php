<?php

// if (is_admin()) {
//   echo '<h3 class="text-xl text-center">Image Slider Preview Coming Soon</h3>';
//   return;
// }

$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

$swiper_id = 'swiper_' . uniqid();

$swiper_nav_style = 'background-color: #ffffff';
if ($color_theme) {
  $swiper_nav_style = 'background-color: ' . $color_theme . ';';
}

$max_width = get_sub_field('max_width');
$image_slider = get_sub_field('image_slider');
if ($image_slider) :
  echo '<div class="relative mx-auto ' . $max_width . '">';
?>
  <?php if (is_admin()) { ?>
    <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-0 w-12 h-12 -translate-y-3/4 flex justify-center items-center lg:-left-12 xl:-left-16" style="<?php echo $swiper_nav_style ?>">
      <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
        <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
      </svg>
    </div>
    <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-0 w-12 h-12 -translate-y-3/4 flex justify-center items-center lg:-right-12 xl:-right-16" style="<?php echo $swiper_nav_style ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
        <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
      </svg>
    </div>
    <div class="mx-auto aspect-video">
      <img class="h-full w-full object-cover" src="<?php echo esc_url($image_slider[0]['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
  <?php } else { ?>
    <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 flex justify-center items-center -translate-y-1/2 w-6 h-10 lg:-left-10 lg:-translate-y-3/4 lg:w-10 lg:h-14" style="<?php echo $swiper_nav_style ?>">
      <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
        <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
      </svg>
    </div>
    <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 flex justify-center items-center -translate-y-1/2 w-6 h-10 lg:-right-10 lg:-translate-y-3/4 lg:w-10 lg:h-14" style="<?php echo $swiper_nav_style ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
        <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
      </svg>
    </div>
    <div id="<?php echo $swiper_id ?>" class="swiper">
      <div class="swiper-wrapper">
        <?php foreach ($image_slider as $image) : ?>
          <div class="swiper-slide aspect-video">
            <img class="h-full w-full object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <script>
      var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
        slidesPerView: 1,
        watchOverflow: true,
        centerInsufficientSlides: true,
        loop: true,
        navigation: {
          nextEl: ".<?php echo $swiper_id ?>_button_next",
          prevEl: ".<?php echo $swiper_id ?>_button_prev",
        },
      });
    </script>
  <?php } ?>
<?php
  echo '</div>';
endif;
