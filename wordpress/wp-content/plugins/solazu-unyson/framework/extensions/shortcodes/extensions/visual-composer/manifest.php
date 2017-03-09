<?php

if (! defined('SLZ')) { die('Forbidden'); }

$manifest = array(
	'name' => __('Visual Composer', 'slz'),
	'description' => __(
		'Lets you insert Unyson shortcodes inside visual composer page builder.',
		'slz'
	),
	'version' => '1.0.0',
	'display' => false,
	'standalone' => true,

	'requirements' => array(
		'extensions' => array(
			'shortcodes' => array(
				'min_version' => '1.3.17'
			)
		)
	)
);