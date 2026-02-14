<?php

/**
 * Get Icon
 * This function is in charge of displaying SVG icons across the site.
 *
 * Place each <svg> source in the /assets/icons/{group}/ directory, without adding
 * both `width` and `height` attributes, since these are added dynamically,
 * before rendering the SVG code.
 *
 * All icons are assumed to have equal width and height, hence the option
 * to only specify a `$size` parameter in the svg methods.
 *
 */
function cl_icon($atts = array())
{
  $atts = shortcode_atts(array(
    'icon'  => false,
    'icon_src' => '',
    'group'  => 'utility',
    'size'  => 16,
    'class'  => false,
    'label'  => false,
  ), $atts);

  if (empty($atts['icon']) && empty($atts['icon_src']))
    return;

  if ($atts['icon_src']) {
    $icon_path = get_attached_file($atts['icon_src']);
    //echo $icon_path . '<br>';
  } else {
    $icon_path = get_theme_file_path('/assets/images/icons/' . $atts['group'] . '/' . $atts['icon'] . '.svg');
    //echo $icon_path . '<br>';
  }
  if (!file_exists($icon_path))
    return;

  $icon = file_get_contents($icon_path);

  //echo $atts['size'];

  $class = 'svg-icon';
  if (!empty($atts['class']))
    $class .= ' ' . esc_attr($atts['class']);

  if (false !== $atts['size']) {
    $repl = sprintf('<svg class="' . $class . '" width="%d" height="%d" aria-hidden="true" role="img" focusable="false" ', $atts['size'], $atts['size']);
    $svg  = preg_replace('/^<svg /', $repl, trim($icon)); // Add extra attributes to SVG code.
  } else {
    $svg = preg_replace('/^<svg /', '<svg class="' . $class . '"', trim($icon));
  }
  $svg  = preg_replace("/([\n\t]+)/", ' ', $svg); // Remove newlines & tabs.
  $svg  = preg_replace('/>\s*</', '><', $svg); // Remove white space between SVG tags.

  if (!empty($atts['label'])) {
    $svg = str_replace('<svg class', '<svg aria-label="' . esc_attr($atts['label']) . '" class', $svg);
    $svg = str_replace('aria-hidden="true"', '', $svg);
  }

  return $svg;
}

function cl_card($atts = array())
{
  $atts = shortcode_atts(array(
    'img_src'  => '',
    'img_bg_color'  => '',
    'img_caption'  => '',
    'title'  => '',
    'excerpt'  => '',
    'link'  => '#',
    'plus_sign' => false,
    'object_fit' => 'cover',
    'border' => false
  ), $atts);

  // if (empty($atts['img_src']))
  //   return;

  $img_src = $atts['img_src'];
  $img_caption = $atts['img_caption'];
  $title = $atts['title'];
  $excerpt = $atts['excerpt'];
  $link = $atts['link'];
  $plus_sign = $atts['plus_sign'];
  $img_bg_color = $atts['img_bg_color'];
  $img_container_class = '';
  if ($img_bg_color == 'bg-gray-100') {
    $img_container_class = 'bg-gray-100';
  }
  $object_fit = $atts['object_fit'];
  $image_class = '';
  if ($object_fit == 'cover') {
    $image_class = 'h-full w-full object-' . $object_fit;
  } else {
    $image_class = 'mx-auto h-full w-auto object-' . $object_fit;
  }
  $border = $atts['border'];
  $border_class = '';
  if ($border) {
    $border_class = 'border border-gray-300';
  }

  $output = '';
  if ($link !== 'none') {
    $output .= '<a href="' . $link . '" class="block w-full h-full bg-white rounded-xl overflow-hidden max-w-md ' . $border_class . '">';
  } else {
    $output .= '<div class="block w-full h-full bg-white rounded-xl overflow-hidden max-w-md ' . $border_class . '">';
  }
  $output .= '<div class="w-full aspect-[16/11] bg-slate-50 relative ' . $img_container_class . '">';
  if ($img_caption) {
    $output .= '<div class="absolute inset-0 bg-gradient-to-b from-[rgba(0,0,0,.4)] pt-6 pl-6 pb-6 pr-14">';
    $output .= '<span class="text-white font-bold inline-block leading-tight">' . $img_caption . '</span>';
    $output .= '</div>';
  }
  if ($plus_sign) {
    $output .= '<div class="absolute right-4 top-5 text-4xl text-coral"><svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="26.09" height="26.09" viewBox="0 0 26.09 26.09"><polygon points="26.09 12.05 14.05 12.05 14.05 0 12.05 0 12.05 12.05 0 12.05 0 14.05 12.05 14.05 12.05 26.09 14.05 26.09 14.05 14.05 26.09 14.05 26.09 12.05" fill="currentColor" /></svg></div>';
  }
  if ($img_src) {
    $output .= '<img src="' . $img_src . '" class="' . $image_class . '" />';
  }
  $output .= '</div>';
  $output .= '<div class="p-4 md:p-6">';
  $output .= '<h4 class="font-bold text-base text-black mb-2 md:text-lg md:mb-4">' . $title . '</h4>';
  $output .= '<div class="text-sm md:text-base">' . $excerpt . '</div>';
  $output .= '</div>';
  if ($link === 'none') {
    $output .= '</div>';
  } else {
    $output .= '</a>';
  }

  return $output;
}

