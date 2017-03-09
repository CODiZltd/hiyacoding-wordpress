jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    SLZ.slz_featured_list_layout_2 = function() {
        // effect hover
        $('.sc-featured-list-layout-2 .slz-carousel .item').directionalHover();
        $('.sc-featured-list-layout-2 .slz-carousel').each( function(e, val) {
          
            $(this).slick({
                infinite: true,
                autoplay: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                appendArrows: $(this).parents('.slz-image-carousel'),
                prevArrow: '<button class="btn btn-prev"><i class="icons fa"></i><span class="text">Previous</span></button>',
                nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="icons fa"></i></button>'
            });
        });

    };
    
    $(document).ready(function() {
        SLZ.slz_featured_list_layout_2();
    });
});
