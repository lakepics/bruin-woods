/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    var Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages
                $('ul.dropdown-menu').wrapInner('<span class="dropdown-nav-wrapper"></span>');

            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // Initialize Slick Slider
                $('.hero-slider').slick({
                    autoplay: true,
                    adaptiveHeight: true,
                    autoplaySpeed: 6000,
                    arrows: false,
                    dots: true,
                    appendDots: $('.hero-slider__nav'),
                    mobileFirst: true,
                    fade: true
                });
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'gallery': {
            init: function () {
                // JavaScript to be fired on the gallery page

            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);
    var $gallery = $('.grid').masonry({
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        percentPosition: true
    });
    // layout Masonry after each image loads
    $gallery.imagesLoaded().progress(function () {
        $gallery.masonry('layout');
    });
    // remove background images on mobile
    var viewportWidth = $(window).width();
    if (viewportWidth < 768) {
        $(".content-section__background-image, .table-section__background-image, .family-holidays__background-image").removeAttr("style");
        $(".table-section .no-padding").removeClass("no-padding");
        $(".family-holidays div.text-right").removeClass("text-right").addClass("text-left");
    }
    // fade section label on scroll
    $(window).scroll(function () {
        $(".section-type").css("opacity", 0.1 - $(window).scrollTop() / 5000);
    });

    $('ul.nav li').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeIn(250);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(250);
    });

    $('ul.nav li.dropdown').mouseout( function() { $('.current_page_ancestor ul').show(); });

    $('.current_page_ancestor ul').show();

})(jQuery); // Fully reference jQuery after this point.
