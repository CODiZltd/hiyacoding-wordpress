<?php 
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'featured_list' );

$params = array(

	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Featured Items', 'seogrow' ),
		'param_name' => 'feature_list',
		'params'     => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Text', 'seogrow' ),
				'param_name'  => 'text',
				'admin_label' => true,
				'description' => esc_html__( 'Please input text of item', 'seogrow' )
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__( 'Options', 'seogrow' ),
				'param_name'  => 'show_options',
				'value'       => $shortcode->get_config('show_options'),
				'std'         => 'icon',
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
				'param_name' => 'icon_library',
				'description' => esc_html__( 'Select icon library.', 'seogrow' ),
				'dependency'     => array(
					'element'  => 'show_options',
					'value'    => array('icon')
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_',
				'settings' => array(
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value'    => array('')
				),
				'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_openiconic',
				'settings' => array(
					'type' => 'openiconic',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value' => 'openiconic',
				),
				'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_typicons',
				'settings' => array( 
					'type' => 'typicons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value' => 'typicons',
				),
				'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_entypo',
				'settings' => array( 
					'type' => 'entypo',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value' => 'entypo',
				),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_linecons',
				'settings' => array(
					'type' => 'linecons',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value' => 'linecons',
				),
				'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
			),
			array(
				'type' => 'iconpicker',
				'heading' => esc_html__( 'Icon', 'seogrow' ),
				'param_name' => 'icon_monosocial',
				'settings' => array(
					'type' => 'monosocial',
					'iconsPerPage' => 4000,
				),
				'dependency' => array(
					'element' => 'icon_library',
					'value' => 'monosocial',
				),
				'description' => esc_html__( 'Select icon from library.', 'seogrow' ),
			),
			array(
				'type'           => 'attach_image',
				'heading'        => esc_html__( 'Upload Image', 'seogrow' ),
				'param_name'     => 'image',
				'dependency'     => array(
					'element'  => 'show_options',
					'value'    => array('image')
				),
				'description'    => esc_html__('Upload Image.', 'seogrow'),
			),
		),
		'value'       => '',
	),
);

$custom_css = array(
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Background Color', 'seogrow' ),
		'param_name'  => 'background_color',
		'description' => esc_html__( 'Choose a custom color for background.', 'seogrow' ),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),
    array(
        'type'        => 'colorpicker',
        'heading'     => esc_html__( 'Border Color', 'seogrow' ),
        'param_name'  => 'border_color',
        'description' => esc_html__( 'Choose a custom color for border.', 'seogrow' ),
        'group'       => esc_html__( 'Custom CSS', 'seogrow'),
    ),
	array(
		'type'        => 'attach_image',
		'heading'     => esc_html__( 'Background Image', 'seogrow' ),
		'param_name'  => 'background_img',
		'description' => esc_html__('Background Image.', 'seogrow'),
		'group'       => esc_html__('Custom CSS', 'seogrow'),
	),

);
$vc_options = array_merge($params,$custom_css);