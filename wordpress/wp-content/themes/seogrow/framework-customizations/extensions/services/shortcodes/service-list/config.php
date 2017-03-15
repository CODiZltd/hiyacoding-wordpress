<?php

if ( ! defined( 'ABSPATH' ) ) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
	'title'			=> esc_html__( 'SLZ Service List', 'seogrow' ),
	'description'	=> esc_html__( 'A service list.', 'seogrow' ),
	'tab'			=> slz()->theme->manifest->get('name'),
	'icon'			=> 'icon-slzcore-service-list slz-vc-slzcore',
	'tag'			=> 'slz_service_list' 
);

$cfg['layouts'] = array(
	'layout-1'  => esc_html__( 'United States', 'seogrow' ),
	'layout-2'  => esc_html__( 'India', 'seogrow' ),
	'layout-3'  => esc_html__( 'United Kingdom', 'seogrow' ),
);

$cfg ['default_value'] = array (
		'layout'                => 'layout-1',
		'style'                 => '',
		'align'                 => '',
		'show_icon'             => 'icon',
		'show_number'           => '',
		'description'           => 'des',
		'column'                => '3',
		'pagination'            => 'no',
		'limit_post'            => '-1',
		'offset_post'           => '0',
		'sort_by'               => '',
		'btn_content'           => 'Read More',
		'extra_class'           => '',
		'method'                => 'cat',
		'list_category'         => '',
		'list_post'             => '',
		'block_bg_color'        => '#fff',
		'block_bg_hv_color'     => '',
		'icon_color'            => '',
		'icon_bd_color'         => '',
		'icon_bd_hv_color'      => '',
		'title_color'           => '',
		'des_color'             => '',
		'btn_color'             => '',
		'btn_hv_color'          => '',
		'nav_color'             => '',
		'is_carousel'           => 'no',
		'show_dots'             => 'yes',
		'show_arrows'           => 'yes',
		'slide_autoplay'        => 'yes',
		'slide_infinite'        => 'yes',
		'slide_speed'           => '',
		'style-3'               => '',
		'icon_bg_color'         => '',
		'icon_bg_hv_color'      => '',
		'show_bg'               => 'show',
);