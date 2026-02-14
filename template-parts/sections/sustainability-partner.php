<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

include get_template_directory() . '/template-parts/layout/section-settings.php';

// $row_1 = get_sub_field('row_1');
// $row_2 = get_sub_field('row_2');
// $heading_1 = $row_1['heading'];
// $heading_2 = $row_2['heading'];
// $description_1 = $row_1['description'];
// $description_2 = $row_2['description'];
// $button_text = $row_1['button_text'];
// $button_link = $row_2['button_link'];
// preint_r($heading_1);
// preint_r($heading_1);
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative max-w-5xl mx-auto md:px-5 z-10">
      <?php if (get_sub_field('heading_1_heading')) { ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-x-20">
          <div>
            <?php echo get_template_part('template-parts/components/heading', '', array('field' => 'heading_1_heading')); ?>
          </div>
          <div>
            <?php echo get_template_part('template-parts/components/description', '', array('field' => 'description_1_description')); ?>
          </div>
        </div>
      <?php } ?>
      <?php if (get_sub_field('heading_2_heading')) { ?>
        <div class="md:max-w-[300px] border-b border-gray-500 my-10 md:my-20 mx-auto"></div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-x-20">
          <div class="md:order-2">
            <?php echo get_template_part('template-parts/components/heading', '', array('field' => 'heading_2_heading')); ?>
          </div>
          <div>
            <?php echo get_template_part('template-parts/components/description', '', array('field' => 'description_2_description')); ?>
          </div>
        </div>
      <?php } ?>
      <?php if (get_sub_field('content_buttons_buttons')) { ?>
        <div class="flex justify-center mt-12 md:mt-20">
          <?php echo get_template_part('template-parts/components/button', '', array('field' => 'content_buttons_')); ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>