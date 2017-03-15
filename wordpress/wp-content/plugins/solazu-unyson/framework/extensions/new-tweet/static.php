<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

if ( !is_admin() ) {
	$ext_instance = slz()->extensions->get( 'new-tweet' );

	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-styles',
		$ext_instance->locate_css_URI( 'styles' ),
		array(),
		$ext_instance->manifest->get_version()
	);

}