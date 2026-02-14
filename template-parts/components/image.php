<?php
$image = get_sub_field('image');
$image_src = $image['image_source']['url'];
$image_id = $image['image_source']['ID'];
$rounded_corners = $image['rounded_corners'];
$image_max_width = $image['max_width'];
$image_container_class = '';
switch ($image_max_width) {
  case "none":
    $image_container_class = 'max-w-none';
    break;
  case "xs":
    $image_container_class = 'max-w-xs';
    break;
  case "sm":
    $image_container_class = 'max-w-sm';
    break;
  case "md":
    $image_container_class = 'max-w-md';
    break;
  case "lg":
    $image_container_class = 'max-w-lg';
    break;
  case "xl":
    $image_container_class = 'max-w-xl';
    break;
  case "2xl":
    $image_container_class = 'max-w-2xl';
    break;
  default:
    $image_container_class = 'max-w-full';
}
if ($image_container_class) {
}
if ($image_id) {
  echo '<div class="mb-8 mx-auto xl:mb-12 ' . $image_container_class . '">';
  echo wp_get_attachment_image($image_id, 'large', false, array('class' => $rounded_corners . ' mx-auto'));
  echo '</div>';
}
