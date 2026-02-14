<?php

//$icons = get_sub_field('icons');
$max_width = $args['max_width'] ?? 'none';
$grid_cols = $args['grid_cols'] ?? '';
$grid_x_gap = $args['grid_x_gap'] ?? '';
$grid_class = '';
if ($grid_cols) {
  $grid_class .= $grid_cols . ' ';
}
if ($grid_x_gap) {
  $grid_class .= $grid_x_gap . ' ';
}
// echo '<pre>';
// print_r($icons);
// echo '</pre>';

if (have_rows('icons')) :
  echo '<div class="grid mt-4 md:mt-8 ' . $grid_class . '">';
  while (have_rows('icons')) : the_row();
    $icon_image = get_sub_field('icon_image');
    $icon_src = $icon_image['id'] ?? '';
    $icon_id = $icon_image['id'] ?? '';
    $icon_type = $icon_image['mime_type'] ?? '';
    $icon_text = get_sub_field('icon_text');
    $icon_color = get_sub_field('icon_color');
    $text_class = '';
    if ($icon_color) {
      $text_class = 'color: ' . $icon_color;
    }
    //echo $icon_type;
    // echo '<pre>';
    // print_r($icon_image);
    // echo '</pre>';
    //if ($icon_type == 'image/svg+xml') {
    //echo 'SVG';
    //echo cl_icon(array('icon_src' => $icon_src, 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4'));
    //}
    //echo cl_icon(array('icon' => 'recycle-bin', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4'));
    echo '<div class="flex items-center md:flex-col md:items-center">';
    echo '<div class="flex-none pr-6 md:pr-0 md:mx-auto" style="max-width: ' . $max_width . '">';
    echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'mx-auto w-12 h-auto md:w-auto'));
    echo '</div>';
    echo '<div class="leading-tight text-lg font-bold md:mt-4 md:text-center" style="' . $text_class . '">';
    echo $icon_text;
    echo '</div>';
    echo '</div>';
  endwhile;
  echo '</div>';
endif;
