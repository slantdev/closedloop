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

$icons_field = get_sub_field('icons');
$count_icons = is_countable($icons_field) ? count($icons_field) : 0;
$flex_class = 'flex-1';
if ($count_icons > 3) {
  $flex_class = 'flex-auto';
}
if (have_rows('icons')) :
  //echo '<div class="grid ' . $grid_class . '">';
  echo '<div class="flex flex-wrap items-center justify-center max-w-6xl gap-x-8 gap-y-8 mx-auto lg:gap-x-24 lg:gap-y-16">';
  while (have_rows('icons')) : the_row();
    $icon_image = get_sub_field('icon_image');
    $icon_src = $icon_image['id'] ?? '';
    $icon_id = $icon_image['id'] ?? '';
    $icon_type = $icon_image['mime_type'] ?? '';
    $icon_text = get_sub_field('icon_text');
    $icon_color = get_sub_field('icon_color');
    $icon_size = get_sub_field('icon_size');
    $icon_link = get_sub_field('icon_link');
    $icon_style = '';
    switch ($icon_size) {
      case "sm":
        $icon_style .= 'max-width: 128px';
        break;
      case "md":
        $icon_style .= 'max-width: 148px';
        break;
      case "lg":
        $icon_style .= 'max-width: 200px';
        break;
      default:
        $icon_style .= 'max-width: 200px';
    }
    $icon_class = '';
    switch ($icon_size) {
      case "sm":
        $icon_class .= 'max-w-[80px] md:max-w-[128px]';
        break;
      case "md":
        $icon_class .= 'max-w-[80px] md:max-w-[148px]';
        break;
      case "lg":
        $icon_class .= 'max-w-[80px] md:max-w-[200px]';
        break;
      default:
        $icon_class .= 'max-w-[80px] md:max-w-[200px]';
    }
    $text_class = '';
    if ($icon_color) {
      $text_class = 'color: ' . $icon_color;
    }
    if ($icon_link && isset($icon_link['url'])) {
      echo '<a href="' . $icon_link['url'] . '" target="' . ($icon_link['target'] ?? '_self') . '" class="block cursor-pointer ' . $flex_class . '">';
    } else {
      echo '<div class="' . $flex_class . '">';
    }
    echo '<div class="mx-auto min-w-[80px] ' . $icon_class . '">';
    if ($icon_type == 'image/svg+xml') {
      echo '<div class="w-32 lg:w-auto max-w-[128px] mx-auto" style="' . $text_class . '">';
      echo cl_icon(array('icon_src' => $icon_src, 'size' => 112, 'class' => 'mx-auto w-32 lg:w-auto'));
      echo '</div>';
    } else {
      echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'mx-auto w-32 lg:w-auto'));
    }
    echo '</div>';
    if ($icon_text) {
      echo '<div class="mt-4 text-center text-xl leading-none font-bold lg:text-2xl" style="' . $text_class . '">';
      echo $icon_text;
      echo '</div>';
    }
    if ($icon_link) {
      echo '</a>';
    } else {
      echo '</div>';
    }
  endwhile;
  echo '</div>';
endif;
