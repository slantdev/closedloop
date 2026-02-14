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
      <?php get_template_part('template-parts/components/icons-grid-2', '', array('max_width' => '148px', 'grid_cols' => 'grid-cols-3', 'grid_x_gap' => 'gap-x-12')); ?>
    </div>
  </div>
</section>