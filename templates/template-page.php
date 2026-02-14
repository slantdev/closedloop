<?php

/**
 * Template Name: Page
 * Template Post Type: page
 *
 */

get_header('', array('header_type' => 'white-transparent'));
?>

<!-- Hero -->
<section class="bg-gray-300 relative bg-cover -mt-[142px] h-[60vh]" style="background-image: url(<?php echo closedloop_asset('images/banners/hero-02.jpg') ?>)">
  <div class="absolute inset-0 bg-neutral-100 bg-opacity-30">
    <div class="container mx-auto h-full relative pt-[142px]">
      <div class="flex h-full items-center px-24">
        <div class="w-6/12">
          <div class="max-w-lg">
            <h2 class="text-[50px] font-bold text-white leading-tight mb-2 pl-[0.25em]">
              <span class="title-highlight" style="background-color: #f15f3f; box-shadow: 0.25em 0 0 #f15f3f, -0.25em 0 0 #f15f3f;"><?php echo get_the_title() ?></span>
            </h2>
            <div class="breadcrumbs bg-white bg-opacity-50 py-2 px-4 text-black text-sm">
              <a href="#">Home</a> / <strong><?php echo get_the_title() ?></strong>
            </div>
          </div>
        </div>
      </div>
      <div class="absolute right-6 bottom-0">
        <svg class="rotate-0 text-white" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
          <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
        </svg>
      </div>
    </div>
  </div>
</section>

<!-- Page Navigation -->
<section id="scrollnav" class="sticky top-0 z-40">
  <div class="bg-lightsalmon py-6">
    <div class="container mx-auto">
      <menu>
        <ul class="flex divide-x divide-black text-black leading-none -ml-6">
          <li class="px-6"><a class="nav-link" href="#about-our-packaging">About our packaging</a></li>
          <li class="px-6"><a class="nav-link" href="#packaging-solutions">Packaging solutions</a></li>
          <li class="px-6"><a class="nav-link" href="#industry-application">Industry application</a></li>
          <li class="px-6"><a class="nav-link" href="#our-packaging">Our packaging</a></li>
          <li class="px-6"><a class="nav-link" href="#faqs">FAQs</a></li>
          <li class="px-6"><a class="nav-link" href="#what-we-do">What we do</a></li>
          <li class="px-6"><a class="nav-link" href="#contact-us">Contact us</a></li>
        </ul>
      </menu>
    </div>
  </div>
  <div class="w-full bg-zinc-50">
    <div class="scroll-indicator h-[10px] bg-coral"></div>
  </div>
</section>

