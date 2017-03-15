(function($) {
    "use strict";


    $.widget_image_slider= function(){
        if($(".slz-widget-gallery-carousel.slz-widget .slz-carousel").length){
            $(".slz-widget-gallery-carousel.slz-widget .slz-carousel").each(function() {
                var carousel_item = $(this).attr('data-slidesToShow');
                if( carousel_item == '' ){
                    carousel_item = 4;
                }
                if (carousel_item == 1) {
                    $(this).slick({
                        slidesToShow: carousel_item
                    });
                }
                if (carousel_item == 2) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        responsive: [{
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
                if (carousel_item == 3) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        responsive: [{
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        }, {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
                if (carousel_item >= 4) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        responsive: [{
                            breakpoint: 1025,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                            }
                        }, {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                            }
                        }, {
                            breakpoint: 481,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            }
                        }]
                    });
                }
            });
        }

        $('.slz-carousel-photos .slz-carousel .thumb').directionalHover({
            speed: 200
        });
    }

})(jQuery);
jQuery(document).ready(function() {
    jQuery.widget_image_slider();
})