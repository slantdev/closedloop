<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
include get_template_directory() . '/template-parts/components/heading-vars.php';
?>
<!-- Text + Components -->
<section id="<?php echo $section_id ?>" class="section-scroll" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php
    if ($heading_tag) {
      echo '<' . $heading_tag . ' class="' . $heading_class . '" style="color: ' . $heading_color . '">' . $heading_text . '</' . $heading_tag . '>';
    }
    ?>
    <div class="flex">
      <div class="w-3/4 pr-16">
        <div class="prose">
          <?php echo cl_component('left_column_component'); ?>
        </div>
      </div>
      <div class="w-1/4 text-right pl-16 border-l border-gray-300">
        <?php echo cl_component('right_column_component'); ?>
      </div>
    </div>
    <div class="pt-24">
      <?php echo cl_component('bottom_column_component'); ?>
    </div>
  </div>
</section>