<!-- About -->
<section id="about-our-packaging" class="section-scroll bg-white">
  <div class="container mx-auto py-36 relative">
    <div class="absolute right-0 top-0 -z-0">
      <svg class="rotate-180 text-neutral-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
        <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
      </svg>
    </div>
    <div class="flex gap-x-20 relative">
      <div class="w-1/2">
        <div class="mb-12">
          <img src="https://picsum.photos/800" class="rounded-full max-w-md mx-auto" />
        </div>
        <div class="mx-auto text-center">
          <a href="#" class="px-8 py-3 rounded-md bg-coral text-white uppercase shadow inline-block text-sm">Download our packaging catalogue</a>
        </div>
      </div>
      <div class="w-1/2">
        <h3 class="font-bold text-2xl text-darkblue">About our packaging</h3>
        <h2 class="text-4xl font-bold leading-[1.1em] text-coral mb-8 mt-12">We’re your<br>
          sustainability<br>
          partner</h2>
        <div>
          <p class="mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Eget
            dolor morbi non arcu risus quis. Maecenas volutpat blandit aliquam
            etiam erat velit. Integer quis auctor elit sed vulputate mi sit amet.
            Fermentum odio eu feugiat pretium nibh ipsum consequat.</p>
          <p class="mb-8">Dignissim cras tincidunt lobortis feugiat vivamus at augue eget.
            Vitae tempus quam pellentesque nec nam aliquam. Risus pretium
            quam vulputate dignissim suspendisse.</p>
        </div>
        <div class="flex gap-x-16">
          <?php
          $icon_svg = cl_icon(array('icon' => 'recycle', 'group' => 'custom', 'size' => 92, 'class' => 'h-16 w-auto mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-coral max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Sustainably sourced',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'loop', 'group' => 'custom', 'size' => 92, 'class' => 'h-16 w-auto mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-coral max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'Made and distributed by Closed Loop',
          );
          echo cl_icon_list_item($atts);
          ?>
          <?php
          $icon_svg = cl_icon(array('icon' => 'check', 'group' => 'custom', 'size' => 92, 'class' => 'h-16 w-auto mx-auto mb-4'));
          $atts = array(
            'container_class' => 'text-coral max-w-[120px]',
            'icon_svg' => $icon_svg,
            'icon_caption' => 'High quality products',
          );
          echo cl_icon_list_item($atts);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Packaging solutions -->
<section id="packaging-solutions" class="section-scroll bg-slate-100">
  <div class="container max-w-5xl mx-auto py-36">
    <div class="mb-16">
      <div class="flex justify-between">
        <h2 class="text-4xl font-bold leading-[1.1em] text-coral">Our packaging solutions</h2>
        <div class="selectdiv">
          <select class="bg-white rounded-full border-0 min-w-[200px] text-coral" style="border:none; border-radius: 50px;">
            <option value="" disabled selected>Select</option>
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
          </select>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-12">
      <?php
      $args = array(
        'img_src' => 'https://picsum.photos/480/270',
        'title' => 'Waste & Resource Audits',
        'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
        'plus_sign' => true,
      );
      echo cl_card($args);
      echo cl_card($args);
      echo cl_card($args);
      echo cl_card($args);
      echo cl_card($args);
      echo cl_card($args);
      ?>
    </div>
  </div>
</section>

<!-- Industry applications -->
<section id="industry-application" class="section-scroll bg-coral">
  <div class="container mx-auto py-24">
    <h2 class="text-3xl font-bold leading-[1.1em] text-white text-center mb-16">Industry Application</h2>
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
  </div>
</section>

<!-- Our packaging -->
<section id="our-packaging" class="section-scroll bg-white">
  <div class="container mx-auto max-w-6xl py-36">
    <h2 class="text-3xl font-bold leading-[1.1em] text-coral mb-16">Our packaging: a part of the Loop</h2>
    <div class="flex">
      <div class="w-3/4 pr-16">
        <p class="mb-8">If our packaging comes back through our collection programs then it can be turned into many new innovative products such as saveBOARD building products, wheel stops and kerbing, garden beds and road surfacing (to name a few). Biodegradable products can be composted at home, returning to the earth and remaining out of harmfull landfill.</p>
        <p>If our packaging doesn’t directly come back to us we know it has been made to be unmade so can be recycled or composted in the right conditions. In addition to this, a contribution from all packaging sales goes towards the establishment of the local circular economy and continual development of innovative new products made from recycled materials.</p>
      </div>
      <div class="w-1/4 text-right pl-16 border-l border-gray-300">
        <a href="#" class="px-8 py-3 rounded-md bg-coral text-white uppercase shadow inline-block text-sm">Contact Us</a>
      </div>
    </div>
    <div class="pt-24">
      <div class="aspect-video max-w-3xl mx-auto">
        <img src="https://picsum.photos/1280/768" />
      </div>
    </div>
  </div>
</section>

<!-- FAQs -->
<section id="faqs" class="section-scroll bg-[#edf1f5]">
  <div class="container max-w-4xl mx-auto py-36">
    <h2 class="text-3xl text-center font-bold leading-[1.1em] text-coral mb-16">Packaging FAQS</h2>

    <div class="accordion" id="accordionExample">
      <div class="accordion-item bg-gray-100 border border-gray-300 mb-6 rounded-lg">
        <h2 class="accordion-header mb-0" id="headingOne">
          <button class="accordion-button relative flex w-full py-4 px-5 text-xl font-bold text-gray-500 leading-tight text-left bg-white border-0 focus:outline-none rounded-lg lg:py-5 lg:pl-8 lg:pr-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            1. Lorem ipsum dolor sit amet
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body py-4 px-5 lg:px-8 lg:py-8">
            <p class="mb-6">If our packaging comes back through our collection programs then it can be turned into many new
              innovative products such as saveBOARD building products, wheel stops and kerbing, garden beds and
              road surfacing (to name a few). Biodegradable products can be composted at home, returning to the
              earth and remaining out of harmfull landfill.</p>
            <p>If our packaging doesn’t directly come back to us we know it has been made to be unmade so can be
              recycled or composted in the right conditions. In addition to this, a contribution from all packaging
              sales goes towards the establishment of the local circular economy and continual development of
              innovative new products made from recycled materials.</p>
          </div>
        </div>
      </div>

      <div class="accordion-item bg-gray-100 border border-gray-300 mb-6 rounded-lg">
        <h2 class="accordion-header mb-0" id="headingTwo">
          <button class="accordion-button collapsed relative flex w-full py-4 px-5 text-xl font-bold text-gray-500 leading-tight text-left bg-white border-0 focus:outline-none rounded-lg lg:py-5 lg:pl-8 lg:pr-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body py-4 px-5 lg:px-8 lg:py-8">
            <strong>This is the second item's accordion body.</strong> It is hidden by default,
            until the collapse plugin adds the appropriate classes that we use to style each
            element. These classes control the overall appearance, as well as the showing and
            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
            our default variables. It's also worth noting that just about any HTML can go within
            the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>

      <div class="accordion-item bg-gray-100 border border-gray-300 mb-6 rounded-lg">
        <h2 class="accordion-header mb-0" id="headingThree">
          <button class="accordion-button collapsed relative flex w-full py-4 px-5 text-xl font-bold text-gray-500 leading-tight text-left bg-white border-0 focus:outline-none rounded-lg lg:py-5 lg:pl-8 lg:pr-6" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3. Lorem ipsum dolor sit amet
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body py-4 px-5 lg:px-8 lg:py-8">
            <strong>This is the third item's accordion body.</strong> It is hidden by default,
            until the collapse plugin adds the appropriate classes that we use to style each
            element. These classes control the overall appearance, as well as the showing and
            hiding via CSS transitions. You can modify any of this with custom CSS or overriding
            our default variables. It's also worth noting that just about any HTML can go within
            the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- What We Do -->
<section id="what-we-do" class="section-scroll bg-coral">
  <div class="flex w-full py-36">
    <div class="w-1/3 flex justify-end text-white pr-16">
      <div class="w-full max-w-xs pr-4 flex flex-col">
        <h2 class="text-4xl font-bold">What We Do</h2>
        <div class="mt-auto mb-20">
          <p>As your sustainability partner, we’ll help you design, deliver, communicate and measure bespoke waste management solutions to provide the best possible economic, social and environmental outcomes.</p>
        </div>
        <div class="mb-2"><a href="#" class="inline-block bg-white rounded-md uppercase font-medium text-sm text-darkblue px-8 py-3 shadow">Contact Us</a></div>
      </div>
    </div>
    <div class="w-2/3">
      <div class="swiper whatWeDoSwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Want to know more about your impact?',
              'title' => 'Circular Economy Consulting',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Reuse and recycle our packaging',
              'title' => 'Waste & Resource Audits',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Managing food waste too?',
              'title' => 'Sustainable packaging solutions',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Want to know more about your impact?',
              'title' => 'Circular Economy Consulting',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Reuse and recycle our packaging',
              'title' => 'Waste & Resource Audits',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
          <div class="swiper-slide max-w-xs">
            <?php
            $args = array(
              'img_src' => 'https://picsum.photos/480/270',
              'img_caption' => 'Managing food waste too?',
              'title' => 'Sustainable packaging solutions',
              'excerpt' => 'Made to be unmade. These cups use a water based dispersion barrier instead of a plastic lining.',
              'plus_sign' => false,
              'link' => '#'
            );
            echo cl_card($args);
            ?>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <script>
        var whatWeDoSwiper = new Swiper(".whatWeDoSwiper", {
          slidesPerView: "auto",
          spaceBetween: 30,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        });
      </script>
      <style>
        .whatWeDoSwiper {
          padding-bottom: 100px;
        }

        .whatWeDoSwiper.swiper-horizontal>.swiper-pagination-bullets,
        .whatWeDoSwiper .swiper-pagination-bullets.swiper-pagination-horizontal {
          bottom: 0px;
          text-align: left;
        }

        .whatWeDoSwiper .swiper-pagination-bullet {
          width: 20px;
          height: 10px;
          border-radius: 50px;
          background-color: white;
          transition: all 500ms ease-in;
        }

        .whatWeDoSwiper .swiper-pagination-bullet-active {
          width: 60px;
          background-color: #074c6c;
        }
      </style>
    </div>
  </div>
</section>

<!-- Contact Us -->
<section id="contact-us" class="section-scroll bg-white">
  <div class="container max-w-5xl mx-auto py-36">
    <div class="mb-8">
      <h2 class="text-4xl font-bold leading-[1.1em] text-coral text-center mb-16">Contact us</h2>
      <p class="text-center">Fill in the form below or call us on <a href="tel:+610396484600" class="text-coral hover:underline">+61 (03) 9648 4600</a></p>
    </div>
    <div class="border border-gray-300 rounded-lg py-12 px-16">
      <form>
        <div class="flex gap-8 mb-8">
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="First Name*" /></div>
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="Last Name*" /></div>
        </div>
        <div class="flex gap-8 mb-8">
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="Phone*" /></div>
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="Email*" /></div>
        </div>
        <div class="flex gap-8 mb-8">
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="Your role*" /></div>
          <div class="w-1/2"><input type="text" class="w-full" id="" placeholder="Your location*" /></div>
        </div>
        <div class="mb-8">
          <label class="inline-block mb-2 text-black font-bold">Are you interested in custom branding?</label>
          <div class="form-check mb-3">
            <input class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-md bg-gray-100 checked:bg-coral checked:border-coral focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" id="check1">
            <label class="form-check-label inline-block text-gray-800" for="check1">
              Yes, I’m interested in custom branding (min quantity 50,000 units)
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input appearance-none h-6 w-6 border border-gray-300 rounded-md bg-gray-100 checked:bg-coral checked:border-coral focus:outline-none transition duration-200 align-top bg-no-repeat bg-center bg-contain float-left mr-3 cursor-pointer" type="checkbox" value="" id="check2">
            <label class="form-check-label inline-block text-gray-800" for="check2">
              No, I’m not interested just yet
            </label>
          </div>
        </div>
        <div class="mb-8">
          <textarea class="w-full" name="" id="" rows="5" placeholder="Tell us a little more about your packaging requirements…"></textarea>
        </div>
        <div class="mb-8">
          <select name="" id="">
            <option value="" disabled selected>How did you hear about Closed Loop?</option>
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
          </select>
        </div>
        <div>
          <button type="button" class="button" data-mdb-ripple="true" data-mdb-ripple-color="light">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>


<?php get_footer(); ?>