<?php
if (! defined ( 'SLZ' )) {
	die ( 'Forbidden' );
}

$cfg = array ();

$cfg ['page_builder'] = array (
		'title' => esc_html__ ( 'SLZ Info Box', 'slz' ),
		'description' => esc_html__ ( 'Information Box', 'slz' ),
		'tab' => slz()->theme->manifest->get('name'),
		'icon' => 'icon-slzcore-info-box slz-vc-slzcore',
		'tag' => 'slz_info_box'
);

$cfg['show_options'] = array(
	esc_html__( 'Icon', 'slz' )  => 'icon',
	esc_html__( 'Image', 'slz' ) => 'image'
);

$cfg['styles'] = array(
    esc_html__( 'Florida', 'slz' )  => 'style-1',
    esc_html__( 'California', 'slz' )  => 'style-2',
    esc_html__( 'Georgia', 'slz' )  =>  'style-3'
);

$cfg['params_default_arr'] = array(
	'text'                     => '',
	'show_options'             => 'icon',
    'title'                    => '',
    'description'              => '',
	'image'                    => '',
    'information'              => '',
	//icon update
	'icon_library'             => '',
	'icon_'                    => '',
	'icon_openiconic'          => '',
	'icon_typicons'            => '',
	'icon_linecons'            => '',
	'icon_monosocial'          => '',
	'icon_entypo'              => '',

);

$cfg ['default_value'] = array (
    'styles'               => 'style-3',
	'column'               => '',
    'show_number'          => 'yes',
	'feature_list'         => '',
    'feature_list2'        => '',
    'show_icon'            => '1',
    'icon_fontawesome'     => '',
    'image'                => '',
    'information'          => '',
	'text_color'           => '',
    'des_color'            => '',
    'number_color'         => '',
	'background_color'     => '',
    'border_color'         => '',
	'background_img'       => '',
    'icon_color'           => '',
	'extra_class'          => '',
);