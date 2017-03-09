jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};
    // carousel function
    SLZ.carousel_function = function() {
        $(".slz_single_relate_post .slz-carousel").each(function() {
            var carousel_item = $(this).attr('data-slidesToShow');
            // alert(carousel_item);
            if (carousel_item == 1) {
                $(this).slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 600,
                    adaptiveHeight: true,
                    dots: false,
                    arrows: true,
                    appendArrows: $(this).parents('.slz-carousel-wrapper'),
                    prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
                    nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>'
                });
            }
            if (carousel_item == 2) {
                $(this).slick({
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: false,
                    arrows: true,
                    adaptiveHeight: true,
                    appendArrows: $(this).parents('.slz-carousel-wrapper'),
                    prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
                    nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>',
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
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    adaptiveHeight: true,
                    dots: false,
                    arrows: true,
                    appendArrows: $(this).parents('.slz-carousel-wrapper'),
                    prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
                    nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>',
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
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    adaptiveHeight: true,
                    dots: false,
                    arrows: true,
                    appendArrows: $(this).parents('.slz-carousel-wrapper'),
                    prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
                    nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>',
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

    $(document).ready(function() {
        SLZ.carousel_function();
    });
});