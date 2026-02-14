<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';


$color_theme = get_field('color_theme', $the_id);
//preint_r($content_cards);
$swiper_nav_style = 'background-color: rgba(0,0,0,.5)';
if ($color_theme) {
  $swiper_nav_style = 'background-color: ' . $color_theme . ';';
}
?>
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="mb-16">
        <?php get_template_part('template-parts/components/heading', '', array()); ?>
        <?php get_template_part('template-parts/components/description', '', array()); ?>
      </div>
      <?php if (have_rows('cards_slide_image')) : ?>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-8 xl:gap-12">
          <?php while (have_rows('cards_slide_image')) : the_row();
            $images = get_sub_field('card_slide_image')['images'];
            $title = get_sub_field('card_slide_image')['title'];
            $excerpt = get_sub_field('card_slide_image')['description'];
            $link = get_sub_field('card_slide_image')['link'];
            if (!$link) {
              $link = 'none';
            }
          ?>
            <div>
              <?php
              if ($images) :
                $swiper_id = 'swiper_' . uniqid();
              ?>
                <?php if (is_admin()) { ?>
                  <div class="mb-6">
                    <div id="<?php echo $swiper_id ?>" class="swiper relative">
                      <div class="swiper-wrapper">
                        <div class="swiper-slide aspect-[5/4] bg-white rounded-xl">
                          <img class="h-full w-full object-contain" src="<?php echo esc_url($images[0]['url']); ?>" />
                        </div>
                      </div>
                      <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-3/4 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
                        <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
                          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
                        </svg>
                      </div>
                      <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-3/4 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
                          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
                        </svg>
                      </div>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="mb-6">
                    <div id="<?php echo $swiper_id ?>" class="swiper relative">
                      <div class="swiper-wrapper">
                        <?php foreach ($images as $image) : ?>
                          <div class="swiper-slide aspect-[5/4] bg-white rounded-xl">
                            <img class="h-full w-full object-contain" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                          </div>
                        <?php endforeach; ?>
                      </div>
                      <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-3/4 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
                        <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
                          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
                        </svg>
                      </div>
                      <div class="<?php echo $swiper_id ?>_button_next text-white absolute top-1/2 right-0 bg-opacity-25 transition duration-300 hover:bg-opacity-50 z-10 w-8 h-12 -translate-y-3/4 flex justify-center items-center" style="<?php echo $swiper_nav_style ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
                          <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
                        </svg>
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
                  </div>
                <?php } ?>
              <?php endif; ?>
              <h4 class="text-xl font-bold mb-2"><?php echo $title; ?></h4>
              <div><?php echo $excerpt; ?></div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
      <?php
      $buttons = get_sub_field('cards_slide_buttons_buttons');
      if ($buttons) {
        echo '<div class="mt-24">';
        get_template_part('template-parts/components/button', '', array('field' => 'cards_slide_buttons_'));
        echo '</div>';
      }
      ?>
    </div>

  </div>
</section>