<?php
//var_dump(get_queried_object());
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}

if (have_rows('section', $the_id)) :

  // Loop through rows.
  while (have_rows('section', $the_id)) : the_row();
    if (get_row_layout() == 'two_columns') :
      get_template_part('template-parts/sections/two-columns');

    elseif (get_row_layout() == 'blog_posts') :
      get_template_part('template-parts/sections/blog-posts');

    elseif (get_row_layout() == 'cards_slide_image') :
      get_template_part('template-parts/sections/cards-slide-image');

    elseif (get_row_layout() == 'case_studies') :
      get_template_part('template-parts/sections/case-studies');

    elseif (get_row_layout() == 'contact_form') :
      get_template_part('template-parts/sections/contact-form');

    elseif (get_row_layout() == 'content_card') :
      get_template_part('template-parts/sections/content-card');

    elseif (get_row_layout() == 'custom_cards') :
      get_template_part('template-parts/sections/custom-cards');

    elseif (get_row_layout() == 'faq') :
      get_template_part('template-parts/sections/faq');

    elseif (get_row_layout() == 'hero') :
      get_template_part('template-parts/sections/hero');

    elseif (get_row_layout() == 'icons_grid') :
      get_template_part('template-parts/sections/icons-grid');

    elseif (get_row_layout() == 'icons_grid_1') :
      get_template_part('template-parts/sections/icons-grid-1');

    elseif (get_row_layout() == 'icons_grid_2') :
      get_template_part('template-parts/sections/icons-grid-2');

    elseif (get_row_layout() == 'icons_grid_3') :
      get_template_part('template-parts/sections/icons-grid-3');

    elseif (get_row_layout() == 'image_+_text') :
      get_template_part('template-parts/sections/image-text');

    elseif (get_row_layout() == 'product_category_cards') :
      get_template_part('template-parts/sections/product-category-cards');

    elseif (get_row_layout() == 'product_cards') :
      get_template_part('template-parts/sections/product-cards');

    elseif (get_row_layout() == 'product_specifications') :
      get_template_part('template-parts/sections/product-specifications');

    elseif (get_row_layout() == 'related_posts') :
      get_template_part('template-parts/sections/related-posts');

    elseif (get_row_layout() == 'select_service') :
      get_template_part('template-parts/sections/select-service');

    elseif (get_row_layout() == 'subscribe') :
      get_template_part('template-parts/sections/subscribe');

    elseif (get_row_layout() == 'sustainability_partner') :
      get_template_part('template-parts/sections/sustainability-partner');

    elseif (get_row_layout() == 'team') :
      get_template_part('template-parts/sections/team');

    elseif (get_row_layout() == 'text_centered') :
      get_template_part('template-parts/sections/text-centered');

    elseif (get_row_layout() == 'text_components') :
      get_template_part('template-parts/sections/text-components');

    elseif (get_row_layout() == 'text_image') :
      get_template_part('template-parts/sections/text-image');

    elseif (get_row_layout() == 'text_two_columns') :
      get_template_part('template-parts/sections/text-two-columns');

    elseif (get_row_layout() == 'timeline') :
      get_template_part('template-parts/sections/timeline');

    endif;

  // End loop.
  endwhile;

// No value.
else :
// Do something...
endif;
