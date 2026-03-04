<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

include get_template_directory() . '/template-parts/layout/section-settings.php';

/** @var string $section_id */
/** @var string $section_class */
/** @var string $section_style */
/** @var string $padding_top */
/** @var string $padding_bottom */
/** @var string $loop_overlay_tr */
/** @var string $loop_overlay_br */
?>
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php echo cl_component('components_component'); ?>
    </div>
  </div>
</section>