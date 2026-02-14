<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
include get_template_directory() . '/template-parts/components/heading-vars.php';
?>
<!-- Icons Grid -->
<section id="<?php echo $section_id ?>" class="section-scroll" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <?php
      if ($heading_tag) {
        echo '<' . $heading_tag . ' class="' . $heading_class . '" style="color: ' . $heading_color . '">' . $heading_text . '</' . $heading_tag . '>';
      }

      $icons_grid = get_sub_field('icons_grid');
      $grid_style = $icons_grid['grid_style'];
      $icons = $icons_grid['icons'];
      ?>
      <?php if ($grid_style == 'style-1') : ?>
        <div class="flex justify-center gap-x-20">
          <?php
          $icon_svg = cl_icon(array('icon' => 'restaurants', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Restaurants',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'supermarkets', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Supermarkets',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'schools', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Schools',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'universities', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Universities',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'hotels', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Hotels',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'apartments', 'group' => 'custom', 'size' => 112, 'class' => 'mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-white max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Apartments',
            'text_class' => 'uppercase',
          );
          echo cl_icon_list_item($atts);
          ?>
        </div>
      <?php elseif ($grid_style == 'style-2') : ?>
        <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'light-bulb', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
            <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">20+ years</h4>
            <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'recycle-bin', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
            <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">150+ clients</h4>
            <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'recycle', 'group' => 'custom', 'size' => 112, 'class' => 'h-28 w-auto text-black mx-auto mb-4')); ?>
            <h4 class="text-[40px] text-darkblue font-bold text-center mb-4">∞ possibilities</h4>
            <p class="text-xl text-neutral-500 text-center font-bold">Lorem ipsum dolor sit amet</p>
          </div>
        </div>
      <?php elseif ($grid_style == 'style-2') : ?>
        <div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-x-16 lg:gap-y-24 mx-auto max-w-6xl">
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'recycling', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Co-Mingle Recycling</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'cardboard', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Paper + Cardboard</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'food-waste', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Food Waste</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'green-waste', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Green Waste</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'waste-oil', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Waste Oil</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'waste-water', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Waste Water</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'plastic-bottle', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Plastic Bottles</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'wine-cup', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Beer / Wine Cups</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'coffee-cup', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">Coffee Cups</h4>
          </div>
          <div class="flex flex-col items-center">
            <?php echo cl_icon(array('icon' => 'general-waste', 'group' => 'custom', 'size' => 96, 'class' => 'h-20 w-auto text-deepskyblue mx-auto mb-4')); ?>
            <h4 class="text-lg font-medium uppercase text-center">General Waste</h4>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>