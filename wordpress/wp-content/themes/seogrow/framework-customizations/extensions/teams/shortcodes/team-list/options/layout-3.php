<?php

$column = array(
	esc_html__( 'One', 'seogrow' )      => '1',
	esc_html__( 'Two', 'seogrow' )      => '2',
	esc_html__( 'Three', 'seogrow' )    => '3',
	esc_html__( 'Four', 'seogrow' )     => '4'
);
$yes_no  = array(
	esc_html__('Yes', 'seogrow')        => 'yes',
	esc_html__('No', 'seogrow')         => 'no'
);

$vc_options = array(
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Column', 'seogrow' ),
		'admin_label'   => true,
		'param_name'    => 'column',
		'value'         => $column,
		'std'           => '3',
		'description'   => esc_html__( 'Choose number column will be displayed.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Is Slide ?', 'seogrow' ),
		'admin_label'   => true,
		'param_name'    => 'is_slide',
		'value'         => $yes_no,
		'std'           => 'no',
		'description'   => esc_html__( 'If choose Yes, grid block will be show slide.', 'seogrow' )
	),
	array(
		'type'          => 'dropdown',
		'heading'       => esc_html__( 'Show Pagination ?', 'seogrow' ),
		'param_name'    => 'pagination',
		'value'         => $yes_no,
		'std'           => 'no',
		'description'   => esc_html__( 'If choose Yes, block will be show pagination.', 'seogrow' ),
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Max Posts', 'seogrow' ),
		'param_name'    => 'max_post',
		'value'         => '',
		'description'   => esc_html__( 'Add total posts when paging.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'pagination',
			'value'     => array( 'yes' )
		)
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Auto Play ?', 'seogrow' ),
		'param_name'  	=> 'slide_autoplay',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to slide auto play.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'is_slide',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Dots Navigation ?', 'seogrow' ),
		'param_name'  	=> 'slide_dots',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to show dot navigation.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'is_slide',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Arrows Navigation ?', 'seogrow' ),
		'param_name'  	=> 'slide_arrows',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to show arrow navigation.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'is_slide',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__( 'Is Loop Infinite ?', 'seogrow' ),
		'param_name'  	=> 'slide_infinite',
		'value'       	=> $yes_no,
		'std'      		=> 'yes',
		'description' 	=> esc_html__( 'Choose YES to slide loop infinite.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'is_slide',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'          => 'textfield',
		'heading'       => esc_html__( 'Speed Slide', 'seogrow' ),
		'param_name'    => 'slide_speed',
		'value'			=> '600',
		'description'   => esc_html__( 'Enter number value. Unit is millisecond. Example: 600.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'is_slide',
			'value'     => array( 'yes' )
		),
		'group'         => esc_html__('Slide Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Color', 'seogrow' ),
		'param_name'    => 'color_slide_arrow',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Color Hover', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide arrow for slide when hover.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Color', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_bg',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Arrow Background Color Hover', 'seogrow' ),
		'param_name'    => 'color_slide_arrow_bg_hv',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color slide arrow for slide when hover.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_arrows',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Slide Dots Color', 'seogrow' ),
		'param_name'    => 'color_slide_dots_at',
		'value'         => '',
		'description'   => esc_html__( 'Choose color slide dots for slide.', 'seogrow' ),
		'dependency'    => array(
			'element'   => 'slide_dots',
			'value'     => array( 'yes' )
		),
		'group'       	=> esc_html__('Custom', 'seogrow')
	),
	array(
		'type'          => 'colorpicker',
		'heading'       => esc_html__( 'Block Background Color', 'seogrow' ),
		'param_name'    => 'block_bg_color',
		'value'         => '',
		'description'   => esc_html__( 'Choose background color for block.', 'seogrow' ),
		'group'         => esc_html__('Custom', 'seogrow')
	),
);