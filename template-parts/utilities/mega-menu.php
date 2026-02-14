<?php
$logo_src = closedloop_asset('images/logo-closed-loop-color.png');
?>
<div class="mega-menu-dropdown">
  <button class="megamenu-toggle hidden lg:ml-6 xl:block" type="button" aria-expanded="false">
    <?php echo cl_icon(array('icon' => 'menu', 'group' => 'utility', 'size' => '48', 'class' => 'nav-icon')) ?>
  </button>
  <div id="megamenu" class="megamenu hidden w-full absolute top-0 left-0 bg-alice-blue text-base z-50 bg-clip-padding border border-gray-300 text-black" aria-labelledby="megamenu">
    <?php if (have_rows('mega_menu_items', 'option')) : ?>
      <div class="grid grid-cols-3 min-h-[520px]">
        <div class="bg-alice-blue border-r-2 border-solid border-gray-300">
          <div class="flex flex-col h-full pt-24">
            <ul class="toplevel-menu">
              <?php while (have_rows('mega_menu_items', 'option')) : the_row(); ?>
                <?php
                $menu_item = get_sub_field('menu_item');
                $has_submenu = get_sub_field('has_submenu');
                if ($has_submenu) {
                  $has_submenu = 'has-submenu';
                } else {
                  $has_submenu = '';
                }
                ?>
                <li class="<?php echo $has_submenu ?>">
                  <a href="<?php echo $menu_item['url'] ?>" class="block px-6 py-3 bg-transparent hover:bg-white hover:font-bold"><?php echo $menu_item['title'] ?></a>
                  <?php if (have_rows('submenu', 'option')) : ?>
                    <div class="submenu hidden w-2/3 h-full absolute top-0 left-auto right-0 bg-alice-blue">
                      <div class="grid grid-cols-2 h-full">
                        <div class="h-full border-r-2 border-gray-300">
                          <div class="pt-24">
                            <div class="mb-4">
                              <div class="px-6">
                                <h4 class="font-bold border-b-4 border-black py-3 mb-1"><?php echo $menu_item['title'] ?></h4>
                              </div>
                              <ul class="secondlevel-menu">
                                <?php while (have_rows('submenu', 'option')) : the_row(); ?>
                                  <?php
                                  $submenu_item = get_sub_field('submenu_item');
                                  $has_submenu = get_sub_field('has_submenu');
                                  if ($has_submenu) {
                                    $has_submenu = 'has-submenu';
                                  } else {
                                    $has_submenu = '';
                                  }
                                  ?>
                                  <li class="<?php echo $has_submenu ?>">
                                    <a href="<?php echo $submenu_item['url'] ?>" class="block px-6 bg-transparent font-thin py-2.5 hover:bg-white hover:text-primary hover:font-normal"><?php echo $submenu_item['title'] ?></a>
                                    <?php if (have_rows('subsubmenu', 'option')) : ?>
                                      <div class="submenu hidden w-1/2 h-full absolute top-0 left-auto right-0 bg-alice-blue">
                                        <div class="h-full">
                                          <div class="pt-24">
                                            <div class="mb-4">
                                              <div class="px-6">
                                                <h4 class="font-bold border-b-4 border-black py-3 mb-1"><?php echo $submenu_item['title'] ?></h4>
                                              </div>
                                              <ul>
                                                <?php while (have_rows('subsubmenu', 'option')) : the_row(); ?>
                                                  <li><a href="<?php echo get_sub_field('submenu_item')['url'] ?>" class="block px-6 bg-transparent font-thin py-2.5 hover:bg-white hover:text-primary hover:font-normal"><?php echo get_sub_field('submenu_item')['title'] ?>
                                                    </a></li>
                                                <?php endwhile; ?>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    <?php endif; ?>
                                  </li>

                                <?php endwhile; ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
        <?php
        $mega_menu_description = get_field('mega_menu_description', 'option');
        $mega_menu_title = $mega_menu_description['title'];
        $mega_menu_image = $mega_menu_description['image'];
        $mega_menu_text = $mega_menu_description['description'];
        ?>
        <div class="col-span-2 pt-24 pb-8 px-16">
          <div class="flex flex-col h-full">
            <div class="max-w-sm">
              <?php if ($mega_menu_image) : ?>
                <img class="max-w-1/2 mb-6" src="<?php echo $mega_menu_image['url'] ?>" alt="">
              <?php endif; ?>
              <?php if ($mega_menu_title) : ?>
                <h3 class="text-aquamarine text-4xl font-bold leading-none mb-6"><?php echo $mega_menu_title ?></h3>
              <?php endif; ?>
              <?php if ($mega_menu_text) : ?>
                <div class="text-gray-500"><?php echo $mega_menu_text ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <button class="megamenu-toggle absolute z-50 top-8 right-8" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="37.414" height="37.414" viewBox="0 0 37.414 37.414">
          <g id="Group_1516" data-name="Group 1516" transform="translate(-5214.793 132.207)">
            <line id="Line_9" data-name="Line 9" x1="36" y2="36" transform="translate(5215.5 -131.5)" fill="none" stroke="#29b473" stroke-width="2" />
            <line id="Line_10" data-name="Line 10" x2="36" y2="36" transform="translate(5215.5 -131.5)" fill="none" stroke="#29b473" stroke-width="2" />
          </g>
        </svg>
      </button>
    <?php endif; ?>
  </div>
</div>