<?php

$swiper_id = 'swiper_' . uniqid();
$icons_per_view = get_sub_field('icons_per_view');
$small_screen = $icons_per_view['small_screen'];
$medium_screen = $icons_per_view['medium_screen'];
$large_screen = $icons_per_view['large_screen'];

if (have_rows('icons')) :
  echo '<div class="grid grid-flow-col gap-x-8">';
  while (have_rows('icons')) : the_row();
    $icon_image = get_sub_field('icon_image');
    $icon_src = $icon_image['id'];
    $icon_id = $icon_image['id'];
    $icon_type = $icon_image['mime_type'];
    $icon_text = get_sub_field('icon_text');
    $icon_size = get_sub_field('icon_size');
    $icon_color = get_sub_field('icon_color');
    $text_class = '';
    if ($icon_color) {
      $text_class = 'color: ' . $icon_color;
    }
    echo '<div class="swiper-slide">';
    echo '<div class="flex flex-col items-center">';
    echo '<div class="mx-auto" style="max-width: ' . $max_width . '">';
    echo wp_get_attachment_image($icon_id, 'large', false, array('class' => 'mx-auto'));
    echo '</div>';
    echo '<div class="mt-4 text-center leading-tight text-xl font-bold" style="' . $text_class . '">';
    echo $icon_text;
    echo '</div>';
    echo '</div>';
    echo '</div>';
  endwhile;
  echo '</div>';
endif;
