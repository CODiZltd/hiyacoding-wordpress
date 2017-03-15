<?php if ( ! defined( 'ABSPATH' ) ) {
    die( 'Direct access forbidden.' );
}

wp_enqueue_media();

if ( defined( 'SLZ' ) ) {
    $seogrow_version = slz()->theme->manifest->get_version();
} else {
    $seogrow_version = '1.0';
}

wp_enqueue_style(
	'css-theme-admin',
	SEOGROW_STATIC_URI . '/css/theme-admin.css',
	array(),
    $seogrow_version
);

wp_enqueue_script(
	'js-theme-admin',
	SEOGROW_STATIC_URI . '/js/theme-admin.js',
	array( 'jquery', ),
    $seogrow_version,
	true
);

