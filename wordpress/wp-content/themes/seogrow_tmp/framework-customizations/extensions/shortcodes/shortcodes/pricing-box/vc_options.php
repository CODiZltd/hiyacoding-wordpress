<?php
$column = array(
	esc_html__( 'One', 'seogrow' )    => '1',
	esc_html__( 'Two', 'seogrow' )    => '2',
	esc_html__( 'Three', 'seogrow' )  => '3',
	esc_html__( 'Four', 'seogrow' )   => '4',
);

$yes_no = array(
	esc_html__( 'No', 'seogrow' )     => 'no',
	esc_html__( 'Yes', 'seogrow' )    => 'yes',
);


$params = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_html__( 'Number of Pricing Box', 'seogrow' ),
		'param_name'  => 'column',
		'std'         => '1',
		'value'       => $column,
		'description' => esc_html__( 'Choose number of pricing box to display', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	)
);
$params_tab = array();
foreach( $column as $key=>$val) {
	$i = absint($val);
	$group_name = esc_html__('Pricing Box ', 'seogrow') . $i;
	$column_denp = array();
	for( $j=$i ; $j<= count($column); $j++){
		$column_denp[] = "{$j}";
	}
	$item_dependency = array(
			'element'  => 'column',
			'value'    => $column_denp
		);
	$param_tab_item = array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Active', 'seogrow' ),
			'param_name'  => 'active' . $i,
			'std'         => 'no',
			'value'       => $yes_no,
			'description' => esc_html__( 'Choose yes if you want it show as active.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Active Color', 'seogrow' ),
			'param_name'  => 'active_color1',
			'description' => esc_html__( 'Choose active background color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'     => array(
				'element'  => 'active' . $i,
				'value'    => array('yes')
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Mark Label', 'seogrow' ),
			'param_name'  => 'label' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input mark label.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Label Text Color', 'seogrow' ),
			'param_name'  => 'label_text_color' . $i,
			'description' => esc_html__( 'Choose label text color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Label Background Color', 'seogrow' ),
			'param_name'  => 'label_background_color' . $i,
			'description' => esc_html__( 'Choose label background color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'     => array(
				'element'  => 'active' . $i,
				'value'    => array('yes')
			),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Title', 'seogrow' ),
			'param_name'  => 'title' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input box title.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Title Color', 'seogrow' ),
			'param_name'  => 'title_color' . $i,
			'description' => esc_html__( 'Choose title color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Title Background Color', 'seogrow' ),
			'param_name'  => 'title_bg_color' . $i,
			'description' => esc_html__( 'Choose title background color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Unit', 'seogrow' ),
			'param_name'  => 'unit' . $i,
			'value'       => '',
			'description' => esc_html__( 'Enter measurement units. Example: $, GBP, EUR, etc.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Price', 'seogrow' ),
			'param_name'  => 'price' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input price number.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Price Color', 'seogrow' ),
			'param_name'  => 'price_color' . $i,
			'description' => esc_html__( 'Choose price color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Separate', 'seogrow' ),
			'param_name'  => 'separate' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input separte. Exp: /, : ', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Price Subfix', 'seogrow' ),
			'param_name'  => 'currency' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input price subfix. Exp: Month, Hour,..', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Price Subfix Color', 'seogrow' ),
			'param_name'  => 'price_subfix_color' . $i,
			'description' => esc_html__( 'Choose price subfix color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Sub Title', 'seogrow' ),
			'param_name'  => 'sub_title' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input sub title.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Sub Title Color', 'seogrow' ),
			'param_name'  => 'sub_title_color' . $i,
			'description' => esc_html__( 'Choose sub title color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'       => 'param_group',
			'heading'    => esc_html__( 'Features', 'seogrow' ),
			'param_name' => 'pricing_options' . $i,
			'params'     => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Feature Item', 'seogrow' ),
					'param_name'  => 'text',
					'admin_label' => true,
					'value'       => '',
					'description' => esc_html__( 'Please input feature item.', 'seogrow' ),
				),
				array(
					'type'        => 'colorpicker',
					'heading'     => esc_html__( 'Feature Item Color', 'seogrow' ),
					'param_name'  => 'pricing_options_color',
					'description' => esc_html__( 'Choose feature item color.', 'seogrow' ),
				),
			),
			'value'       => '',
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_html__( 'Button Text', 'seogrow' ),
			'param_name'  => 'btn_text' . $i,
			'value'       => '',
			'description' => esc_html__( 'Please input button text.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'vc_link',
			'heading'     => esc_html__( 'Button Link', 'seogrow' ),
			'param_name'  => 'btn_link' . $i,
			'value'       => '',
			'description' => esc_html__( 'Choose button link and info.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Text Color', 'seogrow' ),
			'param_name'  => 'btn_text_color' . $i,
			'description' => esc_html__( 'Choose button text color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Background Color', 'seogrow' ),
			'param_name'  => 'btn_background_color' . $i,
			'description' => esc_html__( 'Choose button background color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Button Border Color', 'seogrow' ),
			'param_name'  => 'btn_border_color' . $i,
			'description' => esc_html__( 'Choose button border color.', 'seogrow' ),
			'group'       => $group_name,
			'dependency'  => $item_dependency,
		),
		
		
	);
	$params_tab = array_merge($params_tab, $param_tab_item);
}

$vc_options = array_merge( 
	$params,
	$params_tab
);
