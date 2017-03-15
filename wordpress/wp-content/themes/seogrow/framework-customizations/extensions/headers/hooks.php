<?php if (!defined('SLZ')) die('Forbidden');

/** @internal */
function _seogrow_filter_disable_headers( $args ) {
	$args = array(
		'header_05',
		'header_06',
	);
	return $args;
}
add_filter( 'slz_ext_headers_disabled_headers' , '_seogrow_filter_disable_headers');