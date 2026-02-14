<?php
/*
 * Page Settings Variables
 */
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

/*
 * Section Settings Variables
 */
$section_settings = get_sub_field('section_settings');
$section_background_color = $section_settings['section_background_color'] ?? '';
$section_style = '';
if ($section_background_color) {
  $section_style = 'background-color:' . $section_background_color;
}
$spacing_top = $section_settings['section_spacing']['spacing_top'] ?? 'md';
$spacing_bottom = $section_settings['section_spacing']['spacing_bottom'] ?? 'md';
$add_section_anchor = $section_settings['add_section_anchor'] ?? false;
$section_id = '';
if ($add_section_anchor) {
  $section_id = $section_settings['section_id'] ?? '';
}
$padding_top = '';
switch ($spacing_top) {
  case "none":
    $padding_top = 'pt-0';
    break;
  case "xs":
    $padding_top = 'pt-4 lg:pt-8 xl:pt-8';
    break;
  case "sm":
    $padding_top = 'pt-6 xl:pt-14';
    break;
  case "md":
    $padding_top = 'pt-12 xl:pt-20';
    break;
  case "lg":
    $padding_top = 'pt-16 xl:pt-28';
    break;
  case "xl":
    $padding_top = 'pt-20 xl:pt-36';
    break;
  case "2xl":
    $padding_top = 'pt-24 xl:pt-44';
    break;
  default:
    $padding_top = 'pt-20 xl:pt-36';
}
$padding_bottom = '';
switch ($spacing_bottom) {
  case "none":
    $padding_bottom = 'pb-0';
    break;
  case "xs":
    $padding_bottom = 'pb-4 xl:pb-8';
    break;
  case "sm":
    $padding_bottom = 'pb-6 xl:pb-14';
    break;
  case "md":
    $padding_bottom = 'pb-12 xl:pb-20';
    break;
  case "lg":
    $padding_bottom = 'pb-16 xl:pb-28';
    break;
  case "xl":
    $padding_bottom = 'pb-20 xl:pb-36';
    break;
  case "2xl":
    $padding_bottom = 'pb-24 xl:pb-44';
    break;
  default:
    $padding_bottom = 'pb-20 xl:pb-36';
}
$loop_icon_overlay = $section_settings['loop_icon_overlay'] ?? null;
$loop_overlay_tr_active = $loop_icon_overlay['top_right']['activate'] ?? false;
$loop_overlay_tr = '';
if ($loop_overlay_tr_active) {
  if (($loop_icon_overlay['top_right']['icon_size'] ?? '') == 'big') {
    $loop_overlay_tr = '<div class="absolute right-0 top-0 -z-0">
    <svg class="rotate-180 text-neutral-100 w-2/3 ml-auto -mt-12 -mr-1 xl:-mt-0 xl:w-full xl:-mr-0" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
      <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
    </svg>
  </div>';
  } else {
    $loop_overlay_tr = '<div class="absolute right-0 top-0 -z-0">
    <svg class="rotate-180 text-neutral-100 h-28 w-auto opacity-20" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 200" style="color: ' . $color_theme . '">
      <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
    </svg>
  </div>';
  }
}
$loop_overlay_br_active = $loop_icon_overlay['bottom_right']['activate'] ?? false;
$loop_overlay_br = '';
if ($loop_overlay_br_active) {
  if (($loop_icon_overlay['bottom_right']['icon_size'] ?? '') == 'big') {
    $loop_overlay_br = '<div class="absolute right-2 bottom-0 -z-0">
    <svg class="text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
      <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
    </svg>
  </div>';
  } else {
    $loop_overlay_br = '<div class="absolute right-4 bottom-0 -z-0">
    <svg class="text-neutral-100 h-28 w-auto opacity-20" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 200" style="color: ' . $color_theme . '">
      <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
    </svg>
  </div>';
  }
}
$section_class = 'overflow-x-hidden ';
if ($section_id) {
  $section_class .= 'section-scroll ';
}
