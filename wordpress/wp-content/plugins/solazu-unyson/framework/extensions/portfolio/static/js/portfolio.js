jQuery(function($) {
	"use strict";

	var SLZ = window.SLZ || {};
	$.slz_portfolio_get_history = function(){
		$('.portfolio-history .slz-select-version').change(function(){
			var target_link = $(this).find(":selected").attr('data-target');
			if( target_link == undefined) target_link = '';
			$(this).next('.slz-btn-download').attr("href", $(this).val());
			if( target_link != ''){
				$(this).next('.slz-btn-download').attr("target", target_link);
			}
		});
	};
	
	$(document).ready(function() {
		jQuery.slz_portfolio_get_history();
	});
});
