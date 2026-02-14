<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>

<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="mb-16">
        <div class="flex justify-between">
          <?php get_template_part('template-parts/components/heading', '', array()); ?>
        </div>
      </div>
      <?php
      $term_id = get_sub_field('product_categories');
      if ($term_id) {
      ?>
        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-12">
          <?php
          $taxonomy_name = 'product_category';
          $termchildren = get_term_children($term_id, $taxonomy_name);
          foreach ($termchildren as $child) {
            $term = get_term_by('id', $child, $taxonomy_name);
            $thumbnail = get_field('featured_image', $term->taxonomy . '_' . $term->term_id);
            $args = array(
              'img_src' => $thumbnail['url'],
              'title' => $term->name,
              'excerpt' => $term->description,
              'plus_sign' => false,
              'object_fit' => 'cover',
              'link' => get_term_link($child, $taxonomy_name)
            );
            echo cl_card($args);
          }
          echo '</ul>';
          ?>
        </div>
      <?php } ?>
    </div>
  </div>
</section>