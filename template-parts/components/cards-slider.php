<?php
$swiper_id = $args['swiper_id'];
$swiper_button_style = $args['swiper_button_style'];
?>

<?php if (have_rows('cards_slider')) : ?>
  <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-gray-300 bg-opacity-75 hover:bg-opacity-100 z-10 justify-center items-center w-6 h-12 -translate-y-3/4 flex lg:hidden lg:w-16 lg:h-16 lg:-translate-y-2/3" style="<?php echo $swiper_button_style ?>">
    <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
      <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
    </svg>
  </div>
  <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 right-0 bg-gray-300 bg-opacity-75 hover:bg-opacity-100 z-10 justify-center items-center w-6 h-12 -translate-y-3/4 flex lg:flex lg:w-16 lg:h-16 lg:-translate-y-2/3" style="<?php echo $swiper_button_style ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
      <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
    </svg>
  </div>
  <?php if (is_admin()) { ?>
    <div id="<?php echo $swiper_id ?>" class="swiper swiper-content-card">
      <div class="flex overflow-hidden gap-x-6">
        <?php while (have_rows('cards_slider')) : the_row(); ?>
          <div class="swiper-slide max-w-[400px] flex-none">
            <?php
            $img_src = '';
            if (get_sub_field('image')) {
              $img_src = get_sub_field('image')['url'];
            }
            $link_url = '';
            if (get_sub_field('link')) {
              $link_url = get_sub_field('link')['url'];
            }
            $args = array(
              'img_src' => $img_src,
              'img_caption' => get_sub_field('image_caption'),
              'title' => get_sub_field('title'),
              'excerpt' => get_sub_field('excerpt'),
              'plus_sign' => false,
              'link' => $link_url
            );
            echo cl_card($args);
            ?>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  <?php } else { ?>

    <div id="<?php echo $swiper_id ?>" class="swiper swiper-content-card px-4 pb-12 lg:px-0 lg:pb-24">
      <div class="swiper-wrapper">
        <?php while (have_rows('cards_slider')) : the_row(); ?>
          <div class="swiper-slide max-w-[380px]">
            <?php
            $img_src = '';
            if (get_sub_field('image')) {
              $img_src = get_sub_field('image')['url'];
            }
            $link_url = '';
            if (get_sub_field('link')) {
              $link_url = get_sub_field('link')['url'];
            }
            $args = array(
              'img_src' => $img_src,
              'img_caption' => get_sub_field('image_caption'),
              'title' => get_sub_field('title'),
              'excerpt' => get_sub_field('excerpt'),
              'plus_sign' => false,
              'link' => $link_url
            );
            echo cl_card($args);
            ?>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="swiper-pagination px-4 lg:px-0"></div>
    </div>
    <script>
      var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
        slidesPerView: "auto",
        spaceBetween: 24,
        watchOverflow: true,
        pagination: {
          el: "#<?php echo $swiper_id ?> .swiper-pagination",
          clickable: true,
        },
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
            slidesPerView: 'auto',
            spaceBetween: 36
          }
        }
      });
    </script>
  <?php } ?>
<?php endif; ?>