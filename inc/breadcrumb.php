<?php

add_filter('wpseo_breadcrumb_links', 'cl_yoast_seo_breadcrumb_append_link');
function cl_yoast_seo_breadcrumb_append_link($links)
{
  global $post;

  if (is_singular('case-studies')) {
    $breadcrumb[] = array(
      'url' => site_url('/our-work/'),
      'text' => 'Our Work',
    );
    array_splice($links, 1, -2, $breadcrumb);
  } elseif (is_singular('post')) {
    $breadcrumb[] = array(
      'url' => site_url('/blog/'),
      'text' => 'Blog',
    );
    array_splice($links, 1, -2, $breadcrumb);
  } elseif (is_singular('products-services')) {
    $term_obj = get_the_terms($post->ID, 'product_category');
    $term_parent = $term_obj[0]->parent;
    $term_parents[] = array(
      'text' => $term_obj[0]->name,
      'url' => get_term_link($term_obj[0]->term_id, 'product_category')
    );
    if ($term_parent) {
      $term_ancestor = get_term($term_parent, 'product_category');
      $term_parents[] = array(
        'text' => $term_ancestor->name,
        'url' => get_term_link($term_ancestor->term_id, 'product_category')
      );
    }
    $term_parents = count($term_parents) > 1 ? array_reverse($term_parents) : $term_parents;
    unset($links[1]);
    array_splice($links, 1, -2, $term_parents);
  }

  return $links;
}
