/*
 * Scroll Indicator
 * https://dev.to/leonardoschmittk/how-to-make-a-scroll-indicator-bar-with-js-html-and-css-easily-and-explained-2jbg
 */
window.addEventListener('scroll', () => indicateScrollBar());

function indicateScrollBar() {
  const scrollIndicator = document.getElementsByClassName('scroll-indicator');
  if (scrollIndicator.length > 0) {
    const distanceFromPageTop =
      document.body.scrollTop || document.documentElement.scrollTop;
    const height =
      document.documentElement.scrollHeight -
      document.documentElement.clientHeight;
    const scrolled = (distanceFromPageTop / height) * 100;

    document.querySelector('.scroll-indicator').style.width = `${scrolled}%`;
  }
}

/*
 * Scroll Spy
 * https://medium.com/p1xts-blog/scrollspy-with-just-javascript-3131c114abdc
 */
document.addEventListener(
  'DOMContentLoaded',
  function () {
    // grab the sections (targets) and menu_links (triggers)
    // for menu items to apply active link styles to
    const sections = document.querySelectorAll('.section-scroll');
    const menu_links = document.querySelectorAll('.nav-link');

    //console.log(menu_links);

    // functions to add and remove the active class from links as appropriate
    const makeActive = (link) => menu_links[link].classList.add('active');
    const removeActive = (link) => menu_links[link].classList.remove('active');
    const removeAllActive = () =>
      [...Array(sections.length).keys()].forEach((link) => removeActive(link));

    // change the active link a bit above the actual section
    // this way it will change as you're approaching the section rather
    // than waiting until the section has passed the top of the screen
    const sectionMargin = 200;

    // keep track of the currently active link
    // use this so as not to change the active link over and over
    // as the user scrolls but rather only change when it becomes
    // necessary because the user is in a new section of the page
    let currentActive = 0;

    // listen for scroll events
    window.addEventListener('scroll', () => {
      // check in reverse order so we find the last section
      // that's present - checking in non-reverse order would
      // report true for all sections up to and including
      // the section currently in view
      //
      // Data in play:
      // window.scrollY    - is the current vertical position of the window
      // sections          - is a list of the dom nodes of the sections of the page
      //                     [...sections] turns this into an array so we can
      //                     use array options like reverse() and findIndex()
      // section.offsetTop - is the vertical offset of the section from the top of the page
      //
      // basically this lets us compare each section (by offsetTop) against the
      // viewport's current position (by window.scrollY) to figure out what section
      // the user is currently viewing
      const current =
        sections.length -
        [...sections]
          .reverse()
          .findIndex(
            (section) => window.scrollY >= section.offsetTop - sectionMargin
          ) -
        1;

      // only if the section has changed
      // remove active class from all menu links
      // and then apply it to the link for the current section
      if (current !== currentActive) {
        removeAllActive();
        currentActive = current;
        makeActive(current);
      }
    });
  },
  false
);

/*
 * jQuery scripts
 */
