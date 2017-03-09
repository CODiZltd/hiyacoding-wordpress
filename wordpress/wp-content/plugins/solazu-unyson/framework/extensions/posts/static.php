<?php if (!defined('SLZ')) die('Forbidden');

wp_enqueue_style(
	'slz-extension-posts-styles',
	slz_ext( 'posts' )->get_uri('/static/css/styles.css')
);

wp_enqueue_script(
	'slz-extension-posts-main',
	slz_ext( 'posts' )->get_uri( '/static/js/main.js' ),
	array( 'jquery' ),
	slz_ext( 'posts' )->manifest->get_version(),
	true
);
