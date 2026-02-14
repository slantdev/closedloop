<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?> border-t border-solid border-neutral-100" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="flex flex-wrap md:flex-nowrap gap-x-8">
      <div class="w-full md:w-1/2">
        <div class="md:max-w-sm">
          <?php
          if (get_sub_field('heading')) {
            get_template_part('template-parts/components/heading', '', array());
          }
          ?>
          <?php if (get_sub_field('description')) { ?>
            <div><?php get_template_part('template-parts/components/description', '', array()); ?></div>
          <?php } ?>
        </div>
      </div>
      <div class="w-full mt-6 md:mt-0 md:w-1/2">
        <?php
        $subscribe_form_shortcode = get_sub_field('subscribe_form_shortcode');
        if ($subscribe_form_shortcode) {
          echo do_shortcode($subscribe_form_shortcode);
        }
        ?>
      </div>
    </div>
  </div>
</section>