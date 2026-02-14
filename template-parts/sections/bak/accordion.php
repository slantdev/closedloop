<?php
?>
<!-- Accordion -->
<section id="accordion" class="section-scroll bg-[#edf1f5]">
  <div class="container max-w-4xl mx-auto py-36">
    <h2 class="text-3xl text-center font-bold leading-[1.1em] text-coral mb-16">Accordion</h2>

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