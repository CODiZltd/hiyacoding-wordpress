<?php if (!defined('SLZ')) die('Forbidden');

if (!is_admin()) {
	wp_enqueue_style(
		'font-awesome.min',
		slz_get_framework_directory_uri('/static/libs/font-awesome/css/font-awesome.min.css'),
		array(),
		slz()->manifest->get_version()
	);
}
