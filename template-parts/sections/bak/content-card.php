<?php
?>
<!-- Content Card Slider -->
<section id="card-slider" class="section-scroll bg-coral">
  <div class="flex w-full py-36">
    <div class="w-1/3 flex justify-end text-white pr-16">
      <div class="w-full max-w-xs pr-4 flex flex-col">
        <h2 class="text-4xl font-bold">Content card slider</h2>
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