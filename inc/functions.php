<?php
/*
 * Exclude Posts from search results
*/
function cl_search_filter($query)
{
  if ($query->is_search && !is_admin())
    $query->set('post__not_in', array('2'));
  return $query;
}
add_filter('pre_get_posts', 'cl_search_filter');

/*
 * Remove category from slug
 * https://gist.github.com/nameDark/18409692bd269dd104f14a4f3483f844
*/
add_filter('request', 'cl_change_term_request', 1, 1);
function cl_change_term_request($query)
{

  $tax_name = 'product_category'; // specify you taxonomy name here, it can be also 'category' or 'post_tag'

  // Request for child terms differs, we should make an additional check
  if ($query['attachment']) :
    $include_children = true;
    $name = $query['attachment'];
  else :
    $include_children = false;
    $name = $query['name'];
  endif;


  $term = get_term_by('slug', $name, $tax_name); // get the current term to make sure it exists

  if (isset($name) && $term && !is_wp_error($term)) : // check it here

    if ($include_children) {
      unset($query['attachment']);
      $parent = $term->parent;
      while ($parent) {
        $parent_term = get_term($parent, $tax_name);
        $name = $parent_term->slug . '/' . $name;
        $parent = $parent_term->parent;
      }
    } else {
      unset($query['name']);
    }

    switch ($tax_name):
      case 'category': {
          $query['category_name'] = $name; // for categories
          break;
        }
      case 'post_tag': {
          $query['tag'] = $name; // for post tags
          break;
        }
      default: {
          $query[$tax_name] = $name; // for another taxonomies
          break;
        }
    endswitch;

  endif;

  return $query;
}

add_filter('term_link', 'cl_term_permalink', 10, 3);
function cl_term_permalink($url, $term, $taxonomy)
{

  $taxonomy_name = 'product_category'; // your taxonomy name here
  $taxonomy_slug = 'product_category'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' )

  // exit the function if taxonomy slug is not in URL
  if (strpos($url, $taxonomy_slug) === FALSE || $taxonomy != $taxonomy_name) return $url;

  $url = str_replace('/' . $taxonomy_slug, '', $url);

  return $url;
}

/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'cl_filter_post_type_by_taxonomy');
function cl_filter_post_type_by_taxonomy()
{
  global $typenow;
  $post_type = 'products'; // change to your post type
  $taxonomy  = 'product_category'; // change to your taxonomy
  if ($typenow == $post_type) {
    $selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
    $info_taxonomy = get_taxonomy($taxonomy);
    wp_dropdown_categories(array(
      'show_option_all' => sprintf(__('Show all %s', 'textdomain'), $info_taxonomy->label),
      'taxonomy'        => $taxonomy,
      'name'            => $taxonomy,
      'orderby'         => 'name',
      'selected'        => $selected,
      'show_count'      => true,
      'hide_empty'      => true,
    ));
  };
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'cl_convert_id_to_term_in_query');
function cl_convert_id_to_term_in_query($query)
{
  global $pagenow;
  $post_type = 'products'; // change to your post type
  $taxonomy  = 'product_category'; // change to your taxonomy
  $q_vars    = &$query->query_vars;
  if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
    $q_vars[$taxonomy] = $term->slug;
  }
}
