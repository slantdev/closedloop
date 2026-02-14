<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';

$content_cards = get_sub_field('content_cards');
$card_layout = get_sub_field('card_layout');
//preint_r($content_cards);

$swiper_id = '';
$swiper_button_style = '';
if ($card_layout == 'slider') {
  $swiper_id = 'swiper_' . uniqid();
  if ($section_background_color) {
    $swiper_button_style = 'background-color:' . $section_background_color;
  }
}
?>
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="mb-8 xl:mb-16">
        <?php get_template_part('template-parts/components/heading', '', array()); ?>
        <?php get_template_part('template-parts/components/description', '', array()); ?>
      </div>
      <?php
      if ($card_layout == 'slider') {
        get_template_part('template-parts/components/content-cards', '', array('swiper_id' => $swiper_id, 'swiper_button_style' => $swiper_button_style));
      }
      ?>
      <?php
      if ($card_layout == 'grid') {
        if (have_rows('content_cards')) :
          echo '<div class="grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-12">';
          while (have_rows('content_cards')) : the_row();

            $link = get_sub_field('card')['link'];
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

          endwhile;
          echo '</div>';
        endif;
      }
      ?>
    </div>
  </div>
</section>