<?php
?>
<!-- Text + Components -->
<section id="text-components" class="section-scroll bg-gray-100">
  <div class="container mx-auto max-w-6xl py-36">
    <h2 class="text-3xl font-bold leading-[1.1em] text-coral mb-16">Text + Card</h2>
    <div class="flex">
      <div class="w-3/4 pr-16">
        <p class="mb-8">If our packaging comes back through our collection programs then it can be turned into many new innovative products such as saveBOARD building products, wheel stops and kerbing, garden beds and road surfacing (to name a few). Biodegradable products can be composted at home, returning to the earth and remaining out of harmfull landfill.</p>
        <p>If our packaging doesn’t directly come back to us we know it has been made to be unmade so can be recycled or composted in the right conditions. In addition to this, a contribution from all packaging sales goes towards the establishment of the local circular economy and continual development of innovative new products made from recycled materials.</p>
      </div>
      <div class="w-1/4 text-right pl-16 border-l border-gray-300">
        <a href="#" class="px-8 py-3 rounded-md bg-coral text-white uppercase shadow inline-block text-sm">Button</a>
      </div>
    </div>
    <div class="pt-24">
      <h3 class="font-bold text-3xl mb-8">Cards</h3>
      <div class="grid grid-cols-1 md:grid-cols-3 md:gap-12">
        <?php
        $atts = array(
          'img_src' => 'https://picsum.photos/480/270',
          'title' => 'Cardboard',
          'excerpt' => 'Recycled by <span class="underline">Oji Fibre Solutions</span>',
          'plus_sign' => false,
        );
        echo cl_card($atts);
        $atts = array(
          'img_src' => 'https://picsum.photos/480/270',
          'title' => 'Cans',
          'excerpt' => 'Recycled by <span href="#" class="underline">Mount Metal Recycling</span>',
          'plus_sign' => false,
        );
        echo cl_card($atts);
        $atts = array(
          'img_src' => 'https://picsum.photos/480/270',
          'title' => 'Plastics (Type 1 & 2)',
          'excerpt' => 'Recycled by <span href="#" class="underline">Flight Plastics</span>',
          'plus_sign' => false,
        );
        echo cl_card($atts);
        ?>
      </div>
    </div>
    <div class="pt-24">
      <div class="max-w-3xl mx-auto">
        <h3 class="font-bold text-3xl mb-8">Image</h3>
        <div class="aspect-video">
          <img src="https://picsum.photos/1280/768" />
        </div>
      </div>
    </div>
    <div class="pt-24">
      <div class="max-w-3xl mx-auto">
        <h3 class="font-bold text-3xl mb-8">Video</h3>
        <div class="aspect-video">
          <iframe class="w-full h-full object-cover" src="https://player.vimeo.com/video/1084537?h=b1b3ab5aa2" width="640" height="480" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></p>
        </div>
      </div>
    </div>
  </div>
</section>