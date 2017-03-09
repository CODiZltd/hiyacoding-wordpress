<?php

$icon_type = array(
	esc_html__( 'Visual Composer', 'seogrow' )  => '',
	esc_html__('Image Upload', 'seogrow')       => '02',
);
$params = array(
	array(
		'type'           => 'dropdown',
		'heading'        => esc_html__( 'Choose Type of Icon', 'seogrow' ),
		'param_name'     => 'icon_type',
		'value'          => $icon_type,
		'description'    => esc_html__( 'Choose style to display block.', 'seogrow' )
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__( 'Icon library', 'seogrow' ),
		'value' => array(
			esc_html__( 'Font Awesome', 'seogrow' ) => 'vs',
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
			'element'  => 'icon_type',
			'value'    => array('')
		),
	),
	array(
		'type' => 'iconpicker',
		'heading' => esc_html__( 'Icon', 'seogrow' ),
		'param_name' => 'icon_vs',
		'settings' => array(
			'iconsPerPage' => 4000,
		),
		'dependency' => array(
			'element' => 'icon_library',
			'value' => 'vs',
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
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Color', 'seogrow' ),
		'param_name'  => 'icon_color',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'icon_type',
			'value'    => array('','03')
		),
		'description' => esc_html__( 'Choose icon color.', 'seogrow' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Icon Hover Color', 'seogrow' ),
		'param_name'  => 'icon_hv_color',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'icon_type',
			'value'    => array('','03')
		),
		'description' => esc_html__( 'Choose icon hover color.', 'seogrow' )
	),
	array(
		'type'           => 'attach_image',
		'heading'        => esc_html__( 'Upload Image', 'seogrow' ),
		'param_name'     => 'img_up',
		'dependency'     => array(
			'element'  => 'icon_type',
			'value'    => array('02')
		),
		'description'    => esc_html__('Upload Image.', 'seogrow'),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Image Hover Color', 'seogrow' ),
		'param_name'  => 'image_hv_color',
		'value'       => '',
		'dependency'     => array(
			'element'  => 'icon_type',
			'value'    => array('02')
		),
		'description' => esc_html__( 'Choose background color for image when hover.', 'seogrow' )
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Title', 'seogrow' ),
		'admin_label'    => true,
		'param_name'  => 'title',
		'value'       => '',
		'description' => esc_html__( 'Title. If it blank the block will not have a title', 'seogrow' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Title Color', 'seogrow' ),
		'param_name'  => 'title_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom title text color.', 'seogrow' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_html__( 'Description', 'seogrow' ),
		'param_name'  => 'des',
		'value'       => '',
		'description' => esc_html__( 'Description. If it blank the block will not have a title', 'seogrow' )
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Description Color', 'seogrow' ),
		'param_name'  => 'des_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom description text color.', 'seogrow' )
	),

	/* button */
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Button Text', 'seogrow' ),
		'param_name'  => 'button_text',
		'value'       => '',
		'description' => esc_html__( 'Button Text. If it blank the block will not have a button', 'seogrow' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Text Color', 'seogrow' ),
		'param_name'  => 'button_text_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom button text color.', 'seogrow' ),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_html__( 'Button Background Color', 'seogrow' ),
		'param_name'  => 'button_background_color',
		'value'       => '',
		'description' => esc_html__( 'Choose a custom button background color.', 'seogrow' ),
	),

	array(
		'type'        => 'vc_link',
		'heading'     => esc_html__( 'Button Link', 'seogrow' ),
		'param_name'  => 'button_link',
		'value'       => '',
		'description' => esc_html__( 'Please input button link and button info.', 'seogrow' ),
	),
);

$vc_options = array(
	array(
		'type'       => 'param_group',
		'heading'    => esc_html__( 'Icon Box - Items', 'seogrow' ),
		'param_name' => 'icon_box_2',
		'params'     => $params,
		'value'       => '',
		'description' => esc_html__( 'List of icon box', 'seogrow' ),
	),
);