<?php

if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title'         => esc_html__ ( 'SLZ Contact', 'seogrow' ),
		'description'   => esc_html__ ( 'Contact information', 'seogrow' ),
		'tab'           => slz()->theme->manifest->get('name'),
		'icon'          => 'icon-slzcore-contact slz-vc-slzcore',
		'tag'           => 'slz_contact'
);

$cfg ['default_info'] = array (
    'column'                => '3',
	'array_info_item'       => '',
    'array_sub_info_item'  => '',
    'description'          => '',
);

$cfg ['default_main_info'] = array (
	'title'  => '',
    'contact_icon'     => '',
    'main_bg_color'    => '',
);

$cfg ['default_sub_info'] = array(
    'sub_info'         => '',
    'sub_info_icon'    => '',
);

$cfg ['default_value'] = array (
	'array_info'        => '',
    'array_more_info'   => '',
    'column'            => '3',
	'bg_color'          => '',
	'border_color'      => '',
	'info_color'        => '',
	'title_color'       => '',
    'main_icon_color'   => '',
    'sub_icon_color'    => '',
    'extra_class'       => '',
    'style'             => 'style-florida',
);