<?php
$field = $args['field'] ?? '';
$buttons_alignment = get_sub_field($field . 'buttons_alignment') ?? 'left';
$button_container_class = '';
switch ($buttons_alignment) {
  case "left":
    $button_container_class = 'text-left';
    break;
  case "right":
    $button_container_class = 'text-right';
    break;
  case "center":
    $button_container_class = 'text-center mx-auto';
    break;
  default:
    $button_container_class = 'text-left';
}
$buttons = get_sub_field($field . 'buttons');
if ($buttons) {
  echo '<div class="mb-6 xl:mb-0 ' . $button_container_class . '">';
  $button_count = is_countable($buttons) ? count($buttons) : 0;
  $button_margin = "";
  if ($button_count > 1) {
    $button_margin = "mr-4 mb-4";
  }
  if (have_rows($field . 'buttons')) :

    while (have_rows($field . 'buttons')) : the_row();
      $button = get_sub_field('button');
      $button_text = $button['button_text'] ?? '';
      $button_text_color = $button['button_text_color'] ?? '';
      $button_color = $button['button_color'] ?? '';
      $button_size = $button['button_size'] ?? '';
      $button_link_title = $button['button_link']['title'] ?? '';
      $button_link_url = $button['button_link']['url'] ?? '';
      $button_link_target = $button['button_link']['target'] ?? '';
      $button_class = '';
      $button_style = '';
      if ($button_color) {
        $button_style .= 'background-color:' . $button_color . ';';
      }
      if ($button_text_color) {
        $button_style .= 'color:' . $button_text_color . ';';
      }
      switch ($button_size) {
        case "xs":
          $button_class = 'px-4 py-2 rounded-md text-xs';
          break;
        case "sm":
          $button_class = 'px-6 py-2 rounded-md text-sm';
          break;
        case "md":
          $button_class = 'px-8 py-3 rounded-md text-sm';
          break;
        case "lg":
          $button_class = 'px-10 py-4 rounded-md text-base';
          break;
        case "xl":
          $button_class = 'px-12 py-5 rounded-md text-base';
          break;
        default:
          $button_class = 'px-8 py-3 rounded-md text-sm';
      }
      if ($button_link_url) {
        echo '<a href="' . $button_link_url . '" class="text-white uppercase inline-block transition duration-300 hover:brightness-110 ' . $button_class . ' ' . $button_margin . '" style="' . $button_style . '" title="' . $button_link_title . '" target="' . $button_link_target . '">' . $button_text . '</a>';
      }
    endwhile;
  endif;
  echo '</div>';
}
