<?php if (!defined('SLZ')) die('Forbidden');

if (! is_admin()) {

	wp_enqueue_style(
		'slz-extension-social-counter',
		slz_ext('social-counter')->get_uri('/static/css/styles.css')
	);

}