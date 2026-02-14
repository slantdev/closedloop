<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';

echo '<section id="' . $section_id . '" class="section-scroll" style="' . $section_style . '">';
echo '<div class="container mx-auto relative ' . $padding_top . ' ' . $padding_bottom . '">';
echo $loop_overlay_tr;
echo '<div>';
echo cl_component('heading_column_component');
echo '</div>';
echo '<div class="flex gap-x-20 relative items-center">';
echo '<div class="w-1/2">';
echo cl_component('left_column_component');
echo '</div>';
echo '<div class="w-1/2">';
echo cl_component('right_column_component');
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
