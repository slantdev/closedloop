<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';

echo '<section id="' . $section_id . '" class="' . $section_class . '" style="' . $section_style . '">';
echo '<div class="container mx-auto relative ' . $padding_top . ' ' . $padding_bottom . '">';
echo $loop_overlay_tr;
echo $loop_overlay_br;
echo '<div class="flex flex-wrap relative lg:flex-nowrap lg:gap-x-16 xl:gap-x-20">';
echo '<div class="w-full md:mb-8 lg:mb-0 lg:w-1/2">';
get_template_part('template-parts/components/image');
get_template_part('template-parts/components/button');
echo '</div>';
echo '<div class="w-full flex flex-col lg:w-1/2">';
get_template_part('template-parts/components/heading', '', array('field' => 'sub_heading_heading'));
get_template_part('template-parts/components/heading', '', array('field' => 'main_heading_heading'));
get_template_part('template-parts/components/description');
$buttons = get_sub_field('content_buttons_buttons');
if ($buttons) {
  echo '<div class="mt-8">';
  get_template_part('template-parts/components/button', '', array('field' => 'content_buttons_'));
  echo '</div>';
}
get_template_part('template-parts/components/icons', '', array('grid_cols' => 'grid-cols-1 md:grid-cols-3', 'grid_x_gap' => 'gap-6 md:gap-8'));
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
