<?php
if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Featured List', 'seogrow' ),
		'description' => esc_html__ ( 'List of feature with info', 'seogrow' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-featured-list slz-vc-slzcore',
		'tag' => 'slz_featured_list'
);

$cfg['show_options'] = array(
	esc_html__( 'Icon', 'seogrow' )  => 'icon',
	esc_html__( 'Image', 'seogrow' ) => 'image'
);

$cfg['layouts'] = array(
	'layout-1'  => esc_html__( 'United States', 'seogrow' ),
	'layout-2'  => esc_html__( 'India', 'seogrow' )
);

$cfg['params_default_arr'] = array(
	'text'                     => '',
	'show_options'             => 'icon',
    'title'                    => '',
    'description'              => '',
	'image'                    => '',
	//icon update
	'icon_library'             => '',
	'icon_'                    => '',
	'icon_openiconic'          => '',
	'icon_typicons'            => '',
	'icon_linecons'            => '',
	'icon_monosocial'          => '',
	'icon_entypo'              => '',
	//layout 2
	'slider_img'             => '',

);

$cfg ['default_value'] = array (
    'styles'               => 'style-1',
    'layout'               => 'layout-1',
	'column'               => '',
    'show_number'          => 'yes',
	'feature_list'         => '',
    'feature_list2'        => '',
    
	'text_color'           => '',
    'des_color'            => '',
    'number_color'         => '',
	'background_color'     => '',
    'border_color'         => '',
	'background_img'       => '',
	'extra_class'          => '',
	// update option
	'feature_list_slider'  => '',
	'arrows_color'         => '',
	'arrows_hv_color'      => '',
);