<?php if (have_rows('mega_menu_items', 'option')) : ?>
  <nav class="main-menu hidden 2lg:block mr-4">
    <ul class="flex items-center gap-x-6 2xl:gap-x-8">
      <?php while (have_rows('mega_menu_items', 'option')) : the_row(); ?>
        <?php
        $menu_item = get_sub_field('menu_item');
        $has_submenu = get_sub_field('has_submenu');
        ?>
        <li class="relative group">
          <a href="<?php echo $menu_item['url'] ?>" class="flex items-center whitespace-nowrap text-sm 2xl:text-base py-4 text-black hover:text-primary transition-colors font-medium">
            <?php echo $menu_item['title'] ?>
            <?php if ($has_submenu): ?>
              <svg class="ml-1 w-4 h-4 transition-transform group-hover:-rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            <?php endif; ?>
          </a>

          <?php if ($has_submenu && have_rows('submenu')) : ?>
            <div class="absolute left-0 top-full hidden group-hover:block w-64 pt-0">
              <ul class="bg-white border border-gray-100 shadow-xl z-50 py-2 rounded-md">
                <?php while (have_rows('submenu')) : the_row(); ?>
                  <?php
                  $submenu_item = get_sub_field('submenu_item');
                  $has_sub_submenu = get_sub_field('has_submenu');
                  ?>
                  <li class="relative <?php if ($has_sub_submenu) {
                                        echo 'has-subsubmenu';
                                      } ?>">
                    <a href="<?php echo $submenu_item['url'] ?>" class="flex justify-between items-center w-full px-6 py-2.5 text-black hover:bg-gray-50 hover:text-primary transition-colors text-sm">
                      <?php echo $submenu_item['title'] ?>
                      <?php if ($has_sub_submenu): ?>
                        <svg class="w-4 h-4 text-gray-400 -mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      <?php endif; ?>
                    </a>

                    <?php if ($has_sub_submenu && have_rows('subsubmenu')) : ?>
                      <div class="subsubmenu-flyout absolute left-full top-0 hidden w-64 pl-0">
                        <ul class="bg-white border border-gray-100 shadow-xl z-50 py-2 rounded-md">
                          <?php while (have_rows('subsubmenu')) : the_row(); ?>
                            <?php $subsubmenu_item = get_sub_field('submenu_item'); ?>
                            <li>
                              <a href="<?php echo $subsubmenu_item['url'] ?>" class="block px-6 py-2.5 text-black hover:bg-gray-50 hover:text-primary transition-colors text-sm">
                                <?php echo $subsubmenu_item['title'] ?>
                              </a>
                            </li>
                          <?php endwhile; ?>
                        </ul>
                      </div>
                    <?php endif; ?>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
          <?php endif; ?>
        </li>
      <?php endwhile; ?>
    </ul>
  </nav>
<?php endif; ?>