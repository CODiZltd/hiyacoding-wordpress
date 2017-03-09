<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'testimonial' );
$column_option  = array(
    esc_html__('1', 'seogrow') => '1',
    esc_html__('2', 'seogrow') => '2'
);
$vc_options = array(
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Quote Icon Color', 'seogrow' ),
		'param_name'  => 'quote_icon_color',
		'description' => esc_html__( 'Please choose quote icon color', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow')
	),

    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Line Color', 'seogrow' ),
        'param_name'  => 'line_color',
        'description' => esc_html__( 'Please choose line color', 'seogrow' ),
        'group'       => esc_html__('Custom CSS', 'seogrow'),
        'dependency'  => array(
            'element'    => 'style',
            'value'      => '2'
        )
    ),

    array(
        'type'          => 'dropdown',
        'heading'     => esc_html__( 'Slides To Show ', 'seogrow' ),
        'param_name'  => 'num_column_show',
        'value'       => $column_option,
        'description' => esc_html__( 'Choose number of column show in slider.', 'seogrow' ),
        'group'       => esc_html__('Slide Custom', 'seogrow')
    ),

);