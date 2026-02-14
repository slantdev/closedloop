<?php

$two_columns = get_sub_field('two_columns');
//preint_r($two_columns);
$content_left_description = $two_columns['content_left_description'];
$content_left_description_content = $content_left_description['content'];
$content_left_description_color = $content_left_description['color'];
$content_left_description_alignment = $content_left_description['alignment'];
$content_left_description_max_width = $content_left_description['max_width'];
$content_left_description_class = '';
switch ($content_left_description_alignment) {
  case "left":
    $content_left_description_class .= 'mr-auto text-left ';
    break;
  case "center":
    $content_left_description_class .= 'mx-auto text-center ';
    break;
  case "right":
    $content_left_description_class .= 'ml-auto text-right ';
    break;
  default:
    $content_left_description_class .= '';
}
if ($content_left_description_max_width) {
  $content_left_description_class .= $description_max_width;
}
$content_left_description_style = '';
if ($content_left_description_color) {
  $content_left_description_style = 'color: ' . $content_left_description_color . ';';
}

$content_right_description = $two_columns['content_right_description'];
$content_right_description_content = $content_right_description['content'];
$content_right_description_color = $content_right_description['color'];
$content_right_description_alignment = $content_right_description['alignment'];
$content_right_description_max_width = $content_right_description['max_width'];
$content_right_description_class = '';
switch ($content_right_description_alignment) {
  case "left":
    $content_right_description_class .= 'mr-auto text-left ';
    break;
  case "center":
    $content_right_description_class .= 'mx-auto text-center ';
    break;
  case "right":
    $content_right_description_class .= 'ml-auto text-right ';
    break;
  default:
    $content_right_description_class .= '';
}
if ($content_right_description_max_width) {
  $content_right_description_class .= $description_max_width;
}
$content_right_description_style = '';
if ($content_right_description_color) {
  $content_right_description_style = 'color: ' . $content_right_description_color . ';';
}

if ($two_columns) {
  echo '<div class="flex flex-wrap gap-4 md:flex-nowrap lg:gap-12 xl:gap-16">';
  if ($content_left_description) {
    echo '<div class="w-full md:w-1/2">';
    echo '<div class="' . $content_left_description_class . '" style="' . $content_left_description_style . '">';
    echo $content_left_description_content;
    echo '</div>';
    echo '</div>';
  }
  if ($content_right_description) {
    echo '<div class="w-full md:w-1/2">';
    echo '<div class="' . $content_right_description_class . '" style="' . $content_left_description_style . '">';
    echo $content_right_description_content;
    echo '</div>';
    echo '</div>';
  }
  echo '</div>';
}
