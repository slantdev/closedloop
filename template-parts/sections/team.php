<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>
<!-- Team -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <ul class="nav nav-tabs flex flex-row flex-wrap list-none border-b-0 pl-0 mb-8" id="tabs-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <a href="#tabs-australia" class="nav-link active" id="tabs-australia-tab" data-bs-toggle="pill" data-bs-target="#tabs-australia" role="tab" aria-controls="tabs-australia" aria-selected="true">Australia</a>
      </li>
      <li><span class="block pr-6 my-2 text-3xl leading-tight border-r-2 border-gray-300 lg:pr-12">&nbsp;</span></li>
      <li class="nav-item pl-6 lg:pl-12" role="presentation">
        <a href="#tabs-newzealand" class="nav-link" id="tabs-newzealand-tab" data-bs-toggle="pill" data-bs-target="#tabs-newzealand" role="tab" aria-controls="tabs-newzealand" aria-selected="false">New Zealand</a>
      </li>
    </ul>
    <div class="tab-content" id="tabs-tabContent">
      <div class="tab-pane fade show active" id="tabs-australia" role="tabpanel" aria-labelledby="tabs-australia-tab">

        <?php get_template_part('template-parts/components/description', '', array('field' => 'australia_team_description')); ?>

        <?php
        $args = array(
          'post_type' => 'team',
          'posts_per_page' => -1,
          'tax_query' => array(
            'relation' => 'AND',
            array(
              'taxonomy' => 'team_country',
              'field'    => 'slug',
              'terms'    => 'australia',
            ),
            array(
              'taxonomy' => 'team_category',
              'field'    => 'slug',
              'terms'    => 'leadership',
            ),
          ),
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {

          echo '<div class="grid grid-cols-2 items-start gap-x-6 gap-y-8 mt-8 md:grid-cols-3 md:gap-x-8 md:gap-y-10 lg:gap-x-24 lg:gap-y-12 lg:mt-12 xl:gap-x-32 xl:gap-y-16">';
          while ($the_query->have_posts()) {
            $the_query->the_post();
            $id = get_the_ID();
            $atts = array(
              'team_photo'  => get_field('team_image', $id)['url'],
              'team_name'  => get_field('team_name', $id),
              'team_position'  => get_field('team_position', $id),
              'team_bio' => get_field('team_bio', $id),
              'team_linkedin' => get_field('team_linked_in', $id),
              'team_email' => get_field('team_email', $id),
              'team_mobile' => get_field('team_phone', $id)
            );
            echo cl_team_member($atts);
          }
          echo '</div>';
        }
        wp_reset_postdata();
        ?>

        <?php
        $args = array(
          'post_type' => 'team',
          'posts_per_page' => -1,
          'tax_query' => array(
            'relation' => 'AND',
            array(
              'taxonomy' => 'team_country',
              'field'    => 'slug',
              'terms'    => 'australia',
            ),
            array(
              'taxonomy' => 'team_category',
              'field'    => 'slug',
              'terms'    => 'executive',
            ),
          ),
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {

          echo '<div class="h-px my-8 xl:my-24 border-b border-solid border-gray-300"></div>';

          echo '<div class="grid grid-cols-3 items-start gap-x-6 gap-y-8 mt-8 md:grid-cols-4 md:gap-x-8 md:gap-y-10 lg:gap-x-24 lg:gap-y-12 lg:mt-12 xl:gap-x-32 xl:gap-y-16">';
          while ($the_query->have_posts()) {
            $the_query->the_post();
            $id = get_the_ID();
            $atts = array(
              'team_photo'  => get_field('team_image', $id)['url'],
              'team_name'  => get_field('team_name', $id),
              'team_position'  => get_field('team_position', $id),
              'team_bio' => get_field('team_bio', $id),
              'team_linkedin' => get_field('team_linked_in', $id),
              'team_email' => get_field('team_email', $id),
              'team_mobile' => get_field('team_phone', $id)
            );
            echo cl_team_member($atts);
          }
          echo '</div>';
        }
        wp_reset_postdata();
        ?>

      </div>
      <div class="tab-pane fade" id="tabs-newzealand" role="tabpanel" aria-labelledby="tabs-newzealand-tab">

        <?php get_template_part('template-parts/components/description', '', array('field' => 'new_zealand_team_description')); ?>

        <?php
        $args = array(
          'post_type' => 'team',
          'posts_per_page' => -1,
          'tax_query' => array(
            'relation' => 'AND',
            array(
              'taxonomy' => 'team_country',
              'field'    => 'slug',
              'terms'    => 'new_zealand',
            ),
            array(
              'taxonomy' => 'team_category',
              'field'    => 'slug',
              'terms'    => 'leadership',
            ),
          ),
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {

          echo '<div class="grid grid-cols-2 items-start gap-x-6 gap-y-8 mt-8 md:grid-cols-3 md:gap-x-8 md:gap-y-10 lg:gap-x-24 lg:gap-y-12 lg:mt-12 xl:gap-x-32 xl:gap-y-16">';
          while ($the_query->have_posts()) {
            $the_query->the_post();
            $team_name = get_field('team_name');
            if (!$team_name) {
              $team_name = get_the_title();
            }
            $atts = array(
              'team_photo'  => get_field('team_image')['url'],
              'team_name'  => $team_name,
              'team_position'  => get_field('team_position'),
              'team_bio' => get_field('team_bio'),
              'team_linkedin' => get_field('team_linked_in'),
              'team_email' => get_field('team_email'),
              'team_mobile' => get_field('team_phone')
            );
            echo cl_team_member($atts);
          }
          echo '</div>';
        }
        wp_reset_postdata();
        ?>

        <?php
        $args = array(
          'post_type' => 'team',
          'posts_per_page' => -1,
          'tax_query' => array(
            'relation' => 'AND',
            array(
              'taxonomy' => 'team_country',
              'field'    => 'slug',
              'terms'    => 'new_zealand',
            ),
            array(
              'taxonomy' => 'team_category',
              'field'    => 'slug',
              'terms'    => 'executive',
            ),
          ),
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {

          echo '<div class="h-px my-8 xl:my-24 border-b border-solid border-gray-300"></div>';

          echo '<div class="grid grid-cols-3 items-start gap-x-6 gap-y-8 mt-8 md:grid-cols-4 md:gap-x-8 md:gap-y-10 lg:gap-x-24 lg:gap-y-12 lg:mt-12 xl:gap-x-32 xl:gap-y-16">';
          while ($the_query->have_posts()) {
            $the_query->the_post();
            $atts = array(
              'team_photo'  => get_field('team_image')['url'],
              'team_name'  => get_the_title(),
              'team_position'  => get_field('team_position'),
              'team_bio' => get_field('team_bio'),
              'team_linkedin' => get_field('team_linked_in'),
              'team_email' => get_field('team_email'),
              'team_mobile' => get_field('team_phone')
            );
            echo cl_team_member($atts);
          }
          echo '</div>';
        }
        wp_reset_postdata();
        ?>

      </div>
    </div>
    <?php echo $loop_overlay_br; ?>
  </div>
</section>