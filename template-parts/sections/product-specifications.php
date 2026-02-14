<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

include get_template_directory() . '/template-parts/layout/section-settings.php';
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="flex gap-x-20">
        <div class="w-1/2 pt-16">
          <?php get_template_part('template-parts/components/heading', '', array('field' => 'main_heading_heading')) ?>
          <?php
          $product_specifications = get_sub_field('product_specifications');
          $width = $product_specifications['width'];
          $height = $product_specifications['height'];
          $depth = $product_specifications['depth'];
          $weight = $product_specifications['weight'];
          if ($width || $height || $depth || $weight) {
            echo '<div class="flex mb-16 gap-x-8">';
            if ($width || $height || $depth) {
              echo '<div class="w-1/2">';
              echo '<h4 class="font-bold mb-4">Dimensions</h4>';
              echo '<ul class="flex flex-col gap-y-2">';
              if ($width) {
                echo '<li><strong>Width:</strong> ' . $width . '</li>';
              }
              if ($height) {
                echo '<li><strong>Height:</strong> ' . $height . '</li>';
              }
              if ($depth) {
                echo '<li><strong>Depth:</strong> ' . $depth . '</li>';
              }
              echo '</ul>';
              echo '</div>';
            }
            if ($weight) {
              echo '<div class="w-1/2">';
              echo '<h4 class="font-bold mb-4">Weight</h4>';
              echo '<div>';
              echo $weight;
              echo '</div>';
              echo '</div>';
            }
            echo '</div>';
          } ?>

          <?php get_template_part('template-parts/components/heading', '', array('field' => 'sub_heading_heading')); ?>
          <?php get_template_part('template-parts/components/description') ?>
        </div>
        <div class="w-1/2">
          <?php get_template_part('template-parts/components/image') ?>
          <?php get_template_part('template-parts/components/button') ?>
        </div>
      </div>
    </div>
  </div>
</section>