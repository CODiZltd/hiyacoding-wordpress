jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

     /*===========================================
    =            Service List Carousel           =
    ===========================================*/
    SLZ.service_list = function() {
        if ($(".sc-service-list .slz-carousel").length) {
            $(".sc-service-list .slz-carousel").each(function() {
                var carousel_item = $(this).attr('data-slidesToShow');
                var show_dots = $(this).attr('data-dots');
                var show_arrow = $(this).attr('data-arrow');
                var speed = $(this).attr('data-speed');
                var autoplay = $(this).attr('data-autoplay');
                var infinite = $(this).attr('data-infinite');
                if( speed == 0 || speed == '' || speed == undefined){
                    speed = 500;
                }
                if( autoplay == 'yes' ){
                    autoplay = true;
                } else {
                    autoplay = false;
                }
                if( infinite == 'yes' ){
                    infinite = true;
                } else {
                    infinite = false;
                }
                if ( show_dots == 'yes' ) {
                    show_dots = true;
                }else{
                    show_dots = false;
                }
                if ( show_arrow == 'yes' ) {
                    show_arrow = true;
                }else{
                    show_arrow = false;
                }
                
                if (carousel_item == 1) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        slidesToScroll: 1,
                        centerMode:  true,
                        centerPadding: '0',
                        focusOnSelect: true,
                        pauseOnHover:true,
                        autoplay: autoplay,
                        infinite: infinite,
                        speed: speed,
                        dots: show_dots,
                        arrows: show_arrow,
                        appendArrows: $(this).parents('.slz-carousel-wrapper'),
                        prevArrow: '<button class="btn btn-prev"><i class="fa fa-angle-left"><i></button>',
                        nextArrow: '<button class="btn btn-next"><i class="fa fa-angle-right"><i></button>'
                    });
                }
                if (carousel_item == 2) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        slidesToScroll: 1,
                        centerMode:  true,
                        centerPadding: '0',
                        focusOnSelect: true,
                        pauseOnHover:true,
                        autoplay: autoplay,
                        infinite: infinite,
                        speed: speed,
                        dots: show_dots,
                        arrows: show_arrow,
                        appendArrows: $(this).parents('.slz-carousel-wrapper'),
                        prevArrow: '<button class="btn btn-prev"><i class="fa fa-angle-left"><i></button>',
                        nextArrow: '<button class="btn btn-next"><i class="fa fa-angle-right"><i></button>',
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
                        slidesToScroll: 1,
                        centerMode:  true,
                        centerPadding: '0',
                        focusOnSelect: true,
                        pauseOnHover:true,
                        autoplay: autoplay,
                        infinite: infinite,
                        speed: speed,
                        dots: show_dots,
                        arrows: show_arrow,
                        prevArrow: '<button class="btn btn-prev"><i class="fa fa-angle-left"><i></button>',
                        nextArrow: '<button class="btn btn-next"><i class="fa fa-angle-right"><i></button>',
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
                                dots: true,
                            }
                        }]
                    });
                }
                if (carousel_item >= 4) {
                    $(this).slick({
                        slidesToShow: carousel_item,
                        slidesToScroll: 1,
                        centerMode:  true,
                        centerPadding: '0',
                        focusOnSelect: true,
                        pauseOnHover:true,
                        autoplay: autoplay,
                        infinite: infinite,
                        speed: speed,
                        dots: show_dots,
                        arrows: show_arrow,
                        appendArrows: $(this).parents('.slz-carousel-wrapper'),
                        prevArrow: '<button class="btn btn-prev"><i class="fa fa-angle-left"><i></button>',
                        nextArrow: '<button class="btn btn-next"><i class="fa fa-angle-right"><i></button>',
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
                                dots: true,
                            }
                        }]
                    });
                }
            });
        }
    };

     $(document).ready(function() {
        SLZ.service_list();
    });
});
