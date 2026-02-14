<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
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