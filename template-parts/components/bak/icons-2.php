<?php

//$icons = get_sub_field('icons');
$max_width = $args['max_width'];
$grid_cols = $args['grid_cols'];
$grid_x_gap = $args['grid_x_gap'];
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
  echo '<div class="grid ' . $grid_class . '">';
  while (have_rows('icons')) : the_row();
    $icon_image = get_sub_field('icon_image');
    $icon_src = $icon_image['id'];
    $icon_id = $icon_image['id'];
    $icon_type = $icon_image['mime_type'];
    $icon_text = get_sub_field('icon_text');
    $icon_color = get_sub_field('icon_color');
    $text_class = '';
    if ($icon_color) {
      $text_class = 'color: ' . $icon_color;
    }
    echo '<div class="flex flex-col items-center">';
    echo '<div class="mx-auto" style="max-width: ' . $max_width . '">';
    echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'mx-auto'));
    echo '</div>';
    echo '<div class="mt-4 text-center text-4xl leading-none font-bold" style="' . $text_class . '">';
    echo $icon_text;
    echo '</div>';
    echo '</div>';
  endwhile;
  echo '</div>';
endif;
