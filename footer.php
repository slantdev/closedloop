</main>

<?php do_action('closedloop_content_end'); ?>

</div>

<?php do_action('closedloop_content_after'); ?>

<footer class="site-footer" role="contentinfo">
  <?php do_action('closedloop_footer'); ?>

  <div class="bg-gradient-to-b from-[#1A1D4B] to-[#004D6D]">
    <div class="px-4 xl:px-12 mx-auto relative pt-16 pb-12 md:pt-20 md:pb-16 text-white">
      <div class="absolute right-24 bottom-0 opacity-[15%] z-0">
        <svg class="rotate-0 text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
          <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
        </svg>
      </div>
      <div class="flex flex-wrap gap-y-8 lg:flex-nowrap lg:gap-x-24 relative z-10">
        <div class="w-full lg:w-1/3">
          <div class="max-w-sm">
            <div class="mb-8 md:mb-10">
              <a href="<?php echo get_bloginfo('url'); ?>" class="block">
                <img src="<?php echo closedloop_asset('images/logo-closed-loop-white.png') ?>" width="200px" height="62px" alt="Logo Closed Loop" />
              </a>
            </div>
            <?php
            $footer_text = get_field('footer_text', 'option');
            if ($footer_text) {
            ?>
              <p class="font-light"><?php echo $footer_text ?></p>
            <?php } ?>
          </div>
        </div>
        <div class="w-full lg:w-2/3">
          <div class="flex flex-wrap md:flex-nowrap md:gap-x-8">
            <div class="w-full md:w-1/2 md:mt-0">
              <?php if (have_rows('find_us', 'option')) : ?>
                <h4 class="uppercase font-bold mb-6">Find Us</h4>
                <div class="grid grid-cols-1 gap-6">
                  <?php while (have_rows('find_us', 'option')) : the_row(); ?>
                    <div>
                      <h5 class="font-bold"><?php echo get_sub_field('title') ?></h5>
                      <address class="not-italic font-light">
                        <?php echo get_sub_field('address') ?>
                      </address>
                    </div>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
              <?php if (have_rows('quick_link', 'option')) : ?>
                <h4 class="font-bold uppercase mb-6">Quick Links</h4>
                <ul class="grid grid-cols-1 gap-2 text-base font-thin">
                  <?php while (have_rows('quick_link', 'option')) : the_row(); ?>
                    <li><a href="<?php echo get_sub_field('quick_link_item')['url']; ?>" class="hover:underline"><?php echo get_sub_field('quick_link_item')['title']; ?></a></li>
                  <?php endwhile; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-aquamarine py-9">
    <div class="px-4 xl:px-12 mx-auto text-white font-light">
      <div class="flex flex-wrap">
        <div class="w-full lg:w-1/2">
          <div class="leading-tight md:leading-none">
            <span class="inline-block md:pr-4">&copy; Copyright - Closed Loop <?php echo date_i18n('Y'); ?></span><span class="inline-block pl-0 md:pl-4 md:border-l border-white">All rights reserved.</span>
          </div>
        </div>
        <div class="w-full mt-4 lg:mt-0 lg:w-1/2 lg:text-right">
          <?php if (have_rows('footer_links', 'option')) : ?>
            <div class="inline-grid grid-flow-row md:grid-flow-col gap-4 md:divide-x leading-none">
              <?php while (have_rows('footer_links', 'option')) : the_row(); ?>
                <a href="<?php echo get_sub_field('footer_link_item')['url']; ?>" class="inline-block pl-0 lg:pl-4 hover:underline"><?php echo get_sub_field('footer_link_item')['title']; ?></a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</footer>

<?php get_template_part('template-parts/utilities/offcanvas-menu'); ?>

</div>

<div class="mega-menu-overlay fixed inset-0 bg-black bg-opacity-0"></div>
<?php wp_footer(); ?>

</body>

</html>