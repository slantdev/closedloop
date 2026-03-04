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
<!-- Text + Components -->
<section id="<?php echo $section_id ?>" class="section-scroll" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php
      $heading = get_sub_field('heading');
      if ($heading) {
      ?>
        <div class="flex">
          <div class="w-full lg:w-2/3">
            <?php get_template_part('template-parts/components/heading', '', array()); ?>
          </div>
        </div>
      <?php } ?>

      <div class="flex flex-wrap lg:flex-nowrap">
        <div class="w-full lg:w-2/3 lg:pr-16">
          <?php
          get_template_part('template-parts/components/description');
          ?>
        </div>
        <?php
        $buttons = get_sub_field('buttons');
        if ($buttons) { ?>
          <div class="w-full lg:w-1/3 lg:pl-16 lg:text-right lg:border-l lg:border-gray-300">
            <?php
            get_template_part('template-parts/components/button');
            ?>
          </div>
        <?php } ?>
      </div>
      <?php if (have_rows('bottom_component_component')) : ?>
        <div class="mt-6 lg:mt-8">
          <?php echo cl_component('bottom_component_component'); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>