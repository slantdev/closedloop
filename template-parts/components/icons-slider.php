<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

$swiper_id = 'swiper_' . uniqid();
$icons_per_view = get_sub_field('icons_per_view');
$small_screen = $icons_per_view['small_screen'];
$medium_screen = $icons_per_view['medium_screen'];
$large_screen = $icons_per_view['large_screen'];

$swiper_nav_style = 'background-color: #ffffff';
if ($color_theme) {
  $swiper_nav_style = 'background-color: ' . $color_theme . ';';
}

if (have_rows('icons')) :
  echo '<div class="mt-8 px-3 relative md:px-8 xl:px-0 xl:mt-16">';
?>
  <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 -left-4 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-16 -translate-y-3/4 flex justify-center items-center md:w-12 md:h-16 xl:-left-24" style="<?php echo $swiper_nav_style ?>">
    <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
      <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
    </svg>
  </div>
  <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 -right-4 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-6 h-16 -translate-y-3/4 flex justify-center items-center md:w-12 md:h-16 xl:-right-24" style="<?php echo $swiper_nav_style ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
      <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
    </svg>
  </div>
  <div id="<?php echo $swiper_id ?>" class="swiper">
    <div class="swiper-wrapper">
      <?php
      while (have_rows('icons')) : the_row();
        $icon_image = get_sub_field('icon_image');
        $icon_src = $icon_image['id'];
        $icon_id = $icon_image['id'];
        $icon_type = $icon_image['mime_type'];
        $icon_text = get_sub_field('icon_text');
        $icon_color = get_sub_field('icon_color');
        $icon_size = get_sub_field('icon_size');
        $icon_link = get_sub_field('icon_link');
        $icon_style = '';
        switch ($icon_size) {
          case "sm":
            $icon_style .= 'max-width: 120px';
            break;
          case "md":
            $icon_style .= 'max-width: 136px';
            break;
          case "lg":
            $icon_style .= 'max-width: 148px';
            break;
          default:
            $icon_style .= 'max-width: none';
        }
        $text_class = '';
        if ($icon_color) {
          $text_class = 'color: ' . $icon_color;
        }
        echo '<div class="swiper-slide">';
        if ($icon_link) {
          echo '<a href="' . $icon_link['url'] . '" target="' . $icon_link['target'] . '" class="flex flex-col items-center cursor-pointer">';
        } else {
          echo '<div class="flex flex-col items-center">';
        }
        echo '<div class="mx-auto w-full" style="' . $icon_style . '">';

        if ($icon_type == 'image/svg+xml') {
          echo '<div class="w-32 lg:w-auto max-w-[100px] lg:max-w-[128px] mx-auto" style="' . $text_class . '">';
          echo cl_icon(array('icon_src' => $icon_src, 'size' => 112, 'class' => 'mx-auto max-w-[100px] lg:max-w-none'));
          echo '</div>';
        } else {
          echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'mx-auto max-w-[100px] lg:max-w-none'));
        }

        echo '</div>';
        echo '<div class="mt-4 text-center leading-tight text-base font-bold lg:text-xl" style="' . $text_class . '">';
        echo $icon_text;
        echo '</div>';
        if ($icon_link) {
          echo '</a>';
        } else {
          echo '</div>';
        }
        echo '</div>';
      endwhile;
      ?>
    </div>
  </div>
  <script>
    var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
      slidesPerView: <?php echo $small_screen ?>,
      spaceBetween: 24,
      watchOverflow: true,
      centerInsufficientSlides: true,
      navigation: {
        nextEl: ".<?php echo $swiper_id ?>_button_next",
        prevEl: ".<?php echo $swiper_id ?>_button_prev",
      },
      breakpoints: {
        768: {
          slidesPerView: <?php echo $medium_screen ?>,
          spaceBetween: 32
        },
        1280: {
          slidesPerView: <?php echo $large_screen ?>,
          spaceBetween: 40
        }
      }
    });
  </script>
<?php
  echo '</div>';
endif;
