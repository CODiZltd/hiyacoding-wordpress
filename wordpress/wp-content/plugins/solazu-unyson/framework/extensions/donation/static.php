<?php if ( ! defined( 'SLZ' ) ) {
	die( 'Forbidden' );
}

$ext_instance = slz()->extensions->get( 'donation' );
if ( !is_admin() ) {
	if( slz_ext( 'shortcodes' ) ) {
		$ext_sc = slz_ext( 'shortcodes' )->get_shortcode('progress_bar');
		wp_enqueue_style(
			'slz-extension-'. slz()->extensions->get( 'shortcodes' )->get_name() .'-progress-bar',
			$ext_sc->locate_URI( '/static/css/progress-bar.css' ),
			array(),
			slz_ext('shortcodes')->manifest->get('version')
		);
	}
	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-scripts',
		$ext_instance->locate_js_URI( 'donation' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);
}

if( is_admin() ) {
	wp_enqueue_script(
		'slz-extension-'. $ext_instance->get_name() .'-admin-scripts',
		$ext_instance->locate_js_URI( 'donation-admin' ),
		array( 'jquery'),
		$ext_instance->manifest->get_version(),
		true
	);
	wp_enqueue_style(
		'slz-extension-'. $ext_instance->get_name() .'-admin-styles',
		$ext_instance->locate_css_URI( 'donation-admin' ),
		array(),
		$ext_instance->manifest->get_version()
	);
}