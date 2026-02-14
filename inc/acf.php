<?php

/*
 * Add Site Settings
 */
add_action('init', 'cl_register_acf_options_pages');
function cl_register_acf_options_pages()
{
  if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
      'page_title'   => 'Site Settings',
      'menu_title'  => 'Site Settings',
      'menu_slug'   => 'site-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
    ));
  }
}

/*
 * Add color picker pallete on admin
 */
function cl_acf_input_admin_footer()
{
?>
  <script type="text/javascript">
    (function($) {

      acf.add_filter('color_picker_args', function(args, $field) {

        //args.palettes = ['#707070', '#000000', '#FFFFFF', '#edf1f5', '#1a1d4b', '#074c6c', '#1aad90', '#90DECF', '#f15f3f', '#FAB7AD', '#55bec2', '#90DBDE', '#1aa0df', '#ACD2E3', '#00A787', '#38a75f', '#87b82c', '#CFEB9A', '#47AD6B', '#96DDAF']

        args.palettes = ['#707070', '#FFFFFF', '#F5F5F5', '#edf1f5', '#1a1d4b', '#004d6d', '#03a687', '#90DECF', '#f15f3f', '#FAB7AD', '#65c8ce', '#90DBDE', '#35b0e5', '#ACD2E3', '#2ab673', '#96DDAF', '#95c93d', '#CFEB9A']

        return args;

      });

    })(jQuery);
  </script>
<?php
}
add_action('acf/input/admin_footer', 'cl_acf_input_admin_footer');

/*
 * Hook: Custom Enqueue
 * https://www.acf-extended.com/features/fields/flexible-content/dynamic-render
 * @array   $field       Field settings
 * @bool    $is_preview  True during admin preview
 * action('acfe/flexible/enqueue',                         $field, $is_preview);
 * action('acfe/flexible/enqueue/name=my_flexible',        $field, $is_preview);
 * action('acfe/flexible/enqueue/key=field_5ff71ef3542c2', $field, $is_preview);
 */

add_action('acfe/flexible/enqueue', 'cl_acf_flexible_enqueue', 10, 2);
function cl_acf_flexible_enqueue($field, $is_preview)
{
  wp_enqueue_style('acfe-editor-style', closedloop_asset('css/editor-style.css'));
}

/*
 * ACF Extended Layout Thumbnails
 * https://www.acf-extended.com/features/fields/flexible-content/advanced-settings
 * @int/string  $thumbnail  Thumbnail ID/URL
 * @array       $field      Field settings
 * @array       $layout     Layout settings
 */
add_filter('acfe/flexible/thumbnail/layout=blog_posts', 'blog_posts_layout_thumbnail', 10, 3);
function blog_posts_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/blog-posts.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=case_studies', 'case_studies_layout_thumbnail', 10, 3);
function case_studies_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/case-studies.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=cards_slide_image', 'cards_slide_image_layout_thumbnail', 10, 3);
function cards_slide_image_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/cards-slide-image.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=contact_form', 'contact_form_layout_thumbnail', 10, 3);
function contact_form_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/contact-form.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=content_card', 'content_card_layout_thumbnail', 10, 3);
function content_card_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/content-card.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=custom_cards', 'custom_cards_layout_thumbnail', 10, 3);
function custom_cards_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/custom-cards.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=faq', 'faq_layout_thumbnail', 10, 3);
function faq_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/faq.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=icons_grid_1', 'icons_grid_1_layout_thumbnail', 10, 3);
function icons_grid_1_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/icons-grid-1.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=icons_grid_2', 'icons_grid_2_layout_thumbnail', 10, 3);
function icons_grid_2_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/icons-grid-2.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=icons_grid_3', 'icons_grid_3_layout_thumbnail', 10, 3);
function icons_grid_3_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/icons-grid-3.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=image_+_text', 'image_text_layout_thumbnail', 10, 3);
function image_text_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/image-text.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=product_cards', 'product_cards_layout_thumbnail', 10, 3);
function product_cards_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/product-cards.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=product_category_cards', 'product_category_cards_layout_thumbnail', 10, 3);
function product_category_cards_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/product-category-cards.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=product_specifications', 'product_specifications_layout_thumbnail', 10, 3);
function product_specifications_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/product-specifications.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=related_posts', 'related_posts_layout_thumbnail', 10, 3);
function related_posts_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/related-posts.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=team', 'team_layout_thumbnail', 10, 3);
function team_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/team.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=text_centered', 'text_centered_layout_thumbnail', 10, 3);
function text_centered_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/text-centered.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=text_components', 'text_components_layout_thumbnail', 10, 3);
function text_components_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/text-components.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=text_image', 'text_image_layout_thumbnail', 10, 3);
function text_image_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/text-image.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=text_two_columns', 'text_two_columns_layout_thumbnail', 10, 3);
function text_two_columns_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/text-two-columns.jpg');
}

add_filter('acfe/flexible/thumbnail/layout=timeline', 'timeline_layout_thumbnail', 10, 3);
function timeline_layout_thumbnail($thumbnail, $field, $layout)
{
  return closedloop_asset('images/layouts/timeline.jpg');
}
