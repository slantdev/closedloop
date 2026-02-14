<?php
/*
 * Search
 */

get_header();

$s = get_search_query();
$args = array(
  's' => $s
);

?>

<section id="page-header" class="bg-darknavy relative bg-cover h-[57vh] xl:h-[57vh]">
  <div class="absolute inset-0">
    <div class="container mx-auto h-full pt-[160px] relative lg:pt-[180px]">
      <div class="flex h-full items-center">
        <div class="w-full relative z-10 lg:w-2/3">
          <div class="xl:mt-5">
            <h1 class="text-[32px] font-bold text-white leading-tight mb-2 pl-[0.25em] xl:text-[50px]">
              <span class="title-highlight">Search Results : <?php echo $s ?></span>
            </h1>
          </div>
        </div>
      </div>
      <div class="absolute right-6 bottom-0 z-0">
        <svg class="rotate-0 text-white w-2/3 ml-auto -mb-12 opacity-60 xl:w-full xl:-mb-0 xl:opacity-100" xmlns="http://www.w3.org/2000/svg" width="370.26" height="225.77" viewBox="0 0 370.26 100">
          <path d="M154.58,4.45C78.4,20.64,18.07,82.31,3.54,158.82A197.78,197.78,0,0,0,.75,213.26a13.78,13.78,0,0,0,18,11.81l.94-.31a14,14,0,0,0,9.33-14.61,169.89,169.89,0,0,1,2.6-46.56C44.46,97.72,97.23,44.86,163.05,31.83A167.48,167.48,0,0,1,310.81,73.74l-12.37,9.4a10.72,10.72,0,0,0,1.95,18.24L355,126.85a10.72,10.72,0,0,0,15.24-10.13v-.19a9.2,9.2,0,0,0-.13-1.15l-9.88-59.47a10.71,10.71,0,0,0-17.05-6.77l-9.47,7.19c-37.93-37.11-90.5-59-147.55-56.06a203.6,203.6,0,0,0-31.58,4.18" fill="currentColor" />
        </svg>
      </div>
    </div>
  </div>
</section>

<?php
// The Query
$the_query = new WP_Query($args);
if ($the_query->have_posts()) :
?>
  <div class="bg-alice-blue">


    <div class="container mx-auto max-w-4xl relative py-16 lg:py-24">
      <ul class="search-results">
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <li class="mb-4 lg:mb-8">
            <a href="<?php the_permalink(); ?>" class="block bg-white shadow-md border border-gray-100 rounded-lg transition duration-300 hover:shadow-xl">
              <div class="flex flex-wrap md:flex-nowrap">
                <!-- <div class="w-full rounded-t-lg aspect-w-16 aspect-h-9 md:hidden">
                <?php if (has_post_thumbnail()) { ?>
                  <?php the_post_thumbnail('medium', array('class' => 'object-cover h-full w-full rounded-t-lg md:hidden')); ?>
                <?php } ?>
              </div>
              <div class="hidden md:block w-1/4 rounded-l-lg">
                <?php if (has_post_thumbnail()) { ?>
                  <?php the_post_thumbnail('medium', array('class' => 'object-cover h-full w-full rounded-l-lg')); ?>
                <?php } ?>
              </div> -->
                <div class="w-full p-4 lg:p-8">
                  <h3 class="font-bold mb-2 text-xl lg:text-2xl"><?php the_title(); ?></h3>
                  <div class="text-sm"><?php the_excerpt() ?></div>
                </div>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <div class="container mx-auto max-w-4xl relative py-16 lg:py-24">
      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    </div>
  <?php endif; ?>

  </div>
  <?php
  get_footer();
