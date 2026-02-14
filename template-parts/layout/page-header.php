<?php

//var_dump(get_queried_object());
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}

/*
 * Page Settings
 */
$color_theme = get_field('color_theme', $the_id);
$title_highlight_style = '';
if ($color_theme) {
  $title_highlight_style = 'background-color: ' . $color_theme . '; box-shadow: 0.25em 0 0 ' . $color_theme . ', -0.25em 0 0 ' . $color_theme . ';';
}

$page_title = get_field('page_title', $the_id);
if (!$page_title) {
  $page_title = get_the_title();
}

$featured_image_url = get_the_post_thumbnail_url($post_id, "full");
$hero_background = get_field('hero_background', $the_id);
$hero_bg_style = '';
if ($hero_background) {
  $hero_bg_style = 'background-image: url(' . $hero_background . ')';
} elseif ($featured_image_url) {
  $hero_bg_style = 'background-image: url(' . $featured_image_url . ')';
}
$hero_overlay_color = get_field('hero_overlay_color', $the_id);
// echo '<pre>';
// print_r($hero_overlay_color);
// echo '</pre>';
$hero_overlay_style = '';
if ($hero_overlay_color) {
  $hero_overlay_style = 'background-color: ' . $hero_overlay_color;
}

$nav_bar_type = get_field('nav_bar_type', $the_id);
$header_type = '';
if ($nav_bar_type) {
  $header_type = $nav_bar_type;
}
get_header('', array('header_type' => $header_type));
?>

<!-- Page Header -->
<section id="page-header" class="bg-gray-300 relative bg-cover h-[57vh] xl:h-[57vh]" style="<?php echo $hero_bg_style; ?>">
  <div class="absolute inset-0" style="<?php echo $hero_overlay_style ?>">
    <div class="container mx-auto h-full pt-[160px] relative lg:pt-[180px]">
      <div class="flex h-full items-center">
        <div class="w-full relative z-10 lg:w-2/3">
          <div class="xl:mt-5">
            <h1 class="text-[40px] font-bold text-white leading-tight mb-2 pl-[0.25em] xl:text-[50px]">
              <span class="title-highlight" style="<?php echo $title_highlight_style ?>"><?php echo $page_title; ?></span>
            </h1>
            <?php
            if (function_exists('yoast_breadcrumb')) {
              yoast_breadcrumb('<div class="breadcrumbs inline-block bg-white bg-opacity-50 py-2 px-4 text-black text-sm">', '</p>');
            }
            ?>
          </div>
        </div>
      </div>
      <div class="absolute right-6 bottom-0 z-0">
        <svg class="rotate-0 text-white w-2/3 ml-auto -mb-12 opacity-60 xl:w-full xl:-mb-0 xl:opacity-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
          <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- Page Navigation -->
<?php
$rows = get_field('page_nav', $the_id)['page_navigation'];
//$rows = get_field('page_nav_page_navigation');
// echo '<pre>';
// print_r($rows);
// echo '</pre>';
$page_nav_bg = get_field('page_nav_bg', $the_id);
//echo $page_nav_bg;
if ($rows) {
  echo '<section id="scrollnav" class="sticky top-[52px] z-40">
      <div class="py-6 overflow-x-auto" style="background-color: ' . $page_nav_bg . '">
        <div class="container mx-auto">
          <menu>
            <ul class="scrollnav-ul flex text-black leading-none -ml-4 text-center items-stretch xl:-ml-6">';
  foreach ($rows as $row) {
    $section_name = $row['section_name'];
    $section_id = $row['section_id'];
    echo '<li class="scrollnav-li"><a class="nav-link" href="#' . $section_id . '">' . $section_name . '</a></li>';
  }
  echo '</menu>
        </div>
      </div>
      <div class="w-full bg-zinc-50">
        <div class="scroll-indicator h-[10px]" style="background-color: ' . $color_theme . '"></div>
      </div>
    </section>';
}
?>