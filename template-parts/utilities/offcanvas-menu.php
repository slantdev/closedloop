<?php
?>
<div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-80" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header flex items-center justify-between p-4">
    <h5 class="offcanvas-title mb-0 leading-normal font-semibold" id="offcanvasRightLabel">&nbsp;</h5>
    <button type="button" class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body flex-grow py-4 px-6 overflow-y-auto">
    <?php if (have_rows('mega_menu_items', 'option')) : ?>
      <ul>
        <?php while (have_rows('mega_menu_items', 'option')) : the_row(); ?>
          <?php
          $menu_item = get_sub_field('menu_item');
          $has_submenu = get_sub_field('has_submenu');
          ?>
          <li class="border-b border-gray-200">
            <?php if ($has_submenu) { ?>
              <?php
              $uid = uniqid();
              ?>
              <button class="flex justify-between w-full py-3 text-left" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $uid ?>" aria-expanded="false" aria-controls="collapse-01">
                <span><?php echo $menu_item['title'] ?></span>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2 flex-none" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                  <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                </svg>
              </button>
              <?php if (have_rows('submenu', 'option')) : ?>
                <div class="collapse" id="collapse-<?php echo $uid ?>">
                  <ul class="pl-3">
                    <?php while (have_rows('submenu', 'option')) : the_row(); ?>
                      <li>
                        <?php
                        $submenu_item = get_sub_field('submenu_item');
                        $has_submenu = get_sub_field('has_submenu');
                        if ($has_submenu) { ?>
                          <?php
                          $uid = uniqid();
                          ?>
                          <button class="flex justify-between w-full py-3 text-left" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $uid ?>" aria-expanded="false" aria-controls="collapse-01">
                            <span><?php echo $submenu_item['title'] ?></span>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-down" class="w-3 ml-2 flex-none" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                              <path fill="currentColor" d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                            </svg>
                          </button>
                          <?php if (have_rows('subsubmenu', 'option')) : ?>
                            <div class="collapse" id="collapse-<?php echo $uid ?>">
                              <ul class="pl-3">
                                <?php while (have_rows('subsubmenu', 'option')) : the_row(); ?>
                                  <li><a href="<?php echo get_sub_field('submenu_item')['url'] ?>" class="block py-2.5 hover:text-deepskyblue"><?php echo get_sub_field('submenu_item')['title'] ?></a></li>
                                <?php endwhile; ?>
                              </ul>
                            </div>
                          <?php endif; ?>
                        <?php } else { ?>
                          <a href="<?php echo $submenu_item['url'] ?>" class="block py-2.5 hover:text-deepskyblue"><?php echo $submenu_item['title'] ?></a>
                        <?php } ?>
                      </li>
                    <?php endwhile; ?>
                  </ul>
                </div>
              <?php endif; ?>
            <?php } else { ?>
              <a href="<?php echo $menu_item['url'] ?>" class="block py-2.5 hover:text-deepskyblue"><?php echo $menu_item['title'] ?></a>
            <?php } ?>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
</div>