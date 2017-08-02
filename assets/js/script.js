if (typeof (jQuery) != 'undefined') {

    jQuery.noConflict(); // Reverts '$' variable back to other JS libraries

    (function ($) {
        "use strict";

        $(function () {

            // Counters
            $(window).scroll(function() {

                if( $('#counters').length > 0 ){

                    var hT = $('#counters').offset().top,
                        hH = $('#counters .counter-item').outerHeight(),
                        wH = $(window).height(),
                        wS = $(this).scrollTop();

                    if (wS > (hT + hH - wH)) {

                        if( $('#counters .count').length > 0 ){

                            $('.tobe').removeClass('tobe')
                            $('#counters .count').each(function() {
                                $(this).prop('Counter', 0).animate({
                                    Counter: $(this).text()
                                }, {
                                    duration: 1000,
                                    easing: 'swing',
                                    step: function(now) {
                                        $(this).text(Math.ceil(now));
                                    }
                                });
                            }); {
                                $('#counters .count').removeClass('count').addClass('counted');
                            };
                        }
                    }
                }
            });

            $(document).ready(function() {

                if( $('#counters').length > 0 ){

                    var hT = $('#counters').offset().top,
                        hH = $('#counters .counter-item').outerHeight(),
                        wH = $(window).height(),
                        wS = $(this).scrollTop();

                    if (wS > (hT + hH - wH)) {

                        if( $('#counters .count').length > 0 ){

                            $('.tobe').removeClass('tobe')
                            $('#counters .count').each(function() {
                                $(this).prop('Counter', 0).animate({
                                    Counter: $(this).text()
                                }, {
                                    duration: 1000,
                                    easing: 'swing',
                                    step: function(now) {
                                        $(this).text(Math.ceil(now));
                                    }
                                });
                            }); {
                                $('#counters .count').removeClass('count').addClass('counted');
                            };
                        }
                    }
                }
            });

            // Testimonial Slider
            if ($().slick != undefined) {

                if( $('.bit14-slider').length > 0 ){

                    var slider = $('.bit14-slider');

                    slider.each(function(){

                        var elem = $(this);
                        var arrows = elem.data('arrows') ? true : false;
                        var dots = elem.data('dots') ? true : false;
                        var autoplay = elem.data('autoplay') ? true : false;
                        var autoplay_speed = elem.data('autoplay-speed') || 3000;
                        var fade = elem.data('fade') ? true : false;
                        var pause_on_hover = elem.data('pause-onhover') ? true : false;
                        var display_columns = elem.data('display-columns') || 3;
                        var scroll_columns = elem.data('scroll-columns') || 3;
                        var tablet_display_columns = elem.data('tablet-display-columns') || 2;
                        var tablet_scroll_columns = elem.data('tablet-scroll-columns') || 2;
                        var mobile_display_columns = elem.data('mobile-display-columns') || 1;
                        var mobile_scroll_columns = elem.data('mobile-scroll-columns') || 1;

                        elem.slick({
                            arrows: arrows,
                            dots: dots,
                            infinite: true,
                            autoplay: autoplay,
                            autoplaySpeed: autoplay_speed,
                            fade: fade,
                            pauseOnHover: pause_on_hover,
                            slidesToShow: display_columns,
                            slidesToScroll: scroll_columns,
                            responsive: [
                                {
                                    breakpoint: '800px',
                                    settings: {
                                        slidesToShow: tablet_display_columns,
                                        slidesToScroll: tablet_scroll_columns
                                    }
                                },
                                {
                                    breakpoint: '480px',
                                    settings: {
                                        slidesToShow: mobile_display_columns,
                                        slidesToScroll: mobile_scroll_columns
                                    }
                                }
                            ]
                        });
                    });
                }
            }

        });

    }(jQuery));
}