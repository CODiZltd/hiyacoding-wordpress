<?php 

$show_hide = array(
	esc_html__( 'Show', 'seogrow' )  => 'show',
	esc_html__('Hide', 'seogrow')     => 'hide',
);

$vc_options = array(

	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Block Background?', 'seogrow' ),
		'param_name'  => 'show_bg',
		'description' => esc_html__( 'Displays Background for this block', 'seogrow' ),
		'value'       => $show_hide,
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Block Background Color', 'seogrow' ),
		'param_name'  => 'block_bg_color',
		'value'       => '#fff',
		'description' => esc_html__( 'Choose background color for this block.', 'seogrow' ),
		'dependency'    => array(
    		'element'   => 'show_bg',
  			'value'     => array( 'show' )
  		),
		'group'       => esc_html__('Custom', 'seogrow')
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Block Background Hover Color', 'seogrow' ),
		'param_name'  => 'block_bg_hv_color',
		'value'       => '',
		'description' => esc_html__( 'Choose background color for this block when hover.', 'seogrow' ),
		'dependency'    => array(
    		'element'   => 'show_bg',
  			'value'     => array( 'show' )
  		),
		'group'       => esc_html__('Custom', 'seogrow')
	)
);