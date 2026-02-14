<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
include get_template_directory() . '/template-parts/components/heading-vars.php';

$cards_slider = get_sub_field('cards_slider');
// echo '<pre>';
// print_r($cards_slider);
// echo '</pre>';
$swiper_id = '';
$swiper_button_style = '';
if ($cards_slider) {
  $swiper_id = 'swiper_' . uniqid();
  if ($section_background_color) {
    $swiper_button_style = 'background-color:' . $section_background_color;
    $swiper_button_style = '';
  }
}
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative flex flex-wrap w-full lg:flex-nowrap">
      <?php if ($cards_slider) { ?>
        <div class="<?php echo $swiper_id ?>_button_prev text-white absolute top-1/2 left-0 bg-gray-300 bg-opacity-75 hover:bg-opacity-100 z-10 w-16 h-16 -translate-y-2/3 justify-center items-center hidden lg:flex">
          <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="10.553" height="18.277" viewBox="0 0 10.553 18.277">
            <path d="M102.474,67.483l8.432,8.432-8.432,8.431" transform="translate(-101.766 -66.776)" fill="none" stroke="#fff" stroke-width="2" />
          </svg>
        </div>
      <?php } ?>
      <div class="w-full flex justify-end text-white lg:w-1/3 lg:px-8 xl:pl-10 xl:pr-0">
        <div class="w-full px-4 flex flex-col relative mb-8 lg:mb-0 lg:px-0 lg:max-w-[380px]">
          <?php get_template_part('template-parts/components/heading', '', array()); ?>
          <div class="mt-auto mb-0 lg:mb-20">
            <?php get_template_part('template-parts/components/description', '', array()); ?>
          </div>
          <?php
          $button = get_sub_field('button');
          $button_text = $button['button_text'];
          $button_color = $button['button_color'];
          $button_size = $button['button_size'];
          $button_link = $button['button_link'];
          $button_link_title = '';
          $button_link_url = '';
          $button_link_target = '';
          if ($button_link) {
            $button_link_title = $button_link['title'];
            $button_link_url = $button_link['url'];
            $button_link_target = $button_link['target'];
          }
          $button_class = '';
          switch ($button_size) {
            case "xs":
              $button_class = 'px-4 py-2 rounded-md text-xs';
              break;
            case "sm":
              $button_class = 'px-6 py-2 rounded-md text-sm';
              break;
            case "md":
              $button_class = 'px-8 py-3 rounded-md text-sm';
              break;
            case "lg":
              $button_class = 'px-10 py-4 rounded-md text-base';
              break;
            case "xl":
              $button_class = 'px-12 py-5 rounded-md text-base';
              break;
            default:
              $button_class = 'px-8 py-3 rounded-md text-sm';
          }
          if ($button_link_url && $button_text) {
            echo '<div class="mb-2"><a href="' . $button_link_url . '" class="text-darkblue font-medium uppercase inline-block ' . $button_class . '" style="background-color: ' . $button_color . '" title="' . $button_text . '" target="' . $button_link_target . '">' . $button_text . '</a></div>';
          }
          ?>
        </div>
      </div>
      <div class="w-full lg:w-2/3 relative xl:pl-20">
        <?php
        if ($cards_slider) {
          get_template_part('template-parts/components/cards-slider', '', array('swiper_id' => $swiper_id, 'swiper_button_style' => $swiper_button_style));
        }
        ?>
      </div>
    </div>
  </div>
</section>