<?php if (!defined('SLZ')) die('Forbidden');
if( !is_admin() ) {
	
	wp_enqueue_style(
		'slz-extension-header-styles',
		slz_ext( 'headers' )->get_uri('/static/css/styles.css')
	);
	wp_enqueue_script(
		'slz-extension-headers-main',
		slz_ext( 'headers' )->get_uri( '/static/js/main.js' ),
		array( 'jquery' ),
		slz_ext( 'headers' )->manifest->get_version(),
		true
	);

	if( slz_ext( 'headers' )->get_config('enable_breakingnews') ) {
		wp_enqueue_style(
			'slz-extension-header-breaking-news',
			slz_ext( 'headers' )->get_uri('/static/css/breaking-news.css')
		);
		
		wp_enqueue_script(
			'slz-extension-headers-breaking-news',
			slz_ext( 'headers' )->get_uri( '/static/js/breaking-news.js' ),
			array( 'jquery' ),
			slz_ext( 'headers' )->manifest->get_version(),
			true
		);
	}
}