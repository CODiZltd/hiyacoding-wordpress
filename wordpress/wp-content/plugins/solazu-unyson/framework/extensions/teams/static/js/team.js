jQuery(function($) {
    "use strict";

    $.slz_team_carousel_sc = function() {
        if ( $('.sc_team_carousel').length ) {
            $('.sc_team_carousel').each(function() {
                var item = $(this).attr('data-item');
                var block = '.' + item + ' ';
                var slick_block = $(block + ".slz-team-slide-slick");
                if ( slick_block.length ) {
                    var slick_json = $(slick_block).data('slick-json');
                    if (typeof slick_json !== 'undefined') {
                        var centerMode = {centerMode:false}
                        jQuery.extend( slick_json, centerMode );
                        slick_block.slick( slick_json );
                    }                   
                }
            });
        }
    };

    $.slz_team_carousel_sc_layout3 = function(){
        if ( $('.sc_team_carousel .slz-team-wrapper-03').length ) {
            $('.sc_team_carousel.layout-3').each(function() {
                var item = $(this).attr('data-item');
                var block = '.' + item + ' ';
                $(block + ".slz-team-slider-03").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: false,
                    arrows: false,
                    asNavFor: block + '.slz-team-nav-03',
                    fade:true,
                    responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            dots: true,
                            adaptiveHeight: true
                        }
                    }]
                });
                $(block + ".slz-team-nav-03").slick({
                    infinite: true,
                    slidesToShow: 5,
                    speed: 600,
                    dots: true,
                    focusOnSelect:true,
                    centerMode: true,
                    centerPadding: '0px',
                    asNavFor: block + '.slz-team-slider-03',
                    prevArrow: '<span class="btn btn-prev"><i class="fa fa-angle-left"></i></span>',
                    nextArrow: '<span class="btn btn-next"><i class="fa fa-angle-right"></i></span>',
                    responsive: [
                    {
                        breakpoint: 1025,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                        }
                    }]
                });

            });
        }
    };
    
    $.slz_team_carousel_sc_layout6 = function () {
    	if( $('.sc_team_carousel.layout-6 .slz-carousel-img').length ) {
    		$('.sc_team_carousel.layout-6').each(function() {
                var item = $(this).attr('data-item');
                var block = '.' + item + ' ';

                $( block + " .slz-carousel-wrapper-02 .slz-carousel-info").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    speed: 600, 
                    dots: true,
                    arrows: false,
                    fade: true,
                    asNavFor: block + " .slz-carousel-wrapper-02 .slz-carousel-img"
                });
                $( block + " .slz-carousel-wrapper-02 .slz-carousel-img").slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 600, 
                    dots: false,
                    arrows: false,
                    fade: true,
                    asNavFor: block + " .slz-carousel-wrapper-02 .slz-carousel-info"
                });
    		});
    	}
    }
    
    $(document).ready(function() {
        jQuery.slz_team_carousel_sc();
        jQuery.slz_team_carousel_sc_layout3();
        jQuery.slz_team_carousel_sc_layout6();
    });
});
