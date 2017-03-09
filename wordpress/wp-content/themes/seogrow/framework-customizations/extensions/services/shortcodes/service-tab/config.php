<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Service Tab', 'seogrow' ),
	'description'	=> esc_html__( 'A service tab.', 'seogrow' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-service-tab slz-vc-slzcore',
	'tag'			=> 'slz_service_tab' 
);

$cfg ['default_value'] = array (
		'show_icon'             => 'icon',
		'description'           => 'excerpt',
		'limit_post'            => '-1',
		'offset_post'           => '0',
		'sort_by'               => '',
		'extra_class'           => '',
		'method'                => 'cat',
		'list_category'         => '',
		'list_post'             => '',
		'icon_color'            => '',
		'title_color'           => '',
		'title_active_color'    => '',
		'btn_content'           => 'Read More',
		'btn_color'             => '',
		'btn_hv_color'          => '',
		'btn_bg_color'          => '',
		'btn_bg_hv_color'       => '',
		'title_hv_color'        => '',
		'icon_active_color'     => '',
		'icon_hv_color'         => '',
		'title_ct_color'        => '',
		'title_ct_hv_color'     => '',
		'description_length'    => '',
);