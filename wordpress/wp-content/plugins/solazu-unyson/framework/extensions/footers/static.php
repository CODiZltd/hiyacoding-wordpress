<?php if (!defined('SLZ')) die('Forbidden');

wp_enqueue_style(
	'slz-extension-footers-styles',
	slz_ext( 'footers' )->get_uri('/static/css/styles.css')
);
if ( is_admin() ) {
	$ext_instance = slz()->extensions->get( 'footers' );

	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-footers',
		$ext_instance->locate_js_URI( 'footers' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);
}