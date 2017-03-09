jQuery(function($) {
    "use strict";

    var SLZ = window.SLZ || {};

    SLZ.slz_event_carousel = function() {
    	if( $('.event-slider .slz-carousel').length > 0 ) {
	        $(".event-slider .slz-carousel").each(function() {
	            var carousel_item = iParse( $(this).attr('data-slidesToShow') );
	            var autoplay = $(this).attr( 'data-autoplay' ) === 'yes';
	            var dots = $(this).attr( 'data-isdot' ) === 'yes';
	            var arrows = $(this).attr( 'data-isarrow' ) === 'yes';
	            var infinite = $(this).attr( 'data-infinite' ) === 'yes';
	            var speed = iParse( $(this).attr( 'data-speed' ) );
	
	            var responsive = null;
	
	            if( carousel_item == 2) {
	                responsive = [{
	                    breakpoint: 481,
	                    settings: {
	                        slidesToShow: 1,
	                        slidesToScroll: 1,
	                    }
	                }];
	            }
	
	            if( carousel_item == 3) {
	                responsive = [{
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
	                }];
	            }
	
	            if( carousel_item == 4) {
	                responsive = [{
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
	                }];
	            }
	
	            $(this).slick({
	                infinite: infinite,
	                slidesToShow: carousel_item,
	                slidesToScroll: 1,
	                speed: speed,
	                dots: dots,
	                arrows: arrows,
	                appendArrows: $(this).parents('.slz-carousel-wrapper'),
	                prevArrow: '<button class="btn btn-prev"><i class="fa fa-long-arrow-left"></i><span class="text">Previous</span></button>',
	                nextArrow: '<button class="btn btn-next"><span class="text">Next</span> <i class="fa fa-long-arrow-right"></i></button>',
	                responsive: responsive
	            });
	        });
    	}
    };

    SLZ.ComingSoon = function(){
        if( $( '.coming-soon' ).length == 0 ) {
            return true;
        }
        $( '.sc_event_carousel .item' ).each(function( index ){
            // Get date string from post
            var date_string = $( this ).attr( 'data-targetdate' );
            // set up time coming soon
            var target_date = new Date(date_string).getTime();
            // variables for time units
            var days, hours, minutes, seconds;
            var $days = $( '#days-' + index ),
                $hours = $( '#hours-' + index ),
                $minutes = $( '#minutes-' + index ),
                $seconds = $( '#seconds-' + index );
            if( ( new Date().getTime() ) > target_date ) {
                $days.text('0');
                $hours.text('0');
                $minutes.text('0');
                $seconds.text('0');
                // continue loop skip below code
                return true;
            }
            // update the tag with id "countdown" every 1 second
            setInterval(function () {
                // find the amount of "seconds" between now and target
                var current_date = new Date().getTime();
                var seconds_left = (target_date - current_date) / 1000;

                // do some time calculations
                days = parseInt(seconds_left / 86400);
                seconds_left = seconds_left % 86400;

                hours = parseInt(seconds_left / 3600);
                seconds_left = seconds_left % 3600;

                minutes = parseInt(seconds_left / 60);
                seconds = parseInt(seconds_left % 60);

                $days.text(days);
                $hours.text(hours);
                $minutes.text(minutes);
                $seconds.text(seconds);
            }, 1000);
        });
        $( '.wg-events' ).each(function( index ){
            $(this).find( '.item' ).each(function (index) {

                var date_string = $( this ).attr( 'data-targetdate' );
                var target_date = new Date(date_string).getTime();
                var days, hours, minutes, seconds;
                var $days = $(this).find( '.wg-days' ),
                    $hours = $(this).find( '.wg-hours' ),
                    $minutes = $(this).find( '.wg-minutes' ),
                    $seconds = $(this).find( '.wg-seconds' );
                if( ( new Date().getTime() ) > target_date ) {
                    $days.text('0');
                    $hours.text('0');
                    $minutes.text('0');
                    $seconds.text('0');
                    return true;
                }
                /*
                var center = 0,
                    canvas = document.getElementById( 'timer-' + index ),
                    ctx = canvas.getContext("2d"),
                    daySetup = {
                    },
                    hourSetup = {
                    },
                    minSetup = {
                    },
                    secSetup = {
                    },
                    check = function(count, setup, ctx) {
                        if (count < setup.old){
                            setup.counter++
                        };
                    };
                */
                // update the tag with id "countdown" every 1 second
                setInterval(function () {
                    // find the amount of "seconds" between now and target
                    var current_date = new Date().getTime();
                    var seconds_left = (target_date - current_date) / 1000;

                    // do some time calculations
                    days = parseInt(seconds_left / 86400);
                    seconds_left = seconds_left % 86400;

                    hours = parseInt(seconds_left / 3600);
                    seconds_left = seconds_left % 3600;

                    minutes = parseInt(seconds_left / 60);
                    seconds = parseInt(seconds_left % 60);

                    $days.text(days);
                    $hours.text(hours);
                    $minutes.text(minutes);
                    $seconds.text(seconds);
                }, 1000);
            });
        });

    };

    $(document).ready(function() {
        SLZ.ComingSoon();
        SLZ.slz_event_carousel();
    });

    function iParse( string ) {
        var res = parseInt( string );
        return isNaN( res ) ? 0 : res;
    }
});
