<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

include get_template_directory() . '/template-parts/layout/section-settings.php';

function cl_hero($atts = array())
{
  $atts = shortcode_atts(array(
    'title'  => '',
    'description' => '',
    'img' => '',
    'overlay' => '',
    'media_desktop' => '',
    'media_mobile' => '',
    'buttons_alignment' => '',
    'buttons' => ''
  ), $atts);

  $title = $atts['title'];
  $description = $atts['description'];
  $overlay = $atts['overlay'];
  $media_desktop = $atts['media_desktop'];
  $media_desktop_type = wp_check_filetype($atts['media_desktop'])['type'];
  $media_mobile = $atts['media_mobile'];
  $media_mobile_type = wp_check_filetype($atts['media_mobile'])['type'];
  $buttons_alignment = $atts['buttons_alignment'];
  $buttons = $atts['buttons'];
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

  if (empty($title) && empty($description))
    return;

  $output = '';
  $output .= '<div class="container mx-auto h-full relative z-20 px-5 mt-6 md:mt-0 md:px-12 xl:px-8 lg:pt-[100px]">';
  $output .= '<div class="flex h-full items-center">';
  $output .= '<div class="w-full lg:w-6/12">';
  $output .= '<div class="max-w-lg">';
  $output .= '<h2 class="hero-title text-[36px] lg:text-[50px] font-bold text-white leading-tight mb-4 pl-[0.25em]">';
  $output .= '<span class="title-highlight" style="background-color: #03a687; box-shadow: 0.25em 0 0 #03a687, -0.25em 0 0 #03a687;">' . $title . '</span>';
  $output .= '</h2>';
  $output .= '<p class="text-white">' . $description . '</p>';

  if ($buttons) {
    $output .= '<div class="mt-6 ' . $button_container_class . '">';
    $button_count = count($buttons);
    $button_margin = "";
    if ($button_count > 1) {
      $button_margin = "mr-4 mb-4";
    }
    foreach ($buttons as $button) {
      $button_text = $button['button']['button_text'];
      $button_text_color = $button['button']['button_text_color'];
      $button_color = $button['button']['button_color'];
      $button_size = $button['button']['button_size'];
      $button_link_title = $button['button']['button_link']['title'];
      $button_link_url = $button['button']['button_link']['url'];
      $button_link_target = $button['button']['button_link']['target'];
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
        $output .= '<a href="' . $button_link_url . '" class="text-white uppercase inline-block transition duration-300 hover:brightness-110 ' . $button_class . ' ' . $button_margin . '" style="' . $button_style . '" title="' . $button_link_title . '" target="' . $button_link_target . '">' . $button_text . '</a>';
      }
    }
    $output .= '</div>';
  }

  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '</div>';
  $output .= '<div class="absolute inset-0">';
  $output .= '<div class="absolute inset-0 z-10" style="background-color: ' . $overlay . '"></div>';
  if ($media_desktop && $media_mobile) {
    if ($media_desktop_type == 'video/mp4') {
      if (is_admin()) {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0 hidden lg:block" loop muted>';
      } else {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0 hidden lg:block" autoplay loop muted>';
      }
      $output .= '<source src="' . $media_desktop . '" type="video/mp4">';
      $output .= '</video>';
    } else {
      $output .= '<img class="hidden lg:block h-full w-full object-cover" src="' . $media_desktop . '">';
    }
    if ($media_mobile_type == 'video/mp4') {
      if (is_admin()) {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0 lg:hidden" loop muted>';
      } else {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0 lg:hidden" autoplay loop muted>';
      }
      $output .= '<source src="' . $media_mobile . '" type="video/mp4">';
      $output .= '</video>';
    } else {
      $output .= '<img class="lg:hidden h-full w-full object-cover" src="' . $media_mobile . '">';
    }
  } else if ($media_desktop) {
    if ($media_desktop == 'video/mp4') {
      if (is_admin()) {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0" loop muted>';
      } else {
        $output .= '<video id="background-video" class="absolute inset-0 h-full w-full object-cover z-0" autoplay loop muted>';
      }
      $output .= '<source src="' . $media_desktop . '" type="video/mp4">';
      $output .= '</video>';
    } else {
      $output .= '<img class="h-full w-full object-cover" src="' . $media_desktop . '">';
    }
  }
  $output .= '</div>';

  return $output;
}

?>
<section id="homepage-hero-2" class="relative h-screen overflow-hidden" style="<?php echo $section_style ?>">
  <div class="absolute left-0 right-0 bottom-0 w-full">
    <div class="relative container mx-auto max-w-6xl">
      <div class="absolute -right-6 -bottom-5 z-10">
        <svg class="rotate-0 text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
          <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
        </svg>
      </div>
    </div>
    <div class="flex relative z-20">
      <div class="w-1/5 h-5 bg-coral bg-opacity-90"></div>
      <div class="w-1/5 h-5 bg-turquoise bg-opacity-90"></div>
      <div class="w-1/5 h-5 bg-deepskyblue bg-opacity-90"></div>
      <div class="w-1/5 h-5 bg-limegreen bg-opacity-90"></div>
      <div class="w-1/5 h-5 bg-yellowgreen bg-opacity-90"></div>
    </div>
  </div>
  <div class="relative shrink-0 w-full h-full">
    <?php
    $hero_buttons = get_sub_field('hero_buttons');
    $buttons_alignment = $hero_buttons['buttons_alignment'];
    $buttons = $hero_buttons['buttons'];
    $background_media = get_sub_field('background_media');
    $media_desktop = $background_media['background_desktop'];
    $media_mobile = $background_media['background_mobile'];
    echo cl_hero(
      array(
        'title' => get_sub_field('hero_heading'),
        'description' => get_sub_field('hero_description'),
        'overlay' => get_sub_field('hero_background_overlay'),
        'media_desktop' => $media_desktop,
        'media_mobile' => $media_mobile,
        'buttons_alignment' => $buttons_alignment,
        'buttons' => $buttons
      )
    );
    ?>
  </div>
</section>