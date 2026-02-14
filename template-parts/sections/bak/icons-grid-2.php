<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
include get_template_directory() . '/template-parts/components/heading-vars.php';
?>
<!-- Icons Grid -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php
    if ($heading_text) {
      echo '<' . $heading_tag . ' class="' . $heading_class . ' mb-14" style="color: ' . $heading_color . '">' . $heading_text . '</' . $heading_tag . '>';
    }
    get_template_part('template-parts/components/icons-2', '', array('max_width' => '148px', 'grid_cols' => 'grid-cols-3', 'grid_x_gap' => 'gap-x-12'));
    ?>
  </div>
</section>

<!-- Icons Grid 2 -->
<!-- <section class="bg-neutral-100">
  <div class="container mx-auto py-24">
    <h2 class="text-coral text-center text-4xl font-bold mb-24">Icons Grid - Style 2</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
      <div class="flex flex-col items-center">
        <?php echo cl_icon(array('icon' => 'light-bulb', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
        <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">20+ years</h4>
        <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
      </div>
      <div class="flex flex-col items-center">
        <?php echo cl_icon(array('icon' => 'recycle-bin', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
        <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">150+ clients</h4>
        <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
      </div>
      <div class="flex flex-col items-center">
        <?php echo cl_icon(array('icon' => 'recycle', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
        <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">∞ possibilities</h4>
        <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
      </div>
    </div>
  </div>
</section> -->