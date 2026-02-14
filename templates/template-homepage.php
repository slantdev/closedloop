<?php

/**
 * Template Name: Homepage
 * Template Post Type: page
 *
 */

get_header('', array('header_type' => 'no-bg'));

echo '<div class="-mt-[119px] lg:-mt-[140px] 2xl:-mt-[180px]">';
get_template_part('template-parts/page-builder');
echo '</div>';

get_footer();
