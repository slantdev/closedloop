<?php

$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

$field = $args['field'];
$class = $args['class'];

//echo $field;
if ($field) {
  $heading = get_sub_field($field);
} else {
  $heading = get_sub_field('heading');
}
$heading_text = $heading['text'];
$heading_color = $heading['color'];
if (!$heading_color) {
  $heading_color = $color_theme;
}
$heading_size = $heading['size'];
$heading_tag = $heading['tag'];
$heading_alignment = $heading['alignment'];
$heading_mb = $heading['margin_bottom'];
$heading_class = 'font-bold leading[1.1em] ' . $class;
switch ($heading_size) {
  case "xs":
    $heading_class .= ' text-xs';
    break;
  case "sm":
    $heading_class .= ' text-sm';
    break;
  case "md":
    $heading_class .= ' text-md';
    break;
  case "lg":
    $heading_class .= ' text-lg';
    break;
  case "xl":
    $heading_class .= ' text-xl';
    break;
  case "2xl":
    $heading_class .= ' text-2xl';
    break;
  case "3xl":
    $heading_class .= ' text-3xl';
    break;
  case "4xl":
    $heading_class .= ' text-4xl';
    break;
  case "5xl":
    $heading_class .= ' text-5xl';
    break;
  default:
    $heading_class .= ' text-base';
}
switch ($heading_mb) {
  case "none":
    $heading_class .= ' mb-0';
    break;
  case "xs":
    $heading_class .= ' mb-2 xl:mb-4';
    break;
  case "sm":
    $heading_class .= ' mb-4 xl:mb-8';
    break;
  case "md":
    $heading_class .= ' mb-8 xl:mb-12';
    break;
  case "lg":
    $heading_class .= ' mb-12 xl:mb-16';
    break;
  case "xl":
    $heading_class .= ' mb-16 xl:mb-20';
    break;
  case "2xl":
    $heading_class .= ' mb-20 xl:mb-24';
    break;
  default:
    $heading_class .= ' mb-4 xl:mb-8';
}
switch ($heading_alignment) {
  case "left":
    $heading_class .= ' text-left';
    break;
  case "center":
    $heading_class .= ' text-center';
    break;
  case "right":
    $heading_class .= 'text-right';
    break;
  default:
    $heading_class .= '';
}
