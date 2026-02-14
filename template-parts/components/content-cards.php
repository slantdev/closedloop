<?php

$swiper_id = 'swiper_' . uniqid();
//$swiper_button_style = $args['swiper_button_style'];
?>

<?php if (have_rows('content_cards')) : ?>
  <?php if (is_admin()) { ?>
    <div class="relative">
      <div id="<?php echo $swiper_id ?>" class="swiper swiper-content-card">
        <div class="swiper-wrapper mx-auto overflow-hidden flex gap-x-8">
          <?php while (have_rows('content_cards')) : the_row(); ?>
            <div class="swiper-slide flex-none">
              <div class="max-w-sm mx-auto h-full">
                <?php
                $link = get_sub_field('card')['link'];
                //echo $link;
                //preint_r(get_sub_field('card')['link']);
                if (!$link) {
                  $link = 'none';
                }
                $args = array(
                  'img_src' => get_sub_field('card')['image']['url'],
                  'img_caption' => get_sub_field('card')['image_caption'],
                  'title' => get_sub_field('card')['title'],
                  'excerpt' => get_sub_field('card')['description'],
                  'plus_sign' => false,
                  'link' => $link
                );
                echo cl_card($args);
                ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
      <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 -left-24 bg-white bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-12 h-16 -translate-y-3/4 flex justify-center items-center">
        <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
        </svg>
      </div>
      <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 -right-24 bg-white bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-12 h-16 -translate-y-3/4 flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
        </svg>
      </div>
    </div>
  <?php } else { ?>
    <div class="relative">
      <div id="<?php echo $swiper_id ?>" class="swiper swiper-content-card">
        <div class="swiper-wrapper">
          <?php while (have_rows('content_cards')) : the_row(); ?>
            <div class="swiper-slide">
              <div class="max-w-sm mx-auto h-full">
                <?php
                $link = get_sub_field('card')['link'];
                //echo $link;
                //preint_r(get_sub_field('card')['link']);
                if (!$link) {
                  $link = 'none';
                }
                $args = array(
                  'img_src' => get_sub_field('card')['image']['url'],
                  'img_caption' => get_sub_field('card')['image_caption'],
                  'title' => get_sub_field('card')['title'],
                  'excerpt' => get_sub_field('card')['description'],
                  'plus_sign' => false,
                  'link' => $link
                );
                echo cl_card($args);
                ?>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 -left-24 bg-white bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-12 h-16 -translate-y-3/4 flex justify-center items-center">
        <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
        </svg>
      </div>
      <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 -right-24 bg-white bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-12 h-16 -translate-y-3/4 flex justify-center items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
        </svg>
      </div>
      <script>
        var <?php echo $swiper_id ?>_swiper = new Swiper("#<?php echo $swiper_id ?>", {
          slidesPerView: 'auto',
          spaceBetween: 16,
          watchOverflow: true,
          centerInsufficientSlides: true,
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
          pagination: {
            el: "#<?php echo $swiper_id ?> .swiper-pagination",
            clickable: true,
          },
          navigation: {
            nextEl: ".<?php echo $swiper_id ?>_button_next",
            prevEl: ".<?php echo $swiper_id ?>_button_prev",
          },
        });
      </script>
    </div>
  <?php } ?>
<?php endif; ?>