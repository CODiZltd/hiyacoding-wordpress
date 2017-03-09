jQuery(function($){
    "use strict";
    
    $.slz_cause_submit_ajax = function() {
    	$('.label-check.another-donation').on('click', function() {
    		$(this).find('.form-control').focus();
    	});
    	if( $( '.slz-form-donate button.slz_money_donate_btn' ).length > 0 ) {
        	$('.slz-form-donate button.slz_money_donate_btn').on('click', function() {

        		var slz_money_donate = '';
        		$(this).parents('.slz-form-donate').find('.donate-item').each( function() {
        			if( $(this).find('input[name="valueDonation"]').is(':checked') && $(this).find('input[name="valueDonation"]').hasClass('donation-other-price') ) {
        				if( !isNaN( $(this).find('input[name="anotherAmount"]').val() ) ) {
        					slz_money_donate = parseInt( $(this).find('input[name="anotherAmount"]').val() );
        				}
        			}else if( $(this).find('input[name="valueDonation"]').is(':checked') ) {
        				if( !isNaN( $(this).find('input[name="valueDonation"]').val() ) ) {
        					slz_money_donate = parseInt( $(this).find('input[name="valueDonation"]').val() );
        				}
        			}
        		});
        		var slz_causes_post_id = $(this).parents('.slz-form-donate').find('.slz_causes_post_id').val();
        		
        		if( slz_money_donate != '' ) {
        			var data = {
        					"money": slz_money_donate,
        					"post_id": slz_causes_post_id,
        				}

    				$.fn.Form.ajax(['donation', 'ajax_add_donate'], [data], function(res) {
    					res = jQuery.parseJSON(res);
                        if( res != undefined ) {
                        	top.location.href = res.url;
                        }
    				});
        		}
        	});
    	}
    };
 
    $.slz_causes_single_progress_bar = function() {
        if ($('.slz-progress-bar-01').length) {
            $(".progress-bar").each(function() {
                var unit = $(this).attr('data-unit');
                var each_bar_width = $(this).attr('aria-valuenow');
                $(this).width(each_bar_width + '%');
                $(this).parent().parent().find('.percent').attr('data-to', each_bar_width);
                $(this).parent().parent().find('.percent').countTo({
                    onUpdate: function(value) {
                        $(this).append(unit);
                    }
                });
            });
        }
    }


    $(document).ready(function(){
        jQuery.slz_cause_submit_ajax();
        jQuery.slz_causes_single_progress_bar();
    });
});