<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$ext_instance = slz()->extensions->get( 'teams' );

	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-styles',
		$ext_instance->locate_css_URI( 'styles' ),
		array(),
		$ext_instance->manifest->get_version()
	);
	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-custom-styles',
		$ext_instance->locate_css_URI( 'custom-styles' ),
		array(),
		$ext_instance->manifest->get_version()
	);

	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-scripts',
		$ext_instance->locate_js_URI( 'team' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);
}