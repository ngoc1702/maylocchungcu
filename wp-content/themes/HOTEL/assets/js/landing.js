(function ($) {
    'use strict';

    $(function () {
        $('.hotel-landing a[href^="#"]').on('click', function (event) {
            var target = $(this).attr('href');

            if (!target || target === '#' || !$(target).length) {
                return;
            }

            event.preventDefault();

            $('html, body').animate({
                scrollTop: $(target).offset().top - 24
            }, 500);
        });

        $('.hotel-footer__newsletter form').on('submit', function (event) {
            if ($(this).attr('action') === '#') {
                event.preventDefault();
            }
        });
    });
})(jQuery);
