jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    SLZ.autoPlayYouTubeModal = function() {
    	$('.sc_video_carousel .item a').on('click',function() {
    		var themodal = $(this).attr('data-target');
    		var videourl = $(this).attr('data-thevideo');
    		$(themodal + ' iframe').attr('src', videourl);
    		$(themodal + ' button.close').click(function() {
    			$(themodal + ' iframe').attr('src', '');
    		});
    		$('.slz-video-modal').click(function() {
    			$(themodal + ' button.close').click();
    		});
    	});
    }
    
    SLZ.video_carousel = function() {
        $(".sc_video_carousel .slz-carousel.sc-video-carousel-item").each(function() {
            var carousel_item = $(this).attr('data-slidesToShow');
            // alert(carousel_item);
            if (carousel_item == 1) {
            	$(this).slick('unslick');
                $(this).slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: true,
                    arrows: true,
                    appendArrows: $(this).parents('.slz-carousel-wrapper'),
                    prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
                    nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>'
                });
            }
            if (carousel_item == 2) {
            	$(this).slick('unslick');
                $(this).slick({
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: true,
                    arrows: true,
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
            	$(this).slick('unslick');
                $(this).slick({
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: true,
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
            	$(this).slick('unslick');
                $(this).slick({
                    infinite: true,
                    slidesToShow: carousel_item,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: true,
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
        $(".sc_video_carousel .slz-carousel-vertical.sc-video-carousel-item").each(function() {
            var carousel_item = $(this).attr('data-slidesToShow');
            // alert(carousel_item);
            if (carousel_item == 1) {
                $(this).slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 600,
                    dots: true,
                    arrows: true,
                    vertical: true,
                    verticalSwiping: true,
                });
            }
        });
    }


    /*======================================
    =            INIT FUNCTIONS            =
    ======================================*/

    $(document).ready(function() {
        SLZ.autoPlayYouTubeModal();
        SLZ.video_carousel();
    });
    /*=====  End of INIT FUNCTIONS  ======*/
});
