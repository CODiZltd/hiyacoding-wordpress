<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'featured_list' );

$layout = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Layout', 'seogrow' ),
		'param_name'  => 'layout',
		'value'       => $shortcode->get_layouts(),
		'std'         => 'layout-1',
		'description' => esc_html__( 'Choose layout to show', 'seogrow' )
	),
	
);

$column_arr = array(
	esc_html__('None', 'seogrow' )  => '',
	esc_html__('One', 'seogrow')     => '1',
	esc_html__('Two', 'seogrow')     => '2',
	esc_html__('Three', 'seogrow')   => '3',
	esc_html__('Four', 'seogrow')    => '4',
);


$layout_option = $shortcode->get_layout_options();

$params = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Column', 'seogrow' ),
		'param_name'  => 'column',
		'value'       => $column_arr,
		'std'         => '',
		'description' => esc_html__( 'Choose number of columns to show', 'seogrow' )
	),
);

$custom_css = array(

	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Text Color', 'seogrow' ),
		'param_name'  => 'text_color',
		'description' => esc_html__( 'Choose a custom color for text.', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Description Color', 'seogrow' ),
        'param_name'  => 'des_color',
        'description' => esc_html__( 'Choose a custom color for description.', 'seogrow' ),
        'group'       => esc_html__('Custom CSS', 'seogrow'),
    ),
	
);

$extra_class = array(
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to button', 'seogrow' )
	)
);




$vc_options = array_merge(
	$layout,
	$params,
	$layout_option,
	$extra_class,
	$custom_css
);