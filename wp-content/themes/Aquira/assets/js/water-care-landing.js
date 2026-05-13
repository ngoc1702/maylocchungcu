(function ($) {
  'use strict';

  $(function () {
    var $header = $('.water-header');

    function updateHeader() {
      $header.toggleClass('is-scrolled', $(window).scrollTop() > 8);
    }

    if ($header.length) {
      updateHeader();
      $(window).on('scroll.waterCareHeader resize.waterCareHeader', updateHeader);
    }

    $('.water-care-landing a[href^="#"]').on('click', function (event) {
      var hash = $(this).attr('href');
      var $target;

      if (!hash || hash === '#') {
        return;
      }

      $target = $(hash);

      if (!$target.length) {
        return;
      }

      event.preventDefault();

      $('html, body').animate({
        scrollTop: $target.offset().top - ($header.length ? $header.outerHeight() : 0)
      }, 500);
    });
  });
})(jQuery);