function cl_icon_list_item($atts = array())
{
  $atts = shortcode_atts(array(
    'icon_svg'  => '',
    'icon_caption'  => '',
    'container_class'  => 'text-white max-w-[120px]',
    'text_class' => ''
  ), $atts);

  if (empty($atts['icon_svg']))
    return;

  $output = '';
  $output .= '<div class="' . $atts['container_class'] . '">';
  $output .= $atts['icon_svg'];
  if (!empty($atts['icon_caption'])) {
    $output .= '<div class="font-bold text-center leading-tight ' . $atts['text_class'] . '">' . $atts['icon_caption'] . '</div>';
  }
  $output .= '</div>';
  return $output;
}

function cl_team_member($atts = array())
{
  $atts = shortcode_atts(array(
    'team_photo'  => '',
    'team_name'  => '',
    'team_position'  => '',
    'team_bio' => '',
    'team_linkedin' => '',
    'team_email' => '',
    'team_mobile' => ''
  ), $atts);

  if (empty($atts['team_name']))
    return;

  $slug = cl_slugify($atts['team_name']) . '-' . rand(11, 99);

  $output = '';
  $output .= '<button type="button" class="block w-full max-w-xs mx-auto text-left" data-bs-toggle="modal" data-bs-target="#' . $slug . '">';
  $output .= '<div class="mb-2 xl:mb-4"><img class="rounded-full mx-auto" src="' . $atts['team_photo'] . '" alt=""></div>';
  $output .= '<div class="flex">
      <div class="w-full">
        <h4 class="text-base font-thin text-black text-center lg:text-left lg:text-lg xl:text-2xl">' . $atts['team_name'] . '</h4>
        <h5 class="font-semibold text-black text-xs text-center lg:text-left lg:text-base">' . $atts['team_position'] . '</h5>
      </div>
      <div class="hidden ml-auto pl-3 pt-1.5 lg:block lg:pl-6 xl:pt-2">' . cl_icon(array('icon' => 'plus-thin', 'group' => 'utility', 'size' => 20, 'class' => 'h-3 w-auto text-black xl:h5')) . '</div>
    </div>
  </button>';

  $output .= '<div id="' . $slug . '" aria-labelledby="' . $slug . '" class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-xl outline-none text-current overflow-hidden">
        <button type="button" class="btn-close z-10 absolute top-4 right-4 box-content w-6 h-6 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-body relative">
          <div class="flex flex-wrap md:flex-nowrap">
            <div class="w-full md:w-1/2">
              <div class="w-full h-auto md:h-full">
                <img class="w-full h-full md:object-cover" src="' . $atts['team_photo'] . '" alt="">
              </div>
            </div>
            <div class="w-full md:w-1/2">
              <div class="flex flex-col py-6 px-4 max-h-[512px] md:p-8">
                <div class="pt-0 mb-4 md:pt-4 md:mb-8">
                  <h4 class="text-black text-2xl font-thin md:text-3x;">' . $atts['team_name'] . '</h4>
                  <h5 class="text-black text-xl font-bold md:text-2xl">' . $atts['team_position'] . '</h5>
                </div>
                <div class="overflow-y-auto">' . $atts['team_bio'] . '</div>
                <div class="mt-auto pt-6 md:pt-8">
                  <ul class="flex items-center gap-x-4">
                    <li><a href="' . $atts['team_linkedin'] . '" class="inline-block">' . cl_icon(array('icon' => 'team-linkedin', 'group' => 'utility', 'size' => false, 'class' => 'text-black')) . '</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>';

  return $output;
}

/**
 * Add container to video embeds in WordPress
 *
 * @refer  http://alxmedia.se/code/2013/10/make-wordpress-default-video-embeds-responsive/
 */
function cl_video_container($html)
{
  return '<div class="aspect-w-16 aspect-h-9">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'cl_video_container', 10, 3);
add_filter('video_embed_html', 'cl_video_container'); // Jetpack