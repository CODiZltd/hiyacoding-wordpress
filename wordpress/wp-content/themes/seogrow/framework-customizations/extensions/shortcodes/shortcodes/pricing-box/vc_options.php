<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'pricing-box' );
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

$icon_type = array(
    esc_html__( 'Icon Type', 'seogrow' )     => '1',
    esc_html__( 'Image Type', 'seogrow' )    => '2',
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
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Style', 'seogrow' ),
        'param_name'  => 'style',
        'value'       => $shortcode->get_styles(),
        'std'         => '1',
        'description' => esc_html__( 'Choose style to show', 'seogrow' ),
    ),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
		'param_name'  => 'extra_class',
		'value'       => '',
		'description' => esc_html__( 'Add extra class to block', 'seogrow' )
	),

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


    $params_icon   = array(
        array(
            'type'       => 'param_group',
            'heading'    => esc_html__( 'Featured Items', 'seogrow' ),
            'param_name' => 'feature_list'. $i,
            'params'     => array(
                array(
                    'type'           => 'dropdown',
                    'heading'        => esc_html__( 'Choose Type of Icon', 'seogrow' ),
                    'param_name'     => 'icon_type'.$i,
                    'value'          => $icon_type,
                    'description'    => esc_html__( 'Choose style to display block.', 'seogrow' ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__( 'Icon library', 'seogrow' ),
                    'value' => array(
                        esc_html__( 'Font Awesome', 'seogrow' ) => '',
                        esc_html__( 'Open Iconic', 'seogrow' ) => 'openiconic',
                        esc_html__( 'Typicons', 'seogrow' ) => 'typicons',
                        esc_html__( 'Entypo', 'seogrow' ) => 'entypo',
                        esc_html__( 'Linecons', 'seogrow' ) => 'linecons',
                        esc_html__( 'Mono Social', 'seogrow' ) => 'monosocial',
                    ),
                    'admin_label' => true,
                    'param_name' => 'icon_library'. $i,
                    'description' => esc_html__( 'Select icon library.', 'seogrow' ),
                    'dependency'     => array(
                        'element'  => 'icon_type'.$i,
                        'value'    => array('1')
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_'. $i,
                    'settings' => array(
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library'. $i ,
                        'value'    => array('')
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_openiconic'. $i,
                    'settings' => array(
                        'type' => 'openiconic',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library' . $i,
                        'value' => 'openiconic',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_typicons'. $i,
                    'settings' => array(
                        'type' => 'typicons',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library'. $i,
                        'value' => 'typicons',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_entypo' . $i,
                    'settings' => array(
                        'type' => 'entypo',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library'. $i,
                        'value' => 'entypo',
                    ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_linecons'.$i,
                    'settings' => array(
                        'type' => 'linecons',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library'. $i,
                        'value' => 'linecons',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_monosocial'. $i,
                    'settings' => array(
                        'type' => 'monosocial',
                        'iconsPerPage' => 4000,
                    ),
                    'dependency' => array(
                        'element' => 'icon_library' . $i,
                        'value' => 'monosocial',
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__( 'Icon Color', 'seogrow' ),
                    'param_name'  => 'icon_color'.$i,
                    'value'       => '',
                    'dependency'     => array(
                        'element'  => 'icon_type'.$i,
                        'value'    => array('1')
                    ),
                    'description' => esc_html__( 'Choose icon color.', 'seogrow' )
                ),
                array(
                    'type'           => 'attach_image',
                    'heading'        => esc_html__( 'Upload Image', 'seogrow' ),
                    'param_name'     => 'image'.$i,
                    'dependency'     => array(
                        'element'  => 'icon_type'.$i,
                        'value'    => array('2')
                    ),
                    'description'    => esc_html__('Upload Image.', 'seogrow'),
                ),
            ),
            'value'       => '',
            'dependency'     => array(
                'element'  => 'style',
                'value'    => '2'
            ),
            'group'       => $group_name,
        ),

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
            'dependency'  => $item_dependency,
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
            'param_name'  => 'title_color_bg' . $i,
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
                array(
                    'type' => 'iconpicker',
                    'heading' => esc_html__( 'Icon', 'seogrow' ),
                    'param_name' => 'icon_feature'. $i,
                    'settings' => array(
                        'iconsPerPage' => 4000,
                    ),
                    'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
                ),
                array(
                    'type'        => 'colorpicker',
                    'heading'     => esc_html__( 'Icon Feature Item Color', 'seogrow' ),
                    'param_name'  => 'pricing_options_color_icon',
                    'description' => esc_html__( 'Choose icon feature item color.', 'seogrow' ),
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
            'heading'     => esc_html__( 'Button Background Hover Color', 'seogrow' ),
            'param_name'  => 'btn_background_color_hv' . $i,
            'description' => esc_html__( 'Choose button background hover color.', 'seogrow' ),
            'group'       => $group_name,
            'dependency'  => $item_dependency,
        ),
	);
	$params_tab = array_merge($params_tab, $params_icon, $param_tab_item );


}


$vc_options = array_merge(
	$params,
	$params_tab

);

