<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';

/** @var string $section_id */
/** @var string $section_class */
/** @var string $section_style */
/** @var string $padding_top */
/** @var string $padding_bottom */
/** @var string $loop_overlay_tr */
/** @var string $loop_overlay_br */
?>
<!-- Icons Grid -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php get_template_part('template-parts/components/heading', '', array()); ?>
      <?php
      if (is_admin()) {
        get_template_part('template-parts/previews/icons-grid', '', array('max_width' => '112px'));
      } else {
        get_template_part('template-parts/components/icons-slider', '', array('max_width' => '112px'));
      }
      ?>
    </div>
  </div>
</section>