<?php
function cl_component($components)
{
  if (have_rows($components)) :
    while (have_rows($components)) : the_row();
      if (get_row_layout() == 'button') :
        get_template_part('template-parts/components/button');
      elseif (get_row_layout() == 'content_cards') :
        get_template_part('template-parts/components/content-cards');
      elseif (get_row_layout() == 'description') :
        get_template_part('template-parts/components/description');
      elseif (get_row_layout() == 'heading') :
        get_template_part('template-parts/components/heading');
      elseif (get_row_layout() == 'image') :
        get_template_part('template-parts/components/image');
      elseif (get_row_layout() == 'image_slider') :
        get_template_part('template-parts/components/image-slider');
      elseif (get_row_layout() == 'two_columns') :
        get_template_part('template-parts/components/two-columns');
      endif;
    endwhile;
  endif;
}
