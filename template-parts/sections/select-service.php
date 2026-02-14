<?php
$term_id = get_queried_object()->term_id;
if ($term_id) {
  $the_id = 'term_' . $term_id;
} else {
  $the_id = get_the_ID();
}
$color_theme = get_field('color_theme', $the_id);

$select_service = get_sub_field('select_service');

if ($select_service) : ?>
  <section class="bg-neutral-100 py-12 md:py-16">
    <div class="container mx-auto">
      <div class="flex flex-wrap flex-col md:flex-row justify-center items-center">
        <div class="mb-4 md:mb-0 md:mr-8"><span class="text-darkblue text-2xl font-bold leading-tight">I'm looking for</span></div>

        <div class="dropdown relative mr-2 md:mr-3">
          <button class="dropdown-toggle px-4 py-4 leading-tight focus:outline-none focus:ring-0 transition duration-150 ease-in-out flex items-center justify-between whitespace-nowrap min-w-[280px] xl:min-w-[360px] text-lg bg-transparent border-b-2 border-solid border-darkblue border-opacity-70 text-gray-600 w-full max-w-[380px] tracking-wider font-light lg:px-4" type="button" id="dropdownSelect" data-bs-toggle="dropdown" aria-expanded="false">
            <span>Select Service</span>
            <svg class="w-6 ml-6" xmlns="http://www.w3.org/2000/svg" width="28.707" height="14.707" viewBox="0 0 28.707 14.707">
              <g id="Group_234" data-name="Group 234" transform="translate(-2908.146 -887.146)">
                <line id="Line_3" data-name="Line 3" x2="14" y2="14" transform="translate(2908.5 887.5)" fill="none" stroke="currentColor" stroke-width="1" />
                <line id="Line_4" data-name="Line 4" x1="14" y2="14" transform="translate(2922.5 887.5)" fill="none" stroke="currentColor" stroke-width="1" />
              </g>
            </svg>
          </button>
          <ul class="dropdown-menu w-full min-w-[280px] xl:min-w-[360px] max-w-[380px] absolute bg-white text-base z-50 py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none" aria-labelledby="dropdownSelect">
            <?php
            foreach ($select_service as $service) :
              echo '<li>';
              echo '<a class="dropdown-item text-base py-2 px-4 font-normal leading-tight block w-full bg-transparent text-gray-700 hover:bg-gray-100" href="' . $service['service_title_link']['url'] . '">' . $service['service_title_link']['title'] . '</a>';
              echo '</li>';
            endforeach;
            ?>
          </ul>
        </div>

      </div>
    </div>
  </section>
<?php endif; ?>