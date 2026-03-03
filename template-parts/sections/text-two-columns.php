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

<section id="<?php echo $section_id ?>" class="section-scroll" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php get_template_part('template-parts/components/heading', '', array()); ?>
      <div class="flex flex-wrap lg:flex-nowrap md:gap-x-6 lg:gap-x-10 xl:gap-x-20 relative">
        <div class="w-full lg:w-1/2">
          <div class="prose">
            <?php get_template_part('template-parts/components/description', '', array('field' => 'text_column_left_description')); ?>
          </div>
        </div>
        <div class="w-full lg:w-1/2">
          <div class="prose">
            <?php get_template_part('template-parts/components/description', '', array('field' => 'text_column_right_description')); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>