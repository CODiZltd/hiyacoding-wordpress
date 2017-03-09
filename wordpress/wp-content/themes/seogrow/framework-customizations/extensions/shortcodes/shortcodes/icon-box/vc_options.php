<?php

$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'icon_box' );

$icon_type = SLZ_Params::get('icon-type');
$icon_type_no_img = SLZ_Params::get('icon-type-no-img');

$style_view = array(
	esc_html__('Horizontal', 'seogrow')  => '',
	esc_html__('Vertical', 'seogrow')  => '1',
);
$style1_custom = array(
	esc_html__( '1 image or 1 Icon', 'seogrow' ) => '',
	esc_html__( 'Multi image and Icon', 'seogrow' ) => '1'
);
$column_arr = array(
	esc_html__( 'None', 'seogrow' )  => '',
	esc_html__('One', 'seogrow')     => '1',
	esc_html__('Two', 'seogrow')     => '2',
	esc_html__('Three', 'seogrow')   => '3',
	esc_html__('Four', 'seogrow')    => '4',
);

$styles = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'seogrow' ),
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'std'         => 'layout-1',
		'description' => esc_html__( 'Choose layout to show', 'seogrow' )
	),
	
);

$columns = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column', 'seogrow' ),
		'param_name'  => 'column',
		'value'       => $column_arr,
		'std'         => '',
		'description' => esc_html__( 'Choose number of columns to show', 'seogrow' )
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Show Numerical Order?', 'seogrow' ),
		'param_name'  => 'show_number',
		'description' => esc_html__( 'Displays the number order of each item', 'seogrow' ),
	),
);

$params = $shortcode->get_layout_options();

$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	)
);

$title = array(
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Title', 'seogrow' ),
        'param_name'  => 'title',
        'value'       => '',
        'description' => esc_html__( 'Title. If it blank the will not have a title', 'seogrow' )
    ),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Title Color', 'seogrow' ),
        'param_name'  => 'title_color',
        'value'       => '',
        'description' => esc_html__( 'Choose a custom title text color.', 'seogrow' )
    ),
);

$vc_options = array_merge(
	$title,
    $styles,
	$columns,
	$params,
	$extra_class
);