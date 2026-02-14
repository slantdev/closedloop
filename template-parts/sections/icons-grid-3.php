<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>
<!-- Icons Grid -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php
      if (have_rows('icons')) :
        echo '<div class="grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-4 md:gap-x-12 md:gap-y-16 xl:gap-x-16 xl:gap-y-24 mx-auto max-w-6xl">';
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
              $icon_style .= 'max-width: 128px';
              break;
            case "md":
              $icon_style .= 'max-width: 148px';
              break;
            case "lg":
              $icon_style .= 'max-width: 200px';
              break;
            default:
              $icon_style .= 'max-width: 200px';
          }
          $text_class = '';
          if ($icon_color) {
            $text_class = 'color: ' . $icon_color;
          }
          if ($icon_link) {
            echo '<a href="' . $icon_link['url'] . '" target="' . $icon_link['target'] . '" class="flex flex-col items-center cursor-pointer">';
          } else {
            echo '<div class="flex flex-col items-center">';
          }
          echo '<div class="mx-auto w-full" style="' . $icon_style . '">';
          if ($icon_type == 'image/svg+xml') {
            echo '<div class="w-32 lg:w-auto max-w-[100px] lg:max-w-[128px] mx-auto" style="' . $text_class . '">';
            echo cl_icon(array('icon_src' => $icon_src, 'size' => 112, 'class' => 'h-24 lg:h-28 w-auto mx-auto mb-0'));
            echo '</div>';
          } else {
            echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'h-24 lg:h-28 w-auto mx-auto mb-0'));
          }
          echo '</div>';
          if ($icon_text) {
            echo '<h4 class="text-sm mt-1 font-medium text-center lg:text-lg" style="' . $text_class . '">' . $icon_text . '</h4>';
          }
          if ($icon_link) {
            echo '</a>';
          } else {
            echo '</div>';
          }
        endwhile;
        echo '</div>';
      endif;
      ?>
    </div>
  </div>
</section>