<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$ext_instance = slz()->extensions->get( 'testimonials' );

	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-styles',
		$ext_instance->locate_css_URI( 'styles' ),
		array(),
		$ext_instance->manifest->get_version()
	);

	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-scripts',
		$ext_instance->locate_js_URI( 'testimonial' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);
}