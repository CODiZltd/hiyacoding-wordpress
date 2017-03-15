<?php
$shortcode = slz_ext( 'shortcodes' )->get_shortcode( 'contact' );

$style_view = array(
    esc_html__('Florida', 'seogrow')  => 'style-florida',
    esc_html__('California', 'seogrow')  => 'style-california',
);

$column = array(
    esc_html__( 'One', 'seogrow' )   => '1',
    esc_html__( 'Two', 'seogrow' )   => '2',
    esc_html__( 'Three', 'seogrow' ) => '3',
    esc_html__( 'Four', 'seogrow' )  => '4',
);

$params = array(
    array(
        'type'        => 'dropdown',
        'heading'     => esc_html__( 'Style', 'seogrow' ),
        'param_name'  => 'style',
        'value'       => $style_view,
        'std'         => '',
        'description' => esc_html__( 'Choose style to show', 'seogrow' ),
    ),
    array(
        'type'            => 'dropdown',
        'heading'         => esc_html__( 'Column', 'seogrow' ),
        'param_name'      => 'column',
        'value'           => $column,
        'std'             => '3',
        'description'     => esc_html__( 'Choose number of column for this contact.', 'seogrow' ),
    ),
	array(
		'type'            => 'param_group',
		'heading'         => esc_html__( 'Add Contact Info', 'seogrow' ),
		'param_name'      => 'array_info',
		'params'          => array(
            array(
                'type'            => 'param_group',
                'heading'         => esc_html__( 'Main Information', 'seogrow' ),
                'param_name'      => 'array_info_item',
                'params'          => array(
                    array(
                        'type'           => 'textarea',
                        'heading'        => esc_html__( 'Title', 'seogrow' ),
                        'param_name'     => 'title',
                        'description'    => esc_html__( 'Enter title for main information.', 'seogrow' ),
                    ),
                    array(
                        'type'           => 'iconpicker',
                        'heading'        => esc_html__( 'Icon', 'seogrow' ),
                        'param_name'     => 'contact_icon',
                        'description'    => esc_html__( 'Choose icon for main information.', 'seogrow' ),
                    ),
                    array(
                        'type'            => 'colorpicker',
                        'heading'         => esc_html__( 'Main Info Background Color', 'seogrow' ),
                        'param_name'      => 'main_bg_color',
                        'value'           => '',
                        'description'     => esc_html__( 'Select background color for main information.', 'seogrow' ),
                    ),
                )
            ),
            array(
                'type'            => 'param_group',
                'heading'         => esc_html__( 'Sub Information', 'seogrow' ),
                'param_name'      => 'array_sub_info_item',
                'params'          => array(
                    array(
                        'type'           => 'textarea',
                        'heading'        => esc_html__( 'Title', 'seogrow' ),
                        'param_name'     => 'sub_info',
                        'description'    => esc_html__( 'Enter title for sub information', 'seogrow' ),
                    ),
                    array(
                        'type'           => 'iconpicker',
                        'heading'        => esc_html__( 'Icon', 'seogrow' ),
                        'param_name'     => 'sub_info_icon',
                        'description'    => esc_html__( 'Choose icon for sub information.', 'seogrow' ),
                    ),
                )
            ),
            array(
                'type'        => 'textarea',
                'heading'     => esc_html__( 'Description', 'seogrow' ),
                'param_name'  => 'description',
                'value'       => '',
                'description' => esc_html__( 'Add description for block', 'seogrow' ),
            ),
		),
	),
    array(
        'type'        => 'textfield',
        'heading'     => esc_html__( 'Extra Class', 'seogrow' ),
        'param_name'  => 'extra_class',
        'value'       => '',
        'description' => esc_html__( 'Add extra class for block', 'seogrow' ),
    ),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Main Info Color', 'seogrow' ),
		'param_name'      => 'title_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'seogrow'),
		'description'     => esc_html__( 'Select color for main information.', 'seogrow' ),
	),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Main Info Icon Color', 'seogrow' ),
        'param_name'      => 'main_icon_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'seogrow'),
        'description'     => esc_html__( 'Select color for main information icon.', 'seogrow' ),
    ),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Sub Info Color', 'seogrow' ),
		'param_name'      => 'info_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'seogrow'),
		'description'     => esc_html__( 'Select color for sub information.', 'seogrow' ),
	),
    array(
        'type'            => 'colorpicker',
        'heading'         => esc_html__( 'Sub Info Icon Color', 'seogrow' ),
        'param_name'      => 'sub_icon_color',
        'value'           => '',
        'group'           => esc_html__( 'Custom Css', 'seogrow'),
        'description'     => esc_html__( 'Select color for sub information icon.', 'seogrow' ),
    ),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Block Border Color', 'seogrow' ),
		'param_name'      => 'border_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'seogrow'),
		'description'     => esc_html__( 'Select color for vertical separator between items..', 'seogrow' ),
	),
	array(
		'type'            => 'colorpicker',
		'heading'         => esc_html__( 'Block Background Color', 'seogrow' ),
		'param_name'      => 'bg_color',
		'value'           => '',
		'group'           => esc_html__( 'Custom Css', 'seogrow'),
		'description'     => esc_html__( 'Select background color for block.', 'seogrow' ),
	),
);

$vc_options = array_merge( 
	$params
);