jQuery(function ($) {
  // MEGA MENU
  $('.megamenu-toggle').on('click', function (event) {
    event.preventDefault();
    $('#megamenu').slideToggle();
    $('body').toggleClass('overflow-hidden');
    $('.mega-menu-overlay').toggleClass('active');
  });
  $(document).on('click', '.mega-menu-overlay', function (event) {
    event.preventDefault();
    $('#megamenu').slideToggle();
    $('body').toggleClass('overflow-hidden');
    $('.mega-menu-overlay').toggleClass('active');
  });
  $('.toplevel-menu > li:not(.has-submenu)').hoverIntent(function () {
    setTimeout(() => {
      $('.toplevel-menu > .has-submenu').removeClass('hovered');
      $('.toplevel-menu > .has-submenu').children('.submenu').hide();
      $('.secondlevel-menu > .has-submenu').removeClass('hovered');
      $('.secondlevel-menu > .has-submenu').children('.submenu').hide();
    }, 0);
  });
  $('.toplevel-menu > .has-submenu').hoverIntent(function () {
    setTimeout(() => {
      $('.toplevel-menu > .has-submenu').removeClass('hovered');
      $('.toplevel-menu > .has-submenu:not(.hovered)')
        .children('.submenu')
        .hide();
      $('.secondlevel-menu > .has-submenu').removeClass('hovered');
      $('.secondlevel-menu > .has-submenu').children('.submenu').hide();
      $(this).addClass('hovered');
      $(this).children('.submenu').show();
    }, 0);
  });
  $('.secondlevel-menu > li:not(.has-submenu)').hoverIntent(function () {
    setTimeout(() => {
      $('.secondlevel-menu > .has-submenu').removeClass('hovered');
      $('.secondlevel-menu > .has-submenu').children('.submenu').hide();
    }, 0);
  });
  $('.secondlevel-menu > .has-submenu').hoverIntent(function () {
    setTimeout(() => {
      $('.secondlevel-menu > .has-submenu').removeClass('hovered');
      $('.secondlevel-menu > .has-submenu:not(.hovered)')
        .children('.submenu')
        .hide();
      $(this).addClass('hovered');
      $(this).children('.submenu').show();
    }, 0);
  });

  // SEARCH BUTTON
  $('#header-search-button').on('click', function () {
    $('#header-search').toggleClass('show');
    $('#searchform-input').focus();
  });
  $(window).click(function () {
    if ($('#header-search').hasClass('show')) {
      $('#header-search').removeClass('show');
    }
  });
  $('#header-search, #header-search-button').click(function (event) {
    event.stopPropagation();
  });

  // FAQ Filter
  $('.faq-dropdown-item').on('click', function (event) {
    //console.log('clicked');
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_faqs',
        category: $(this).data('id'),
      },
      success: function (res) {
        $('.faq-container').html(res);
      },
    });
  });

  // Case Study Filter
  $('.case-dropdown-item').on('click', function (event) {
    // console.log('Category :', $(this).data('category'));
    // console.log('Country :', $(this).data('country'));
    event.preventDefault();
    $(this).closest('.dropdown').find('.dropdown-label').html($(this).text());
    $('.filter-case-study-loader .spinner-border')
      .removeClass('opacity-0')
      .addClass('opacity-100');
    $('.case-studies-grid .blocker').show();
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_cases',
        category: $(this).data('category'),
        country: $(this).data('country'),
        perpage: $(this).data('perpage'),
      },
      success: function (res) {
        $('.case-studies-grid').html(res);
        $('.filter-case-study-loader .spinner-border')
          .removeClass('opacity-100')
          .addClass('opacity-0');
      },
    });
  });

  // Product Card Filter
  $('.product-dropdown-item').on('click', function (event) {
    event.preventDefault();
    //console.log($(this).text());
    $('.product-filter-label').html($(this).text());
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_products',
        category: $(this).data('category'),
        industry: $(this).data('industry'),
        product_link: $(this).data('product-link'),
      },
      success: function (res) {
        $('.product-cards-grid').html(res);
      },
    });
  });

  // Blog Filter
  $('.blog-dropdown-item').on('click', function (event) {
    //console.log($(this).data('id'));
    event.preventDefault();
    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      dataType: 'html',
      data: {
        action: 'filter_blog',
        category: $(this).data('id'),
        perpage: $(this).data('perpage'),
      },
      success: function (res) {
        $('.blog-posts-grid').html(res);
      },
    });
  });
});

jQuery(function ($) {
  // Sticky & Shrink Site Header
  var didScroll, offset, scrollPosition;
  //offset = $('#site-header').position().top;
  offset = 38;
  didScroll = false;
  scrollPosition = $(document).scrollTop();
  if (scrollPosition > offset) {
    didScroll = true;
  }
  $(window).on('scroll touchmove', function () {
    return (didScroll = true);
  });
  return setInterval(function () {
    if (didScroll) {
      $('#site-header').toggleClass(
        'header-shrink',
        $(document).scrollTop() > offset
      );
      return (didScroll = false);
    }
  }, 20);
});
