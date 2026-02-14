<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="shortcut icon" href="<?php echo closedloop_asset('/images/favicon.png') ?>" type="image/x-icon">

  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white'); ?>>

  <?php do_action('closedloop_site_before'); ?>

  <div id="page" class="min-h-screen flex flex-col">

    <?php do_action('closedloop_header'); ?>

    <?php
    $facebook_link = get_field('facebook_link', 'option');
    $instagram_link = get_field('instagram_link', 'option');
    $linkedin_link = get_field('linkedin_link', 'option');
    ?>
    <div id="site-header" class="z-50">
      <div id="top-header" class="bg-white relative z-50 border-b border-gray-200 border-solid">
        <div class="top-header--inner mx-auto py-2 md:py-1.5 px-4 lg:px-12">
          <div class="flex justify-between items-center gap-x-4">
            <div class="social-icons flex leading-8 text-black items-end">
              <?php if ($facebook_link) : ?>
                <a href="<?php echo $facebook_link ?>" target="_blank" class="social-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.14" height="25" viewBox="0 0 11.14 25">
                    <path d="M11.14,8.31h-4V5.83A.74.74,0,0,1,8,5h3.18V0H7.48C2.29,0,2.41,4.38,2.41,5V8.31H0v5H2.41V25H7.16V13.36h3.19Z" fill="currentColor" />
                  </svg>
                </a>
              <?php endif; ?>
              <?php if ($linkedin_link) : ?>
                <a href="<?php echo $linkedin_link ?>" target="_blank" class="social-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="25" viewBox="0 0 27.5 25">
                    <g fill="currentColor">
                      <rect x="0.69" y="8.2" width="5.3" height="16.8" />
                      <path d="M20.77,8c-3,0-4.94,1.65-5.29,2.8V8.2h-6c.07,1.4,0,16.8,0,16.8h6V15.91a3.9,3.9,0,0,1,.13-1.37,3,3,0,0,1,2.87-2.06c2.07,0,3,1.55,3,3.83V25h6V15.66C27.5,10.46,24.54,8,20.77,8Z" />
                      <path d="M3.24,0A3,3,0,0,0,0,2.92,2.93,2.93,0,0,0,3.16,5.83h0A3,3,0,0,0,6.44,2.91,3,3,0,0,0,3.24,0Z" />
                    </g>
                  </svg>
                </a>
              <?php endif; ?>
              <?php if ($instagram_link) : ?>
                <a href="<?php echo $instagram_link ?>" target="_blank" class="social-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 26 26">
                    <g fill="currentColor">
                      <path d="M18.91,0H7.09A7.17,7.17,0,0,0,0,7.23V18.77A7.17,7.17,0,0,0,7.09,26H18.91A7.17,7.17,0,0,0,26,18.77V7.23A7.17,7.17,0,0,0,18.91,0Zm3.85,18.6a4.11,4.11,0,0,1-4.06,4.16H7.3A4.11,4.11,0,0,1,3.24,18.6V7.4A4.11,4.11,0,0,1,7.3,3.24H18.7A4.11,4.11,0,0,1,22.76,7.4Z" />
                      <path d="M13,6.08a6.92,6.92,0,0,0,0,13.84A6.92,6.92,0,0,0,13,6.08ZM16.55,13a3.69,3.69,0,0,1-1,2.58A3.5,3.5,0,0,1,13,16.64h0A3.64,3.64,0,1,1,16.55,13Z" />
                      <path d="M21,4.86a2,2,0,0,0-.62-.42,1.9,1.9,0,0,0-1.48,0,2,2,0,0,0-.62.42,1.8,1.8,0,0,0-.41.64,1.85,1.85,0,0,0-.15.74,1.92,1.92,0,0,0,.15.74,1.76,1.76,0,0,0,.41.63,2,2,0,0,0,.62.43,1.92,1.92,0,0,0,.74.15A1.88,1.88,0,0,0,20.36,8,2,2,0,0,0,21,7.61,1.93,1.93,0,0,0,21.4,7a2.11,2.11,0,0,0,.14-.74,2,2,0,0,0-.14-.74A2,2,0,0,0,21,4.86ZM20.47,6.6a.92.92,0,0,1-.2.31,1,1,0,0,1-.3.21.94.94,0,0,1-.7,0A.86.86,0,0,1,19,6.91a1,1,0,0,1-.21-.31,1,1,0,0,1-.07-.36,1.16,1.16,0,0,1,.07-.37A1,1,0,0,1,19,5.56a.84.84,0,0,1,.29-.2.87.87,0,0,1,.35-.07.84.84,0,0,1,.35.07,1,1,0,0,1,.3.2.92.92,0,0,1,.2.31.94.94,0,0,1,.07.37A.86.86,0,0,1,20.47,6.6Z" />
                    </g>
                  </svg>
                </a>
              <?php endif; ?>
            </div>
            <div class="text-xs md:text-sm text-right leading-none"><span class="inline-block md:inline-block">Closed Loop Australia.</span> <a href="https://www.closedloop.co.nz" class="inline-block md:inline-block text-darkblue underline hover:no-underline">Go to New Zealand site</a></div>
          </div>
        </div>
      </div>

      <?php
      $header_type = $args['header_type'];
      if ($header_type == 'no-bg') {
        $header_class = 'header-no-bg';
      } elseif ($header_type == 'white-transparent') {
        $header_class = 'header-white-transparent';
      } else {
        $header_class = 'header-white-opaque';
      }

      $email_link = get_field('email_link', 'option');
      $phone_number_link = get_field('phone_number_link', 'option');
      ?>
      <header id="main-header" class="relative z-50 <?php echo $header_class ?>">
        <div class="mx-auto px-4 md:px-8 lg:px-12">
          <div class="flex justify-between items-center relative">
            <div class="w-full">
              <a id="site-logo" href="<?php echo get_bloginfo('url'); ?>" class="block relative">
                <img class="site-logo logo-color" src="<?php echo closedloop_asset('images/logo-closed-loop-color.png')  ?>" width="200px" height="62px" alt="Logo Closed Loop" />
                <img class="site-logo logo-white" src="<?php echo closedloop_asset('images/logo-closed-loop-white.png') ?>" width="200px" height="62px" alt="Logo Closed Loop" />
              </a>
            </div>
            <?php $icon_container_class = isset($icon_container_class) ? $icon_container_class : ''; ?>
            <div class="header-nav flex flex-nowrap items-center gap-x-4 <?php echo $icon_container_class ?>">
              <?php if ($email_link) : ?>
                <a href="mailto:<?php echo $email_link ?>" target="_blank" class="hidden md:inline-block">
                  <?php echo cl_icon(array('icon' => 'email', 'group' => 'utility', 'size' => '48', 'class' => 'nav-icon')) ?>
                </a>
              <?php endif; ?>
              <?php if ($phone_number_link) : ?>
                <a href="tel:<?php echo $phone_number_link ?>" target="_blank" class="hidden md:inline-block">
                  <?php echo cl_icon(array('icon' => 'phone', 'group' => 'utility', 'size' => '48', 'class' => 'nav-icon')) ?>
                </a>
              <?php endif; ?>
              <div class="hidden md:flex leading-none w-12 h-12 relative">
                <button id="header-search-button" class="inline-block" type="button">
                  <?php echo cl_icon(array('icon' => 'search', 'group' => 'utility', 'size' => '48', 'class' => 'nav-icon')) ?>
                </button>
                <div id="header-search" class="absolute transition duration-300 right-0 px-0 top-0" style="z-index: 100;">
                  <form id="header-searchform" class="flex bg-white border border-gray-100 shadow-xl rounded-full inline-form-pill" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input id="searchform-input" type="text" class="text-gray-700 w-full py-3 px-4 bg-transparent rounded-full border-none focus:outline-none" name="s" placeholder="Search" value="<?php echo get_search_query(); ?>">
                    <button class="flex-none mt-1 mr-1 w-10 h-10 flex items-center justify-center text-sm rounded-full bg-primary font-semibold text-white uppercase hover:bg-opacity-80 whitespace-nowrap cursor-pointer" type="submit">
                      <?php echo cl_icon(array('icon' => 'search', 'group' => 'utility', 'size' => '32', 'class' => 'text-white')) ?>
                    </button>
                  </form>
                </div>
              </div>
              <?php get_template_part('template-parts/utilities/mega-menu'); ?>
              <button class="block lg:ml-6 xl:hidden" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><?php echo cl_icon(array('icon' => 'menu', 'group' => 'utility', 'size' => '48', 'class' => 'nav-icon')) ?></button>
            </div>
          </div>
        </div>
      </header>
    </div>


    <div id="content" class="site-content flex-grow">

      <?php do_action('closedloop_content_start'); ?>

      <main>