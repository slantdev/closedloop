<?php
include get_template_directory() . '/template-parts/layout/section-settings.php';
?>
<!-- Contact Form -->
<section id="<?php echo $section_id ?>" class="<?php echo $section_class ?>" style="<?php echo $section_style ?>">
  <div class="container mx-auto relative <?php echo $padding_top . ' ' . $padding_bottom ?>">
    <?php echo $loop_overlay_tr; ?>
    <?php echo $loop_overlay_br; ?>
    <div class="relative">
      <div class="max-w-5xl mx-auto">
        <div class="mb-8">
          <?php get_template_part('template-parts/components/heading', '', array()); ?>
          <div class="text-center"><?php echo get_sub_field('description') ?></div>
        </div>
        <?php
        $contact_form_shortcode = get_sub_field('contact_form_shortcode');
        if ($contact_form_shortcode) {
        ?>
          <div class="bg-white border border-gray-300 rounded-lg py-4 px-4 lg:py-12 lg:px-16">
            <?php echo do_shortcode($contact_form_shortcode) ?>
          </div>
        <?php } else { ?>
          <div class="text-center mb-4"> This is just a demo, please add form shortcode on the content block builder.</div>
          <div class="bg-white border border-gray-300 rounded-lg py-4 px-4 lg:py-12 lg:px-16">
            <div>
              <div class="flex flex-wrap gap-4 mb-4 lg:flex-nowrap lg:gap-8 lg:mb-8">
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="First Name*" /></div>
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="Last Name*" /></div>
              </div>
              <div class="flex flex-wrap gap-4 mb-4 lg:flex-nowrap lg:gap-8 lg:mb-8">
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="Phone*" /></div>
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="Email*" /></div>
              </div>
              <div class="flex flex-wrap gap-4 mb-4 lg:flex-nowrap lg:gap-8 lg:mb-8">
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="Your role*" /></div>
                <div class="w-full lg:w-1/2"><input type="text" class="w-full" id="" placeholder="Your location*" /></div>
              </div>
              <div class="mb-4 lg:mb-8">
                <label class="inline-block mb-2 text-black font-bold">Are you interested in custom branding?</label>
                <div class="form-check flex mb-3">
                  <input class="form-check-input flex-none appearance-none h-6 w-6 border border-gray-300 rounded-md bg-gray-100 checked:bg-coral checked:border-coral focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain inline-block mr-3 cursor-pointer" type="checkbox" value="" id="check1">
                  <label class="form-check-label inline-block text-gray-800" for="check1">
                    Yes, I’m interested in custom branding (min quantity 50,000 units)
                  </label>
                </div>
                <div class="form-check flex">
                  <input class="form-check-input flex-none appearance-none h-6 w-6 border border-gray-300 rounded-md bg-gray-100 checked:bg-coral checked:border-coral focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain inline-block mr-3 cursor-pointer" type="checkbox" value="" id="check2">
                  <label class="form-check-label inline-block text-gray-800" for="check2">
                    No, I’m not interested just yet
                  </label>
                </div>
              </div>
              <div class="mb-4 lg:mb-8">
                <textarea class="w-full" name="" id="" rows="5" placeholder="Tell us a little more about your packaging requirements…"></textarea>
              </div>
              <div class="mb-4 lg:mb-8">
                <label class="inline-block mb-2 text-black font-bold">How did you hear about Closed Loop?</label>
                <select class="w-full" name="" id="">
                  <option value="" disabled selected>Select</option>
                  <option value="">Option 1</option>
                  <option value="">Option 2</option>
                  <option value="">Option 3</option>
                </select>
              </div>
              <div>
                <button type="button" class="button" data-mdb-ripple="true" data-mdb-ripple-color="light" style="background-color: <?php echo $color_theme ?>;">Submit</button>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>