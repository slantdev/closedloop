(() => {
  // resources/js/app.js
  window.addEventListener("scroll", () => indicateScrollBar());
  function indicateScrollBar() {
    const scrollIndicator = document.getElementsByClassName("scroll-indicator");
    if (scrollIndicator.length > 0) {
      const distanceFromPageTop = document.body.scrollTop || document.documentElement.scrollTop;
      const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      const scrolled = distanceFromPageTop / height * 100;
      document.querySelector(".scroll-indicator").style.width = `${scrolled}%`;
    }
  }
  document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll(".section-scroll");
    const menu_links = document.querySelectorAll(".nav-link");
    const makeActive = (link) => menu_links[link].classList.add("active");
    const removeActive = (link) => menu_links[link].classList.remove("active");
    const removeAllActive = () => [...Array(sections.length).keys()].forEach((link) => removeActive(link));
    const sectionMargin = 200;
    let currentActive = 0;
    window.addEventListener("scroll", () => {
      const current = sections.length - [...sections].reverse().findIndex((section) => window.scrollY >= section.offsetTop - sectionMargin) - 1;
      if (current !== currentActive) {
        removeAllActive();
        currentActive = current;
        makeActive(current);
      }
    });
  }, false);
  jQuery(function($) {
    $(".megamenu-toggle").on("click", function(event) {
      event.preventDefault();
      $("#megamenu").slideToggle();
      $("body").toggleClass("overflow-hidden");
      $(".mega-menu-overlay").toggleClass("active");
    });
    $(document).on("click", ".mega-menu-overlay", function(event) {
      event.preventDefault();
      $("#megamenu").slideToggle();
      $("body").toggleClass("overflow-hidden");
      $(".mega-menu-overlay").toggleClass("active");
    });
    $(".toplevel-menu > li:not(.has-submenu)").hoverIntent(function() {
      setTimeout(() => {
        $(".toplevel-menu > .has-submenu").removeClass("hovered");
        $(".toplevel-menu > .has-submenu").children(".submenu").hide();
        $(".secondlevel-menu > .has-submenu").removeClass("hovered");
        $(".secondlevel-menu > .has-submenu").children(".submenu").hide();
      }, 0);
    });
    $(".toplevel-menu > .has-submenu").hoverIntent(function() {
      setTimeout(() => {
        $(".toplevel-menu > .has-submenu").removeClass("hovered");
        $(".toplevel-menu > .has-submenu:not(.hovered)").children(".submenu").hide();
        $(".secondlevel-menu > .has-submenu").removeClass("hovered");
        $(".secondlevel-menu > .has-submenu").children(".submenu").hide();
        $(this).addClass("hovered");
        $(this).children(".submenu").show();
      }, 0);
    });
    $(".secondlevel-menu > li:not(.has-submenu)").hoverIntent(function() {
      setTimeout(() => {
        $(".secondlevel-menu > .has-submenu").removeClass("hovered");
        $(".secondlevel-menu > .has-submenu").children(".submenu").hide();
      }, 0);
    });
    $(".secondlevel-menu > .has-submenu").hoverIntent(function() {
      setTimeout(() => {
        $(".secondlevel-menu > .has-submenu").removeClass("hovered");
        $(".secondlevel-menu > .has-submenu:not(.hovered)").children(".submenu").hide();
        $(this).addClass("hovered");
        $(this).children(".submenu").show();
      }, 0);
    });
    $("#header-search-button").on("click", function() {
      $("#header-search").toggleClass("show");
      $("#searchform-input").focus();
    });
    $(window).click(function() {
      if ($("#header-search").hasClass("show")) {
        $("#header-search").removeClass("show");
      }
    });
    $("#header-search, #header-search-button").click(function(event) {
      event.stopPropagation();
    });
    $(".faq-dropdown-item").on("click", function(event) {
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_faqs",
          category: $(this).data("id")
        },
        success: function(res) {
          $(".faq-container").html(res);
        }
      });
    });
    $(".case-dropdown-item").on("click", function(event) {
      event.preventDefault();
      $(this).closest(".dropdown").find(".dropdown-label").html($(this).text());
      $(".filter-case-study-loader .spinner-border").removeClass("opacity-0").addClass("opacity-100");
      $(".case-studies-grid .blocker").show();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_cases",
          category: $(this).data("category"),
          country: $(this).data("country"),
          perpage: $(this).data("perpage")
        },
        success: function(res) {
          $(".case-studies-grid").html(res);
          $(".filter-case-study-loader .spinner-border").removeClass("opacity-100").addClass("opacity-0");
        }
      });
    });
    $(".product-dropdown-item").on("click", function(event) {
      event.preventDefault();
      $(".product-filter-label").html($(this).text());
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_products",
          category: $(this).data("category"),
          industry: $(this).data("industry"),
          product_link: $(this).data("product-link")
        },
        success: function(res) {
          $(".product-cards-grid").html(res);
        }
      });
    });
    $(".blog-dropdown-item").on("click", function(event) {
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_blog",
          category: $(this).data("id"),
          perpage: $(this).data("perpage")
        },
        success: function(res) {
          $(".blog-posts-grid").html(res);
        }
      });
    });
  });
  jQuery(function($) {
    var didScroll, offset, scrollPosition;
    offset = 38;
    didScroll = false;
    scrollPosition = $(document).scrollTop();
    if (scrollPosition > offset) {
      didScroll = true;
    }
    $(window).on("scroll touchmove", function() {
      return didScroll = true;
    });
    return setInterval(function() {
      if (didScroll) {
        $("#site-header").toggleClass("header-shrink", $(document).scrollTop() > offset);
        return didScroll = false;
      }
    }, 20);
  });
})();
