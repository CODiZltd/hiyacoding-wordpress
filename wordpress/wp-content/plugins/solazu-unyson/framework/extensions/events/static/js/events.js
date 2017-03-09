jQuery(function($){
    "use strict";

    $.slz_events_submit_ajax = function() {
    	if( $( '.slz_buy_ticket_event_btn.slz-buy-ticket-method' ).length > 0 ) {
        	$('.slz_buy_ticket_event_btn.slz-buy-ticket-method').on('click', function() {

        		var slz_event_post_id = $(this).parents('.slz-form-buy-ticket').find('.slz_event_post_id').val();

    			var data = {
    					"post_id": slz_event_post_id,
    				}
    			
				$.fn.Form.ajax(['events', 'ajax_buy_ticket'], [data], function(res) {
					res = jQuery.parseJSON(res);
                    if( res != undefined ) {
                    	top.location.href = res.url;
                    }
				});
        	});
    	}
    };

    $.Single_ComingSoon = function(){
        if( $( '.single-page-comming-soon' ).length == 0 ) {
            return true;
        }
        
        // Get date string from post
        var date_string = $( '.single-page-comming-soon.coming-soon' ).attr( 'data-targetdate' );
        var index = $('.single-page-comming-soon.coming-soon').attr('data-unique-id');
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
    };


    $(document).ready(function(){
        jQuery.slz_events_submit_ajax();
        jQuery.Single_ComingSoon();
    });
});